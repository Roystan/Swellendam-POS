<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb(__d('croogo', 'Lid Aansoek Vorm'), array('plugin' => 'forms', 'controller' => 'forms', 'action' => 'print_afr_form_view'));

?>

<?php echo $this->Form->create('Member');?>

<div class="row-fluid">
    <div class="span8">

        <?php
            echo $this->Form->input('id');
            
            echo __d('croogo', "<span><strong>Volg stappe om n afdruk van die aansoek vorm te maak:</strong></span> <br /><br />");
            echo __d('croogo', "Stap 1 - Click die 'Afdruk' knoppie om aansoek te download. <br />");
            echo __d('croogo', "Stap 2 - Click dokument onder aan die skerm om aansoek vorm oop te maak. <br />");
            echo __d('croogo', "Stap 3 - Click 'Print' knoppie.");
            
        ?>
        
    </div>

    <div class="span4">
	<?php
        
		echo $this->Html->beginBox(__d('croogo', 'Aansoek Vorm')) .
                        $this->Html->link(__d('croogo', 'Afdruk'),array('controller'=>'forms','action'=>'print_form_afr'), 
                                array('target'=>'_blank', 'button' => 'success')) .
			$this->Html->link(
			__d('croogo', 'Kanseleer'), 
                        array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'),
			array('button' => 'danger')
                ) .
                $this->Html->endBox();
				
		echo $this->Croogo->adminBoxes();
	?>
    </div>
    
</div>

<?php echo $this->Form->end(); ?>

