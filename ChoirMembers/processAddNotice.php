<?php 
if(!isset($_SESSION)){
	
	session_start();
	date_default_timezone_set('America/Los_Angeles');
		
}



$m1 = htmlspecialchars(strip_tags($_POST["agelglot_date"]));
$m2 = htmlspecialchars(strip_tags($_POST["mezmur_one"]));
$m3 = htmlspecialchars(strip_tags($_POST["mezOneId"]));
$m4 = htmlspecialchars(strip_tags($_POST["mezfileNameOne"]));
$m5 = htmlspecialchars(strip_tags($_POST["mezmur_two"]));
$m6 = htmlspecialchars(strip_tags($_POST["mezTwoId"]));
$m7 = htmlspecialchars(strip_tags($_POST["mezfileNameTwo"]));
$m8 = htmlspecialchars(strip_tags($_POST["status"]));
$m9 = htmlspecialchars(strip_tags($_POST["action"]));
$id = htmlspecialchars(strip_tags($_POST["id"]));



// Server-side Validation
if($m1 == "" ) {
	$_SESSION['error_msg_one'] ="error: message 1 - የሚገለገልበትን ቀን አስገባ";
	unset($_SESSION['priv_user_id']);
	$_SESSION['priv_user_id']=$id;
	header("Location:AddChoirNotice.php");
}
elseif(!validateBdate($m1)) {
	$_SESSION['error_msg_one'] ="error: message 1.1 - format shoul be 00/00/0000";
	unset($_SESSION['priv_user_id']);
	$_SESSION['priv_user_id']=$id;
	header("Location:AddChoirNotice.php");
}
elseif($m2 == "") {
	$_SESSION['error_msg_three'] ="error :message 2 - የመጀመሪያውን መዝሙር አስገባ";
	unset($_SESSION['priv_user_id']);
	$_SESSION['priv_user_id']=$id;
	header("Location:AddChoirNotice.php");
}

elseif($m3 == "" ) {
	$_SESSION['error_msg_three'] ="error : message 3 - የመዝሙሩን ቁጥር አስገባ";
	unset($_SESSION['priv_user_id']);
	$_SESSION['priv_user_id']=$id;
	header("Location:AddChoirNotice.php");
}

elseif($m4 == "" ) {
	$_SESSION['error_msg_three'] ="error : message 4 - መዝሙሩ የራስ ነው ወይስ የሌላ";
	unset($_SESSION['priv_user_id']);
	$_SESSION['priv_user_id']=$id;
	header("Location:AddChoirNotice.php");
}
else{

	// Creating DB Connection
	include ('../includes/connection.php');
	$connection = new createConnection(); //i created a new object
	$connection->connectToDatabase(); // connected to the database
	$connection->selectDatabase();
	$conn = $connection->myconn;

	if($m9 == "ADD"){
		
		$userSQL="INSERT INTO yemitenu_mezmur VALUES
		(NULL, '$m1', '$m2', '$m5', '$m4', '$m7', '$m3', '$m6', '$m8');";
		$result = mysql_query($userSQL,$conn);
		
			
		if($result)
		{
				
			$_SESSION['error_msg_two'] = " successfully!";
			unset($_SESSION['priv_user_id']);
			$_SESSION['priv_user_id']=$id;
			$connection->closeConnection();
			header("Location:AddChoirNotice.php");
		
		}
		else
		{
			$_SESSION['error_msg_one'] ="Error inserting data!";
			unset($_SESSION['priv_user_id']);
			$_SESSION['priv_user_id']=$id;
			$connection->closeConnection();
			header("Location:AddChoirNotice.php");
		
		}
		
		
	}else{
		
		//$userSQL="UPDATE yemitenu_mezmur SET Qene='$m1', MezOne='$m2', MezTwo='$m3', Mez_One_dis='$m4', Mez_Two_dis='$m5', MezOne_quter='$m6', MezTwo_quter='$m7', Status='$m8' WHERE ID='$id'";
		
		$userSQL="UPDATE yemitenu_mezmur SET Qene='$m1', MezOne='$m2', MezTwo='$m5', Mez_One_dis='$m4', Mez_Two_dis='$m7', MezOne_quter='$m3', MezTwo_quter='$m6', Status='$m8' WHERE ID='$id'";
		
		$result = mysql_query($userSQL,$conn);
		
		if($result)
		{
		
			$_SESSION['error_msg_two'] = " successfully!";
			unset($_SESSION['priv_user_id']);
			$_SESSION['priv_user_id']=$id;
			$connection->closeConnection();
			header("Location:EditChoirNotice.php");
		
		}
		else
		{
			$_SESSION['error_msg_one'] ="Error inserting data!";
			unset($_SESSION['priv_user_id']);
			$_SESSION['priv_user_id']=$id;
			$connection->closeConnection();
			header("Location:EditChoirNotice.php");
		
		}
	}


$connection->closeConnection();

}



function validateBdate($Date)
{
	if(ereg('^[0-9]{2}/[0-9]{2}/[0-9]{4}$', $Date))
		return true;
	else
		return false;
}


?>









