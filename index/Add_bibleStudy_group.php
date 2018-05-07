
<?php 	

	if(!isset($_SESSION)){
		session_start();
		date_default_timezone_set('America/Los_Angeles');
	}
	if ($_SESSION['Admin'] != 'ChurchAdmin'){
	
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
<link href="../CSSFolder/mainOne.css" rel="stylesheet" type="text/css" /> 
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />


<script>	

	function validateForm(BibleStudy_register){

		if(""==document.forms.BibleStudy_register.name.value){
			cancelMessage();
			document.getElementById('errName').innerHTML =
               "የግሩፑን ስም ያስገቡ";
			document.forms.BibleStudy_register.name.focus();
			return false;
		}
		if(""==document.forms.BibleStudy_register.leader.value){
			cancelMessage();
			document.getElementById('errLeader').innerHTML =
               "የመሪውን ስም ያስገቡ ";
			document.forms.BibleStudy_register.leader.focus();
			return false;
		}
		if("000"==document.forms.BibleStudy_register.day.value){
			cancelMessage();
			document.getElementById('errDay').innerHTML =
               "ቀኑን ያስገቡ ";
			document.forms.BibleStudy_register.day.focus();
			return false;
		}
		if("000"==document.forms.BibleStudy_register.hour.value){
			cancelMessage();
			document.getElementById('errDay').innerHTML =
               "ሰአቱን ያስገቡ ";
			document.forms.BibleStudy_register.hour.focus();
			return false;
		}
		if("000"==document.forms.BibleStudy_register.shift.value){
			cancelMessage();
			document.getElementById('errDay').innerHTML =
               "ጠዋት ወይን ማታ መሆኑን ይምረጡ";
			document.forms.BibleStudy_register.shift.focus();
			return false;
		}
		if(""==document.forms.BibleStudy_register.street.value){
			cancelMessage();
			document.getElementById('errStreet').innerHTML =
               "የቤት አድራሻውን ያስገቡ ";
			document.forms.BibleStudy_register.street.focus();
			return false;
		}
		if(""==document.forms.BibleStudy_register.member1.value){
			cancelMessage();
			document.getElementById('errMem').innerHTML =
               "የአባላቱን ስም ያስገቡ ";
			document.forms.BibleStudy_register.member1.focus();
			return false;
		}
	}
	function cancelMessage(){
		document.getElementById('errName').innerHTML= "";		
		document.getElementById('errLeader').innerHTML= "";
		document.getElementById('errDay').innerHTML= "";
		document.getElementById('errStreet').innerHTML= "";
		document.getElementById('errMem').innerHTML= "";
	}

</script>



</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper"><!-- the contains all the the page content -->

		<?php require ('../HeaderFooter/ZionHeader.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table id="mainTable">
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
							<div id="bodyContainer">
							<div id="bodyContentContainer">
								
						<div id="choir_registration_div">							
						    <form name="BibleStudy_register" id="BibleStudy_register" method="post" action="processAddBibleStudy.php" class="BibleStudy_register" onSubmit="return validateForm(BibleStudy_register);">
           						<fieldset class="legend">
                				<legend id="legend5">የመጽሐፍ ቅዱስ ጥናት ቡድን መመዝጊቢያ</legend>
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
										}
										elseif(!empty($_SESSION['error_msg_two']))
										{
											echo "<br><table id='prayer_table1'>
													<tr>
														<td>
															<h6 id=\"h6_two\"> ".$_SESSION['error_msg_two']."</h6>
														</td>
													</tr>
													</table>";
											unset($_SESSION['error_msg_two']);
										}
									?>
                					<p>
                						<label>የቡድኑ ስም * </label>
                    					<input name="name" id="name" type="text" />
                    					<span id="errName"></span><br><br>
					                    <label>እቡድኑ መሪ  *</label>
					                    <input name="leader" id="leader" type="text"/>
					                    <span id="errLeader"></span><br><br>
					                </p>
					                <p>
					                	<label>የሚገናኙበት ቀን *</label>
					                    <select id="day" name="day" style="font-size:10px; width: 70px; height: 27px">
											<option id="zero2" value="000">ቀን</option>
												<option value="MONDAY">MONDAY
												<option value="TUESDAY">TUESDAY												
												<option value="WEDNESDAY">WEDNESDAY
												<option value="THURSDAY">THURSDAY
												<option value="FRIDAY">FRIDAY
												<option value="SATURDAY">SATURDAY	
												<option value="SUNDAY">SUNDAY
											</select>
											<select id="hour" name="hour" style="font-size:10px; width: 90px; height: 27px">
												<option id="zero2" value="000">ሰአት</option>
													<option value="8:00AM to 9:30AM">08:00AM - 09:30AM
													<option value="8:30AM to 10:00AM">08:30AM - 10:00AM
													<option value="9:00AM to 10:30AM">09:00AM - 10:30AM
													<option value="9:30AM to 11:00AM">09:30AM - 11:00AM
													<option value="10:00AM to 11:30AM">10:00AM - 11:30AM
													<option value="10:30AM to 12:00PM">10:30AM - 12:00PM
													<option value="11:00AM to 12:30PM">11:00AM - 12:30PM
													<option value="11:30AM to 1:00PM">11:30AM - 01:00PM
													<option value="12:00PM to 1:30PM">12:00PM - 01:30PM
													<option value="12:30PM to 2:00PM">12:30PM - 02:00PM
													<option value="1:00PM to 2:30PM">01:00PM - 02:30PM
													<option value="1:30PM to 3:00PM">01:30PM - 03:00PM
													<option value="2:00PM to 3:30PM">02:00PM - 03:30PM
													<option value="2:30PM to 4:00PM">02:30PM - 04:00PM
													<option value="3:00PM to 4:30PM">03:00PM - 04:30PM
													<option value="3:30PM to 5:00PM">03:30PM - 05:00PM
													<option value="4:00PM to 5:30PM">04:00PM - 05:30PM
													<option value="4:30PM to 6:00PM">04:30PM - 06:00PM
													<option value="5:00PM to 6:30PM">05:00PM - 06:30PM
													<option value="5:30PM to 7:00PM">05:30PM - 07:00PM
													<option value="6:00PM to 7:30PM">06:00PM - 07:30PM
													<option value="6:30PM to 8:00PM">06:30PM - 08:00PM
													<option value="7:30PM to 8:30PM">07:30PM - 08:30PM
													<option value="7:30PM to 9:00PM">07:30PM - 09:00PM												
												</select>  
												<select id="shift" name="shift" style=" font-size:10px;width: 90px; height: 27px">
													<option id="zero2" value="000">በየስንት ጊዜ </option>
													<option value="EVERY WEEK">EVERY WEEK
													<option value="EVERY TWO WEEKS">EVERY TWO WEEKS
												</select>  
												<span id="errDay"></span><br><br>                            
					            
					                </p>
					                 <p>
						                <label >Street* </label>
						                <input name="street" id="street" type="text" class="long"/>
						                <span id="errStreet"></span><br><br>
						            </p>
						            <p>
						            	<label>City *</label>
						                <input name="city" id="city" type="text" class="long"/>
						                <span id="errCity"></span><br><br>
						             </p>
                					 <p>
                					
                					 
                    					<label>State * </label>
                    					<select  name="state"  id="state"   style="width: 262px; height: 27px" >
    									<option id="zero1" value="">Select</option>
									    <option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District Of Columbia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
                    					</select>
                    					<span id="errState"></span><br><br>
                					</p>
                					<p>
                						<label>ZIP/Postal Code: </label>
										<input size = '5'  type="text" name="zip" placeholder=" 00000 format"  maxlength="5" id="zip"    />
										<span id="errZip"></span>
										<br><br>
                					</p>
                					<p>
                						<label>አባላት 1 </label>
										<input size = '32'  type="text" name="member1" maxlength="30" id="zip"    />
										<span id="errMem"></span><br><br>
										
                					</p>
                					<p>
                						<label>2 </label>
										<input size = '32'  type="text" name="member2" maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>3 </label>
										<input size = '32'  type="text" name="member3" maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>4 </label>
										<input size = '32'  type="text" name="member4" maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>5 </label>
										<input size = '32'  type="text" name="member5" maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>6 </label>
										<input size = '32'  type="text" name="member6" maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>7</label>
										<input size = '32'  type="text" name="member7" maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>8</label>
										<input size = '32'  type="text" name="member8" maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>9 </label>
										<input size = '32'  type="text" name="member9"  maxlength="30" id="zip"    />
										<br><br>
                					</p>
                					<p>
                						<label>10 </label>
										<input size = '32'  type="text" name="member10"   maxlength="100" id="zip"    />
										<br><br>
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
