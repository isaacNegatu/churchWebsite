
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
<link href="../CSSFolder/mainOne.css" rel="stylesheet" type="text/css" />
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
							
							<div id="main_text_mini_wrap">
							
							
							<table id="TablePastors">
								<tr>
									<td>
										<img id="pastorImage1"src="../Image/ZionLogoMain.png" >
									</td>
									<td id="TablePastorsTd2">
										<font id="font4">W</font><font id="font44">elcome </font>
									</td>
								</tr>
							</table>
							
							
							<article>			
								<div id ="text_div">
									<div align="justify" >
										
										<p> We welcome you to Zion Evangelical Fellowship Church website. 
												We are very blessed to have you here as we worship, celebrate, and serve our glorious God and His Son Jesus Christ 
												through the power of the Holy Spirit.  Jesus has never failed anyone coming to Him, and He will never fail you.  
												Trust Him for eternal life and cast all the burdens of your daily life at His feet.  He is the Way to the Father; 
												He is the Truth beyond any shadow of doubt; He is the Life everlasting.  As the day is approaching for His return 
												in glory, it is wise if we search our souls and cleave to the Word of life and be empowered by His grace to live 
												out His Holy Commandments.  May the Lord teach you and guide you in His path.</p><br>
										
										
										<font id="font1">M</font>
										<font id="font2">ission </font>
										<font id="font1">S</font>
										<font id="font2">tatement</font>
										<p> To fulfill our mandate given by the Lord Jesus: to preach the Gospel to all peoples, 
												to be witnesses in word and deed and make disciples</p><br>
												
										<font id="font1">V</font>
										<font id="font2">ission </font>
										<font id="font1">S</font>
										<font id="font2">tatement</font><br>
										<p> To reach Ethiopians living in and around the Twin Cities with the saving Gospel of the 
												Lord Jesus Christ.</p><br>
									</div>
									
									<div ALIGN="right">
										<font id="font1">Senior Pastor </font>
										<font size="4" face="Century Schoolbook">Taye Yami</font><br>
										<font id="font1">Pastor </font>
										<font size="4" face="Century Schoolbook">Alehoubele Mamo</font><br><br>
										
									</div>
										
									</div>
							</article>
						</div>
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
