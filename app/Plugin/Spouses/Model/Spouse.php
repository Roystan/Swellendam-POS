<?php

App::uses('SpousesAppModel', 'Spouses.Model', 'Titles.Model', 'Members.Model');

/**
 * Spouse
 *
 * @category Model
 * @package  Croogo.Spouses.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Spouse extends SpousesAppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Spouse';

    /**
     * Order
     *
     * @var string
     * @access public
     */
    public $order = 'Spouse.lastname ASC';

    /**
     * Behaviors used by the Model
     *
     * @var array
     * @access public
     */
    public $actsAs = array(
        'Croogo.Cached' => array(
            'groups' => array(
                'spouses',
            ),
        ),
        'Search.Searchable',
    );
    public $belongsTo = array(
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id'
		), 
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id'
		), 
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id'
		), 
		'Relationship' => array(
			'className' => 'Relationship',
			'foreignKey' => 'relationship_id'
		), 
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_id'
		)
	);

    /**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
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
        'firstname' => array('type' => 'like', 'field' => array('Spouse.firstname')),
        'lastname' => array('type' => 'like', 'field' => array('Spouse.lastname')),
    );
	
//	public $virtualFields = array(
//		'linked_to' => 'CONCAT(Member.firstname, " ", Member.lastname)',
//		'full_name' => 'CONCAT(Member.firstname, " ", Member.lastname)'
//	);

    /**
     * Display fields for this model
     *
     * @var array
     */
    protected $_displayFields = array(
        'firstname',
        'lastname',
        'idnumber',
        'linked_to',
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
    );

}
