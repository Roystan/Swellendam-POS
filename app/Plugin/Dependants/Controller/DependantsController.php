<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('UsersAppController', 'Members.Controller');

/**
 * Dependants Controller
 *
 * @category Controller
 * @package  Croogo.Dependants.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class DependantsController extends DependantsAppController {

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Dependants.Dependant', 'Titles.Title');

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
            $this->Security->unlockedActions = array('admin_edit', 'admin_add', 'admin_delete', 'admin_index', 'edit', 'index');
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
        $this->set('title_for_layout', __d('croogo', 'Dependants'));
        $this->Prg->commonProcess();
        $searchFields = array('firstname', 'lastname');
        
        $this->loadModel('Dependant');

        $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';
        $this->Dependant->virtualFields['linked_to'] = 'CONCAT(Member.firstname, " ", Member.lastname)';

        $this->Dependant->recursive = 0;
        $criteria = $this->Dependant->parseCriteria($this->Prg->parsedParams());
        $this->paginate['conditions'] = $criteria;

        $this->set('dependants', $this->paginate());
        $this->set('displayFields', $this->Dependant->displayFields());
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
    public function admin_add($member_id = null, $member_firstname = null, $member_lastname = null) {
        
        if($member_id && empty($this->request->data)) {
            $this->set('member_id', $member_id);
            $this->set('member_firstname', $member_firstname);
            $this->set('member_lastname', $member_lastname);
        } else {
            $this->set('member_id', false);
        }
        
        if (!empty($this->request->data)) {
            $this->Dependant->create();

            if ($this->Dependant->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Dependant has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('plugin' => 'members', 'admin' => 'true', 'controller' => 'members', 'action' => 'edit', $member_id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Dependant could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }
        $this->Dependant->Member->virtualFields['full_name'] = 'CONCAT(Member.firstname, " ", Member.lastname)';
		$this->loadModel('Gender');
		$this->loadModel('Relationship');
		$this->loadModel('Title');
                
        $options['joins'] = array(
                'table' => 'dependants',
                'keyField' => 'members.id', 
                'valueField' => 'members.firstname',
                'conditions' => array('dependants.member_id' => 'IS NOT NULL')
            );
                
        $this->set('available_members',$this->Dependant->Member->find('list', array($options)));
                
        $this->set('members', $this->Dependant->Member->find('list', array(
                    'order' => 'Member.firstname ASC',
                    'fields' => 'full_name')));

        $this->set('genders', $this->Gender->find('list'));
		
        $this->set('titles', $this->Title->find('list', array(
                'fields' => 'title')
                )
        );
        $this->set('relationships', $this->Relationship->find('list', array(
                'conditions' => array(
                        'NOT' => array(
                                'Relationship.title' => array('Wife', 'Husband')
                                )
                        )
                )
        ));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Edit Dependant'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Dependant'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Dependant->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Dependant has been saved'), 'default', array('class' => 'success'));
                $this->Croogo->redirect(array('action' => 'edit', $this->Dependant->id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Dependant could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }
        
        $this->Dependant->Member->virtualFields['full_name'] = 'CONCAT(Member.firstname, " ", Member.lastname)';
        
        if (empty($this->request->data)) {
            
		$this->set('members', $this->Dependant->Member->find('list', array(
                    'order' => 'Member.firstname ASC',
                    'fields' => array('full_name'))));
            
            $this->request->data = $this->Dependant->read(null, $id);
        } else {
            $this->set('members', $this->Dependant->Member->find('list', array(
                    'order' => 'Member.firstname ASC',
                    'fields' => 'full_name')));
        }
        
        $this->loadModel('Dependant');

        $this->set('member_id', false);
        $this->set('genders', $this->Dependant->Gender->find('list'));
//        $this->set('titles', $this->Dependant->Title->find('list'));
        $this->set('relationships', $this->Dependant->Relationship->find('list', 
			array('conditions' => 
				array('NOT' => 
					array('Relationship.title' => array('Wife', 'Husband')
					)
				)
			)
		));
        $this->set('statuses', $this->Dependant->Status->find('list'));
        $this->set('editFields', $this->Dependant->editFields());
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
            $this->Session->setFlash(__d('croogo', 'Invalid id for Dependant'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Dependant->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Dependant deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'Dependant cannot be deleted'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
    }
	
	function admin_export()
	{
        
        $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';
        
            $dependants = $this->Dependant->find('all');

            $this->set('dependants', $dependants);
            $this->set('genders', $this->Dependant->Gender->find('list'));
            $this->set('relationships', $this->Dependant->Relationship->find('list'));


            $this->layout = null;
            $this->autoLayout = false;
            Configure::write('debug','0');
	}

}
