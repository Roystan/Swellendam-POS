<?php

$this->extend('/Common/admin_index');
$this->Html
	->addCrumb(__d('croogo', ''), array('plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'), array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Spouses'), '/' . $this->request->url)
	->addCrumb(__d('croogo', 'Export CSV'),array('controller'=>'spouses','action'=>'export'), array('target'=>'_blank'));
	
?>
<?php $this->start('actions'); ?>
<?php
	echo $this->Croogo->adminAction(
		__d('croogo', 'New Spouse'),
		array('action' => 'add'),
		array('button' => 'success')
	);
?>
<?php $this->end(); ?>

<div class="row-fluid">
	<div class="span12">
		<table class="table table-striped">
			<?php
			$tableHeaders = $this->Html->tableHeaders(array(
                $this->Paginator->sort('lastname', __d('croogo', 'Lastname')),
				$this->Paginator->sort('firstname', __d('croogo', 'Firstname')),
				$this->Paginator->sort('idnumber', __d('croogo', 'Id Number')),
				$this->Paginator->sort('linked_to', __d('croogo', 'Linked To')),
				$this->Paginator->sort('age', __d('croogo', 'Age')),
                                $this->Paginator->sort('age', __d('croogo', 'Cover Status')),
					__d('croogo', 'Actions'),
				''
			));
			?>
			<thead>
				<?php echo $tableHeaders; ?>
			</thead>
			
			<tbody>
				<?php foreach ($spouses as $spouse): ?>
				<tr>
                    <td>
						<?php echo $spouse['Spouse']['lastname']; ?>
					</td>
					<td>
						<?php echo $spouse['Spouse']['firstname']; ?>
					</td>
					<td>
						<?php echo $spouse['Spouse']['idnumber']; ?>
					</td>
					<td>
						<?php echo $spouse['Spouse']['linked_to']; ?>
					</td>
					<td>
						<?php echo $spouse['Spouse']['age']; ?>
					</td>
					<td>
						<?php 
                                                    $is_covered = true;
                                                ?>
                                                <span class="label label- <?php echo $is_covered ? 'label-info' : 'label-important' ?>"><?php echo __d('croogo', $is_covered ? 'covered' : 'not covered'); ?></span>

					</td>
					<td>
						<div class="item-actions">
						<?php
							echo $this->Croogo->adminRowActions($spouse['Spouse']['id']);
							echo ' ' . $this->Croogo->adminRowAction('',
								array('action' => 'edit', $spouse['Spouse']['id']),
								array('icon' => 'pencil', 'tooltip' => __d('croogo', 'Edit this spouse'))
							);
							echo ' ' . $this->Croogo->adminRowAction('',
								array('action' => 'delete', $spouse['Spouse']['id']),
								array('icon' => 'trash', 'tooltip' => __d('croogo', 'Delete this spouse')),
									__d('croogo', 'Are you sure you want to delete this spouse?')
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

