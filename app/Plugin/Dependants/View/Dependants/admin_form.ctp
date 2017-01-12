<?php

$this->extend('/Common/admin_edit');

$this->Html->addCrumb($this->Html->icon('home'), '/admin');

if ($member_id) {
    $this->Html->addCrumb(__d('croogo', 'Members'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'));
    $this->Html->addCrumb(__d('croogo', $member_firstname . ' ' . $member_lastname), array('plugin' => 'members', 'controller' => 'members', 'action' => 'edit',$member_id));
} else {
    $this->Html->addCrumb(__d('croogo', 'Dependants'), array('plugin' => 'dependants', 'controller' => 'dependants', 'action' => 'index'));
}

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['Dependant']['firstname'] . ' ' . $this->data['Dependant']['lastname'], array(
		'plugin' => 'dependants', 'controller' => 'dependants', 'action' => 'edit',
		$this->data['Dependant']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add Dependant'), array('plugin' => 'dependants', 'controller' => 'dependants', 'action' => 'add',$member_id));
}
?>

<?php echo $this->Form->create('Dependant');?>

<div class="row-fluid">
    <div class="span8">

        <?php
                echo $this->Form->input('id');
                if ($member_id) {
                    echo $this->Form->input('member_id', array(
                            'label' => __d('croogo', 'Linked To'),
                            'default' => $member_id,
                    ));
                } else {
                    echo $this->Form->input('member_id', array(
                            'label' => __d('croogo', 'Linked To'),
                            'empty' => true,
                    ));
                }
//                echo $this->Form->input('title_id', array(
//                        'label' => __d('croogo', 'Title *'),
//                ));
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
                echo $this->Form->input('dateofbirth', array(
                                        'label' => __d('croogo', 'Date Of Birth'),
                                        'minYear' => date('Y') - 120,
                                ));
                echo $this->Form->input('gender_id', array(
                                        'label' => __d('croogo', 'Gender'),
                                ));
                $this->Form->inputDefaults(array(
                        'class' => 'span10',
                        'label' => false,
                ));
                echo $this->Form->input('relationship_id', array(
                        'label' => __d('croogo', 'Relationship'),
                ));
                $this->Form->inputDefaults(array(
                        'class' => 'span10',
                        'label' => false,
                ));
                echo $this->Form->input('telnr', array(
                        'label' => __d('croogo', 'Telephone Nr'),
                ));
                echo $this->Form->input('cellnr', array(
                        'label' => __d('croogo', 'Cellphone Nr'),
                ));
                if ($this->request->params['action'] == 'admin_edit') :
                echo $this->Form->input('status_id', array(
                        'label' => __d('croogo', 'Status'),
                ));
                endif;

        ?>
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
