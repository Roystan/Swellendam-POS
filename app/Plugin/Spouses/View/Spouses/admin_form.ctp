<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Spouses'), array('plugin' => 'spouses', 'controller' => 'spouses', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['Spouse']['firstname'] . ' ' . $this->data['Spouse']['lastname'], array(
		'plugin' => 'spouses', 'controller' => 'spouses', 'action' => 'edit',
		$this->data['Spouse']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), array('plugin' => 'spouses', 'controller' => 'spouses', 'action' => 'add'));
}
?>

<?php echo $this->Form->create('Spouse');?>

<div class="row-fluid">
    <div class="span8">

        <?php
                echo $this->Form->input('id');
                if ($this->request->params['action'] == 'admin_add') {
                    echo $this->Form->input('member_id', array(
                            'label' => __d('croogo', 'Linked To'),
                            'empty' => true,
                    ));
                }
                
                if ($this->request->params['action'] == 'admin_edit') {
                    if ($_member_id) {
                        echo $this->Form->input('member_id', array(
                                'label' => __d('croogo', 'Linked To'),
                                'default' => $_member_id,
                        ));
                    } else {
                        echo $this->Form->input('member_id', array(
                                'label' => __d('croogo', 'Linked To'),
                        ));
                    }
                }
                echo $this->Form->input('title_id', array(
                        'label' => __d('croogo', 'Title *'),
                ));
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
