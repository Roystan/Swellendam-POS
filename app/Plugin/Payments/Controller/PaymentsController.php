<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('UsersAppController', 'Members.Controller');

/**
 * Payments Controller
 *
 * @category Controller
 * @package  Croogo.Payments.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class PaymentsController extends PaymentsAppController {

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Payments.Payment', 'PaymentLogs.PaymentLog');

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
        $this->set('title_for_layout', __d('croogo', 'Payments'));
        $this->Prg->commonProcess();
        $searchFields = array('amount_received');

        $this->Payment->recursive = 0;
        $criteria = $this->Payment->parseCriteria($this->Prg->parsedParams());
        $this->paginate['conditions'] = $criteria;

        $this->set('payments', $this->paginate());
        $this->set('displayFields', $this->Payment->displayFields());
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
            $this->Payment->create();

            if ($this->Payment->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Payment has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Payment could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        $this->set('payments', $this->Payment->find('list', array(
            'order' => 'Payment.date_for ASC',
            'fields' => 'amount_received')));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($redirect = false) {
        $this->set('title_for_layout', __d('croogo', 'Edit payment'));
        
        $_SESSION['redirect'] = false;
        
        if (!empty($this->request->data)) {
            $_SESSION['redirect'] = true;
            $this->redirect('/admin/members/members/view_statement_pdf/'.$this->request->data['Payment']['member_id']);
        } 
        
        $this->loadModel('Member');
        
        $this->Member->virtualFields['full_name'] = 'CONCAT(Member.firstname, " ", Member.lastname)';

        $this->set('members', $this->Member->find('list', array(
                    'order' => 'Member.firstname ASC',
                    'fields' => array('full_name'))));
        
        $this->set('payments', $this->Payment->find('list'));
        $this->set('editFields', $this->Payment->editFields());
        
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
            $this->Session->setFlash(__d('croogo', 'Invalid id for Payment'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Payment->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Payment deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'Payment cannot be deleted'), 'default', array('class' => 'error'));
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

		$members = $this->Member->find('first', array(
			'conditions' => array(
				'Member.alias' => $alias,
				'Member.status' => 1,
			),
			'cache' => array(
				'name' => $alias,
				'config' => 'members_view',
			),
		));
		$this->set(compact('continue'));
	}
	
	function admin_export()
	{
		$this->Spouse->recursive = 0;
		$criteria = $this->Spouse->parseCriteria($this->Prg->parsedParams());
		$this->paginate['conditions'] = $criteria;
                
		$this->set('spouses', $this->paginate());
		$this->set('genders', $this->Spouse->Gender->find('list'));
		$this->set('relationships', $this->Spouse->Relationship->find('list'));


		$this->layout = null;
		$this->autoLayout = false;
		Configure::write('debug','0');
	}

}
