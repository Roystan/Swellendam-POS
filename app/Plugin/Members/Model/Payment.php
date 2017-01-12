<?php

App::uses('MembersAppModel', 'Payments.Model');

/**
 * Member
 *
 * @category Model
 * @package  Croogo.Payments.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Payment extends MembersAppModel {

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

	
	public $belongsTo = array('Member');

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'payments',
			),
		),
		'Search.Searchable',
	);
        
        /**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
		'amount_received' => array(
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
		'name' => array('type' => 'like', 'field' => array('Payment.amount_received')),
	);

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
 * beforeSave
 *
 * @param array $options
 * @return boolean
 */
	public function beforeSave($options = array()) {
		
		$this->Member->read(null, $this->data['Payment']['member_id']);
		
//		if($this->data['Payment']['date_for'] >= date('Y-m-01')){
//			
//			$this->Member->set(array(
//				  'in_arrears' => 0,
//			));
//			
//		} else {
//			
//			$diff = abs(strtotime(date('Y-m-d')) - strtotime($this->data['Payment']['date_for']));
//			
//			$years = floor($diff / (365*60*60*24));
//			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
//			
//			$this->Member->set(array(
//				  'in_arrears' => $months,
//			));
//		}
                
                $this->data['Payment']['date_created'] = date('Y-m-d');
		
		$this->Member->save();

		return true;
	}

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
