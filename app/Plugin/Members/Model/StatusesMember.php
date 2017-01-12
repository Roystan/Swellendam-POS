<?php

App::uses('MembersAppModel', 'Members.Model');

/**
 * StatesesUser
 *
 *
 * @category Model
 * @package  Croogo.Stateses.Model
 * @version  1.0
 * @author   Roystan Smith <roystansmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class StatesMember extends MembersAppModel {

	public $belongsTo = array(
		'Member' => array(
			'className' => 'Members.Member',
		),
		'Status' => array(
			'className' => 'Members.Status',
		),
	);

/**
 * Get Ids of Role's Aro assigned to user
 *
 * @param $userId integer user id
 * @return array array of Role Aro Ids
 */
	public function getRolesAro($memberId) {
		$statusesMembers = $this->find('all', array(
			'fields' => 'status_id',
			'conditions' => array(
				'StatusesMember.member_id' => $memberId,
			),
			'cache' => array(
				'name' => 'member_statuses_' . $memberId,
			),
		));
		$aroIds = array();
		foreach ($statusesMembers as $statusesMember) {
			try {
				$aro = $this->Status->Aro->node(array(
					'model' => 'Status',
					'foreign_key' => $statusesMember['StatusesMember']['status_id'],
				));
				$aroIds[] = $aro[0]['Aro']['id'];
			} catch (CakeException $e) {
				continue;
			}
		}
		return $aroIds;
	}
}
