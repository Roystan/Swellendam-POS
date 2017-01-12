<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb(__d('croogo', 'Dashboard'), array('plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'), array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Print Statement'), array('plugin' => 'payments', 'controller' => 'payments', 'action' => 'edit'));

?>

<?php echo $this->Form->create('Payment');?>


<div class="row-fluid">
    <div class="span8">

        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('member_id', array(
                    'label' => __d('croogo', 'Select Member *'),
                    'empty' => true
            ));
            
            if ($_SESSION['redirect']) {
                echo '<br /><center>'. $this->Html->link(
			__d('croogo', 'Print another statement'), 
                        array('plugin' => 'payments', 'admin' => 'true', 'controller' => 'payments', 'action' => 'edit'),
			array('button' => 'success')).'</center>';

            }
            
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

