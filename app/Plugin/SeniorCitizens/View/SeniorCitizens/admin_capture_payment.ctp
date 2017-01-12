<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Senior Citizens'), array('plugin' => 'senior_citizens', 'controller' => 'senior_citizens', 'action' => 'index'));

$this->Html->
        addCrumb($this->data['SeniorCitizen']['firstname'] . ' ' . $this->data['SeniorCitizen']['lastname'], array(
		'plugin' => 'senior_citizens', 'controller' => 'senior_citizens', 'action' => 'edit',
		$this->data['SeniorCitizen']['id']
	));

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), array('plugin' => 'senior_citizen', 'controller' => 'senior_citizens', 'action' => 'add'));
}
?>

<?php $dependant_not_covered = false; ?>

<?php echo $this->Form->create('Payment');?>

<div class="row-fluid">
    <div class="span8">

<?php
	echo $this->Form->input('id');
	echo $this->Form->input('amount_received', array(
		'label' => __d('croogo', 'Amount *'),
                'default' => 0,
	));
	
	echo $this->Form->input('date_for', array(
		'label' => __d('croogo', 'Payment Date Due'), 
                'default' => $due_date[0][0]['due_date'],
	));
	echo $this->Form->input('senior_citizen_id', array('type' => 'hidden', 'value' => $this->data['SeniorCitizen']['id'])
	);
	
?>
</div>

    <div class="span4">
	<?php
		
		echo $this->Html->beginBox(__d('croogo', 'Capture Payment')) .
			$this->Form->button(__d('croogo', 'Done'), array('button' => 'success')) .
			$this->Html->link(
			__d('croogo', 'Cancel'), 
                        array('action' => 'index'),
			array('button' => 'danger')
                ) .
		$this->Html->endBox();
		
		$account_details_tbl = 
			'<table>';

                $account_details_tbl .= 
                        '</table>';
                
		echo $this->Html->beginBox(__d('croogo', 'Account Details')) .
			$account_details_tbl .
		$this->Html->endBox();
		
		$payment_summary_tbl = 
			'<table>';
		if ($total_received[0][0]['total_received']) { 
			$payment_summary_tbl .=		
				'<tr>
					<td style="font-weight:bold;width:80%;">Total Received to date:<td>
					<td>R' . $total_received[0][0]['total_received'] . '<td>
				</tr>';
		}
		if ($total_received[0][0]['total_received']) {
			$payment_summary_tbl .= 
				'<tr>
					<td style="font-weight:bold">Lastest Payment Received:<td>
					<td>' . date('F Y', strtotime($lastest_payment_date[0][0]['lastest_payment_date'])) . '<td>
				</tr>';
		}
		$payment_summary_tbl .= '</table>';
		
		echo $this->Html->beginBox(__d('croogo', 'Payment Summary')) .
			$payment_summary_tbl .
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
