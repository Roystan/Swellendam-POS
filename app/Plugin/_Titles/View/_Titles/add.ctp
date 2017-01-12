<div class="titles form">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('Title');?>
		<fieldset>
		<?php
			echo $this->Form->input('title');
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>