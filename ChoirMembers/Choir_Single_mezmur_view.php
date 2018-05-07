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
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/ChoirMember.css" type="text/css">
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
								
								<?php 
							
										if (isset($_GET['id']) && $_GET['id'] > 0) {
											$id = $_GET['id'];
										}
										//$id = htmlspecialchars(strip_tags($_POST["id"]));
										
										
										// Creating DB Connection
										include ('../includes/connection.php');
										$connection = new createConnection(); //i created a new object
										$connection->connectToDatabase(); // connected to the database
										$connection->selectDatabase();// select database
										$conn = $connection->myconn;
										
										$sql = "SELECT * FROM choir_mezmur WHERE ID=$id";
										
										$result = mysql_query($sql,$conn);
										 
										if(!$result){
											echo( "<p>Unable to query database at this time.</p>" );
											 
										}
											
										$num_results = mysql_num_rows($result);
										$connection->closeConnection();
										
										echo"<br><div id=\"hr_line1\"></div>";
										
										while($row = mysql_fetch_assoc($result)){
										echo "
													<div id=\"Mezmur_namediv\"> ".$row["Title"]."</div><br>								
														<div align=\"center\">
														<audio  controls autoplay>
														<source src=\"../mp3Audio/".$row["Title"].".mp3\" type=\"audio/mpeg\">
														Your browser does not support this audio format.
														</audio></div>
													";
										
										
										
										$a= $row["FileName"];
										$b= $row["NameID"];
										$file =$a."_".$b;
										
										echo "<div id=\"mezmurImageDiv1\">
					 						<p id=\"mezmurImageP\"><img src=\"ChoirMezmur/".$file.".png\" id=\"mezmurImageID\" alt=\"Choir song\"></p>
					 					</div>";
										echo"	<br><div id=\"Mezmur_pdf_form_div\">
													<div id=\"Mez_left\"><img id=\"Mez_image1\" src=\"../Image/icon_pdf.jpg\"/><a id=\"mez_lebel1\" href=\"ChoirMezmur/".$file.".pdf\" download=\"newfilename\">Download the pdf</a></div>
													<div id=\"Mez_right\"><img id=\"Mez_image2\" src=\"../Image/word-icon.gif\"/><a id=\"mez_lebel2\" href=\"ChoirMezmur/".$file.".doc\" download=\"newfilename\">Download the word</a></div>
												</div>";
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
