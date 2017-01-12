<?php

App::uses('SeniorCitizensAppModel', 'SeniorCitizens.Model');

/**
 * User
 *
 * @category Model
 * @package  Croogo.SeniorCitizens.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class SeniorCitizen extends SeniorCitizensAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'SeniorCitizen';

/**
 * Order
 *
 * @var string
 * @access public
 */
	public $order = 'SeniorCitizen.lastname ASC';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'senior_citizens',
			),
		),
		'Search.Searchable',
	);
        
        public $belongsTo = array('SeniorCitizens.Gender', 'SeniorCitizens.Title', 'SeniorCitizens.Status', 'SeniorCitizens.Payment');

/**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
		'policyno' => array(
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The policy number is already in use.',
				'last' => true,
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
		),
                'firstname' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
		),
                'lastname' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
		),
                'idnumber' => array(
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
		'policyno' => array('type' => 'like', 'field' => array('SeniorCitizen.policyno')),
		'firstname' => array('type' => 'like', 'field' => array('SeniorCitizen.firstname')),
		'lastname' => array('type' => 'like', 'field' => array('SeniorCitizen.lastname')),
		'status_id' => array('type' => 'value'),
	);
	
	/**
 * Model associations: hasMany
 *
 * @var array
 * @access public
 */
public $hasMany = array(
		'Payment' => array(
			'className' => 'SeniorCitizens.payment',
			'foreignKey' => 'member_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		),

	);
	
	/**
 * beforeSave
 *
 * @param array $options
 * @return boolean
 */
	public function beforeSave($options = array()) {
		
            // sets entry date six months in advance when member first created
		if (empty($this->data['SeniorCitizen']['created'])): 
			$this->data['SeniorCitizen']['created'] = date('Y-m-d');
			$this->data['SeniorCitizen']['entrydate'] = date ( 'Y-m-d' , strtotime( '+6 month' , strtotime ( date("Y-m-d") ) ));
		endif;
		
		$this->data['SeniorCitizen']['updated'] = date('Y-m-d');
		
		return true;
	}

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'policyno',
		'firstname',
		'lastname',
		'idnumber',
		'premium',
                'status_id' => array('type' => 'boolean'),
	);
/**
 * Edit fields for this model
 *
 * @var array
 */
	protected $_editFields = array(
		'firstname',
		'lastname',
		'idnumber',
		'policyno',
		'entrydate',
	);

}
