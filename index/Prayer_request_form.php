
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
								
								<div id="main_text_two">
								<h2>Prayer Request</h2>
									<?php 
										if(!empty($_SESSION['error_msg_one']))
										{
											echo "<br><table id='prayer_table'>
													<tr>
														<td>
															<h6 id=\"h6_one\"> ".$_SESSION['error_msg_one']."</h6>
														</td>
													</tr>
													</table>";
											unset($_SESSION['error_msg_one']);
										}?>
										
										<form  name="Myform" id="prayer_form" method="POST" action="ValidateForm.php" class="form"  onSubmit="return validateForm(this);">
									
										<label>Full Name: </label>
											<input size = '32' type="text" id="fname" name="FullName" maxlength='25' value="" class="redline" />
											<span id="errName"></span>
											<br>
												
										<label>Email Address: </label>
											<input size = '32' type="text" id="EAddress" name="EAddress" maxlength='50' value="" class="redline" />
											<span id="errEAddress"></span>											
											<br><br>				
										
										<label></label>&nbsp
											<textarea id = "textarea"  name="textarea" class="redline" placeholder="Please type your request here " rows="10" cols="60"></textarea>	
					 						<br> <span id="errMsg"></span><br>					
										
										
										<input type="submit" id="prayer_submit" name="submit" class="submitbutton" value="Submit" />
										</form>
							
							
		
					 		</div><!-- end of main_text_two div-->
							</div><!-- end of divotion_main_text div-->
							</article>	
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
