<div class="paymentlogs form">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('PaymentLog');?>
		<fieldset>
		<?php
			echo $this->Form->input('payment_id');
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>