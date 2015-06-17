<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Whale Watcher</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('whales');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<!--placeholder-->
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<!-- placeholder -->
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>