<!-- EditChoirMember.php -->

<?php 
	/*if(!isset($_SESSION)){
		session_start();
		date_default_timezone_set('America/Los_Angeles');
	}		

	$valid = $_SESSION['Admin'];

	if ($valid !== "AdminAll"){
		
		if($valid !== "ChoirAdmin"){
				header("Location:../includes/SignIn_Choir.php");
				exit();
		}
	}*/
				
?>




<!doctype html>
<html lang="en">
<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8">
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/Admin.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css">

<script>	

	function validateEditForm(register){

		if(""==document.forms.register.userID.value){
			cancelMessage();
			document.getElementById('errUserId').innerHTML =
               "Enter user name.";
			document.forms.register.userID.focus();
			return false;
		}
		if(""==document.forms.register.password1.value){
			cancelMessage();
			document.getElementById('errPass1').innerHTML =
               "create password.";
			document.forms.register.password1.focus();
			return false;
		}

		if(""==document.forms.register.password2.value){
			cancelMessage();
			document.getElementById('errPass2').innerHTML =
               "confirm password.";
			document.forms.register.password2.focus();
			return false;
		}
		if(document.forms.register.password1.value != document.forms.register.password2.value){
			cancelMessage();
			document.getElementById('errPass2').innerHTML =
               "password doesn't match.";
			document.forms.register.password2.focus();
			return false;
		}
	}
	function cancelMessage(){
		document.getElementById('errUserId').innerHTML= "";
		document.getElementById('errPass1').innerHTML= "";
		document.getElementById('errPass2').innerHTML= "";
					
	}
</script>


</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper"><!-- it contains all the page content -->

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
								
								<div id="choir_registration_div">
								<?php 
									if (isset($_GET['id']) && $_GET['id'] > 0) {
 										$id = $_GET['id'];
 									
 									}else{
										$id =$_SESSION['priv_user_id'];
									}
									
									// Creating DB Connection
									include ('../includes/connection.php');
									$connection = new createConnection(); //i created a new object
									$connection->connectToDatabase(); // connected to the database
									$connection->selectDatabase();// closed connection
									$conn = $connection->myconn;
									
									
									//	$sql = "SELECT * FROM choirmember " .
									//	"WHERE ID = $id";
									
									
									$sql = "SELECT * FROM choirmember
									INNER JOIN church_val ON choirmember.ID = church_val.F_K
									WHERE choirmember.ID= $id";
									
									$result = mysql_query($sql,$conn);
									
									if(!$result){
										echo( "<p>Unable to query database at this time.</p>" );
									}
										
									$num_results = mysql_num_rows($result);
									$connection->closeConnection();
									
									while( $row = mysql_fetch_assoc($result)){
									
										$id = $row["ID"];
										$fname = $row["FName"];
										$lname = $row["LName"];
										$Pass = $row["Pass"];
										$Mem_mem_stat = $row["Mem_mem_stat"];
										$admin = $row["Admin"];
										$u_id = $row["U_id"];
										$Mid = $row["Mem_id"];
										$pa = sha1('$fname');
											
									}						
									
					 			?>
					 			<?php if($num_results > 0){
					 				
					 				echo"<form name='register' id='register' method='post' action='Choir_update.php' class='register'
													onSubmit='return validateEditForm(register);'>
					 						<fieldset class='legend'>
					 						<legend id='legend5'> $fname , $lname's RESET PASSWORD</legend>";
							 				if(!empty($_SESSION['error_msg_one']))
							 				{
							 					echo "<table id='prayer_table'>
																		<tr>
																			<td>
																				<h6 id=\"h6_one\"> ".$_SESSION['error_msg_one']."</h6>
																			</td>
																		</tr>
																	</table>";
							 					unset($_SESSION['error_msg_one']);
							 				}
							 				elseif(!empty($_SESSION['error_msg_two']))
							 				{
							 					echo "<table id='prayer_table1'>
																		<tr>
																			<td>
																				<h6 id=\"h6_two\"> ".$_SESSION['error_msg_two']."</h6>
																			</td>
																		</tr>
																	</table>";
							 					unset($_SESSION['error_msg_two']);
							 				}
					 				
					 				echo"<p>
							 				<label>user ID *</label>
							 				<input name='userID' id='userID' type='text' value='$u_id' maxlength='25' />
							 				<span id='errUserId'></span><br><br>
							 				</p>";
					 				
					 				echo"<p>
							 				<label>Password* </label>
							 				<input name='password1' id='password1' type='password'/>
               								<span id='errPass1'></span><br/><br>
							 				<input type='hidden' name='id' value=' $id '>
							 				<input type='hidden' name='mid' value=' $Mid '>
							 				<input type='hidden' name='Member_stat' value=' $Mem_mem_stat '>
							 				<input type='hidden' name='admin' value=' $admin '>
							 				<label>Repeat Password* </label>
							 				<input name='password2' id='password2' type='password'/>
							 				<span id='errPass2'></span><br><br>							 				
					 					</p><br>
					 				</fieldset>"; 
					 				
					 				echo"<div id='ChoirRegisterSubmitDiv'>
												<button id='ChoirSubmit' name='submit' class='button'>UPDATE &raquo;</button>
											</div>
									</form>";
													}?>
					 			             
							            	
								</div>
							</div> <!-- end bodyContentContainer div -->
							</div> <!-- end bodyContainer div -->
						</td><!-- end of main_text - which contains the main section of the page -->


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
							
						</td><!-- end of main_side1 - which contains the side section  -->
						<!-- end side box -->


					</tr> <!-- end of mainTr -->

				</table><!-- end of mainTable - the table which contains the middle section -->

			</section><!--  end of main_section section wrapper -->

		</div><!-- end of sec_asi_div div -->
		
		<?php require ('../HeaderFooter/ZionFooter.php');?>

	</div><!-- end of main_wrapper div -->
</body>
</html>
