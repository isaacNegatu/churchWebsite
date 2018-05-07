<?php

$name = htmlspecialchars(strip_tags($_POST["name"]));//bible study group name
$leader = htmlspecialchars(strip_tags($_POST["leader"]));//the group leader
$day = $_POST["day"];
$hour = $_POST["hour"];
$shift = $_POST["shift"];
$street = htmlspecialchars(strip_tags($_POST["street"]));
$city = htmlspecialchars(strip_tags($_POST["city"]));
$state = $_POST["state"];
$zip = htmlspecialchars(strip_tags($_POST["zip"]));
$m1 = htmlspecialchars(strip_tags($_POST["member1"]));
$m2 = htmlspecialchars(strip_tags($_POST["member2"]));
$m3 = htmlspecialchars(strip_tags($_POST["member3"]));
$m4 = htmlspecialchars(strip_tags($_POST["member4"]));
$m5 = htmlspecialchars(strip_tags($_POST["member5"]));
$m6 = htmlspecialchars(strip_tags($_POST["member6"]));
$m7 = htmlspecialchars(strip_tags($_POST["member7"]));
$m8 = htmlspecialchars(strip_tags($_POST["member8"]));
$m9 = htmlspecialchars(strip_tags($_POST["member9"]));
$m10 = htmlspecialchars(strip_tags($_POST["member10"]));

$date = $day." / ".$hour." ( ".$shift." )";

if($name == "") {

	$_SESSION['error_msg_one'] ="የግሩፑን ስም ያስገቡ";
	header("Location:Add_bibleStudy_group.php");
}

elseif($leader == "" ) {

	$_SESSION['error_msg_one'] ="የመሪውን ስም ያስገቡ";
	header("Location:Add_bibleStudy_group.php");
}
elseif($day == "" ) {

	$_SESSION['error_msg_one'] ="ቀኑን ያስገቡ ";
	header("Location:Add_bibleStudy_group.php");
}
elseif($hour == "" ) {

	$_SESSION['error_msg_one'] ="ሰአቱን ያስገቡ";
	header("Location:Add_bibleStudy_group.php");
}
elseif($shift == "" ) {

	$_SESSION['error_msg_one'] ="ጠዋት ወይን ማታ መሆኑን ይምረጡ";
	header("Location:Add_bibleStudy_group.php");
}
elseif($street == "" ) {

	$_SESSION['error_msg_one'] ="የቤት አድራሻውን ያስገቡ";
	header("Location:Add_bibleStudy_group.php");
}

else{

	// Creating DB Connection
	include ('../includes/connection.php');
	$connection = new createConnection(); //i created a new object
	$connection->connectToDatabase(); // connected to the database
	$connection->selectDatabase();// closed connection
	$conn = $connection->myconn;


	$userSQL="INSERT INTO bible_study_groups VALUES
	(NULL,'$name', '$leader','$date','$street','$city','$state','$zip', '$m1', '$m2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10');";
	
	$result = mysql_query($userSQL,$conn);
	//$UserId = mysql_insert_id();

	if($result)
	{
	
		
		$_SESSION['error_msg_two'] = " Your account has been created successfully!";
		header("Location:Add_bibleStudy_group.php");
		
		
		
	}
	else
	{
		$_SESSION['error_msg_one'] ="Error inserting data!";
		header("Location:Add_bibleStudy_group.php");
		
	
	}

$connection->closeConnection();

}


?>









