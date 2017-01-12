<div class="spouses form">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('Spouse');?>
		<fieldset>
		<?php
			echo $this->Form->input('firstname');
			echo $this->Form->input('lastname');
			echo $this->Form->input('idnumber');
			echo $this->Form->input('gender_id');
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>