<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Accounts'), array('controller' => 'accounts', 'action' => 'index'));

if ($this->request->params['action'] == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Account']['firstname']);
}

if ($this->request->params['action'] == 'admin_add') {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Account');

?>
<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Account'), '#account-basic');
			echo $this->Croogo->adminTab(__d('croogo', 'Details'), '#account-details');
			echo $this->Croogo->adminTab(__d('croogo', 'Payments'), '#payment-details');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">

			<div id="account-basic" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('class' => 'span10'));
				echo $this->Form->input('firstname', array(
					'label' => __d('croogo', 'Firstname'),
				));
				echo $this->Form->input('lastname', array(
					'label' => __d('croogo', 'Lastname'),
				));
				echo $this->Form->input('idnumber', array(
					'label' => __d('croogo', 'ID Number'),
				));
echo $this->Form->input('account_number', array(
					'label' => __d('croogo', 'Account Number'),
				));

echo $this->Form->input('policy_number', array(
					'label' => __d('croogo', 'Policy Number'),
				));

			?>
			</div>

			<div id="account-details" class="tab-pane">
			<?php
				echo $this->Form->input('address', array(
					'label' => __d('croogo', 'Address'),
				));
				echo $this->Form->input('address2', array(
					'label' => __d('croogo', 'Address2'),
				));
				echo $this->Form->input('email', array(
					'label' => __d('croogo', 'Email')
				));
				echo $this->Form->input('state', array(
					'label' => __d('croogo', 'State'),
				));
				echo $this->Form->input('country', array(
					'label' => __d('croogo', 'Country'),
				));
				echo $this->Form->input('postcode', array(
					'label' => __d('croogo', 'Post Code'),
				));
				echo $this->Form->input('phone', array(
					'label' => __d('croogo', 'Phone'),
				));
				echo $this->Form->input('fax', array(
					'label' => __d('croogo', 'Fax'),
				));
			?>
			</div>

			<div id="payment-details" class="tab-pane">
			<?php
				echo $this->Form->input('account_number', array(
					'label' => __d('croogo', 'Account Number')
				));
				echo $this->Form->input('amount_received', array(
					'label' => __d('croogo', 'Amount')
				));

				//echo $this->Form->button(__d('croogo', 'Save Payment'), array('button' => 'success'));
			?>
			</div>


			<?php
				echo $this->Croogo->adminTabs();
			?>
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

		echo $this->Croogo->adminBoxes();
	?>
	</div>
</div>

<?php echo $this->Form->end(); ?>
