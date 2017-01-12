<?php

App::uses('AccountsAppModel', 'Accounts.Model');

/**
 * Account
 *
 * @category Model
 * @package  Croogo.Accounts.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Account extends AccountsAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'Account';

/**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Croogo.Cached' => array(
			'groups' => array(
				'accounts',
			),
		),

	);

/**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
		'alias' => array(
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'This alias has already been taken.',
			),
			'minLength' => array(
				'rule' => array('minLength', 1),
				'message' => 'Alias cannot be empty.',
			),
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Please provide a valid email address.',
		),
	);

/**
 * Filter search fields
 *
 * @var array
 * @access public
 */
	public $filterArgs = array(
		'account_number' => array('type' => 'like', 'field' => array('Account.account_number', 'Account.account_number')),
		'account_number' => array('type' => 'value'),
	);



/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'id',
		'idnumber',
		'firstname',
		'lastname',
		'account_number',
		'policy_number',
	);
}
