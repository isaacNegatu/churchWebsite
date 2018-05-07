<?php session_start();

	
		$user =trim($_POST['user']);
		$pass = trim($_POST['password']);
		$valid = 'YES';
		
		// Creating DB Connection
		include ('../includes/connection.php');
		$connection = new createConnection(); //created a new object
		$connection->connectToDatabase(); // connected to the database
    	$connection->selectDatabase();// closed connection
		$conn = $connection->myconn;
		
		
		if(($user == "") && ($pass == "")) {
		
			$Message = urldecode("error : You did not enter your User ID and Password");
			header("Location:SignIn_Choir.php? Message=".$Message);
			exit;
		}
		elseif($user == "") {	   
		    
		    $Message = urldecode("error : You did not enter your User ID");
		    header("Location:SignIn_Choir.php? Message=".$Message);
		    exit;
		}
		elseif($pass == "" ) {
		    $error= "error : You did not enter your password.";
		    
		    $Message = urldecode("error : You did not enter your password.");
		    header("Location:SignIn_Choir.php? Message=".$Message);
		    exit;
		}
	  
	//  $sql = "SELECT * FROM church_mem ";
	  //$sql = $sql . "WHERE U_id='$user' AND Pass=sha1('$pass');";
	 // $sql = $sql . "WHERE UserID='$user' AND Password=sha1('$pass');";
	 
		$sql = "SELECT * FROM choirmember
		INNER JOIN church_val ON choirmember.ID=church_val.F_K
		WHERE church_val.U_id='$user' AND Pass=sha1('$pass');";
 
 	  $result = mysql_query($sql,$conn);
   	 
   	  if(!$result){
     	
     	//$Message = urldecode("Unable to query database at this time");
     	//header("Location:SignIn_Choir.php? Message=".$Message);
   	  	$_SESSION['error_msg_three'] ="Unable to query database at this time";
   	  	header("Location:SignIn_Choir.php");
     	exit;
   	  }
   	  
   	  $num_results = mysql_num_rows($result);
   	  
   	  if($num_results > 0)  {
     	$row = mysql_fetch_assoc($result);
   	  } 
   	  
	  $Password = $row['Pass'];
	 
	 
	  if(($user == $row['U_id']) && (sha1($pass)== $Password))
	  {
	  	
		//	require_once ('../includes/login_functions.inc');
		//	$url = absolute_url('../ChoirMembers/index.php');
		//	header("refresh:0 ;$url");
			$_SESSION['U_id'] =$row["U_id"];
			$_SESSION['Password'] =$row["Pass"];
			$_SESSION['Mem_mem_stat'] =$row["Mem_mem_stat"];
			$_SESSION['Admin'] =$row["Admin"];
			$_SESSION['valid_user']= $valid;			
			$_SESSION['FName'] =$row['FName'];
			$_SESSION['LName'] =$row['LName'];
			
			if (($row['Mem_mem_stat']== 'CHOIR')){
				header('Location: ../ChoirMembers/Index.php');
				exit;
			}
			else{
					
				header("Location: ../index/Index.php");
				exit;
			}
					
	  }
	  elseif(($user !==" ") && ($pass!==" "))
	  {	  
		  $Message = urldecode("Sorry! your login information doesn't match our records on file!");
		  header("Location:SignIn_Choir.php? Message=".$Message);
		  exit;
	  }
	
	
	 ?> 
