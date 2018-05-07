<!-- AddSermon.php -->

<?php 
	if(!isset($_SESSION)){
		session_start();
		date_default_timezone_set('America/Los_Angeles');
	}		

	$valid = $_SESSION['Admin'];

	if ($valid !== "AdminAll"){
		
		if($valid !== "ChoirAdmin"){
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
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css"/>

<script>	

	function validateForm(register){


		if(""==document.forms.register.artist.value){
			cancelMessage();
			document.getElementById('errArtist').innerHTML =
               "Please enter Preacher name.";
			document.forms.register.artist.focus();
			return false;
		}
		if(""==document.forms.register.title.value){
			cancelMessage();
			document.getElementById('errTitle').innerHTML =
				"Please enter title.";
			document.forms.register.title.focus();
			return false;
		}
		if(""==document.forms.register.audio.value){
			cancelMessage();
			document.getElementById('errAudio').innerHTML =
				"Please enter file name.";
			document.forms.register.audio.focus();
			return false;
		}
		if(""==document.forms.register.dateOfService.value){
			cancelMessage();
			document.getElementById('errDOS').innerHTML =
               "Please enter sermon date.";
			document.forms.register.dateOfService.focus();
			return false;
		}

		var validformat=/^\d{2}\/\d{2}\/\d{4}$/

		if (!validformat.test(document.register.dateOfService.value)){
			cancelMessage();
			document.getElementById('errDOS').innerHTML =
            	"Invalid: Format! MM/DD/YYYY";
			document.register.dateOfService.focus();
			return false;
		}else{ 
			var monthfield=document.register.dateOfService.value.split("/")[0]
			var dayfield=document.register.dateOfService.value.split("/")[1]
			var yearfield=document.register.dateOfService.value.split("/")[2]
			var dayobj = new Date(yearfield, monthfield-1, dayfield)

			if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
				cancelMessage();
				document.getElementById('errDOS').innerHTML =
               		"Invalid Day, Month, or Year range";
				document.register.dateOfService.focus();
				return false;
			}
		}
			
		
	}
	function cancelMessage(){
		document.getElementById('errArtist').innerHTML= "";
		document.getElementById('errTitle').innerHTML= "";
		document.getElementById('errDOS').innerHTML= "";
		document.getElementById('errAudio').innerHTML= ""
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
						<?php include_once ("TabNavAdminIndex.php");?>
							<div id="bodyContainer">
							<div id="bodyContentContainer">
								
						<div id="choir_registration_div">	
												
						    <form name="register" id="register" method="post" action="processAddSermon.php" class="register" onSubmit="return validateForm(register);">
           						<fieldset class="legend">
                				<legend id="legend">ADD SERMON</legend>
	                				<?php 
										if(isset($_GET['Message0'])){
											echo "<table id='prayer_table'>
														<tr>
															<td>
																<h6> ".$_GET['Message']."</h6>
															</td>
														</tr>
													</table><br>";
										}							
									?>	
	                			
                					<br><p>
                            			<label>ሰባኪ / አስተማሪ<span>*</span> </label>
                    					<input name="artist" id="artist" type="text" />
                    					<span id="errArtist"></span><br><br>
					                    <label>ርዕስ<span>*</span></label>
					                    <input name="title" id="title" type="text"/>
					                    <span id="errTitle"></span><br><br>
					                </p>
					       			<p>
                    					<label>የአገልግሎት ቀን <span>*</span></label>
                  						<input name="dateOfService" class="year" type="text" placeholder="e.g 08/15/1976" size="10" maxlength="10"/>
                  						<span id="errDOS"></span><br><br>
                  						<label>የዶሴ ቁጥር <span>*</span></label>
					                    <input name="audio" id="audio" type="text"/>
					                    <span id="errAudio"></span><br><br>
                   						 
                					</p><br>
                
            					</fieldset>
            														
            				
            					<div id="ChoirRegisterSubmitDiv"><button id="ChoirSubmit" name="submit" class="button">Register &raquo;</button></div>
        						</form>
						


						</div>
								

							
							
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
