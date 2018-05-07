<?php 
	if(!isset($_SESSION)){
		
		session_start();
		date_default_timezone_set('America/Los_Angeles');
			
	}
	
	
	
	$Value = explode(",", $_GET['Value']);	
	$id = $Value[0];	
	$S = $Value[1];
	
	if($S == "ON"){$m = "OFF";}
	else{$m = "ON";}
	
	// Creating DB Connection
	include ('../includes/connection.php');
	$connection = new createConnection(); //i created a new object
	$connection->connectToDatabase(); // connected to the database
	$connection->selectDatabase();// closed connection
	$conn = $connection->myconn;
	
	
	$userSQL="UPDATE notification SET Stat='$m' WHERE ID='$id'";
	
	$result = mysql_query($userSQL,$conn);
	
	if($result)
	{
	
		
		unset($_SESSION['priv_user_id']);
		$_SESSION['priv_user_id']=$id;
		$connection->closeConnection();
		header("Location:Index.php");
	
	}
	else
	{
		$_SESSION['error_msg_one'] ="Error inserting data!";
		unset($_SESSION['priv_user_id']);
		$_SESSION['priv_user_id']=$id;
		$connection->closeConnection();
		header("Location:Index.php");
	
	}
	
	$connection->closeConnection();