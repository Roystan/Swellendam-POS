<?php

App::uses('TitlesAppModel', 'Titles.Model');

/**
 * Spouse
 *
 * @category Model
 * @package  Croogo.Titles.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Title extends TitlesAppModel {

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
	
//    public $belongsTo = array(
//		'Member' => array(
//			'className' => 'Member',
//			'foreignKey' => 'member_id'
//		)
//	);

    /**
 * Validation
 *
 * @var array
 * @access public
 */
	public $validate = array(
		'title' => array(
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
        'title' => array('type' => 'like', 'field' => array('Title.title')),
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
