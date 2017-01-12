<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('UsersAppController', 'Members.Controller');
    
/**
 * Spouses Controller
 *
 * @category Controller
 * @package  Croogo.Spouses.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class SpousesController extends SpousesAppController {

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Spouses.Spouse', 'Titles.Title');

    /**
    * Components
    *
    * @var array
    * @access public
    */
    public $components = array(
        'Security',
        'Search.Prg' => array(
            'presetForm' => array(
                'paramType' => 'querystring',
            ),
            'commonProcess' => array(
                'paramType' => 'querystring',
                'filterEmpty' => true,
            ),
        ),
    );
    
    public function beforeFilter() {
        $this->Security->unlockedActions = array('admin_edit', 'admin_add', 'admin_delete', 'admin_index', 'edit', 'delete', 'index');
        parent::beforeFilter();
    }

    /**
    * Preset Variables Search
    *
    * @var array
    * @access public
    */
    public $presetVars = true;

    /**
     * Admin index
    *
    * @return void
    * @access public
    * $searchField : Identify fields for search
    */
    public function admin_index() {
        $this->set('title_for_layout', __d('croogo', 'Spouses'));
        $this->Prg->commonProcess();
        $searchFields = array('firstname', 'lastname');
        
        $this->loadModel('Spouse');

        $this->Spouse->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Spouse.dateofbirth, CURDATE())';
        $this->Spouse->virtualFields['linked_to'] = 'CONCAT(Member.firstname, " ", Member.lastname)';
		
        $this->Spouse->recursive = 0;
        $criteria = $this->Spouse->parseCriteria($this->Prg->parsedParams());
        $this->paginate['conditions'] = $criteria;

        $this->set('spouses', $this->paginate());
        $this->set('displayFields', $this->Spouse->displayFields());
        $this->set('searchFields', $searchFields);

        if (isset($this->request->query['chooser'])) {
            $this->layout = 'admin_popup';
        }
    }
    /**
    * Admin add
    *
    * @return void
    * @access public
    */
    public function admin_add($member_id = null) {
        
        if ($member_id && empty($this->request->data)) {
            $this->set('_member_id', $member_id);
        } else {
            $this->set('_member_id', false);
        }
        
        if (!empty($this->request->data)) {
            $this->Spouse->create();

            if ($this->Spouse->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Spouse has been saved'), 'default', array('class' => 'success'));
                if ($member_id) {
                    $this->redirect(array('plugin' => 'members', 'admin' => 'true', 'controller' => 'members', 'action' => 'edit', $member_id));
                } else {
                    $this->redirect(array('plugin' => 'spouses', 'admin' => 'true', 'controller' => 'spouses', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__d('croogo', 'The Spouse could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }
        $this->Spouse->Member->virtualFields['full_name'] = 'CONCAT(Member.firstname, " ", Member.lastname)';

        $this->set('members', $this->Spouse->Member->find('list', array(
                    'order' => 'Member.firstname ASC',
                    'fields' => 'full_name')));
		
		$this->loadModel('Gender');
		$this->loadModel('Relationship');
		$this->loadModel('Title');
                
        $this->set('available_members', $this->Spouse->Member->query('SELECT CONCAT(members.firstname, " ", members.lastname) AS `full_name`
                            FROM members
                            LEFT JOIN spouses ON (members.id = spouses.member_id) 
                            WHERE spouses.member_id IS NOT NULL GROUP BY members.id'));

        $this->set('genders', $this->Gender->find('list'));
		$this->set('titles', $this->Title->find('list', array(
                    'fields' => 'title')));
        $this->set('relationships', $this->Relationship->find('list', 
			array('conditions' => 
                            array('AND' => 
                                array(
                                    'Relationship.title' => array('Wife', 'Husband', 'Other')
                                )
                            )
                        )
		)
            );
    }

    /**
    * Admin edit
    *
    * @param integer $id
    * @return void
    * @access public
    */
    public function admin_edit($id = null, $member_id = false) {
        $this->set('title_for_layout', __d('croogo', 'Edit Spouse'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Spouse'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Spouse->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Spouse has been saved'), 'default', array('class' => 'success'));
                $this->Croogo->redirect(array('action' => 'edit', $this->Spouse->id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Spouse could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Spouse->read(null, $id);
        }

        $this->Spouse->Member->virtualFields['full_name'] = 'CONCAT(Member.firstname, " ", Member.lastname)';

        $this->set('_member_id',  $member_id ? $member_id : false);
        $this->set('members', $this->Spouse->Member->find('list', array(
                    'order' => 'Member.firstname ASC',
                    'fields' => 'full_name')));
        $this->set('genders', $this->Spouse->Gender->find('list'));
		$this->set('titles', $this->Title->find('list'));
        $this->set('relationships', $this->Spouse->Relationship->find('list', 
			array('conditions' => 
				array('AND' => 
					array('Relationship.title' => array('Wife', 'Husband', 'Other')
					)
				)
			)
		));
        $this->set('statuses', $this->Spouse->Status->find('list'));
        $this->set('editFields', $this->Spouse->editFields());
    }

    /**
    * Admin delete
    *
    * @param integer $id
    * @return void
    * @access public
    */
    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__d('croogo', 'Invalid id for Spouse'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Spouse->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Spouse deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'Spouse cannot be deleted'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
    /**
    * View
    *
    * @param string $alias
    * @return void
    * @access public
    */
    public function view($alias = null) {
            if (!$alias) {
                    $this->redirect('/');
            }

            $spouse = $this->Spouse->find('first', array(
                    'conditions' => array(
                            'Spouse.alias' => $alias,
                            'Spouse.status' => 1,
                    ),
                    'cache' => array(
                            'name' => $alias,
                            'config' => 'spouses_view',
                    ),
            ));
            if (!isset($spouse['Spouse']['id'])) {
                    $this->redirect('/');
            }
            $this->set('spouse', $spouse);

            $this->set('title_for_layout', $spouse['Spouse']['firstname']);
            $this->set(compact('continue'));
    }

    function admin_export()
    {
        $spouses = $this->Spouse->find('all');
        $this->set('spouses', $spouses);
        $this->set('genders', $this->Spouse->Gender->find('list'));
        $this->set('relationships', $this->Spouse->Relationship->find('list'));


        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug','0');
    }

}
