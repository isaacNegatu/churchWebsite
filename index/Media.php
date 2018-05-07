
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
<link href="../CSSFolder/Media.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />

</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper"><!-- the contains all the the page content -->

		<?php require ('../HeaderFooter/ZionHeader.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table>
					<tr>
						<!-- ////////////////////////////// main box start////////////////////////////////// -->
						<td id="main_text">							
							<article>
								<div id="divotion_main_text">							
								<div id="font3"></div>
								
								<?php

								include ('../includes/connection.php');								
								$connection = new createConnection(); //i created a new object
								$connection->connectToDatabase(); // connected to the database
						    	$connection->selectDatabase();// closed connection
								$conn = $connection->myconn;
						
								$sql = "SELECT * FROM sermon";
								
						 		$result = mysql_query($sql,$conn);
						
						   		if(!$result){
						     		echo( "<p>Unable to query database at this time.</p>" );
						     	}
						     	
						   		$num_results = mysql_num_rows($result);
								$connection->closeConnection();
								
								echo "<table id='MidiaTable'>
										<tr id = 'media_tr1'>
											<td id = 'td1'></td>
											<td id = 'td2'>Teacher</td>
											<td id = 'td3'>Title</td>
											<td id = 'td4'>Play</td>
											
										</tr>";
						 
						   		while( $row = mysql_fetch_assoc($result)){
						 	  
									
									
									echo "<tr id = 'tr2'>";
									echo "<td id ='td5'>".$row['Num']."</td>";
									echo "<td id ='td6'>".$row['Artist']."</td>";
									echo "<td id ='td7'>".$row['Title']."</td>";
									echo "<td id ='td8'>
										 	<form name='register' id='register1' method='post' action=".$_SERVER['PHP_SELF']." class='register'>
							 					<input type='hidden' name='id' value=".$row['ID'].">
							 					<button id='row3' name='submit' class='button'>PLAY</button>
											</form>
											</td>";
								//	echo "<td id ='td8'><a id='row3' href='Choir_view.php?id=".$row['ID']."'> PLAY</a></td>";
									echo "</tr>";
									
								}
								
								echo "</table>";
								
							
								if(isset($_POST["submit"])){
									$id = htmlspecialchars(strip_tags($_POST["id"]));
									
									
									// Creating DB Connection
									include ('../includes/connection.php');
									$connection = new createConnection(); //i created a new object
									$connection->connectToDatabase(); // connected to the database
									$connection->selectDatabase();// select database
									$conn = $connection->myconn;
									
									$sql = "SELECT * FROM sermon WHERE ID=$id";
									
									$result = mysql_query($sql,$conn);
								 
									if(!$result){
										echo( "<p>Unable to query database at this time.</p>" );
										 
									}
									
									$num_results = mysql_num_rows($result);
									$connection->closeConnection();
							
									while( $row = mysql_fetch_assoc($result)){
										echo "<div id='mediaAudio1'>
												 <div id='namediv'> ".$row["Artist"]." ( ".$row["Title"].")</div><br>								
												 <div align='center'>
													<audio  controls autoplay>
												    	<source src='../mp3Audio/".$row["Audio"].".mp3' type='audio/mpeg'>
														Your browser does not support this audio format.
													</audio>
												</div>";
									}
															
								}
					 			?>
					 		
								</div><!-- end of divotion_main_text div-->
							</article>	
						</td>

						<!-- //////////////////////main box ends and start side box/////////////////////////// -->

						<td valign="baseline" id="main_side1">
								<?php if(isset($_SESSION['valid_user']) && ($_SESSION['valid_user']!="")){ 
								
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
						</td><!-- end side box -->
					</tr>
				</table>
			</section>
		</div>
		<?php require ('../HeaderFooter/ZionFooter.php');?>

	</div>
</body>
</html>
