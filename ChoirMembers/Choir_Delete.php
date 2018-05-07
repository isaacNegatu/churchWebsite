c<?php   	    


	// Creating DB Connection
		include ('../includes/connection.php');
		$connection = new createConnection(); //i created a new object
		$connection->connectToDatabase(); // connected to the database
    	$connection->selectDatabase();// closed connection
		$conn = $connection->myconn;


		
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$id = $_GET['id'];
		 

			$uaSQL = "DELETE FROM choirmember WHERE ID=$id";
			$result = mysql_query($uaSQL,$conn);
			
			
 
 
			if ($result) {
		 		header("Location: ChoirMembersView.php");	
			}
			else
			{
				echo "error";
			}
			
			$connection->closeConnection();

 		}
 
 ?>