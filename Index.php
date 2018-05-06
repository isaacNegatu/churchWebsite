
<?php 	if(!isset($_SESSION)){
			session_start();
			date_default_timezone_set('America/Los_Angeles');
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
<link href="../CSSFolder/Image_slider.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript">

	/** if you want to add image
		1, add an img tag with id	: Img++	ex:	<img id="Img6" src="../Image/IMG_006.jpg" />
		2, add an li tag with id	: S++	ex:	<li id="S5">6</li>
		3, add an p tag with id		: SP++	ex:	<p id="SP0"> First Image</p>
		4, change the value of nrImage	
	*/
	var nrImg = 6; //the number of img
	var IntSeconds = 4; // the seconds between the imgs

	function Load()
	{
		nrShown = 0; // the image visible
		Vect = new Array(nrImg + 10);
		Vect[0] = document.getElementById("Img1");
		Vect[0].style.visibility = "visible";

		//when we do the "for" loop we state from 1
	//	document.getElementById("S"+0).style.visibility="visible";

		for(var i = 1; i < nrImg; i++){
			Vect[i]= document.getElementById("Img"+(i+1));
		//	document.getElementById("S"+i).style.visibility="visible";
		}
		
	//	document.getElementById("S"+ 0).style.backgroundColor="rgba(255, 255, 255, 0.90)";
		document.getElementById("SP"+ nrShown).style.visibility="visible";

		mytime = setInterval(Timer, IntSeconds * 1500);
	}

	function Timer(){
		nrShown ++;
		
		if(nrShown == nrImg) {
			nrShown = 0;}
		
		Effect();
		
		
	}
	// next img
	function next(){
		nrShown ++;
		
		if(nrShown == nrImg) {
			nrShown = 0;}
		
		Effect();

		clearInterval(mytime);
		mytime = setInterval(Timer, IntSeconds * 1500);
		
	}
	//Prev img
	function prev(){
		nrShown --;
		
		if(nrShown == -1) 
			nrShown = nrImg - 1;
		
		Effect();

		clearInterval(mytime);
		mytime = setInterval(Timer, IntSeconds * 1500);
		
	}
	
	//Here changes  the img + effect
	function Effect(){
		for(var i = 0; i < nrImg; i++){
			Vect[i].style.opacity="0"; // to add the fade effect
			Vect[i].style.visibility="hidden";

		//	document.getElementById("S"+ i).style.backgroundColor="rgba(0, 0, 0, 0.70)";
			document.getElementById("SP"+ i).style.visibility="hidden";
		}
		Vect[nrShown].style.opacity="1";
		Vect[nrShown].style.visibility="visible";
	//	document.getElementById("S"+ nrShown).style.backgroundColor="rgba(255, 255, 255, 0.90)";
		document.getElementById("SP"+ nrShown).style.visibility="visible";
		
	}

</script>


</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body onload="Load()">
	<div id="main_wrapper"><!-- the contains all the the page content -->

		<?php require ('../HeaderFooter/ZionHeader.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table>
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
									
							<article>
								<header id="header1">
									<div>
										
											<div id="sttatementTopDiv1"></div><br>
									
									</div>
								</header>
								<footer>

									
									
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->									
									
								<div id="slider">
								
									<div id="image">									
										<img id="Img6" src="../Image/IMG_006.jpg" />
										<img id="Img5" src="../Image/IMG_004.jpg" />
										<img id="Img4" src="../Image/IMG_005.jpg" />
										<img id="Img3" src="../Image/IMG_003.jpg" />
										<img id="Img2" src="../Image/IMG_002.jpg" />
										<img id="Img1" src="../Image/IMG_001.jpg" />									
									</div><!-- end of image div -->
									
									<!-- Here is going to be the left right buttons, the info and the imgs shown -->
									<div id="Snav">
										<div id="SnavUp"><!-- here is the circles, showes the current imag -->
											<div id="Scircles">
										<!--  	<ul>
													<li id="S0">1</li>
													<li id="S1">2</li>
													<li id="S2">3</li>
													<li id="S3">4</li>
													<li id="S4">5</li>
													<li id="S5">6</li>
												</ul>-->
											
											</div><!-- end of Scircles div -->										
										</div><!-- end of SnavUp div -->
										
										
										<div id="SnavMiddle"><!-- the left and right button -->
											<img id="Sleft" src="../Image/leftButton3.png" onclick="prev()"/>
											<img id="Sright" src="../Image/rightButton3.png" onclick="next()"/>										
										</div><!-- end of SnavMiddle div -->
										
										<!-- the info -->
										<div id="SnavBottom">
											<p id="SP0"></p>
											<p id="SP1"> </p>
											<p id="SP2"> </p>
											<p id="SP3"> </p>
											<p id="SP4"> </p>
											<p id="SP5"> </p>
										
										</div><!-- end of SnavBottom div -->
									
									</div><!-- end of Snav div -->
								
								</div><!-- end of slider div -->									


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->									
									
								</footer>
							</article>
							<article id="article1">
								<table Id="article1_table">
									
									<tr>
										<td id="foot1">
											<table id="index_art_one" style=" width:100%;">
												<tr style=" width:100%;">
													<td>
														<img src="../Image/welcome.jpg" alt="welcome"/>
													</td>
												</tr>
												<tr Id="article_tr"style=" width:100%;">
													<td Id="article_td">
														<p id="main_p" align="justify">We welcome you to Zion Evangelical Fellowship Church website. 
															We are very blessed to have you here as we worship, celebrate, and serve our glorious God and His Son Jesus Christ
															through the power of ...</p>
													</td>
													
												</tr>
												<tr style=" width:100%;">
													<td>
														<a href="Welcome.php"><button class="btn" type="button">Read More!</button> </a>
													</td>
												</tr>
											</table>
										</td>
										
										<td id="foot2">
											<table id="index_art_one" style=" width:100%;">
												<tr style=" width:100%;">
													<td>
														<img src="../Image/daily_bread.jpg" alt="devotion"/>
													</td>
												</tr>
												<tr style=" width:100%;">
													<td Id="article_td">
														<p id="main_p" align="justify">
															በዓለማችን አብዛኞች ነገሮች ተመን አላቸው። ቁሳቁሱ፣ እንስሳቱ፣ ዕጽዋቱ፣ ሰውም እንኳ ሳይቀር ምን ያህል እንደሚያወጣ 
															ስሌት ተሰልቶበታል። ያንድ ወዛደርና ያንድ መሐንዲስ ዋጋ እኩል አይደለም፤ ያንድ ጠበቃና ያንድ የኔብጤ ተመን እጅጉን ይራራቃል። 
															ምድራዊው ተመን የትምህርት ደረጃን ...
														</p>
													</td>
													
												</tr>
												<tr>
													<td>
														<a href="Devotional.php"><button class="btn" type="button">Read
															More!</button> </a>
													</td>
												</tr>
											</table>
										</td>
										
										<td id="foot3">
											<table id="index_art_one" style=" width:100%;">
												<tr style=" width:100%;">
													<td>
														<img src="../Image/salvation.png" alt="salvation"/>
													</td>
												</tr>
												<tr id="index_art_one_tr"style=" width:100%;">
													<td Id="article_td">
														<p id="main_p" align="justify">There is only one possible way for
															anyone to achieve eternal salvation. And that one and only
															way Is Jesus Christ, by only having complete and total faith
															 in Jesus Christ we can be saved from Internal damnation ...</p>
													</td>		
												</tr>
												<tr>
													<td>
														<a href="Salvation.php"><button class="btn" type="button">Read More!</button></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
														
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
