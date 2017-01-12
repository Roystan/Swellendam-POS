<?php
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb(__d('croogo', ''), array('plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'), array('icon' => 'home'))
	->addCrumb(__d('croogo', 'SeniorCitizens'), '/' . $this->request->url)
	->addCrumb(__d('croogo', 'Export CSV'),array('controller'=>'senior_citizens','action'=>'export'), array('target'=>'_blank'));

?>
<?php $this->start('actions'); ?>
<?php
	echo $this->Croogo->adminAction(
		__d('croogo', 'New Senior Citizen'),
		array('action' => 'add'),
		array('button' => 'success')
	);
?>
<?php $this->end(); ?>

<div class="row-fluid">
	<div class="span12">
		<table class="table table-bordered">
		<?php
			$tableHeaders = $this->Html->tableHeaders(array(
				$this->Paginator->sort('policyno', __d('croogo', 'Policy No')),
				$this->Paginator->sort('firstname', __d('croogo', 'Firstname')),
				$this->Paginator->sort('lastname', __d('croogo', 'Lastname')),
				$this->Paginator->sort('idnumber', __d('croogo', 'Id Number')),
					__d('croogo', 'Actions'),
				''
			));
		?>
			<thead>
				<?php echo $tableHeaders; ?>
			</thead>

			<tbody>
			<?php foreach ($senior_citizens as $senior_citizen): ?>
				<tr>
					<td>
						<?php echo $senior_citizen['SeniorCitizen']['policyno']; ?>
					</td>
					<td>
						<span>
						<?php
							echo $this->Html->link($senior_citizen['SeniorCitizen']['firstname'], array(
								'admin' => true,
								'controller' => 'senior_citizens',
								'action' => 'edit',
								$senior_citizen['SeniorCitizen']['id']
							));
						?>
						</span>
					</td>
					<td>
						<?php echo $senior_citizen['SeniorCitizen']['lastname']; ?>
					</td>
                                        <td>
						<?php echo $senior_citizen['SeniorCitizen']['idnumber']; ?>
					</td>
					<td>
						<div class="item-actions">
						<?php
							echo $this->Croogo->adminRowActions($senior_citizen['SeniorCitizen']['id']);
                                                        echo ' ' . $this->Croogo->adminRowAction('',
								array('action' => 'view', $senior_citizen['SeniorCitizen']['id']),
								array('icon' => 'zoom-in', 'tooltip' => __d('croogo', 'View Senior Citizen details'))
							);
							echo ' ' . $this->Croogo->adminRowAction('',
								array('action' => 'edit', $senior_citizen['SeniorCitizen']['id']),
								array('icon' => 'pencil', 'tooltip' => __d('croogo', 'Edit this Senior Citizen'))
							);
							echo ' ' . $this->Croogo->adminRowAction('',
								array('action' => 'capture_payment', $senior_citizen['SeniorCitizen']['id']),
								array('icon' => 'credit-card', 'tooltip' => __d('croogo', 'Capture Payment'))
							);
							echo ' ' . $this->Croogo->adminRowAction('',
								array('action' => 'delete', $senior_citizen['SeniorCitizen']['id']),
								array('icon' => 'trash', 'tooltip' => __d('croogo', 'Delete this Senior Citizen')),
									__d('croogo', 'Are you sure you want to delete this senior citizen?')
							);
						?>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>

		</table>

	</div>
</div>
<?php echo $this->Form->end(); ?>

