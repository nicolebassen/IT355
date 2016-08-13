<?php require_once(VIEW_PATH.'header.inc.php');

if (!isset($YR)) $YR= NULL;
if (!isset($GP)) $GP= NULL;
if (!isset($AB)) $AB= NULL;
if (!isset($R))  $R = NULL;
if (!isset($H)) $H= NULL;
if (!isset($HR)) $HR= NULL;
if (!isset($RBI)) $RBI= NULL;
if (!isset($Bio)) $Bio= NULL;
if (!isset($Fullname)) $Fullname= NULL;
if (!isset($Salary)) $Salary= NULL;


?>

	<h3><?php echo sanitize_output($Fullname).' '.sanitize_output($YR);?></h3>
	<form method="POST" action="<?php echo sanitize_output($_SERVER['REQUEST_URI']);?>">
	<?php
			if (!$Fullname) echo 
		'<p>						
			<label for="Fullname">Fullname</label>									
			<input id="Fullname" name="Fullname" type="text"  value="'.sanitize_output($Fullname).'"
	 autofocus size="2"/>
		</p>';
			if (!$YR) echo 
		'<p>						
			<label for="YR">Year</label>									
			<input id="Year" name="YR" type="text"  value="'.sanitize_output($YR).'"
	 autofocus size="2"/>
		</p>';
		?>


		<p>						
			<label for="GP">Games Played</label>		


			<input type = "hidden" name = "id" value = "<?php echo $id;?>"	/>						
			<input id="GP" name="GP" type="text" size="2"  value="<?php 
				echo sanitize_output($GP); ?>" autofocus />
		</p>
		<p>						
			<label for="AB">At Bats</label>									
			<input id="AB" name="AB" type="Number"  value="<?php 
				echo sanitize_output($AB); ?>" autofocus size="2"/>
		</p>
		<p>						
			<label for="R">Runs</label>									
			<input id="R" name="R" type="Number"  value="<?php 
				echo sanitize_output($R); ?>" autofocus size="2"/>
		</p>
		<p>						
			<label for="H">Hits</label>									
			<input id="H" name="H" type="Number"  value="<?php 
				echo sanitize_output($H); ?>" autofocus size="2"/>
		</p>
		<p>						
			<label for="HR">Home Runs</label>									
			<input id="HR" name="HR" type="Number"  value="<?php 
				echo sanitize_output($HR); ?>" autofocus size="2"/>
		</p>
		<p>						
			<label for="RBI">RBI</label>									
			<input id="RBI" name="RBI" type="Number" size="75" value="<?php 
				echo sanitize_output($RBI); ?>" autofocus size="2"/>
		</p>
		<p>						
			<label for="Salary">Salary</label>									
			<input id="Salary" name="Salary" type="Number" step="any"  value="<?php 
				echo sanitize_output($Salary); ?>" autofocus size="2"/>
		</p>

		<p>
			<label for="Bio">Bio</label>
			<textarea id="Bio" name="Bio"><?php 
				echo sanitize_output($Bio);?></textarea></p>
		<p>



			<input type="submit"/></p>

	</form>

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>