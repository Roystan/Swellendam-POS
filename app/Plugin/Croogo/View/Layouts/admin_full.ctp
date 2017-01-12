<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<title><?php echo $title_for_layout; ?> - <?php echo __d('croogo', Configure::read('Site.title')); ?></title>
	<?php
		echo $this->Html->css(array(
			'/croogo/css/croogo-bootstrap',
			'/croogo/css/croogo-bootstrap-responsive',
			'/croogo/css/thickbox',
		));
		echo $this->Layout->js();
		echo $this->Html->script(array(
			'/croogo/js/jquery.min',
			'/croogo/js/jquery-ui.min',
			'/croogo/js/jquery.cookie',
			'/croogo/js/jquery.hoverIntent.minified',
			'/croogo/js/superfish',
			'/croogo/js/supersubs',
			'/croogo/js/jquery.tipsy',
			'/croogo/js/jquery.elastic-1.6.1.js',
			'/croogo/js/thickbox-compressed',
			'/croogo/js/underscore-min',
			'/croogo/js/admin',
			'/croogo/js/croogo-bootstrap.js',
		));
		echo $this->Blocks->get('css');
		echo $this->Blocks->get('script');
	?>
</head>

<body>

	<div id="wrap" class="full">
		<?php echo $this->element('admin/header'); ?>
		<div id="push"></div>
		<div id="content-container" class="container-fluid">
			<div class="row-fluid">
				<div id="content" class="clearfix">
					<div id="inner-content" class="span12">
					<?php
						echo $this->Layout->sessionFlash();
						echo $content_for_layout;
					?>
					</div>
					&nbsp;
				</div>
			</div>
		</div>

	</div>

	<?php echo $this->element('admin/footer'); ?>
	<?php
		echo $this->Blocks->get('scriptBottom');
		echo $this->Js->writeBuffer();
	?>
	</body>
</html>