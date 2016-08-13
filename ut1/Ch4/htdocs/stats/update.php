<?php

// Initialize site configuration
require_once('includes/config.inc.php');

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Initialize form values


    // Get id from querystring
    $id = $_GET['id'];
        
    // Check for inital page request
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        // Execute database query
        $stat = Stats::getById($id);
//$sql = "insert into stats (YR,fullname,GP,AB,R,H,HR,RBI,Salary,Bio) values (:YR,:fullname,GP,AB,R,H,HR,RBI,Salary,Bio)";

        // Set form values
        $YR = $stat->YR;
        $Fullname = $stat->player;
        $GP = $stat->GP;
        $AB = $stat->AB;
        $R = $stat->R;
        $H = $stat->H;
        $HR = $stat->HR;
        $RBI = $stat->RBI;
        $Salary = $stat->Salary;
        $Bio = $stat->Bio;

    } 
    
    // Check for page postback
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
        // Get user input from form
        $id = $_POST['id'];
        $GP = $_POST['GP'];
        $AB = $_POST['AB'];
        $R = $_POST['R'];
        $H = $_POST['H'];
        $HR = $_POST['HR'];
        $RBI = $_POST['RBI'];
        $Salary = $_POST['Salary'];
        $Bio = $_POST['Bio'];

        // Execute database query
        $stat = new Stats();
        $stat->id = $id;
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

} else {

    // Redirect to site root
    redirect_to('.');   
}

// Include page view
require_once(VIEW_PATH.'upsert.view.php');