<?php 
		if(!isset($_SESSION)){	
			session_start();
			date_default_timezone_set('America/Los_Angeles');		
		}
	 
		$id = htmlspecialchars(strip_tags($_POST["id"]));
		$xfacor = htmlspecialchars(strip_tags($_POST["pasport"]));
		
		include ('../includes/connection.php');
		$connection = new createConnection(); //i created a new object
		$connection->connectToDatabase(); // connected to the database
		$connection->selectDatabase();// closed connection
		$conn = $connection->myconn;
		
		// update personal information
		if($xfacor == "INFO"){
			
			$fName = htmlspecialchars(strip_tags($_POST["fname"]));
			$lName = htmlspecialchars(strip_tags($_POST["lname"]));
			$phone = htmlspecialchars(strip_tags($_POST["phone"]));
			$street = htmlspecialchars(strip_tags($_POST["street"]));
			$city = htmlspecialchars(strip_tags($_POST["city"]));
			$state = $_POST["state"]; // Drop Down Menu
			$zip = htmlspecialchars(strip_tags($_POST["zip"]));
			$email = htmlspecialchars(strip_tags($_POST["email"]));			
			
			
			if($fName == "") {
				$_SESSION['error_msg_one'] ="error: message 4 - Enter first name";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			
			elseif($lName == "" ) {
				$_SESSION['error_msg_one'] ="error: message 5 - Enter last name.";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			
			elseif($phone == "" ) {
				$_SESSION['error_msg_one'] ="error: message 6 - Enter phone number";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif(!validatePhoneNo($phone)){
				$_SESSION['error_msg_one'] ="error: message 6.1 - wrong format. should be 000-000-0000";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($street == "" ) {
				$_SESSION['error_msg_one'] ="error: message 7 - Enter Street Address";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($state == "" ) {
				$_SESSION['error_msg_one'] ="error: message 8 - Select State";
				header("Location:EditChoirMember.php");
			}
			elseif($city == "" ) {
				$_SESSION['error_msg_one'] ="error: message 9 - Enter City";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($zip == "" ) {
				$_SESSION['error_msg_one'] ="error: message 10 - Enter zip code";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($email == "" ) {
				$_SESSION['error_msg_one'] ="error: message 12 - Enter Email";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
				$_SESSION['error_msg_one'] ="error: message 12.1 - Enter a valid email";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			else{
				
				$userSQL="UPDATE choirmember SET FName='$fName', LName='$lName', Phone='$phone', Street='$street', City='$city', State='$state', Zipcode='$zip', EMail='$email' WHERE ID='$id'";
				$result = mysql_query($userSQL,$conn);
				
				if($result)	{
					$_SESSION['error_msg_two'] = " The account has been updated successfully!";
					unset($_SESSION['priv_user_id']);
					$_SESSION['priv_user_id']=$id;
					header("Location:EditChoirMember.php");
				}
				else{
					$_SESSION['error_msg_one'] = " error: message 14- Error Updating data";
					unset($_SESSION['priv_user_id']);
					$_SESSION['priv_user_id']=$id;
					header("Location:EditChoirMember.php");
				}
				
				$connection->closeConnection();
				
			}	
			
		} //end of INFO if statment 
		else{			

			$admin = htmlspecialchars(strip_tags($_POST["admin"]));
			$mem = $_POST["Mem_mem_stat"];
			$u_id = htmlspecialchars(strip_tags($_POST["userID"]));
			$u1 = htmlspecialchars(strip_tags($_POST["password1"]));
			$u2 = htmlspecialchars(strip_tags($_POST["password2"]));
			
			if($mem == "") {
				$_SESSION['error_msg_one'] ="error: message 1 - Select Group name";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($admin == "") {
				$_SESSION['error_msg_one'] ="error: message 2 - Select Admin Type";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($u_id == "") {
				$_SESSION['error_msg_one'] ="error: message 3 - Enter user name";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($u1 == "") {
				$_SESSION['error_msg_one'] ="error: message 4 - enter password 1";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($u2 == "") {
				$_SESSION['error_msg_one'] ="error: message 5 - enter password 2";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			elseif($u1 == $u2) {
				$_SESSION['error_msg_one'] ="error: message 5 - password doesn't match";
				unset($_SESSION['priv_user_id']);
				$_SESSION['priv_user_id']=$id;
				header("Location:EditChoirMember.php");
			}
			else{			
				
				
				$userSQL="UPDATE church_val SET Mem_mem_stat='$mem', Admin='$admin', U_id='$u_id', Password=sha1('$pass') WHERE F_K='$id'";
				$result = mysql_query($userSQL,$conn);
				
				if($result)	{
					$_SESSION['error_msg_two'] = " password updated successfully!";
					unset($_SESSION['priv_user_id']);
					$_SESSION['priv_user_id']=$id;
					header("Location:EditChoirMember.php");
				}
				else{
					$_SESSION['error_msg_one'] = " error: message 14- Error Updating data";
					unset($_SESSION['priv_user_id']);
					$_SESSION['priv_user_id']=$id;
					header("Location:EditChoirMember.php");
				}
				
				$connection->closeConnection();
				
			}
			
		}
		
		function validatePhoneNo($phone)
		{
			if(ereg('^[2-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}$', $phone))
				return true;
			else
				return false;
		}
		