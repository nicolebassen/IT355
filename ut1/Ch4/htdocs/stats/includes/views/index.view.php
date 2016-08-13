<?php require_once(VIEW_PATH.'header.inc.php'); ?>
	<?php foreach($stats as $stat):
	 ?>

		<h4>
			<a href="read.php?id=
			<?php echo $stat->id;?>">
			<?php  echo $stat->player;?>
			</a>
		</h4>



	<?php endforeach; ?>

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>