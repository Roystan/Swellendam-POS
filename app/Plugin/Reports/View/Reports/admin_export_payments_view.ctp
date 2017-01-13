<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb(__d('croogo', 'Payments'), array('plugin' => 'reports', 'controller' => 'reports', 'action' => 'export_csv_view'));

?>

<?php echo $this->Form->create('Report');?>

<div class="row-fluid">
    <div class="span8">

        <?php
            echo $this->Form->input('id');
            
            echo __d('croogo', "<span>To export specific payment data select date range when payments was captured.</span> <br /><br />");

            echo $this->Form->input('from', array(
                'label' => __d('croogo', 'From'),
                'default' => date('Y-m-01'),
                ));
            
            echo $this->Form->input('to', array(
                'label' => __d('croogo', 'To'),
                'default' => date('Y-m-t'),
                'minYear' => date('Y') - 120,
                    ));
            
        ?>
        
    </div>

    <div class="span4">
	<?php
        
		echo $this->Html->beginBox(__d('croogo', 'Export CSV')) .
                        $this->Html->link(__d('croogo', 'Generate'),array('controller'=>'reports','action'=>'export'), 
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

