<div class="payments form">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('Payment');?>
		<fieldset>
		<?php
			echo $this->Form->input('amount_received');
			echo $this->Form->input('date_for');
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>