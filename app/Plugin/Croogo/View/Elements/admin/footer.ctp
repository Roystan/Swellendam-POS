<footer class="navbar-inverse">
	<div class="navbar-inner">

	<div class="footer-content">
	<?php
		$link = $this->Html->link(
			__d('croogo', 'Swellendam Funeral Services %s', ''),
			'http://www.croogo.org'
		);
	?>
	Powered by <?php echo $link; ?>
	<?php echo $this->Html->image('/croogo/img/icons/information.png'); ?>
	</div>

	</div>
</footer>