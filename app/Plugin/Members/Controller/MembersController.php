<?php

//App::uses('CakeEmail', 'Network/Email');
App::uses('MembersAppController', 'Members.Controller');

/**
 * Members Controller
 *
 * @category Controller
 * @package  Croogo.Members.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class MembersController extends MembersAppController {

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
    public $uses = array('Members.Member', 'Spouses.Spouse', 'Dependants.Dependant', 'Payments.Payment', 'PaymentLogs.PaymentLog', 'Relationship', 'Gender');

    /**
     * implementedEvents
     *
     * @return array
     */
    /* public function implementedEvents() {
      return parent::implementedEvents() + array(
      'Controller.Members.beforeAdminLogin' => 'onBeforeAdminLogin',
      'Controller.Members.adminLoginFailure' => 'onAdminLoginFailure',
      );
      } */

    /**
     * Toggle Node status
     *
     * @param $id string Node id
     * @param $status integer Current Node status
     * @return void
     */
    public function admin_toggle($id = null, $status = null) {
        $this->Croogo->fieldToggle($this->Member, $id, $status);
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     * $searchField : Identify fields for search
     */
    public function admin_index() {
        $this->set('title_for_layout', __d('croogo', 'Members'));
        $this->Prg->commonProcess();
        $searchFields = array('policyno', 'firstname', 'lastname');

        $this->loadModel('Member');

        $this->Member->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Member.dateofbirth, CURDATE())';
        $this->Member->virtualFields['next_payment_date'] = 'DATE(MAX(Payment1.date_for) + INTERVAL 1 MONTH)';
        $this->Member->virtualFields['latest_payment_date'] = 'DATE(MAX(Payment1.date_for))';

        $this->Member->recursive = 0;
        $criteria = $this->Member->parseCriteria($this->Prg->parsedParams());
        $this->paginate = array('conditions' => array($criteria), 'joins' => array(
                array(
                    'alias' => 'Payment1',
                    'table' => 'payments',
                    'type' => 'LEFT',
                    'conditions' => '`Payment1`.`member_id` = `Member`.`id`'
                )
            ), 'group' => array(
                'Member.id'
            ),
        );
        
//        $this->set('lastest_payment_date', $this->Payment->find('all', array(
//                    'conditions' => array('member_id' => $id),
//                    'fields' => array('DATE(MAX(date_for)) AS lastest_payment_date', '*'),
//                    'group by' => 'Payment.member_id',
//                    'order' => 'member_id')));
        
//        $this->Member->virtualFields['lastest_payment_date'] = 'DATE(MAX(date_for)) AS lastest_payment_date';

        $this->set('members', $this->paginate());
        $this->set('displayFields', $this->Member->displayFields());
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
            $this->Member->create();

            if ($this->Member->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Member has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Member could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }
        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));
        $this->set('titles', $this->Member->Title->find('list'));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Edit Member'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Member'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Member->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Member has been saved'), 'default', array('class' => 'success'));
                $this->Croogo->redirect(array('action' => 'edit', $this->Member->id));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Member could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->Member->read(null, $id);
        }
        $this->set('next_due_date', $this->Member->query("SELECT TIMESTAMPDIFF(MONTH, MAX(date_for), CURDATE()) AS 'date_due' FROM payments WHERE member_id = " . $id));

        $this->Member->Spouse->recursive = 0;
        $this->paginate['Spouse']['order'] = 'Spouse.id ASC';
        $this->set('spouses', $this->Spouse->find('all', array(
                    'limit' => 1,
                    'conditions' => array('Spouse.member_id' => $id)
                        )
        ));

        $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';

        $this->Member->Dependant->recursive = 0;
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


        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));
        $this->set('relationships', $this->Member->Relationship->find('list'));
        $this->set('statuses', $this->Member->Status->find('list'));
        $this->set('titles', $this->Member->Title->find('list'));
        $this->set('editFields', $this->Member->editFields());
    }

	public function admin_capture_payment($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Capture Payment'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Member'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
			
			if (isset($_SESSION['payment_data'])) {
				unset($_SESSION['payment_data']);
			}
			
			$new = true;
			$_SESSION['payment_data']['date_for'] = '';
			$_SESSION['payment_data']['amount_received'] = 0;
			
			if ($new) {
				
				$month = $this->request->data['Payment']['date_for']['month'];
				$day = $this->request->data['Payment']['date_for']['day'];
				$year = $this->request->data['Payment']['date_for']['year'];
						
				$date_for = $year.'-'.$month.'-'.$day;
				$from_date = false;
				$to_date = false;
					
				for ($i = 0; $i < $this->request->data['Payment']['months']; $i++) {
						
					if (!$from_date) {
						$from_date = date('M Y', strtotime("+".$i." month", strtotime($date_for)));
					}
					
					$date_inc = date('M Y', strtotime("+".$i." month", strtotime($date_for)));
					
					if ($this->request->data['Payment']['months'] > 1) {
						$_SESSION['payment_data']['date_for'] = $from_date . '-' . $date_inc;
						
					} else {
						$_SESSION['payment_data']['date_for'] = $date_inc;
					}
					$_SESSION['payment_data']['amount_received'] = $_SESSION['payment_data']['amount_received'] + $this->request->data['Payment']['amount_received'];
					
					// Delimiters may be slash, dot, or hyphen
					list($new_year, $new_month, $new_day) = split('[/.-]', $date_inc);
					
					$this->request->data['Payment']['date_for']['month'] = $new_month;
					$this->request->data['Payment']['date_for']['day'] = $new_day;
					$this->request->data['Payment']['date_for']['year'] = $new_year;
						
					if ($this->Payment->save($this->request->data)) {
							
						$this->loadModel('PaymentLog');
						$this->PaymentLog->create();
						$this->PaymentLog->data['PaymentLog']['payment_id'] = $this->Payment->id;
						$this->PaymentLog->data['PaymentLog']['person_type'] = 1; // 1 => member
						$this->PaymentLog->data['PaymentLog']['date_created'] = date('Y-m-d H:i:s');
						
						$payment_id = $this->Payment->id;					
						$payment_log_id = $this->PaymentLog->id;
						
						if ($this->PaymentLog->save($this->request->data)) {
							
						}
						
						if ($this->request->data['Payment']['months'] == ($i + 1)) {
							$this->Session->setFlash(__d('croogo', 'The Payment has been captured'), 'default', array('class' => 'success'));
							$this->Croogo->redirect(array('action' => 'print_receipt', $this->Payment->id, 0, $this->PaymentLog->id));
						}
						
					} else {
						$this->Session->setFlash(__d('croogo', 'Unable to capture payment. Please, try again.'), 'default', array('class' => 'error'));
					}
					
				}
				
			} else {
						
				if ($this->Payment->save($this->request->data)) {
					
					$this->Session->setFlash(__d('croogo', 'The Payment has been captured'), 'default', array('class' => 'success'));
					
					$this->loadModel('PaymentLog');
					$this->PaymentLog->create();
					$this->PaymentLog->data['PaymentLog']['payment_id'] = $this->Payment->id;
					$this->PaymentLog->data['PaymentLog']['person_type'] = 1; // 1 => member
					$this->PaymentLog->data['PaymentLog']['date_created'] = date('Y-m-d H:i:s');
					
					if ($this->PaymentLog->save($this->request->data)) {
						
					}
					
					$this->Croogo->redirect(array('action' => 'print_receipt', $this->Payment->id, 0, $this->PaymentLog->id));
					
				} else {
					$this->Session->setFlash(__d('croogo', 'Unable to capture payment. Please, try again.'), 'default', array('class' => 'error'));
				}
			}
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->Member->read(null, $id);
        }

        $this->set('lastest_payment_date', $this->Payment->find('all', array(
                    'conditions' => array('member_id' => $id),
                    'fields' => array('DATE(MAX(date_for)) AS lastest_payment_date', '*'),
                    'group by' => 'Payment.member_id',
                    'order' => 'member_id')));

        $this->set('total_received', $this->Payment->find('all', array(
                    'conditions' => array('member_id' => $id),
                    'fields' => array('SUM(amount_received) AS total_received', '*'),
                    'group by' => 'Payment.member_id',
                    'order' => 'member_id')));
        
        $this->set('due_date', $this->Payment->find('all', array(
                    'conditions' => array('member_id' => $id),
                    'fields' => array('DATE(MAX(date_for) + INTERVAL 1 MONTH) AS due_date', '*'),
                    'group by' => 'Payment.member_id',
                    'order' => 'member_id')));

        $sum = $this->Payment->find('all', array(
            'conditions' => array(
                'Payment.member_id' => $id),
            'fields' => array('sum(Payment.amount_received) as total_sum'
            )
                )
        );

        $this->set('total_payments', $sum);

        $this->Spouse->recursive = 0;
        $this->paginate['Spouse']['order'] = 'Spouse.id ASC';
        $this->set('spouses', $this->Spouse->find('all', array(
                    'limit' => 1,
                    'conditions' => array('Spouse.member_id' => $id)
                        )
        ));

        $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';

        $this->Dependant->recursive = 0;
        $this->paginate['Dependant']['order'] = 'Dependant.id ASC';
        $this->set('dependants', $this->Dependant->find('all', array('conditions' => array('Dependant.member_id' => $id)
        )));

        $this->Payment->recursive = 0;
        $this->paginate['Payment']['order'] = 'Payment.date_for ASC';
        $this->set('payments', $this->Payment->find('all', array('conditions' => array('Payment.member_id' => $id)
        )));

        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));
        $this->set('relationships', $this->Member->Relationship->find('list'));
        $this->set('statuses', $this->Member->Status->find('list'));
        $this->set('editFields', $this->Member->editFields());
    }
	
    /**
     * Admin capture payment
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_capture_payment_old($id = null) {
        $this->set('title_for_layout', __d('croogo', 'Capture Payment'));

        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__d('croogo', 'Invalid Member'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->Payment->save($this->request->data)) {
                $this->Session->setFlash(__d('croogo', 'The Payment has been captured'), 'default', array('class' => 'success'));
                
                $this->loadModel('PaymentLog');
                $this->PaymentLog->create();
                $this->PaymentLog->data['PaymentLog']['payment_id'] = $this->Payment->id;
                $this->PaymentLog->data['PaymentLog']['person_type'] = 1; // 1 => member
                $this->PaymentLog->data['PaymentLog']['date_created'] = date('Y-m-d H:i:s');
                
                if ($this->PaymentLog->save($this->request->data)) {
                    
                }
                
                $this->Croogo->redirect(array('action' => 'print_receipt', $this->Payment->id, 0, $this->PaymentLog->id));
                
            } else {
                $this->Session->setFlash(__d('croogo', 'The Member could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->Member->read(null, $id);
        }

        $this->set('lastest_payment_date', $this->Payment->find('all', array(
                    'conditions' => array('member_id' => $id),
                    'fields' => array('DATE(MAX(date_for)) AS lastest_payment_date', '*'),
                    'group by' => 'Payment.member_id',
                    'order' => 'member_id')));

        $this->set('total_received', $this->Payment->find('all', array(
                    'conditions' => array('member_id' => $id),
                    'fields' => array('SUM(amount_received) AS total_received', '*'),
                    'group by' => 'Payment.member_id',
                    'order' => 'member_id')));
        
        $this->set('due_date', $this->Payment->find('all', array(
                    'conditions' => array('member_id' => $id),
                    'fields' => array('DATE(MAX(date_for) + INTERVAL 1 MONTH) AS due_date', '*'),
                    'group by' => 'Payment.member_id',
                    'order' => 'member_id')));

        $sum = $this->Payment->find('all', array(
            'conditions' => array(
                'Payment.member_id' => $id),
            'fields' => array('sum(Payment.amount_received) as total_sum'
            )
                )
        );

        $this->set('total_payments', $sum);

        $this->Spouse->recursive = 0;
        $this->paginate['Spouse']['order'] = 'Spouse.id ASC';
        $this->set('spouses', $this->Spouse->find('all', array(
                    'limit' => 1,
                    'conditions' => array('Spouse.member_id' => $id)
                        )
        ));

        $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';

        $this->Dependant->recursive = 0;
        $this->paginate['Dependant']['order'] = 'Dependant.id ASC';
        $this->set('dependants', $this->Dependant->find('all', array('conditions' => array('Dependant.member_id' => $id)
        )));

        $this->Payment->recursive = 0;
        $this->paginate['Payment']['order'] = 'Payment.date_for ASC';
        $this->set('payments', $this->Payment->find('all', array('conditions' => array('Payment.member_id' => $id)
        )));

        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));
        $this->set('relationships', $this->Member->Relationship->find('list'));
        $this->set('statuses', $this->Member->Status->find('list'));
        $this->set('editFields', $this->Member->editFields());
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
            $this->Session->setFlash(__d('croogo', 'Invalid id for Member'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Member->delete($id)) {
            $this->Session->setFlash(__d('croogo', 'Member deleted'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__d('croogo', 'Member cannot be deleted'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Unlink spouse from member
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

        $this->set('member_firstname', $member_firstname);
        $this->set('member_id', $member_id);

//		if (!empty($this->request->data)) {
//			$this->Spouse->create();
//			if ($this->Spouse->save($this->request->data)) {
//
//				$this->Session->setFlash(__d('croogo', 'The Spouse has been saved'), 'default', array('class' => 'success'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__d('croogo', 'The Spouse could not be saved. Please, try again.'), 'default', array('class' => 'error'));
//			}
//		}
        //if (empty($this->request->data)) {
        //$this->request->data = $this->Member->read(null, $member_id);
        //}
        //$this->set('genders', $this->Member->Gender->find('list'));
        //$this->set('categories', $this->Member->Category->find('list'));
    }

    public function admin_dependant($member_id = null, $member_firstname = null) {

        $this->set('member_firstname', $member_firstname);
        $this->set('member_id', $member_id);

        if (!empty($this->request->data)) {
            $this->Dependant->create();
            if ($this->Dependant->save($this->request->data)) {

                $this->Session->setFlash(__d('croogo', 'The Dependant has been saved'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__d('croogo', 'The Dependant could not be saved. Please, try again.'), 'default', array('class' => 'error'));
            }
        }

        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('relationships', $this->Spouse->Relationship->find('list'));
    }

    function admin_view($id = null) {

        if (empty($this->request->data)) {
            $this->request->data = $this->Member->read(null, $id);

            $this->set('spouses', $this->Spouse->find('all', array(
                        'limit' => 1,
                        'conditions' => array('Spouse.member_id' => $id)
                            )
            ));

            $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';
            $this->set('dependants', $this->Dependant->find('all', array(
                        'conditions' => array('Dependant.member_id' => $id)
                            )
            ));

//			$this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, dateofbirth, CURDATE())';
//			$this->Member->Dependant->recursive = 0;
//			$this->paginate['Dependant']['order'] = 'Dependant.id ASC';
//			$this->set('dependants', $this->Dependant->find('all', 
//				array('conditions' => array('Dependant.member_id' => 1)
//			)));
//			$this->set('dependants', $this->Member->Dependant->find('all', 
//				array(
//					'limit' => 1,
//					'conditions' => array('Dependant.member_id' => $id)
//				)
//			));
        }

        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));
        $this->set('relationships', $this->Member->Relationship->find('list'));

        $this->set('spouse_relationships', $this->Spouse->Relationship->find('list'));
        $this->set('dependant_relationships', $this->Relationship->find('all'));
    }

    function admin_export() {
        $members = $this->Member->find('all');
        $this->set('members', $members);
        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));

        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug', '0');
    }

    public function create_pdf() {
        $members = $this->Member->find('all');
        $this->set(compact('members'));
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
            
            $this->request->data = $this->Member->read(null, $id);

            $this->set('spouses', $this->Spouse->find('all', array(
                        'limit' => 1,
                        'conditions' => array('Spouse.member_id' => $id)
                            )
            ));

            $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';
            $this->set('dependants', $this->Dependant->find('all', array(
                        'conditions' => array('Dependant.member_id' => $id)
                            )
            ));
        }
        
        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));
        $this->set('relationships', $this->Member->Relationship->find('list'));
        
        $this->set('spouse_relationships', $this->Spouse->Relationship->find('list'));
        $this->set('dependant_relationships', $this->Dependant->Relationship->find('list'));
        
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        $this->render();
    }
    
    public function admin_print_receipt($id = null, $redirect = false, $payment_log_id = false) {
        
        if (empty($this->request->data)) {
            if (!$id) {
                $this->Session->setFlash('Sorry, there was no payment selected.');
                $this->redirect(array('action' => 'index'), null, true);
            }
            
            $this->request->data = $this->Payment->read(null, $id);
            $member = $this->Member->findById($this->request->data['Payment']['member_id']);

            $this->set("redirect", $redirect);
            $this->set("member", $member);
            $this->set("payment_log_id", $payment_log_id);
        }
        
    }
    
    public function admin_view_statement_pdf($id = null) {
        
        if (empty($this->request->data)) {
            if (!$id) {
                $this->Session->setFlash('Sorry, there was no PDF selected.');
                $this->redirect(array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'), null, true);
            }
            
            $this->request->data = $this->Member->read(null, $id);

            $this->set('payments', $this->Payment->find('all', array(
                        'conditions' => array('Payment.member_id' => $id)
                )
            ));

            $this->Dependant->virtualFields['age'] = 'TIMESTAMPDIFF(YEAR, Dependant.dateofbirth, CURDATE())';
            $this->set('dependants', $this->Dependant->find('all', array(
                        'conditions' => array('Dependant.member_id' => $id)
                            )
            ));
            
        }
        
        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));
        $this->set('relationships', $this->Member->Relationship->find('list'));
        
        $this->set('spouse_relationships', $this->Spouse->Relationship->find('list'));
        $this->set('dependant_relationships', $this->Dependant->Relationship->find('list'));
        
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        $this->render();
        
    }
}
