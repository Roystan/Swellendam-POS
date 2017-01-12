<?php

App::uses('MembersAppModel', 'Members.Model');

/**
 * User
 *
 * @category Model
 * @package  Croogo.Members.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Member extends MembersAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'Member';

/**
 * Order
 *
 * @var string
 * @access public
 */
	public $order = 'Member.lastname ASC';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'members',
			),
		),
		'Search.Searchable',
	);
        
        public $belongsTo = array('Members.Gender', 'Members.Category', 'Members.Title', 'Members.Spouse', 'Members.Dependant', 'Members.Status', 'Members.Relationship', 'Members.Payment');

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
		'policyno' => array('type' => 'like', 'field' => array('Member.policyno')),
		'firstname' => array('type' => 'like', 'field' => array('Member.firstname')),
		'lastname' => array('type' => 'like', 'field' => array('Member.lastname')),
	);
	
	/**
 * Model associations: hasMany
 *
 * @var array
 * @access public
 */
public $hasMany = array(
		'Spouse' => array(
			'className' => 'Members.Spouse',
			'foreignKey' => 'member_id',
			'spouse' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '3',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		),
		'Dependant' => array(
			'className' => 'Members.Dependant',
			'foreignKey' => 'member_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '50',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		),
		'Payment' => array(
			'className' => 'Members.payment',
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

 public function beforeFilter() {
        $this->Security->unlockedActions = array('edit');
        parent::beforeFilter();
 }
	
	/**
 * beforeSave
 *
 * @param array $options
 * @return boolean
 */
	public function beforeSave($options = array()) {
		
            // sets entry date six months in advance when member first created
//            if (empty($this->data['Member']['created'])): 
//                    $this->data['Member']['created'] = date('Y-m-d');
//                    $this->data['Member']['entrydate'] = date( 'Y-m-d' , strtotime( '+6 month' , strtotime ( date("Y-m-d") ) ));
//            endif;
//
//            $this->data['Member']['updated'] = date('Y-m-d');

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
		'Category.title' => 'Category',
                'status_id' => array('type' => 'boolean'),
                'AccountStatus.title' => 'AccountStatus',
	);
	
	public $virtualFields = array(
		'linked_to' => 'CONCAT(Member.firstname, " ", Member.lastname)',
		'full_name' => 'CONCAT(Member.firstname, " ", Member.lastname)'
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
		'status' => array('type' => 'boolean'),
		'entrydate',
	);

}
