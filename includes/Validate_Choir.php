<?php 
		

	
		$user =trim($_POST['user']);
		$pass = trim($_POST['password']);
		$valid = 'YES';
		
		// Creating DB Connection
		include ('../includes/connection.php');
		$connection = new createConnection(); //created a new object
		$connection->connectToDatabase(); // connected to the database
    	$connection->selectDatabase();// closed connection
		$conn = $connection->myconn;
		
		if(($user == "")||($pass == "")){
			
			if($user == ""){
				$_SESSION['error_msg_one'] ="enter your USERNAME";
				header("Location:SignIn_Choir.php");
				exit;
			}
			elseif ($pass == ""){
				$_SESSION['error_msg_two'] ="enter your PASSWORD";
				header("Location:SignIn_Choir.php");
				exit;
			}
		}			
		else{
			
			$sql = "SELECT * FROM choirmember
					INNER JOIN church_mem ON choirmember.ID=church_mem.F_K
					WHERE church_mem.U_id='$user' AND Pass=sha1('$pass');";
		  
	  		//$sql = "SELECT * FROM choirmember ";
	  		//$sql = $sql . "WHERE UserID='$user' AND Password=sha1('$pass');";
 
 	 		 $result = mysql_query($sql,$conn);
   	 
   	  		if(!$result){
   	  	
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
	  			$_SESSION['FName'] =$row['FName'];
	  			$_SESSION['LName'] =$row['LName'];
	  			$_SESSION['Admin'] =$row['Admin'];
	  			$_SESSION['Group'] =$row['Group'];
	  			$_SESSION['valid_user']= $valid;
	  			
	  			if (($row['Group']== 'CHOIR')){					
					header("Location: ../ChoirMembers/Index.php");
					exit;
				}
				elseif(($row['Group']== 'MEMBER')){
					
					header("Location: ../index/Index.php");
					exit;
				}
			
	  		}
	 		 elseif(($user !==" ") && ($pass!==" "))
	  		{	  
	  			$_SESSION['error_msg_three'] ="Sorry! your login information doesn't match our records on file!";
	  			header("Location:SignIn_Choir.php");
				exit;
	  		}
		}
	
	
	 
