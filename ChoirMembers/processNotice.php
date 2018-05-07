<?php
if(!isset($_SESSION)){

	session_start();
	date_default_timezone_set('America/Los_Angeles');

}

$notice = htmlspecialchars(strip_tags($_POST["notice"]));
$OnOff = htmlspecialchars(strip_tags($_POST["OnOff"]));


// Server-side Validation
if($notice == "" ) {
	$_SESSION['error_msg_one'] ="error: message 1 - የሚገለገልበትን ቀን አስገባ";
	unset($_SESSION['priv_user_id']);
	$_SESSION['priv_user_id']=$id;
	header("Location:Notice.php");
}
else{
		
	// Creating DB Connection
	include ('../includes/connection.php');
	$connection = new createConnection(); //i created a new object
	$connection->connectToDatabase(); // connected to the database
	$connection->selectDatabase();
	$conn = $connection->myconn;
	
	$userSQL="INSERT INTO notification VALUES
	(NULL, '$notice', '$OnOff');";
	$result = mysql_query($userSQL,$conn);
	
	if($result)
	{
	
		$_SESSION['error_msg_two'] = " successfully!";
		unset($_SESSION['priv_user_id']);
		$_SESSION['priv_user_id']=$id;
		$connection->closeConnection();
		header("Location:Notice.php");
	
	}
	else
	{
		$_SESSION['error_msg_one'] ="Error inserting data!";
		unset($_SESSION['priv_user_id']);
		$_SESSION['priv_user_id']=$id;
		$connection->closeConnection();
		header("Location:Notice.php");
	
	}
}