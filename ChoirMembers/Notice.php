
<?php 	
	if(!isset($_SESSION)){
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
<html
	lang="en">
<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8">
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/Admin.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet"
	type="text/css" />
<link rel="stylesheet" href="../CSSFolder/Navigation.css"
	type="text/css">

<script>	

	function validateForm(register){

		if(""==document.forms.register.notice.value){
			cancelMessage();
			document.getElementById('errNotice').innerHTML =
               "ማስታወቂያውን እባኮ ያስገቡ";
			document.forms.register.notice.focus();
			return false;
		}
	}
	function cancelMessage(){
				
		document.getElementById('errNotice').innerHTML= "";
	
				
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

						<td id="main_text"><?php include_once ("TabNavAdminIndex.php");?>
							<div id="bodyContainer">
								<div id="bodyContentContainer">

									<div id="choir_registration_div">
										<form name="register" id="register" method="post"
											action="processNotice.php" class="register"
											onSubmit="return validateForm(register);">
											
												<fieldset class="legend">
												<legend id="legend5">ማስታወቂያ</legend>
												<?php 
												if(!empty($_SESSION['error_msg_one']))
												{
													echo "<table id='prayer_table'>
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
													echo "<table id='prayer_table1'>
																<tr>
																	<td>
																		<h6 id=\"h6_two\"> ".$_SESSION['error_msg_two']."</h6>
																	</td>
																</tr>
															</table><br>";
													unset($_SESSION['error_msg_two']);
												}
												else{echo"<br>";}
												?>
													
														
														<textarea id ="notice"  maxlength="240" name="notice" rows="5" cols="60"></textarea>
														<input type="hidden" name="OnOff" id="OnOff" value="ON">	
								 						<br/>
								 						<span id="errNotice"></span>
								 						<br/><br/>
													
													
																
											</fieldset>
											<div id="ChoirRegisterSubmitDiv">
												<button id="ChoirSubmit" name="submit" class="button">ማስታወቂያ አስገባ &raquo;</button>
											</div>
										</form>
									</div><!-- end of choir_registration_div -->
								</div><!-- end bodyContentContainer div -->
							</div> <!-- end bodyContainer div -->
						</td><!-- end main_text td box -->


						<!-- //////////////////////main box ends and start side box/////////////////////////// -->

						<td valign="baseline" id="main_side1">
							<?php 	if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){ 

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
