<?php if(!isset($_SESSION)){
	
	session_start();
	date_default_timezone_set('America/Los_Angeles');
		
}?>
<?php


$artist = htmlspecialchars(strip_tags($_POST["artist"]));//the Preacher name
$title = htmlspecialchars(strip_tags($_POST["title"]));//title of sermon
$num = htmlspecialchars(strip_tags($_POST["nameId"]));//date of sermon
$date = htmlspecialchars(strip_tags($_POST["date"]));//file name
$fileName = htmlspecialchars(strip_tags($_POST["fileName"]));//file name




// Server-side Validation
if($artist == "") {
	
	$_SESSION['error_msg_one'] ="error : Please enter ARTIST name";
	header("Location:AddMezmur.php");
}

elseif($title == "" ) {
	
	$_SESSION['error_msg_one'] ="error : Please enter mezmur TITLE.";
	header("Location:AddMezmur.php");
}
elseif($date == "" ) {
	
	$_SESSION['error_msg_one'] ="error : please enter the Date";
	header("Location:AddMezmur.php");
}
elseif($num == "" ) {	
	
	$_SESSION['error_msg_one'] ="error : You did not enter name Id";
	header("Location:AddMezmur.php");
}
elseif($fileName == "" ) {
	
	$_SESSION['error_msg_one'] ="error : You did not enter File name";
	header("Location:AddMezmur.php");
}

else{	
	

	// Creating DB Connection
	include ('../includes/connection.php');
	$connection = new createConnection(); //i created a new object
	$connection->connectToDatabase(); // connected to the database
	$connection->selectDatabase();// closed connection
	$conn = $connection->myconn;
	
	
	
		
		
		$userSQL="INSERT INTO choir_mezmur VALUES
		(NULL,'$title','$num','$date','$artist','$fileName');";
		
		
		$result = mysql_query($userSQL,$conn);
	
		
		
		if($result)
		{
			$_SESSION['error_msg_two'] = " መዝሙሩ በሚገባ ፎልደሩ ውስጥ ገብቷል ";		
			header("Location:AddMezmur.php");
	
		}
		else
		{	
			$_SESSION['error_msg_one'] ="Error inserting data!";			
			header("Location:AddMezmur.php");
		
		}	
	
	$connection->closeConnection();

	
}


?>