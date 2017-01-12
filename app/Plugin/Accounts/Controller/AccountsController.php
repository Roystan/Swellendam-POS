<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('AccountsAppController', 'Accounts.Controller');

/**
 * Accounts Controller
 *
 * @category Controller
 * @package  Croogo.Accounts.Controller
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AccountsController extends AccountsAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Accounts';

/**
 * Components
 *
 * @var array
 * @access public
 */
	public $components = array(
		'Croogo.Akismet',
		'Croogo.Recaptcha',
		'Search.Prg' => array(
			'presetForm' => array(
				'paramType' => 'querystring',
			),
			'commonProcess' => array(
				'paramType' => 'querystring',
				'filterEmpty' => true,
			),
		),
	);

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Accounts.Account');

/**
 * Admin index
 *
 * @return void
 * @access public
 */
	public function admin_index() {
		$this->set('title_for_layout', __d('croogo', 'Accounts'));
		$this->Prg->commonProcess();
		$searchFields = array('account_number', 'policy_number');

		$this->Account->recursive = 0;
		//$criteria = $this->Account->parseCriteria($this->Prg->parsedParams());

		$this->paginate['Account']['order'] = 'Account.firstname ASC';
		//$this->paginate['conditions'] = $criteria;

		$this->set('accounts', $this->paginate());
		$this->set('displayFields', $this->Account->displayFields());
$this->set('searchFields', $searchFields);

	}

/**
 * Admin add
 *
 * @return void
 * @access public
 */
	public function admin_add() {
		$this->set('title_for_layout', __d('croogo', 'Add Account'));

		if (!empty($this->request->data)) {
			$this->Account->create();
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The Account has been saved'), 'default', array('class' => 'success'));
				$this->Croogo->redirect(array('action' => 'edit', $this->Account->id));
			} else {
				$this->Session->setFlash(__d('croogo', 'The Account could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * Admin edit
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', __d('croogo', 'Edit Account'));

		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__d('croogo', 'Invalid Account'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The Account has been saved'), 'default', array('class' => 'success'));
				$this->Croogo->redirect(array('action' => 'edit', $this->Account->id));
			} else {
				$this->Session->setFlash(__d('croogo', 'The Account could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Account->read(null, $id);
		}
	}

/**
 * Admin delete
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__d('croogo', 'Invalid id for Account'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Account->delete($id)) {
			$this->Session->setFlash(__d('croogo', 'Account deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
	}

/**
 * View
 *
 * @param string $alias
 * @return void
 * @access public
 */
	public function view($alias = null) {
		if (!$alias) {
			$this->redirect('/');
		}

		$account = $this->Account->find('first', array(
			'conditions' => array(
				'Account.alias' => $alias,
				'Account.status' => 1,
			),
			'cache' => array(
				'name' => $alias,
				'config' => 'accounts_view',
			),
		));
		if (!isset($account['Account']['id'])) {
			$this->redirect('/');
		}
		$this->set('account', $account);

		$this->set('title_for_layout', $account['Account']['firstname']);
		$this->set(compact('continue'));
	}

/**
 * Validation
 *
 * @param boolean $continue
 * @param array $contact
 * @return boolean
 * @access protected
 */
/*	protected function _validation($continue, $contact) {
		if ($this->Contact->Message->set($this->request->data) &&
			$this->Contact->Message->validates() &&
			$continue === true) {
			if ($contact['Contact']['message_archive'] &&
				!$this->Contact->Message->save($this->request->data['Message'])) {
				$continue = false;
			}
		} else {
			$continue = false;
		}

		return $continue;
	}
*/

}
