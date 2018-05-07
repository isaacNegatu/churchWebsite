<!-- EditChoirMember.php -->

<?php 	if(!isset($_SESSION)){
	session_start();
	date_default_timezone_set('America/Los_Angeles');
}
if ($_SESSION['Admin'] != 'ChoirAdmin'){

	if ($_SESSION['Admin'] != 'AdminAll'){
		header("Location:../includes/SignIn_Choir.php");
		exit();
	}
}
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
	<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css"/>

<script>	

	function validateEditForm(register){

		if(""==document.forms.register.fname.value){
			cancelMessage();
			document.getElementById('errFname').innerHTML =
               "Please enter your first name.";
			document.forms.register.fname.focus();
			return false;
		}

		if(""==document.forms.register.lname.value){
			cancelMessage();
			document.getElementById('errLname').innerHTML =
               "Please enter your last name.";
			document.forms.register.lname.focus();
			return false;
		}
		if(""==document.forms.register.phone.value){
			cancelMessage();
			document.getElementById('errPhone').innerHTML =
               "Please enter your phone number.";
			document.forms.register.phone.focus();
			return false;
		}
		var valphone = ^[2-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}$;
		if(document.register.phone.value.match(valphone)){}
		else{
			cancelMessage();
			document.getElementById('errPhone').innerHTML =
               "wrong format 000-000-0000";
			document.forms.register.phone.focus();
			return false;
		}
		if(""==document.forms.register.street.value){
			cancelMessage();
			document.getElementById('errStreet').innerHTML =
               "Please enter your city.";
			document.forms.register.street.focus();
			return false;
		}

		if(""==document.forms.register.city.value){
			cancelMessage();
			document.getElementById('errCity').innerHTML =
               "Please enter your city.";
			document.forms.register.city.focus();
			return false;
		}
		if(""==document.forms.register.zip.value){
			cancelMessage();
			document.getElementById('errZip').innerHTML =
               "Please enter zipcode.";
			document.forms.register.zip.focus();
			return false;
		}		
		if(""==document.forms.register.email.value){
			cancelMessage();
			document.getElementById('errEmail').innerHTML =
               "Enter email address.";
			document.forms.register.email.focus();
			return false;
		}
	
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

		if(document.register.email.value.match(mailformat)){}
		else
		{
			cancelMessage();
			document.getElementById('errEmail').innerHTML =
               "invalid email";
			document.register.email.focus();
			return false;
		}	
		
	}
	function cancelMessage(){
		document.getElementById('errEmail').innerHTML= "";
		document.getElementById('errFname').innerHTML= "";		
		document.getElementById('errLname').innerHTML= "";
		document.getElementById('errPhone').innerHTML= "";
		document.getElementById('errStreet').innerHTML= "";
		document.getElementById('errCity').innerHTML= "";		
		document.getElementById('errZip').innerHTML= "";
	
				
	}
</script>

