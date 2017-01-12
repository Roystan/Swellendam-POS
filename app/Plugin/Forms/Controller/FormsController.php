<?php

//App::uses('CakeEmail', 'Network/Email');
App::uses('FormsAppController', 'Forms.Controller');

/**
 * Forms Controller
 *
 * @category Controller
 * @package  Croogo.Forms.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class FormsController extends FormsAppController {

    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array(
        'Search.Prg' => array(
            'presetForm' => array(
                'paramType' => 'querystring',
            ),
            'commonProcess' => array(
                'paramType' => 'querystring',
                'filterEmpty' => true,
            ),
//            array('Security'),
        ),
    );
    
    public function beforeFilter() {
        $this->Security->unlockedActions = array('admin_edit', 'admin_add', 'admin_delete', 'admin_index', 'admin_print_receipt', 'admin_capture_payment', 'edit', 'delete', 'index', 'print_receipt', 'capture_payment');
        parent::beforeFilter();
    }

    /**
     * Helpers
     *
     * @var array
     * @access public
     */
    var $helpers = array('Html', 'Form', 'Csv');

    /**
     * Preset Variables Search
     *
     * @var array
     * @access public
     */
    public $presetVars = true;

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Forms.Form', 'Spouses.Spouse', 'Members.Member');

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Edit Form'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Form'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Form->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Form has been saved'), 'default', array('class' => 'success'));
                $this->Croogo->redirect(array('action' => 'edit', $this->Form->id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Form could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->Form->read(null, $id);
        }
        $this->set('next_due_date', $this->Form->query("SELECT TIMESTAMPDIFF(MONTH, MAX(date_for), CURDATE()) AS 'date_due' FROM payments WHERE member_id = " . $id));

        $this->Form->Spouse->recursive = 0;
        $this->paginate['Spouse']['order'] = 'Spouse.id ASC';
        $this->set('spouses', $this->Spouse->find('all', array(
                    'limit' => 1,
                    'conditions' => array('Spouse.member_id' => $id)
                        )
        ));

        $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';

        $this->Form->Dependant->recursive = 0;
        $this->paginate['Dependant']['order'] = 'Dependant.id DESC';
        $this->set('dependants', $this->Dependant->find('all', array('conditions' => array('Dependant.member_id' => $id)
        )));

        $this->Payment->recursive = 0;
        $this->set('payments', $this->Payment->find('all', array(
            'conditions' => array(
                'Payment.member_id' => $id),
            'order' => 'Payment.date_for DESC'
            )
        ));


        $this->set('genders', $this->Form->Gender->find('list'));
        $this->set('categories', $this->Form->Category->find('list'));
        $this->set('relationships', $this->Form->Relationship->find('list'));
        $this->set('statuses', $this->Form->Status->find('list'));
        $this->set('titles', $this->Form->Title->find('list'));
        $this->set('editFields', $this->Form->editFields());
    }

    public function admin_print_eng_form_view() {
        if ($this->request->data) {
            $this->Croogo->redirect(array('plugin' => 'members', 'controller' => 'members', 'action' => 'print_form', $this->request->data['Form']['language']));
        }
        
    }

    public function admin_print_afr_form_view() {
        if ($this->request->data) {
            $this->Croogo->redirect(array('plugin' => 'members', 'controller' => 'members', 'action' => 'print_form', $this->request->data['Form']['language']));
        }
        
    }
    
    public function admin_print_form_afr($language = 0) {
        
        $this->set('language', $language);  
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        $this->render();
        
    }
    public function admin_print_form_eng($language = 0) {
        
        $this->set('language', $language);  
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        $this->render();
        
    }

}
