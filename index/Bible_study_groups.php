
<?php if(!isset($_SESSION)){
	
	session_start();
	date_default_timezone_set('America/Los_Angeles');
		
}?>



<!doctype html>
<html
	lang="en">
<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8">
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/mainOne.css" rel="stylesheet" type="text/css" /> 
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />

</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper"><!-- the contains all the the page content -->

		<?php require ('../HeaderFooter/ZionHeader.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table id="mainTable">
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
						
						<div id="bodyContainer">
							<div id="bodyContentContainer">
								
								
							<?php

							  // Creating DB Connection
								include ('../includes/connection.php');
								
								$connection = new createConnection(); //i created a new object
								$connection->connectToDatabase(); // connected to the database
						    	$connection->selectDatabase();// closed connection
								$conn = $connection->myconn;
						
								$sql = "SELECT * FROM bible_study_groups";
								
						 		$result = mysql_query($sql,$conn);
						
						   		if(!$result){
						     		echo( "<p>Unable to query database at this time.</p>" );
						     	}
						     	
						   		$num_results = mysql_num_rows($result);
								$connection->closeConnection();
								
								
						 
						   		while( $row = mysql_fetch_assoc($result)){

									echo "<table id='BibleStudyViewtable';>
										<tr id=\"B_S_tr\">
											<th colspan='2' id='BibleStudy_groupName'>".$row['Name']."</th>
										</tr>";
									
									echo "<tr>";
									echo "<td id ='B_S_tdTwo'>DATE AND TIME</td>";
									echo "<td id ='B_S_tdThree'>".$row['Date']."</td>";
									echo "</tr>";
									
									echo "<tr>";
									echo "<td id ='B_S_tdTwo'>LOCATION</td>";
									echo "<td id ='B_S_tdThree'>".$row['Street']."</br>
											".$row['City']." , ".$row['State']." , ".$row['Zip']."
										  </td>";
									echo "</tr>";
									
									echo "<tr>";
									echo "<td id ='B_S_tdTwo'>LEADER</td>";
									echo "<td id ='B_S_tdThree'>".$row['Leader']."</td>";
									echo "</tr>";
									
									echo "<tr>";
									echo "<td id ='B_S_tdTwo'>PARTICIPANTS</td>";
									echo "<td id ='B_S_tdThree'>".$row['M1']."</td>";
									echo "</tr>";
									
									if($row['M2']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M2']."</td>";
										echo "</tr>";
									}
									if($row['M3']!=""){									
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M3']."</td>";
										echo "</tr>";
									}
									if($row['M4']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M4']."</td>";
										echo "</tr>";
									}
									if($row['M5']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M5']."</td>";
										echo "</tr>";
									}
									if($row['M6']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M6']."</td>";
										echo "</tr>";
									}
									if($row['M7']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M7']."</td>";
										echo "</tr>";
									}
									if($row['M8']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M8']."</td>";
										echo "</tr>";
									}
									if($row['M9']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M9']."</td>";
										echo "</tr>";
									}
									if($row['M10']!=""){
										echo "<tr>";
										echo "<td id ='B_S_tdTwo'> </td>";
										echo "<td id ='B_S_tdThree'>".$row['M10']."</td>";
										echo "</tr>";
									}	
									
								
									echo "</table>";
									
								}
							
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
