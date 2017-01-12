<?php

App::uses('MembersAppModel', 'Titles.Model');

/**
 * Member
 *
 * @category Model
 * @package  Croogo.Genders.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Title extends MembersAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'Title';

/**
 * Order		
 *
 * @var string
 * @access public
 */
	public $order = 'Title.id ASC';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'titles',
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
		'name' => array('type' => 'like', 'field' => array('Title.title')),
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