</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper">
		<!-- it contains all the page content -->

		<?php require ('../HeaderFooter/ZionHeaderChoir.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table id="mainTable">
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text"><?php include_once ("TabedNavChoirIndex.php");?>
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
										   	$phone = $row["Phone"];
										   	$street = $row["Street"];										   
										   	$city = $row["City"];
										   	$state = $row["State"];
										   	$zip = $row["Zipcode"];
										   	$email = $row["EMail"];
										   	$Mem_mem_stat = $row["Mem_mem_stat"];
										   	$admin = $row["Admin"];
										   	$u_id = $row["U_id"];
										   	
										   		
									   	}
							   		?>
									<?php if($num_results > 0){
											echo"<form name='register' id='register' method='post'
													action='Choir_update.php' class='register'
													onSubmit='return validateEditForm(register);'>
													<fieldset class='legend'>";
											echo"<legend>$fname , $lname's Account Detail</legend>";
											
											if(!empty($_SESSION['error_msg_one']))
											{
												echo "<br><table id='prayer_table'>
																<tr>
																	<td>
																		<h6 id=\"h6_one\"> ".$_SESSION['error_msg_one']."</h6>
																	</td>
																</tr>
															</table><br>";
												unset($_SESSION['error_msg_one']);
											}
											elseif(!empty($_SESSION['error_msg_two']))
											{
												echo "<br><table id='prayer_table1'>
																<tr>
																	<td>
																		<h6 id=\"h6_two\"> ".$_SESSION['error_msg_two']."</h6>
																	</td>
																</tr>
															</table><br>";
												unset($_SESSION['error_msg_two']);
											}
					
											echo"<p><br>
													<label>First Name *</label> 
													<input name='fname' id='fname' type='text' value='$fname'/> 
													<span id='errFname'></span><br> <br>
												</p>";
											echo"<p>
													<label>Last Name *</label> 
													<input name='lname' id='lname' type='text' value='$lname' /> 
													<span id='errLname'></span><br><br>
												</p>";
											echo"<p>
													<label>Phone * </label> 
													<input name='phone' id='phone' type='text' value='$phone' maxlength='12' /> 
													<span id='errPhone'></span><br> <br>
												</p>";
											echo"<p>
													<label >Street* </label> 
													<input name='street' id='street' type='text' value='$street'/> 
													<span id='errStreet'></span><br> <br>
												</p>";
											echo"<p>
													<label>City *</label> 
													<input name='city' id='city' type='text' value='$city'/> 
													<span id='errCity'></span><br> <br>
												</p>";
											echo"<p>
													<label>State * </label> 
													<select class='redline' name='state' id='state' style='width: 210px; height: 28px'>
														<option value='$state'> $state </option>
														<option value='AL'>Alabama</option>
														<option value='AK'>Alaska</option>
														<option value='AZ'>Arizona</option>
														<option value='AR'>Arkansas</option>
														<option value='CA'>California</option>
														<option value='CO'>Colorado</option>
														<option value='CT'>Connecticut</option>
														<option value='DE'>Delaware</option>
														<option value='DC'>District Of Columbia</option>
														<option value='FL'>Florida</option>
														<option value='GA'>Georgia</option>
														<option value='HI'>Hawaii</option>
														<option value='ID'>Idaho</option>
														<option value='IL'>Illinois</option>
														<option value='IN'>Indiana</option>
														<option value='IA'>Iowa</option>
														<option value='KS'>Kansas</option>
														<option value='KY'>Kentucky</option>
														<option value='LA'>Louisiana</option>
														<option value='ME'>Maine</option>
														<option value='MD'>Maryland</option>
														<option value='MA'>Massachusetts</option>
														<option value='MI'>Michigan</option>
														<option value='MN'>Minnesota</option>
														<option value='MS'>Mississippi</option>
														<option value='MO'>Missouri</option>
														<option value='MT'>Montana</option>
														<option value='NE'>Nebraska</option>
														<option value='NV'>Nevada</option>
														<option value='NH'>New Hampshire</option>
														<option value='NJ'>New Jersey</option>
														<option value='NM'>New Mexico</option>
														<option value='NY'>New York</option>
														<option value='NC'>North Carolina</option>
														<option value='ND'>North Dakota</option>
														<option value='OH'>Ohio</option>
														<option value='OK'>Oklahoma</option>
														<option value='OR'>Oregon</option>
														<option value='PA'>Pennsylvania</option>
														<option value='RI'>Rhode Island</option>
														<option value='SC'>South Carolina</option>
														<option value='SD'>South Dakota</option>
														<option value='TN'>Tennessee</option>
														<option value='TX'>Texas</option>
														<option value='UT'>Utah</option>
														<option value='VT'>Vermont</option>
														<option value='VA'>Virginia</option>
														<option value='WA'>Washington</option>
														<option value='WV'>West Virginia</option>
														<option value='WI'>Wisconsin</option>
														<option value='WY'>Wyoming</option>
													</select> <span id='errState'></span><br> <br>
												</p>";
											echo"<p>
													<label>Zip Code *</label> 
     												<input name='zip' id='zip' type='text' value='$zip'/> 
     												<span id='errZip'></span><br> <br>
												</p>";
											echo"<p><br>
									 				<label>Group *</label>
									 				<select name='Mem_mem_stat' id='group' style='width: 210px; height: 28px'>
									 				<option id='zero1' value='$Mem_mem_stat'>$Mem_mem_stat</option>
									 				<option value='CHOIR'>CHOIR</option>
									 				<option value='MEMBER'>CHURCH MEMBER</option>
									 				</select> <span id='errGroup'></span><br> <br>
									 			</p>";
							 				echo"<p>
									 				<label>Admin status * </label>
									 				<select name='admin' id='admin' style='width: 210px; height: 28px'>
									 				<option id='zero1' value='$admin'>$admin</option>
									 				<option value='AdminAll'>AdminAll</option>
									 				<option value='ChoirAdmin'>ChoirAdmin</option>
									 				<option value='ChurchAdmin'>ChurchAdmin</option>
									 				<option value='ChoirMem'>Choir Member</option>
									 				</select> <span id='errAdmin'></span><br> <br>
									 			</p>";
							 				echo"<p>
									 				<input type='hidden' name='id' value=' $id '>
									 				<label>Email: </label>
									 				<input name='email' id='email' type='text' value='$email' />
									 				<input type='hidden' name='pasport' id='pasport' value='INFO'>
									 				<span id='errEmail'></span><br><br>								 				
								 				</p>";
										echo"</fieldset>";
											
										echo" <div id='ChoirRegisterSubmitDiv'>
												<button id='ChoirSubmit' name='submit' class='button'>UPDATE &raquo;</button>
											</div>
										</form>";
										 }?>
									</div><!-- end of choir_registration_div -->
								</div><!-- end bodyContentContainer div -->
							</div> <!-- end bodyContainer div -->
						</td><!-- end main_text td box -->


						<!-- //////////////////////main box ends and start side box/////////////////////////// -->

						<td valign="baseline" id="main_side1">
							<?php	if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){ 
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
							
						</td><!-- end main_side1 td box -->


					</tr>

				</table>

			</section>

		</div>
		<?php require ('../HeaderFooter/ZionFooter.php');?>

	</div>
</body>
</html>
