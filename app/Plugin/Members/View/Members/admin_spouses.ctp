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

<?php echo $this->Form->create('Spouse');?>

<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Spouse'), '#spouse-main');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">

			<div id="spouse-main" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('firstname', array(
					'label' => __d('croogo', 'Firstname *'),
				));
				echo $this->Form->input('lastname', array(
					'label' => __d('croogo', 'Lastname *'),
				));
                                echo $this->Form->input('address', array(
					'label' => __d('croogo', 'Address'),
				));
                                echo $this->Form->input('idnumber', array(
					'label' => __d('croogo', 'Idnumber *'),
				));
                                //echo $this->Form->input('gender_id', array(
					//'label' => __d('croogo', 'Gender'),
				//));
                  //              $this->Form->inputDefaults(array(
					//'class' => 'span10',
					//'label' => false,
				//));
				echo $this->Form->input('Status', array(
					'label' => __d('croogo', 'Status'),
				));
                                
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>
	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Saving')) .
			$this->Form->button(__d('croogo', 'Save Spouse'), array('button' => 'success')) .
			$this->Html->link(
			__d('croogo', 'Cancel'), 
                        array('action' => 'edit', $member_id),
			array('button' => 'danger')
                ) .
                $this->Html->endBox();

		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
