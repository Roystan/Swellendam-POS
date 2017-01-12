<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Print Statement'), array('plugin' => 'paymentlogs', 'controller' => 'paymentlogs', 'action' => 'edit'));

?>

<?php echo $this->Form->create('PaymentLog');?>


<div class="row-fluid">
    <div class="span8">

        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('member_id', array(
                    'label' => __d('croogo', 'Select Member *'),
                    'empty' => true
            ));

        ?>
    </div>

    <div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Statement')) .
                        $this->Form->button(__d('croogo', 'Print'), array('button' => 'success')) .
			$this->Html->link(
			__d('croogo', 'Cancel'), 
                        array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'),
			array('button' => 'danger')
                ) .
                $this->Html->endBox();
				
		echo $this->Croogo->adminBoxes();
	?>
    </div>
   
    
</div>

<?php echo $this->Form->end(); ?>

