<?php 

// Initialize site configuration
require_once('includes/config.inc.php');
// Get stats  from database
$stats= Stats::getAll();
// Include page view
require_once(VIEW_PATH.'index.view.php');
