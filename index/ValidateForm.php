<?php 



$FullName =trim($_POST['FullName']);
$EAddress = trim($_POST['EAddress']);
$TextArea = trim($_POST['textarea']);


$FullName = filter_var($FullName, FILTER_SANITIZE_STRING);
$EAddress = filter_var($EAddress, FILTER_SANITIZE_STRING);
$TextArea = filter_var($TextArea, FILTER_SANITIZE_STRING);

$requiredFields['FullName'] = $FullName;
$requiredFields['EAddress'] = $EAddress;
$requiredFields['TextArea'] = $TextArea;

$to="jijonemera@yahoo.com";
$subject="Prayer Request";
$from = $EAddress;
$headers="From: " .$FullName."E-mail: ".$from;


if (!filled_out($requiredFields))
{
	
	$_SESSION['error_msg_one'] ="You have not filled out all the required fields";
	header("Location:Prayer_request_form.php");
	
	exit();
}
if (!isAllLeters($FullName))
{
	
	$_SESSION['error_msg_one'] ="please enter a valid name";
	header("Location:Prayer_request_form.php");	
	exit();
}
if (!valid_email($EAddress))
{

	$_SESSION['error_msg_one'] ="Please enter a valid Email";
	header("Location:Prayer_request_form.php");
	
	exit();
}
else
{
	mail($to,$subject,$TextArea,$headers);
	header("Location:index.php");

}


/*check if all the forms are filed*/
function filled_out($form_vars)
{
	// test that each variable has a value
	foreach ($form_vars as $key => $value)
	{
		if (!isset($key) || ($value == ''))
			return false;
	}
	return true;
}


/*check if the name is all teters*/
function isAllLeters($value){

	if (preg_match("/^[A-Za-z\\-\\., \']+$/", $value)){
		return true;}
		else{
			return false;}

}

/* check if the email is valid*/
function valid_email($email){
	$regex = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/';

	if (preg_match($regex, $email)) {
		return true;
	} else {
		return false;
	}
}

?>
