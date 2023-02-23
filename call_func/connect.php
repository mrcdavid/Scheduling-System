<?php
defined('DOMAIN_PATH') || define('DOMAIN_PATH', dirname(__DIR__));
include DOMAIN_PATH . '/config/db_data.php';
$db_connect = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
  $error = "Failed to connect to Database: " . mysqli_connect_error();
  error_log($error);
  echo $error;
  exit();
}

function escape($con = "", $str = "")
{
  global $db_connect;
  $string = mysqli_real_escape_string($db_connect, $str);
  return $string;
}

function schedule($selected_time, $time)
{
  $add_time = "+" . $time . "minutes";

  $selectedTime = $selected_time;

  $selectedTime = strtotime("$add_time", strtotime($selectedTime));

  return date('H:i', $selectedTime);
}

function get_profile_pic($user_id,$field,$table){
	global $db_connect;
	$path ="";
	if(trim($user_id)=="" ||  trim($field)=="" || trim($table)==""){
		return "";
	}
	$query = "SELECT location FROM ".$table." WHERE ".$field ." = '".$user_id."' LIMIT 1";
	if($query=mysqli_query($db_connect,$query)){
	    $num=mysqli_num_rows($query);
	    if($num !=0){
	        if($data=mysqli_fetch_array($query,MYSQLI_ASSOC)){
	        	$path = empty($data['location']) ? "" : BASE_URL.$data['location'];
	        }
	    }
	}
	
	return $path;
}