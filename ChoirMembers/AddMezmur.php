
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
<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css">

<script>	

	function validateForm(register){

		if(""==document.forms.register.title.value){
			cancelMessage();
			document.getElementById('errTitle').innerHTML =
               "Enter the TITLE.";
			document.forms.register.title.focus();
			return false;
		}
		if(""==document.forms.register.nameId.value){
			cancelMessage();
			document.getElementById('errNameId').innerHTML =
				"enter mezmur number.";
			document.forms.register.nameId.focus();
			return false;
		}		
		if(""==document.forms.register.artist.value){
			cancelMessage();
			document.getElementById('errArtist').innerHTML =
               "create password.";
			document.forms.register.artist.focus();
			return false;
		}
		if(""==document.forms.register.date.value){
			cancelMessage();
			document.getElementById('errDate').innerHTML =
               "Please enter date.";
			document.forms.register.date.focus();
			return false;
		}
		var validformat=/^\d{2}\/\d{2}\/\d{4}$/

			if (!validformat.test(document.register.date.value)){
				cancelMessage();
				document.getElementById('errDate').innerHTML =
	            	"Invalid: Format! MM/DD/YYYY";
				document.register.date.focus();
				return false;
			}else{ 
				var monthfield=document.register.date.value.split("/")[0]
				var dayfield=document.register.date.value.split("/")[1]
				var yearfield=document.register.date.value.split("/")[2]
				var dayobj = new Date(yearfield, monthfield-1, dayfield)

				if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
					cancelMessage();
					document.getElementById('errDate').innerHTML =
	               		"Invalid Day, Month, or Year range";
					document.register.date.focus();
					return false;
				}
			}
		if("000"==document.forms.register.fileName.value){
			cancelMessage();
			document.getElementById('errFileName').innerHTML =
               "Please choose fileName status.";
			document.forms.register.fileName.focus();
			return false;
		}
	}
	function cancelMessage(){
		document.getElementById('errTitle').innerHTML= "";		
		document.getElementById('errNameId').innerHTML= "";
		document.getElementById('errArtist').innerHTML= "";
		document.getElementById('errDate').innerHTML= "";
		document.getElementById('errFileName').innerHTML= "";		
	
						
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
						    <form name="register" id="register" method="post" action="processAddMezmur.php" class="register" onSubmit="return validateForm(register);">
           						<fieldset class="legend">
                				<legend id="legend5">Account Details</legend>
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
										?>
                					<p>
                						<label>እርዕስ * </label>
                    					<input name="title" id="title" type="text" />
                    					<span id="errTitle"></span><br><br>
					                    <label>የመዝሙሩ ቁጥር  *</label>
					                    <input name="nameId" id="nameId" type="text"/>
					                    <span id="errNameId"></span><br><br>
					                </p>
					                <p>
					                	<label>የመዝሙሩ ሰጪ  *</label>
					                    <input name="artist" id="artist" type="text"/>
					                    <span id="errArtist"></span><br><br>
					                    <label>ቀን  *</label>
					                    <input name="date" id="date" type="text" placeholder="e.g 08/15/1976"/>
					                    <span id="errDate"></span><br><br>
					                </p>
					                <p>
                    					<label>የመዝሙሩ ባለቤት   * </label>
                    					<select  class="fileName" name="fileName"  id="fileName"  style="width: 210px; height: 28px" >
                    					<option id="zero1" value="000">CHOOSE</option>
    									<option value="YERAS">YERAS</option>
										<option value="YELELA">YELELA</option>
										</select>
										<span id="errFileName"></span><br><br>
                					</p>            				                			
						            
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
