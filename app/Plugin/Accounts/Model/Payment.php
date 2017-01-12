<?php

App::uses('AccountsAppModel', 'Accounts.Model');

/**
 * Payment
 *
 * @category Model
 * @package  Croogo.Accounts.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Payment extends AccountsAppModel {

/**
 * Model name
 *
 * @var string
 * @access public
 */
	public $name = 'Payment';

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
 * Model associations: belongsTo
 *
 * @var array
 * @access public
 */
	public $belongsTo = array('Accounts.Payment');

/**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
		'amount_received' => array(
			'minLength' => array(
				'rule' => array('minLength', 1),
				'message' => 'Please enter payment amount.',
			),
		),
	);

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'id',
		'amount_received',
		'date_for',
		'date_created',
	);
}
