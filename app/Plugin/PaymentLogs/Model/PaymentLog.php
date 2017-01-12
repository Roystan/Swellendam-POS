<?php

App::uses('PaymentLogsAppModel', 'PaymentLogs.Model');

/**
 * Spouse
 *
 * @category Model
 * @package  Croogo.PaymentLogs.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class PaymentLog extends PaymentLogsAppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'PaymentLog';

    /**
     * Order
     *
     * @var string
     * @access public
     */
    public $order = 'PaymentLog.id ASC';

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
	
//    public $belongsTo = array(
//		'Member' => array(
//			'className' => 'Member',
//			'foreignKey' => 'member_id'
//		)
//	);

    
    /**
     * Display fields for this model
     *
     * @var array
     */
    protected $_displayFields = array(
        'payment_id',
    );

    /**
     * Edit fields for this model
     *
     * @var array
     */
    protected $_editFields = array(
        'payment_id',
    );

}
