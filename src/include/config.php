<?php
/* Setting $debug to true enables showing all errors. Disable by setting to false*/
$debug = true;
if ($debug) {
    error_reporting(E_ALL); /* -1 */
    ini_set('display_errors', 1);
}

function __autoload($class_name) {
    include "classes/" . $class_name . ".class.php"; 
}

define("DBHOST", "localhost"); 
define("DBUSER", "filmlistan2019"); 
define("DBPASS", "password"); 
define("DBDATABASE", "filmlistan2019");


if(session_status() == PHP_SESSION_NONE){
    session_start(); 
}

/* Logout is a global function on all pages. Need to before output to broweser. */
if (isset($_REQUEST['logout'])) { 	
	session_unset();
	session_destroy();
	header("Location: index.php");
}  
