<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'SeniorCitizens'), array('plugin' => 'senior_citizens', 'controller' => 'senior_citizens', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->data['SeniorCitizen']['firstname'] . ' ' . $this->data['SeniorCitizen']['lastname'], array(
		'plugin' => 'senior_citizens', 'controller' => 'senior_citizens', 'action' => 'edit',
		$this->data['SeniorCitizen']['id']
	));
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), array('plugin' => 'senior_citizens', 'controller' => 'senior_citizens', 'action' => 'add'));
}
?>

<?php $dependant_not_covered = false; ?>

<?php echo $this->Form->create('SeniorCitizen');?>

<div class="row-fluid">
    <div class="span8">

        <ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Profile'), '#senior_citizen-main');
			if ($this->request->params['action'] == 'admin_edit'):
				echo $this->Croogo->adminTab(__d('croogo', 'Payment History'), '#payment-view');
			endif;
			echo $this->Croogo->adminTabs();
		?>
        </ul>

        <div class="tab-content">

            <div id="senior_citizen-main" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('policyno', array(
					'label' => __d('croogo', 'Policyno *'),
				));
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
				echo $this->Form->input('telnr', array(
					'label' => __d('croogo', 'Telephone Nr'),
				));
				echo $this->Form->input('cellnr', array(
					'label' => __d('croogo', 'Cellphone Nr'),
				));
				if ($this->request->params['action'] == 'admin_edit'):
                                echo $this->Form->input('status_id', array(
					'label' => __d('croogo', 'Status'),
				));
				endif;
				
			?>
            </div>
            <div id="payment-view" class="tab-pane">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <table class="table table-striped">
								<?php

									$tableHeaders = $this->Html->tableHeaders(array(
										__d('croogo', 'Amount'),
										__d('croogo', 'Date For'),
										__d('croogo', 'Date Of Payment'),
									));
								?>
                                <thead>
									<?php echo $tableHeaders; ?>
                                </thead>
								<?php
								$rows = array();
                                if($payments) {                                
									foreach ($payments as $payment):
										$actions = array();

										$rows[] = array(
											'R'.$payment['Payment']['amount_received'],
											$payment['Payment']['date_for'],
											$payment['Payment']['date_created'],
										);
									endforeach;
								} else {
									
								}

								echo $this->Html->tableCells($rows);
								?>
                            </table>

                        </div>
                    </div>
                </div>

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
				
			if ($this->request->params['action'] == 'admin_edit'):
				echo $this->Html->beginBox(__d('croogo', 'Entry Date')) .
					$this->Form->input('entrydate', array('Entry Date' => __d('croogo', 'Entry Date'))) .
					$this->Html->endBox();
			endif;	

		echo $this->Croogo->adminBoxes();
	?>
    </div>

</div>
<?php echo $this->Form->end(); ?>
