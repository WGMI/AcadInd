<?php

require 'connect.php';//Includes the script with the connection variable 

//Retrieve a user's username given their ID
function user_id_from_username($username){
	global $conn;
	$username = sanitize($username);
	$query = mysqli_query($conn,"select id from users where username = '$username'");
	if($row = mysqli_fetch_assoc($query)){
		$id = $row['id'];
	}
	return $id;
}

//Return false if the username and password don't match
function login($username,$password){
	global $conn;
	$id = user_id_from_username($username);
	$username = sanitize($username);
	$password = md5($password);
	$num = 0;
	$query = mysqli_query($conn,"select count(id) as num from users where binary username = '$username' and password = '$password'");
	if($row = mysqli_fetch_assoc($query)){
		$num = $row['num'];
	}
	return ($num) ? $id:false;
}

//Check if the passed in username belongs to an active account
function user_active($username){
	global $conn;
	$query = mysqli_query($conn,"select active from users where username = '$username'");
	if($row = mysqli_fetch_assoc($query)){
		return $row['active'];
	} else{
		return 0;
	}
}

//Check if the passed in username belongs to an existing account
function user_exists($username){
	global $conn;
	$num = 0;
	$username = sanitize($username);
	$query = mysqli_query($conn,"select count(id) as num from users where username = '$username'");
	if($row = mysqli_fetch_assoc($query)){
		$num = $row['num'];
	}
	return ($num) ? true:false;
}

//Check if the passed in email belongs to another account
function email_exists($email){
	global $conn;
	$num = 0;
	$email = sanitize($email);
	$query = mysqli_query($conn,"select count(id) as num from users where email = '$email'");
	if($row = mysqli_fetch_assoc($query)){
		$num = $row['num'];
	}
	return ($num) ? true:false;
}

//Return true if a session is set i.e. if a user is logged in
function logged_in(){
	return (isset($_SESSION['id'])) ? true:false;
}

//Return an array holding all the data of the user with the passed in id
function user_data($id){
	global $conn;
	$query = mysqli_query($conn,"select * from users where id = $id");
	
	if($row = mysqli_fetch_assoc($query)){
		return $row;
	} else {
		return 0;
	}
}

?>