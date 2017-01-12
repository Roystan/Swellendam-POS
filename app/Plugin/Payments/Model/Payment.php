<?php

App::uses('PaymentsAppModel', 'Payments.Model');

/**
 * Payment
 *
 * @category Model
 * @package  Croogo.Payments.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Payment extends PaymentsAppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Payment';

    /**
     * Order
     *
     * @var string
     * @access public
     */
    public $order = 'Payment.id ASC';

    /**
     * Behaviors used by the Model
     *
     * @var array
     * @access public
     */
//    public $actsAs = array(
//        'Croogo.Cached' => array(
//            'groups' => array(
//                'titles',
//            ),
//        ),
//        'Search.Searchable',
//    );
	
//    public $belongsTo = array(
//		'Member' => array(
//			'className' => 'Member',
//			'foreignKey' => 'member_id'
//		)
//	);

    /**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
//		'title' => array(
//			'notEmpty' => array(
//				'rule' => 'notEmpty',
//				'message' => 'This field cannot be left blank.',
//				'last' => true,
//			),
//		),
		'member_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
		),
	);
    
    /**
     * Filter search fields
     *
     * @var array
     * @access public
     */
    public $filterArgs = array(
        'date_for' => array('type' => 'like', 'field' => array('Payment.date_for')),
    );
    
    /**
 * afterSave
 *
 * @param array $options
 * @return boolean
 */
    
    public function afterSave($options = array()) {
		
            $this->redirect(array('plugin' => 'members', 'controller' => 'members', 'action' => 'print_receipt'));

            return true;
	}

	
    /**
     * Display fields for this model
     *
     * @var array
     */
    protected $_displayFields = array(
        'amount_received',
        'date_for',
    );

    /**
     * Edit fields for this model
     *
     * @var array
     */
    protected $_editFields = array(
        'amount_received',
        'date_for',
    );

}
