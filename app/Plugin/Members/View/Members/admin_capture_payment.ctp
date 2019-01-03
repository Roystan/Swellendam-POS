<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb($this->Html->icon('home'), '/admin')
	->addCrumb(__d('croogo', 'Members'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'));

$this->Html->
        addCrumb($this->data['Member']['firstname'] . ' ' . $this->data['Member']['lastname'], array(
		'plugin' => 'members', 'controller' => 'members', 'action' => 'edit',
		$this->data['Member']['id']
	));

$this->Html->addCrumb(__d('croogo', 'Capture Payment'), array('plugin' => 'members', 'admin' => 'true', 'controller' => 'members', 'action' => 'capture_payment', $this->data['Member']['id']));

?>

<?php $dependant_not_covered = false; ?>

<?php echo $this->Form->create('Payment');?>

<div class="row-fluid">
    <div class="span8">

<?php

        $default_amount = $this->data['Member']['premium'];
        
//        echo $this->element('sql_dump');

	echo $this->Form->input('id');
	echo $this->Form->input('amount_received', array(
		'label' => __d('croogo', 'Amount *'),
                'default' => $default_amount,
	));
   
	echo $this->Form->input('months', array(
				'type' => 'select',
				'options' => array(
					1 => '1', 
					2 => '2',
					3 => '3',
					4 => '4',
					5 => '5',
					6 => '6',
					7 => '7',
					8 => '8',
					9 => '9',
					10 => '10',
					11 => '11',
					12 => '12',
				),
                'label' => __d('croogo', 'Months'), 
                'default' => 1
	));
   
       /* echo $this->Form->input('months', array(
                'label' => __d('croogo', 'Months'), 
                'default' => 1
));*/
	
	echo $this->Form->input('date_for', array(
		'label' => __d('croogo', 'Payment Date Due'), 
                'default' => ($due_date[0][0]['due_date'] ? $due_date[0][0]['due_date'] : date('Y-m-01')),
	));
        
    echo $this->Form->input('date_created', array('type' => 'hidden', 'value' => date('Y-m-d')));
	echo $this->Form->input('member_id', array('type' => 'hidden', 'value' => $this->data['Member']['id'])
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
			'<table>
                            <tr>
                                <td style="font-weight:bold;width:70%">Category:<td>
                                <td>' . ($this->data['Member']['category_id'] == 1 ? "Single" : "Family") . '<td>
                            </tr>
                            <tr>
                                    <td style="font-weight:bold;width:90%;">Cover Amount:<td>
                                    <td>R' . $this->data['Member']['coveramount'] . '<td>
                            </tr>
                            <tr>
                                    <td style="font-weight:bold;width:90%;">Premium:<td>
                                    <td>R' . $this->data['Member']['premium'] . '<td>
                            </tr>';
                $account_details_tbl .= 
                        '</table>';
                
		echo $this->Html->beginBox(__d('croogo', 'Account Details')) .
			$account_details_tbl .
		$this->Html->endBox();
		
		$payment_summary_tbl = '<table>';
		if ($total_received[0][0]['total_received']) { 
                    $payment_summary_tbl .=		
                        '<tr>
                                <td style="font-weight:bold;width:70%;">Total Received to date:<td>
                                <td>R' . $total_received[0][0]['total_received']. '<td>
                        </tr>';
		}
		if ($total_received[0][0]['total_received']) {
                    $payment_summary_tbl .= 
                        '<tr>
                                <td style="font-weight:bold;width:70%">Last Payment Date:<td>
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
