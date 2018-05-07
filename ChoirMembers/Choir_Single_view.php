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
<link href="../CSSFolder/ChoirMember.css" rel="stylesheet" type="text/css" />
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
								
									<h2 id="ChoirView_h2"> የኳየር አባል መረጃ </h2> <br><br>
									
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
											
										//	@$sql = "SELECT * FROM choirmember " .
										//			"WHERE ID = $id";
											
											$sql = "SELECT * FROM choirmember
											INNER JOIN church_val ON choirmember.ID = church_val.F_K
											WHERE choirmember.ID= $id";
											$result = mysql_query($sql,$conn);
											 
											if(!$result){
												echo( "<p>Unable to query database at this time.</p>" );
												 
											}
											
											@$num_results = mysql_num_rows($result);
											$connection->closeConnection();
											
											
											//if there is a value in the result
											if($num_results > 0){
												
												while( $row = mysql_fetch_assoc($result)){
													
															echo "	<table id='ChoirViewtable1';>
																		<tr id ='ViewtrOne'>
																			<th  id='ViewText1'>".$row["FName"].", ".$row["LName"]." Profile</th>
																		</tr>";
		
															echo "		<tr>
																			<td id ='ViewtdTwo'>
																		  		
																		   		<label>Full Name : </label><data> ".$row["FName"]."  ".$row["LName"]."</data><br>
																   				<label>Phone : </label><data> ".$row["Phone"]."</data><br>
																	   			<label>Email : </label><data> ".$row["EMail"]."</data><br>
																		   		<label>Street : </label><data> ".$row["Street"]."</data><br>
																		   		<label>&nbsp </label><data>".$row["City"].", ".$row["State"]."  ".$row["Zipcode"]."</data><br>";
			
													if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){
														if (($_SESSION['Mem_mem_stat'] == "CHOIR")&&(($_SESSION['Admin'] == "ChoirAdmin")||($_SESSION['Admin'] == "AdminAll"))){

															echo" 				<label>ID : </label><data> ".$row['ID']."</data><br>
															  					
																			</td>
																		</tr>
																	</table>
																	<table id='ChoirViewtable3'>
																			<tr id ='ViewtrOne'>
																			<td id ='EditId'><a id='row1' href='EditChoirMember.php?id=".$row['ID']."'> EDIT </a></td>
																			<td id ='ResetID'><a id='row1' href='Choir_Password.php?id=" . $row['ID'] . "'>RESET PASSWORD</a></td>
																			<td id ='DelitID'><a id='row1' href='Choir_Delete.php?id=" . $row['ID'] . "'>DELETE</a></td>
																		</tr>
																	</table>";
														}else{
															echo" 			</td>
																		</tr>
																	</table>";
														}
														

													}else {
																										
															echo"			</td>		
																		</tr>
																</table>";
													}
												}
											}
										
										
											if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){
												if (($_SESSION['Mem_mem_stat'] == "CHOIR")&&(($_SESSION['Admin'] == "ChoirAdmin")||($_SESSION['Admin'] == "AdminAll"))){
										
												echo " <table id='important_table' >
													<tr id='important_tr1'>
														<td  id='important_td3' colspan='2'>
															<img src='../Image/Warning.png' >&nbsp&nbsp&nbsp&nbspIMPORTANT MESSAGE&nbsp&nbsp&nbsp&nbsp<img src='../Image/Warning.png' >
														</td>
													</tr>
													<tr id='important_tr2'>
														<td id='important_td1'>Edit Button</td>
														<td id='important_td2'>First Name<br/>Last Name<br/> Phone<br/>Address<br/>E-Mail<br/>User Name<br/>Group (Choir or Member)<br/> Administrative type</td>												
													</tr>
													<tr id='important_tr3'>
														<td id='important_td1'>RESET Button</td>
														<td id='important_td2'>  Password</td>												
													</tr>
												
												  </table>";
												 }
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

