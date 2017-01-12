<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('UsersAppController', 'Members.Controller');

/**
 * Payments Controller
 *
 * @category Controller
 * @package  Croogo.PaymentLogs.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class PaymentLogsController extends PaymentLogsAppController {

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('PaymentLogs.PaymentLog');

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

        $this->PaymentLog->recursive = 0;
        $criteria = $this->PaymentLog->parseCriteria($this->Prg->parsedParams());
        $this->paginate['conditions'] = $criteria;

        $this->set('payments', $this->paginate());
        $this->set('displayFields', $this->PaymentLog->displayFields());
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
            $this->PaymentLog->create();

            if ($this->PaymentLog->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Payment Log has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Payment Log could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        $this->set('payments', $this->PaymentLog->find('list', array(
            'order' => 'PaymentLog.date_for ASC',
            'fields' => 'payment_is')));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Edit payment log'));
        
        $this->Member->virtualFields['full_name'] = 'CONCAT(Member.firstname, " ", Member.lastname)';

        $this->set('members', $this->Member->find('list', array(
                    'order' => 'Member.firstname ASC',
                    'fields' => array('full_name'))));
        
        $this->set('paymentlogs', $this->PaymentLog->find('list'));
        $this->set('editFields', $this->PaymentLog->editFields());
        
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
            $this->Session->setFlash(__d('croogo', 'Invalid id for Payment Log'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->PaymentLog->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Payment Log deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'Payment Log cannot be deleted'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
}
