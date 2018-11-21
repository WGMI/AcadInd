<?php

session_start();//Creates the session

//Uncomment the line below if changing the code so that all errors are displayed
//error_reporting(1);

require 'connect.php';//Includes the script with the connection variable 
require 'general.php';//Includes the script with the general functions
require 'users.php';//Includes the script with the user related functions

if(logged_in()){
	$session = $_SESSION['id'];//Sets the session variable
	$user_data = user_data($session);//Places the user data of the logged in user in an easily accessible variable
}

$errors = array();//Empty array for errors that can be used anywhere

?>