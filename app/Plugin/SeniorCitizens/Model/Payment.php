<?php

App::uses('SeniorCitizensAppModel', 'Payments.Model');

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
class Payment extends SeniorCitizensAppModel {

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

	
	public $belongsTo = array('SeniorCitizen');

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
		
//		$this->SeniorCitizen->read(null, $this->data['Payment']['senior_citizen_id']);
		
//		if($this->data['Payment']['date_for'] >= date('Y-m-d')){
//			
//			$this->SeniorCitizen->set(array(
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
//                
//                $this->data['Payment']['date_created'] = date('Y-m-d');
//		
//		$this->SeniorCitizen->save();

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
