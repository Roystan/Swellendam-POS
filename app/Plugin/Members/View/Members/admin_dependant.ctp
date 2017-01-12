<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Member'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'));

$this->Html->addCrumb($member_firstname, array(
        'plugin' => 'members', 'controller' => 'members', 'action' => 'edit',
        $member_id
));

?>

<?php echo $this->Form->create('Dependant');?>

<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Dependant'), '#dependant-main');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">

			<div id="dependant-main" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('dp_firstname', array(
					'label' => __d('croogo', 'Firstname *'),
				));
				echo $this->Form->input('dp_lastname', array(
					'label' => __d('croogo', 'Lastname *'),
				));
                echo $this->Form->input('dp_address', array(
					'label' => __d('croogo', 'Address'),
				));
				echo $this->Form->input('dp_idnumber', array(
					'label' => __d('croogo', 'Idnumber *'),
				));
				echo $this->Form->input('dp_telnr', array(
					'label' => __d('croogo', 'Tel nr'),
				));
				echo $this->Form->input('dp_cellnr', array(
					'label' => __d('croogo', 'Cell nr'),
				));
				echo $this->Form->input('relationship_id', array(
					'label' => __d('croogo', 'Relationship'),
				));
                                
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>
	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Saving')) .
			$this->Form->button(__d('croogo', 'Save Dependant'), array('button' => 'success')) .
			$this->Html->link(
			__d('croogo', 'Cancel'), 
            array( 'controller' => 'members', 'action' => 'edit', $member_id),
			array('button' => 'danger')
                ) .
		$this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
