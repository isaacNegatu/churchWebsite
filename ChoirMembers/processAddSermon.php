<?php


$artist = htmlspecialchars(strip_tags($_POST["artist"]));//the Preacher name
$title = htmlspecialchars(strip_tags($_POST["title"]));//title of sermon
$date = htmlspecialchars(strip_tags($_POST["dateOfService"]));//date of sermon
$audio = htmlspecialchars(strip_tags($_POST["audio"]));//file name




// Server-side Validation
if($artist == "") {
	$_SESSION['error_msg_one'] ="ስህተት : የሰባኪ/ አስተማሪ ስም ያስግቡ";
	header("Location:AddSermon.php");
	
}

elseif($title == "" ) {
	$_SESSION['error_msg_one'] ="ስህተት : የስብከቱን / የትምህርቱን ርዕስ ያስግቡ";
	header("Location:AddSermon.php");
	
}
elseif($date == "" ) {
	$_SESSION['error_msg_one'] ="ስህተት : የስብከቱን / የትምህርቱን ቀን ያስገቡ ያስግቡ";
	header("Location:AddSermon.php");

}
elseif($audio == "" ) {
	$_SESSION['error_msg_one'] ="ስህተት : የስብከቱን / የትምህርቱን ዶሴ ቁጥር ያስገቡ ";
	header("Location:AddSermon.php");
	
}
else{

	// Creating DB Connection
	include ('../includes/connection.php');
	$connection = new createConnection(); //i created a new object
	$connection->connectToDatabase(); // connected to the database
	$connection->selectDatabase();// closed connection
	$conn = $connection->myconn;


	$userSQL="INSERT INTO sermon VALUES
	(NULL,'$artist', '$date','$title','$audio');";
	
	$result = mysql_query($userSQL,$conn);
	//$UserId = mysql_insert_id();

	if($result)
	{	
		$_SESSION['error_msg_two'] ="ስብከቱ / ትምህርቱ ዶሴው ውስጥ በትክክል ገብቷል  ";
		header("Location:AddSermon.php");
				
	}
	else
	{
		$_SESSION['error_msg_one'] ="ስህተት : ስብከቱን  ዶሴው ውስጥ ለማስገባት አልተቻለም   ";
		header("Location:AddSermon.php");
		
	
	}

$connection->closeConnection();

}


?>













