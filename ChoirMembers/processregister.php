<?php if(!isset($_SESSION)){
	
	session_start();
	date_default_timezone_set('America/Los_Angeles');
		
}?>
<?php

$email = htmlspecialchars(strip_tags($_POST["email1"]));
$userId = htmlspecialchars(strip_tags($_POST["userID"]));
$password = htmlspecialchars(strip_tags($_POST["password1"]));
$password2 = htmlspecialchars(strip_tags($_POST["password2"]));
$fName = htmlspecialchars(strip_tags($_POST["fname"]));
$lName = htmlspecialchars(strip_tags($_POST["lname"]));
$phone = htmlspecialchars(strip_tags($_POST["phone"]));
$street = htmlspecialchars(strip_tags($_POST["street"]));
$city = htmlspecialchars(strip_tags($_POST["city"]));
$state = $_POST["state"]; // Drop Down Menu
$zip = htmlspecialchars(strip_tags($_POST["zip"]));
$admin = htmlspecialchars(strip_tags($_POST["admin"]));
$group = htmlspecialchars(strip_tags($_POST["group"]));// Choir, Church Member and so on


// Server-side Validation
if($fName == "") {
	$_SESSION['error_msg_three'] ="error : You did not enter your first name";
	header("Location:RegisterChoir.php");
}

elseif($lName == "" ) {
	$_SESSION['error_msg_three'] ="error : You did not enter your last name.";
	header("Location:RegisterChoir.php");
}

elseif($phone == "" ) {
	$_SESSION['error_msg_three'] ="error : Please enter your phone number";
	header("Location:RegisterChoir.php");
}

elseif($email == "" ) {
	$_SESSION['error_msg_one'] ="error : You did not enter your email";
	header("Location:RegisterChoir.php");
}

elseif($userId == "" ) {
	$_SESSION['error_msg_one'] ="error : You did not confirm your email";
	header("Location:RegisterChoir.php");

}
elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
	$_SESSION['error_msg_one'] ="error : You did not enter a valid email";
	header("Location:RegisterChoir.php");
}

elseif($admin =="000" ) {
	$_SESSION['error_msg_one'] ="error : select admin status";
	header("Location:RegisterChoir.php");
}

elseif($password == "" ) {
	$_SESSION['error_msg_one'] ="error : You did not enter your password";
	header("Location:RegisterChoir.php");
}

elseif($password2 == "" ) {
	$_SESSION['error_msg_one'] ="error : You did not confirm your password";
	header("Location:RegisterChoir.php");
}

elseif($password !== $password2 ) {
	$_SESSION['error_msg_one'] ="error : your password doesn't match";
	header("Location:RegisterChoir.php");
}

elseif($city == "" ) {
	$_SESSION['error_msg_three'] ="error : You did not enter your city";
	header("Location:RegisterChoir.php");
}

elseif($state == "" ) {
	$_SESSION['error_msg_three'] ="error : You did not choose your state";
	header("Location:RegisterChoir.php");
}

elseif($zip == "" ) {
	$_SESSION['error_msg_three'] ="error : You did not enter your zip";
	header("Location:RegisterChoir.php");
}

else{

	// Creating DB Connection
	include ('../includes/connection.php');
	$connection = new createConnection(); //i created a new object
	$connection->connectToDatabase(); // connected to the database
	$connection->selectDatabase();
	$conn = $connection->myconn;


	$userSQL="INSERT INTO choirmember VALUES
	(NULL,'$fName', '$lName','$phone','$street','$city','$state', '$zip', '$email');";
	$result = mysql_query($userSQL,$conn);	
	$MemberId = mysql_insert_id();
			
	if($result)
	{
		$ValidationSQL="INSERT INTO church_val (U_id,Pass,Mem_mem_stat,Admin,F_K) VALUES
		('$userId', sha1('$password'), '$group', '$admin', '$MemberId');";
		$result2 = mysql_query($ValidationSQL,$conn);
		
		//INSERT INTO table_name (column1,column2,column3,...)
		//VALUES (value1,value2,value3,...);
		
		if($result2){
			
			$_SESSION['userid'] = $UserId;
			$_SESSION['email'] = $email;
			$_SESSION['fname'] = $fName;
			$_SESSION['lname'] = $lName;
			
			$_SESSION['error_msg_two'] = " Your account has been created successfully!";
			header("Location:RegisterChoir.php");			
			
		}
		else 
		{
			$uaSQL = "DELETE FROM choirmember WHERE Mem_id=$MemberId";
			$result = mysql_query($uaSQL,$conn);
			
			$_SESSION['error_msg_one'] ="Error inserting data!";
			header("Location:RegisterChoir.php");
		}
		
	}
	else
	{
		$_SESSION['error_msg_one'] ="Error inserting data!";
		header("Location:RegisterChoir.php");
		
	}

$connection->closeConnection();

}






?>









