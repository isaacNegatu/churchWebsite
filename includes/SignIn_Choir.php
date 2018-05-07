
<?php if(!isset($_SESSION)){
	session_start();

		
}?>



<!doctype html>
<html
	lang="en">
<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8">
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/ChoirSignIn.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />


<script>
function validateForm(SignInChoir){

	if(""==document.forms.SignInChoir.user.value){
		cancelMessage();
		document.getElementById('errUserId').innerHTML =
			"enter your user name.";
		document.forms.SignInChoir.user.focus();
		return false;
	}
	if(""==document.forms.SignInChoir.password.value){
		cancelMessage();
		document.getElementById('errPass').innerHTML =
           "enter your password.";
		document.forms.SignInChoir.password.focus();
		return false;
	}

	
}
function cancelMessage(){
	document.getElementById('errUserId').innerHTML= "";
	document.getElementById('errPass').innerHTML= "";
	
			
}

</script>

</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper"><!-- the contains all the the page content -->

		<?php require ('../HeaderFooter/ZionHeaderChoirMain.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table id="mainTable">
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
							<div class="Header">
           						<span>Welcome</span>           					
        					</div>
        					<hr class="hr_line3">
						
						 	<div class="MainActionContainer">
						 	
						 		<div class="GroupXLargeMargin">
						 			<span>Type your user name and password.</span>
    							</div>
    							<form name="SignInChoir" id="SignInChoir" class="SignInChoir" action="test.php" method="post" onSubmit="return validateForm(SignInChoir);">
		                   			<p>	<br/>	               
					                 <label class="Label"> User Name: </label>&nbsp&nbsp 
					                 <input class="input" type="text" id="user" name="user" size="35"/>
					                 <?php 
										if(!empty($_SESSION['error_msg_one']))
										{
											echo "<span>".$_SESSION['error_msg_one']."</span>";
											
											unset($_SESSION['error_msg_one']);
										}									
										?>
					                 <span id="errUserId"></span><br><br>
					                 <label class="Label">Password: </label>&nbsp&nbsp  
					                 <input class="input" type="password" name="password" size="31"/>
					                  <?php 
										if(!empty($_SESSION['error_msg_two']))
										{
											echo "<span> ".$_SESSION['error_msg_two']."</span>";
											
											unset($_SESSION['error_msg_two']);
										}									
										?>
					                 <span id="errPass"></span><br><br>
					                 <input type="submit" value="Submit" name="submit"  />
			                 		</p>			               		      
		             		 	</form><br>
		             		 	<?php 
									if(!empty($_SESSION['error_msg_three']))
									{
										echo "<br><table id='prayer_table'>
												<tr>
													<td>
														<h6 id=\"h6_one\"> ".$_SESSION['error_msg_three']."</h6>
													</td>
												</tr>
												</table>";
										unset($_SESSION['error_msg_three']);
										}
									
									?>
						
				
   							
   							</div><!-- end of MainActionContainer div -->
						
						
	
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
