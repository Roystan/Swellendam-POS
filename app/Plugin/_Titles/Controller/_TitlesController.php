<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('UsersAppController', 'Titles.Controller');

/**
 * Titles Controller
 *
 * @category Controller
 * @package  Croogo.Titles.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class TitlesController extends TitlesAppController {

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Titles.Title');

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
        $this->set('title_for_layout', __d('croogo', 'Titles'));
        $this->Prg->commonProcess();
        $searchFields = array('title');

        $this->Title->recursive = 0;
        $criteria = $this->Title->parseCriteria($this->Prg->parsedParams());
        $this->paginate['conditions'] = $criteria;

        $this->set('titles', $this->paginate());
        $this->set('displayFields', $this->Title->displayFields());
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
    public function admin_add() {
        if (!empty($this->request->data)) {
            $this->Title->create();

            if ($this->Title->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Title has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Title could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

		$this->set('titles', $this->Title->find('list', array(
                    'order' => 'Title.title ASC',
                    'fields' => 'title')));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Edit title'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Title'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Title->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Title has been saved'), 'default', array('class' => 'success'));
                $this->Croogo->redirect(array('action' => 'edit', $this->Title->id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Title could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Title->read(null, $id);
        }

        $this->set('titles', $this->Title->find('list'));
        $this->set('editFields', $this->Title->editFields());
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
            $this->Session->setFlash(__d('croogo', 'Invalid id for Title'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Title->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Title deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'Title cannot be deleted'), 'default', array('class' => 'error'));
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

		$title = $this->Title->find('first', array(
			'conditions' => array(
				'Title.alias' => $alias,
				'Title.status' => 1,
			),
			'cache' => array(
				'name' => $alias,
				'config' => 'titles_view',
			),
		));
		if (!isset($title['Spouse']['id'])) {
			$this->redirect('/');
		}
		$this->set('title', $title);

		$this->set('title_for_layout', $title['Title']['title']);
		$this->set(compact('continue'));
	}
	
}
