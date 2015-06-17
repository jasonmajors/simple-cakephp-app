<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php echo $this->fetch('title'); ?>

	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('navbar');
		
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<?php echo $this->element('navbar'); ?>
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
		<div id="footer">
		<!-- placeholder -->
		</div>
	</div>
</body>
<?php 
	echo $this->Html->script('jquery');
	echo $this->Html->script('bootstrap.min'); 
	echo $this->Html->script('filter-data');
?>
</html>