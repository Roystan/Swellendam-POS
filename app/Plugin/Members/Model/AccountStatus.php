<?php

App::uses('MembersAppModel', 'AccountStatuses.Model');

/**
 * AccountStatus
 *
 * @category Model
 * @package  Croogo.AccountStatuses.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AccountStatus extends MembersAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'AccountStatus';

/**
 * Order
 *
 * @var string
 * @access public
 */
	public $order = 'AccountStatus.id ASC';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'account_statuses',
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
		'title' => array('type' => 'like', 'field' => array('AccountStatus.title')),
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
