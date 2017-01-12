<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Titles'), array('plugin' => 'titles', 'controller' => 'titles', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['Title']['title'] . ' ' . $this->data['Title']['title'], array(
		'plugin' => 'titles', 'controller' => 'titles', 'action' => 'edit',
		$this->data['Title']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), array('plugin' => 'titles', 'controller' => 'titles', 'action' => 'add'));
}
?>

<?php echo $this->Form->create('Title');?>

<div class="row-fluid">
    <div class="span8">

        <ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Profile'), '#title-main');
			echo $this->Croogo->adminTabs();
		?>
        </ul>

        <div class="tab-content">

            <div id="title-main" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title', array(
					'label' => __d('croogo', 'Title *'),
				));
				
			?>
            </div>

			<?php echo $this->Croogo->adminTabs(); ?>
        </div>
    </div>

    <div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Saving')) .
			$this->Form->button(__d('croogo', 'Save'), array('button' => 'success')) .
			$this->Html->link(
			__d('croogo', 'Cancel'), 
                        array('action' => 'index'),
			array('button' => 'danger')
                ) .
                $this->Html->endBox();
				
		echo $this->Croogo->adminBoxes();
	?>
    </div>

</div>
<?php echo $this->Form->end(); ?>
