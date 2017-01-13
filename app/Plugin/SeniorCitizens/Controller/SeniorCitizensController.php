<?php

//App::uses('CakeEmail', 'Network/Email');
App::uses('SeniorCitizensAppController', 'SeniorCitizens.Controller');

/**
 * Senior Citizens Controller
 *
 * @category Controller
 * @package  Croogo.SeniorCitizens.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class SeniorCitizensController extends SeniorCitizensAppController {

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
        ),
    );

    /**
     * Helpers
     *
     * @var array
     * @access public
     */
    var $helpers = array('Html', 'Form', 'Csv');
    
    public function beforeFilter() {
        $this->Security->unlockedActions = array('admin_edit', 'admin_add', 'admin_delete', 'admin_index', 'admin_print_receipt', 'admin_capture_payment', 'edit', 'delete', 'index', 'print_receipt', 'capture_payment');
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
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('SeniorCitizens.SeniorCitizen', 'Spouses.Spouse', 'Dependants.Dependant', 'Payments.Payment', 'Relationship', 'Gender');

    /**
     * Toggle Node status
     *
     * @param $id string Node id
     * @param $status integer Current Node status
     * @return void
     */
    public function admin_toggle($id = null, $status = null) {
        $this->Croogo->fieldToggle($this->SeniorCitizen, $id, $status);
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     * $searchField : Identify fields for search
     */
    public function admin_index() {
        $this->set('title_for_layout', __d('croogo', 'Senior Citizens'));
        $this->Prg->commonProcess();
        $searchFields = array('policyno', 'firstname', 'lastname');

        $this->SeniorCitizen->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, SeniorCitizen.dateofbirth, CURDATE())';

        $this->SeniorCitizen->recursive = 0;
        $criteria = $this->SeniorCitizen->parseCriteria($this->Prg->parsedParams());
        $this->paginate['conditions'] = $criteria;

        $this->set('senior_citizens', $this->paginate());
        $this->set('displayFields', $this->SeniorCitizen->displayFields());
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
            $this->SeniorCitizen->create();

            if ($this->SeniorCitizen->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Senior Citizen has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Senior Citizen could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }
        $this->set('genders', $this->SeniorCitizen->Gender->find('list'));
        $this->set('titles', $this->SeniorCitizen->Title->find('list'));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public   
     */
    public function admin_edit($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Edit Senior Citizen'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Senior Citizen'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->SeniorCitizen->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Senior Citizen has been saved'), 'default', array('class' => 'success'));
                $this->Croogo->redirect(array('action' => 'edit', $this->SeniorCitizen->id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Senior Citizen could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->SeniorCitizen->read(null, $id);
        }
        $this->set('next_due_date', $this->SeniorCitizen->query("SELECT TIMESTAMPDIFF(MONTH, MAX(date_for), CURDATE()) AS 'date_due' FROM payments WHERE senior_citizen_id = " . $id));

        $this->Payment->recursive = 0;
        $this->paginate['Payment']['order'] = 'Payment.date_for ASC';
        $this->set('payments', $this->Payment->find('all', array('conditions' => array('Payment.senior_citizen_id' => $id)
        )));


        $this->set('genders', $this->SeniorCitizen->Gender->find('list'));
        $this->set('statuses', $this->SeniorCitizen->Status->find('list'));
        $this->set('titles', $this->SeniorCitizen->Title->find('list'));
        $this->set('editFields', $this->SeniorCitizen->editFields());
    }

    /**
     * Admin capture payment
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_capture_payment($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Capture Payment'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Senior Citizen'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Payment->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Payment has been saved'), 'default', array('class' => 'success'));
                
                $this->loadModel('PaymentLog');
                $this->PaymentLog->create();
                $this->PaymentLog->data['PaymentLog']['payment_id'] = $this->Payment->id;
                $this->PaymentLog->data['PaymentLog']['person_type'] = 2; // 2 => senior_citizen
                $this->PaymentLog->data['PaymentLog']['date_created'] = date('Y-m-d H:i:s');
                
                if ($this->PaymentLog->save($this->request->data)) {
                    
                }
                
                $this->Croogo->redirect(array('action' => 'print_receipt', $this->Payment->id, 0, $this->PaymentLog->id));
//                $this->Croogo->redirect(array('action' => 'edit', $this->SeniorCitizen->id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Senior Citizen could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->SeniorCitizen->read(null, $id);
        }

        $this->set('lastest_payment_date', $this->Payment->find('all', array(
                    'conditions' => array('senior_citizen_id' => $id),
                    'fields' => array('DATE(MAX(date_for)) AS lastest_payment_date', '*'),
                    'group by' => 'Payment.senior_citizen_id',
                    'order' => 'senior_citizen_id')));

        $this->set('total_received', $this->Payment->find('all', array(
                    'conditions' => array('senior_citizen_id' => $id),
                    'fields' => array('SUM(amount_received) AS total_received', '*'),
                    'group by' => 'Payment.senior_citizen_id',
                    'order' => 'senior_citizen_id')));

        $this->set('due_date', $this->Payment->find('all', array(
                    'conditions' => array('senior_citizen_id' => $id),
                    'fields' => array('DATE(MAX(date_for) + INTERVAL 1 MONTH) AS due_date', '*'),
                    'group by' => 'Payment.senior_citizen_id',
                    'order' => 'senior_citizen_id')));

        $sum = $this->Payment->find('all', array(
            'conditions' => array(
                'Payment.senior_citizen_id' => $id),
            'fields' => array('sum(Payment.amount_received) as total_sum'
            )
                )
        );

        $this->set('total_payments', $sum);

        $this->Payment->recursive = 0;
        $this->paginate['Payment']['order'] = 'Payment.date_for ASC';
        $this->set('payments', $this->Payment->find('all', array('conditions' => array('Payment.senior_citizen_id' => $id)
        )));

        $this->set('genders', $this->SeniorCitizen->Gender->find('list'));
        $this->set('statuses', $this->SeniorCitizen->Status->find('list'));
        $this->set('editFields', $this->SeniorCitizen->editFields());
    }
    
    public function admin_print_receipt($id = null, $redirect = false, $payment_log_id = false) {
        
        if (empty($this->request->data)) {
            if (!$id) {
                $this->Session->setFlash('Sorry, there was no payment selected.');
                $this->redirect(array('action' => 'index'), null, true);
            }
            
            $this->request->data = $this->Payment->read(null, $id);
            $senior_citizen = $this->SeniorCitizen->findById($this->request->data['Payment']['senior_citizen_id']);
            
            $this->set("redirect", $redirect);
            $this->set("senior_citizen", $senior_citizen);
            $this->set("payment_log_id", $payment_log_id);

        }
        
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
            $this->Session->setFlash(__d('croogo', 'Invalid id for Senior Citizen'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->SeniorCitizen->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Senior Citizen deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'SeniorCitizen cannot be deleted'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Unlink spouse from SeniorCitizen
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function unlink_spouse($id = null) {
        if (!$id) {
            $this->Session->setFlash(__d('croogo', 'Invalid id for Spouse'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Spouse->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Spouse unlinked'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'Spouse cannot be unlinked'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_spouses($id = null) {

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
    }

    public function admin_dependant($senior_citizen_id = null, $senior_citizen_firstname = null) {

        $this->set('senior_citizen_firstname', $senior_citizen_firstname);
        $this->set('senior_citizen_id', $senior_citizen_id);

        if (!empty($this->request->data)) {
            $this->Dependant->create();
            if ($this->Dependant->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Dependant has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Dependant could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        $this->set('genders', $this->SeniorCitizen->Gender->find('list'));
        $this->set('relationships', $this->Spouse->Relationship->find('list'));
    }

    function admin_view($id = null) {

        if (empty($this->request->data)) {
            $this->request->data = $this->SeniorCitizen->read(null, $id);

        }

        $this->set('genders', $this->SeniorCitizen->Gender->find('list'));
    }

    function admin_export() {
        $this->SeniorCitizen->recursive = 0;
        $criteria = $this->SeniorCitizen->parseCriteria($this->Prg->parsedParams());
        $this->paginate['conditions'] = $criteria;

        $this->set('senior_citizens', $this->paginate());
        $this->set('genders', $this->SeniorCitizen->Gender->find('list'));

        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug', '0');
    }

    public function create_pdf() {
        $senior_citizens = $this->SeniorCitizen->find('all');
        $this->set(compact('senior_citizens'));
        $this->layout = '/pdf/default';
        $this->render('/Pdf/my_pdf_view');
    }

    public function admin_download_pdf() {
        $this->viewClass = 'Media';

        $params = array(
            'id' => 'test.pdf',
            'name' => 'your_test',
            'download' => true,
            'extension' => 'pdf',
            'path' => APP . 'files/pdf' . DS
        );
        $this->set($params);
    }

    public function admin_view_pdf($id = null) {
        
        if (empty($this->request->data)) {
            if (!$id) {
                $this->Session->setFlash('Sorry, there was no PDF selected.');
                $this->redirect(array('action' => 'index'), null, true);
            }
            
            $this->request->data = $this->SeniorCitizen->read(null, $id);
        }
        
        if (!$id) {
            $this->Session->setFlash('No PDF');
        }
        
        $this->set('genders', $this->SeniorCitizen->Gender->find('list'));
        
        $this->layout = 'pdf';
        $this->render();
    }
}
