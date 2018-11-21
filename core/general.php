<?php

require 'connect.php';//Includes the script with the connection variable 

//Redirect to the login page if a user is not logged in
function protect()
{
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }
}

//Redirect to the index page if a user is not an administrator
function admin_only()
{
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
    } else {
        $user = user_data($_SESSION['id'], 'type');
        if (!$user['type']) {
            header('Location: index.php?adminauth=0');
        }
    }
}

//Protect against SQL injection
function sanitize($data)
{
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}

//Output an array of errors as an unordered list
function output_errors($errors)
{
    return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}

function check_edit_rights($id)
{
	if(user_data($_SESSION['id'])['type'] != 1 || $_SESSION['id'] !== $id){
		//echo $_SESSION['id'].s.' '.$id.p;
		//header('Location: index.php?authorisation=0');		
	}
}

function super_admin_only()
{
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
    } else {
        $user = user_data($_SESSION['id'], 'type');
        if ($user['type'] < 3) {
            header('Location: index.php?adminauth=0');
        }
    }
}


function array_to_json($array)
{
    return json_encode(array_values($array));
}


function xss_cleaner($input_str)
{
    $return_str = str_replace(array('<', ';', '|', '&', '>', "'", '"', ')', '('), array('&lt;', '&#58;', '&#124;', '&#38;', '&gt;', '&apos;', '&#x22;', '&#x29;', '&#x28;'), $input_str);
    $return_str = str_ireplace('%3Cscript', '', $return_str);
    return $return_str;
}

function clean($string)
{

    return xss_cleaner($string);
}

function country_population($conn, $country_id)
{

    $query = "SELECT population FROM country_population WHERE country_id = $country_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['population'];
}

function narrative_template($indicator_id)
{
    $location = 'narrative_templates/' . $indicator_id . '.blade.php';

    if (file_exists($location)) return file_get_contents($location);
    return '';
}

function check_user_type($user_type,$allowed_type){
	if($user_type != $allowed_type){
		header('Location: index.php');
	}
}
