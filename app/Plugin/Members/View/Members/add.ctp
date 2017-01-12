<div class="members form">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('Member');?>
		<fieldset>
		<?php
			echo $this->Form->input('firstnames');
			echo $this->Form->input('lastname');
			echo $this->Form->input('idnumber');
			echo $this->Form->input('gender');
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>