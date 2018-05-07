

<!doctype html>
<?php 	
	if(!isset($_SESSION)){
		session_start();
		date_default_timezone_set('America/Los_Angeles');		
	}	
	if ($_SESSION['Mem_mem_stat'] != 'CHOIR'){
		header("Location:../includes/SignIn_Choir.php");
		exit();
	} 				
?>
	

<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8">
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/ChoirMember.css" type="text/css">
<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css">


</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper">

		<?php require ('../HeaderFooter/ZionHeaderChoir.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table>
				

					<tr>

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
					
							<?php include_once ("TabedNavChoirIndex.php");?>
							<div id="bodyContainer">
							<div id="bodyContentContainer">
							
								 
								  <?php
										  if (isset($_GET['id']) && ($_GET['id'] > 0)) {
										  	$id = $_GET['id'];
										  }
									  // Creating DB Connection
										include ('../includes/connection.php');
										
										$connection = new createConnection(); //i created a new object
										$connection->connectToDatabase(); // connected to the database
								    	$connection->selectDatabase();// closed connection
										$conn = $connection->myconn;
																	
										
										$sql = "SELECT * FROM choirmezmur " .
												"WHERE ID = $id";
										
								 		$result = mysql_query($sql,$conn);
								
								   		if(!$result){
								     		echo( "<p>Unable to query database at this time.</p>" );
								     	}
								     	
								   		$num_results = mysql_num_rows($result);
										$connection->closeConnection();
										$row = mysql_fetch_assoc($result);
										
										$azmach = $row['Azmach'];
										$Ku_1 = $row["KuterOne"];
										$Ku_2 = $row["KuterTwo"];
										$Ku_3 = $row["KuterThree"];
										$Ku_4 = $row["KuterFour"];
										$Ku_5 = $row["KuterFive"];
										
										echo "<h2 id=\"ChoirView_h2\">" .$row['Title']." </h2> <br><br>";
										
										echo "<table id='MezmurViewtable';>";	
											
											echo "<tr>";
											echo "<td id ='MezmurtdOne'> አዝማች </td>";
											echo "<td id ='MezmurtdTwo'>".nl2br($azmach)." </td>";
											echo "</tr>";
											
											echo "<tr>";
											echo "<td id ='MezmurtdOne'> ቁጥር 1 </td>";
											echo "<td id ='MezmurtdTwo'>".nl2br($Ku_1)." </td>";
											echo "</tr>";
											
											if($Ku_2!=""){
																							
												echo "<tr>";
												echo "<td id ='MezmurtdOne'> ቁጥር 2 </td>";
												echo "<td id ='MezmurtdTwo'>".nl2br($Ku_2)." </td>";
												echo "</tr>";
													
											}
											if($Ku_3!=""){
													
												echo "<tr>";
												echo "<td id ='MezmurtdOne'> ቁጥር 3 </td>";
												echo "<td id ='MezmurtdTwo'>".nl2br($Ku_3)." </td>";
												echo "</tr>";
													
											}
											if($Ku_4!=""){
													
												echo "<tr>";
												echo "<td id ='MezmurtdOne'> ቁጥር 4 </td>";
												echo "<td id ='MezmurtdTwo'>".nl2br($Ku_4)." </td>";
												echo "</tr>";
													
											}
											if($Ku_5!=""){
													
												echo "<tr>";
												echo "<td id ='MezmurtdOne'> ቁጥር 5 </td>";
												echo "<td id ='MezmurtdTwo'>".nl2br($Ku_5)." </td>";
												echo "</tr>";
													
											}
								
									
										echo "</table>";
										?>
							
							
							
							</div> <!-- end bodyContentContainer div -->
							</div> <!-- end bodyContainer div -->
						
						
						
	
						</td>


						<!-- //////////////////////main box ends and start side box/////////////////////////// -->

						<td valign="baseline" id="main_side1">
							<?php if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){ 
								
										if (($_SESSION['valid_user'] == "YES")){
												require ('../HeaderFooter/ZionAsideLog.php');
										}
									}
									else {
										require ('../HeaderFooter/ZionAsideLogIn.php');
									}
									
							?>
							<?php require_once ('../HeaderFooter/ZionAside1.php');?>
							<?php require_once ('../HeaderFooter/ZionAside2.php');?>
							<?php require_once ('../HeaderFooter/ZionAside3.php');?>
						</td>
						<!-- end side box -->


					</tr>

				</table>

			</section>

		</div>
			<?php require ('../HeaderFooter/ZionFooter.php');?>

	</div>
</body>
</html>
	