
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



<!doctype html>
<html
	lang="en">
<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8">
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/ChoirMember.css" type="text/css">
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css">

</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper"><!-- the contains all the the page content -->

		<?php require ('../HeaderFooter/ZionHeaderChoir.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table id="mainTable">
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
						<?php include_once ("TabedNavChoirIndex.php");?>
							<div id="bodyContainer">
							<div id="bodyContentContainer">
								<h2 id="ChoirView_h2"> የሌላ መዝሙሮች </h2> <br><br>
								
							    <?php

								  // Creating DB Connection
									include ('../includes/connection.php');
									
									$connection = new createConnection(); //i created a new object
									$connection->connectToDatabase(); // connected to the database
							    	$connection->selectDatabase();// closed connection
									$conn = $connection->myconn;
									
							
									$sql = "SELECT * FROM choir_mezmur WHERE FileName='YELELA'";
									
							 		$result = mysql_query($sql,$conn);
							
							   		if(!$result){
							     		echo( "<p>Unable to query database at this time.</p>" );
							     	}
							     	
							   		$num_results = mysql_num_rows($result);
									$connection->closeConnection();
									
									echo "<table id='ChoirViewtable2';>";
							 
							   		while( $row = mysql_fetch_assoc($result)){
							 	  
										
										
										echo "<tr>";
										echo "<td id ='tdOne2'> ".$row['NameID']." )</td>";
										echo "<td id ='tdTwo2'>".$row['Title']." </td>";
										echo "<td id ='tdThree2'><a id='row3' href='Choir_Single_mezmur_view.php?id=".$row['ID']."'>VIEW</a></td>";
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
