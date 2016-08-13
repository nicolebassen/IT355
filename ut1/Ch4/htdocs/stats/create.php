<?php

// Initialize site configuration
require_once('includes/config.inc.php');

// Initialize form values
$title = NULL;
$content = NULL;

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	
	// Get user input from form
	$YR= $_POST['YR'];
	$Fullname = $_POST['Fullname'];
	$GP= $_POST['GP'];
	$AB= $_POST['AB'];
	$R = $_POST['R'];
	$H= $_POST['H'];
	$HR= $_POST['HR'];
	$RBI= $_POST['RBI'];
	$Salary = $_POST['Salary'];
	$Bio= $_POST['Bio'];


	// Execute database query
	$stat = new Stats();
	$stat->YR = $YR;
	$stat->Fullname = $Fullname;
	$stat->GP = $GP;
	$stat->AB = $AB;
	$stat->R = $R;
	$stat->H = $H;
	$stat->HR = $HR;
	$stat->RBI = $RBI;
	$stat->Salary = $Salary;
	$stat->Bio = $Bio;

	$stat->save();
		
	// Redirect to site root
	redirect_to('.');
}

// Include page view
require_once(VIEW_PATH.'upsert.view.php');