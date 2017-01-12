<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb(__d('croogo', 'Member Application Form'), array('plugin' => 'forms', 'controller' => 'forms', 'action' => 'print_eng_form_view'));

?>

<?php echo $this->Form->create('Member');?>

<div class="row-fluid">
    <div class="span8">

        <?php
            echo $this->Form->input('id');
            
            echo __d('croogo', "<span><strong>Follow steps to print the application form:</strong></span> <br /><br />");
            echo __d('croogo', "Step 1 - Click 'Print' button to download application form. <br />");
            echo __d('croogo', "Step 2 - Click document at the bottom of the page to view application form. <br />");
            echo __d('croogo', "Step 3 - Click 'Print' button. <br />");

            
        ?>
        
    </div>

    <div class="span4">
	<?php
        
		echo $this->Html->beginBox(__d('croogo', 'Application Form')) .
                        $this->Html->link(__d('croogo', 'Print'),array('controller'=>'forms','action'=>'print_form_eng'), 
                                array('target'=>'_blank', 'button' => 'success')) .
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

