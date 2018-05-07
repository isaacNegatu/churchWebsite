
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

		if(""==document.forms.register.agelglot_date.value){
			cancelMessage();
			document.getElementById('errAgelglot_date').innerHTML =
               "የሚገለገልበትን ቀን አስገባ";
			document.forms.register.agelglot_date.focus();
			return false;
		}
		if(""==document.forms.register.mezmur_one.value){
			cancelMessage();
			document.getElementById('errMezmur_one').innerHTML =
               "የመጀመሪያውን መዝሙር አስገባ";
			document.forms.register.mezmur_one.focus();
			return false;
		}		
		if(""==document.forms.register.mezOneId.value){
			cancelMessage();
			document.getElementById('errMezOneId').innerHTML =
				"የመዝሙሩን ቁጥር አስገባ";
			document.forms.register.mezOneId.focus();
			return false;
		}
		if(""!=document.forms.register.mezOneId.value){

				if(isNaN(document.forms.register.mezOneId.value)){
					cancelMessage();
					document.getElementById('errMezOneId').innerHTML =
						"የመዝሙሩን ቁጥር ብቻ ያስገቡ";
					document.forms.register.mezOneId.focus();
					return false;
				}			
		}		
		if(""!=document.forms.register.mezTwoId.value){

			if(isNaN(document.forms.register.mezOneId.value)){
				cancelMessage();
				document.getElementById('errMezTwoId').innerHTML =
					"የመዝሙሩን ቁጥር ብቻ ያስገቡ";
				document.forms.register.mezTwoId.focus();
				return false;
			}			
		}				
		if(""==document.forms.register.mezfileNameOne.value){
			cancelMessage();
			document.getElementById('errMezfileName').innerHTML =
               "መዝሙሩ የራስ ነው ወይስ የሌላ.";
			document.forms.register.mezfileNameOne.focus();
			return false;
		}
		var validformat=/^\d{2}\/\d{2}\/\d{4}$/

		if (!validformat.test(document.register.agelglot_date.value)){
			cancelMessage();
			document.getElementById('errAgelglot_date').innerHTML =
            	"Invalid: Format! MM/DD/YYYY";
			document.register.agelglot_date.focus();
			return false;
		}else{ 
			var monthfield=document.register.agelglot_date.value.split("/")[0]
			var dayfield=document.register.agelglot_date.value.split("/")[1]
			var yearfield=document.register.agelglot_date.value.split("/")[2]
			var dayobj = new Date(yearfield, monthfield-1, dayfield)

			if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
				cancelMessage();
				document.getElementById('errAgelglot_date').innerHTML =
               		"Invalid Day, Month, or Year range";
				document.register.agelglot_date.focus();
				return false;
			}
		}
	}
	function cancelMessage(){
		
		document.getElementById('errMezmur_one').innerHTML= "";
		document.getElementById('errMezOneId').innerHTML= "";		
		document.getElementById('errMezfileName').innerHTML= "";		
		document.getElementById('errAgelglot_date').innerHTML= "";
	
				
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
											action="processAddNotice.php" class="register"
											onSubmit="return validateForm(register);">
											
												<fieldset class="legend">
												<legend id="legend5">ቀን</legend>
												<?php 
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
												?>
													<p>
														<label>ቀን *</label> 
														<input name="agelglot_date" type="text" placeholder="e.g 08/15/1976" size="10" maxlength="10" /> 
														<span id="errAgelglot_date"></span><br> <br>
													</p>
													 <p>
				                    					<label>የሚጠና/የተጠና  * </label>
				                    					<select  name="status" id="status"  style=" width: 210px; height: 28px" >
				                    					<option id="zero1" value="YEMITENA">የሚጠና</option>
				    									<option value="YETETENA">የተጠና</option>
														</select>
														<span id='errFileName'></span><br><br>
				                					</p> <br/>
																
											</fieldset>
											<fieldset class="legend">
												<legend id="legend5">መዝሙር አንድ</legend>
													<p>
				                						<label>መዝሙር አንድ* </label>
				                    					<input name="mezmur_one" id="mezmur_one" type="text" />
				                    					<span id="errMezmur_one"></span><br><br>
									                    <label>የመዝሙሩ ቁጥር  *</label>
									                    <input name="mezOneId" id="mezOneId" type="text"/>
									                    <span id="errMezOneId"></span><br><br>
									                </p>
									                <p>
				                    					<label>የመዝሙሩ ባለቤት   * </label>
				                    					<select  class="mezfileNameOne" name="mezfileNameOne"  id="mezfileNameOne"  style="width: 210px; height: 28px" >
				                    					<option id="zero1" value="">CHOOSE</option>
				    									<option value="የራስ">የራስ</option>
														<option value="የሌላ">የሌላ</option>
														</select>
														<span id="errMezfileName"></span><br><br>
				                					</p> 			
											</fieldset>
											<fieldset class="legend">
												<legend id="legend5">መዝሙር ሁለት</legend>
												
													<p>
				                						<label>መዝሙር ሁለት* </label>
				                    					<input name="mezmur_two" id="mezmur_two" type="text" />				                    					
									                    <input type="hidden" name="action" id="action" value="ADD">
				                    					<br><br>
									                    <label>የመዝሙሩ ቁጥር  *</label>
									                    <input name="mezTwoId" id="mezTwoId" type="text"/>
									                    <span id="errMezTwoId"></span>
									                    <br><br>
									                </p>
									                <p>
				                    					<label>የመዝሙሩ ባለቤት   * </label>
				                    					<select  class="mezfileNameTwo" name="mezfileNameTwo"  id="mezfileNameTwo"  style="width: 210px; height: 28px" >
				                    					<option id="zero1" value="">CHOOSE</option>
				    									<option value="የራስ">የራስ</option>
														<option value="የሌላ">የሌላ</option>
														</select>
														<span id="errFileName"></span><br><br>
				                					</p> 												

											</fieldset>


											<div id="ChoirRegisterSubmitDiv">
												<button id="ChoirSubmit" name="submit" class="button">Register &raquo;</button>
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
