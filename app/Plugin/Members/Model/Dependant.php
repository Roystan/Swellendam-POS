<?php

App::uses('MembersAppModel', 'Members.Model');

/**
 * Member
 *
 * @category Model
 * @package  Croogo.Dependants.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Dependant extends MembersAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'Dependant';

/**
 * Order
 *
 * @var string
 * @access public
 */
	public $order = 'Dependant.firstname ASC';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'dependants',
			),
		),
		'Search.Searchable',
	);
        
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
                'Dependant.Gender', 
                'Dependant.Status', 
                'Dependant.Relationship', 
	);

/**
 * Filter search fields
 *
 * @var array
 * @access public
 */
	public $filterArgs = array(
		'firstname' => array('type' => 'like', 'field' => array('Dependant.firstname')),
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
