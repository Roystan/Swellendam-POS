<?php

App::uses('MembersAppModel', 'Members.Model');

/**
 * Member
 *
 * @category Model
 * @package  Croogo.Spouses.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Spouse extends MembersAppModel {

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
	public $order = 'Spouse.firstname ASC';

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
        
//        public $belongsTo = array('Spouses.Member');
	
	/**
 * Model associations: belongsTo
 *
 * @var array
 * @access public
 */
 
	public $belongsTo = array(
		'Member' => array(
			'className' => 'Members.Member',
		),
		'Members.Relationship',
                'Spouses.Gender', 
                'Spouses.Status', 
                'Spouses.Relationship', 
	);
        
        public function beforeFilter() {
            $this->Security->unlockedActions = array('admin_edit', 'admin_add', 'add', 'edit');
            parent::beforeFilter();
        
        }

/**
 * Filter search fields
 *
 * @var array
 * @access public
 */
	public $filterArgs = array(
		'firstname' => array('type' => 'like', 'field' => array('Spouse.firstname')),
	);

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'firstname',
		'lastname',
		'idnumber',
		'Relationship.title' => 'Relationship',
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
