<?php

//App::uses('CakeEmail', 'Network/Email');
App::uses('ReportsAppController', 'Reports.Controller');

/**
 * Reports Controller
 *
 * @category Controller
 * @package  Croogo.Reports.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class ReportsController extends ReportsAppController {

    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array(
        'Search.Prg' => array(
            'presetForm' => array(
                'paramType' => 'querystring',
            ),
            'commonProcess' => array(
                'paramType' => 'querystring',
                'filterEmpty' => true,
            ),
//            array('Security'),
        ),
    );
    
    public function beforeFilter() {
        $this->Security->unlockedActions = array('admin_edit', 'admin_add', 'admin_delete', 'admin_index', 'admin_capture_payment', 'edit', 'delete', 'index');
        parent::beforeFilter();
    }

    /**
     * Helpers
     *
     * @var array
     * @access public
     */
    var $helpers = array('Html', 'Form', 'Csv');

    /**
     * Preset Variables Search
     *
     * @var array
     * @access public
     */
    public $presetVars = true;

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Reports.Report', 'Spouses.Spouse', 'Members.Member');

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */

    public function admin_export_csv_view() {
        if ($this->request->data) {
            $this->Croogo->redirect(array('plugin' => 'members', 'controller' => 'members', 'action' => 'print_form', $this->request->data['Form']['language']));
        }
        
    }
    
    function admin_export() {
        $members = $this->Member->find('all');
        $this->set('members', $members);
        $this->set('genders', $this->Member->Gender->find('list'));
        $this->set('categories', $this->Member->Category->find('list'));

        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug', '0');
    }

}
