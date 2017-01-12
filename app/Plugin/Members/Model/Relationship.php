<?php

App::uses('MembersAppModel', 'Relationships.Model');

/**
 * Member
 *
 * @category Model
 * @package  Croogo.Categories.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Relationship extends MembersAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'Relationship';

/**
 * Order
 *
 * @var string
 * @access public
 */
	public $order = 'Relationship.id ASC';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'relationships',
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
		'title' => array('type' => 'like', 'field' => array('Relationship.title')),
	);

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'title',
	);

/**
 * Edit fields for this model
 *
 * @var array
 */
	protected $_editFields = array(
		'title',
	);

}