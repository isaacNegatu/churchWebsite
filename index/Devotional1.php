
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
<link href="../CSSFolder/devotionText.css" rel="stylesheet" type="text/css" />
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
														
							<article id="article_devotion">
								<div id="divotion_main_text">
									<div id="divotion_div1">
										<div id="OurDailyBread"></div>
										<div id="divotion_div"><font id="Devotion_font1">D</font><font id="Devotion_font2">evotion</font></div><br>
									</div><!-- end of divotion_div1 -->
									
																	
									
									<div  id="main_text_mini_wrap" align="justify">
										<div id="main_txt_mini_div"> 
										<div>
											<font id="font1" color= "black">&nbsp</font>
											
										
												<p id = "pp2">Thus says the Lord, The Holy One of Israel, 
													and his Maker: "Ask Me of things to come concerning My sons; 
													and concerning the work of My hands, you command Me.<br>Isaiah 45:11</p><br><br>
												
												<font id = "pp1">Things to come:</font><br><br>
												
												<p id = "p1"> It has taken most of my life, my Christian life, to finally 
													realize that if I want to know something from the Lord, then I just need 
													to ask Him. Sounds kind of like a no-brainer, but for some reason, I spent 
													most of my time with the Lord dealing with my personal requests. I have prayed 
													pretty much my whole life. I have prayed very specifically at times and I have 
													prayed in the bigger picture at times, but I have always prayed. What I did not 
													necessarily pray about, though, were of &quot;things to come.&quot; I think many of us 
													tend to pray about the &quot;here and now&quot; issues, or the things that we want &quot;to come,&quot; 
													not necessarily asking the Lord to reveal what He is doing &quot;concerning the work of 
													My hands.&quot;</p><br>
											
												<p id = "p1">Why is this so important to understand? When I see verses that say to &quot;ask&quot; 
													the Lord for something, then I know that must be His will. Today's verse even says, 
													&quot;you command Me.&quot; Instead of just focusing on the issues in our immediate path, let's 
													ask the Lord about what He is doing down the road. I have been immensely blessed and 
													have had huge increases in my own level of faith because I have learned to ask the Lord &quot;of 
													things to come&quot; and have seen Him answer through circumstances or situations that have come 
													to pass. My role is to ask, then to pray for wisdom and discernment in how to go forth in what 
													He shows me. </p><br>
											
												<p id = "p1">We need to know that the Lord is more than willing to reveal things to us, 
													if we are seeking Him with all of our hearts. As we grow in our walk with Christ, 
													He will teach us His ways and mold our character into more of His image. When we spend 
													time in His Word, we begin to see how verses like<span id="verse"> Isaiah 45:11</span> take on a completely new 
													meaning to us personally. When the Holy Spirit impresses a verse upon your heart, take it 
													to prayer and seek the Lord in what He is saying to you. Maybe God wants to reveal something 
													to you&mdash;maybe even &quot;of things to come.&quot;</p><br>
									
										</div>
									
										
										<div id="buttonDiv">
											<table id="buttonTable">
												<tr>
													<td>
													<a  id="aleft" href='Devotional2.php'>
													<img src= "../Image/previous1.png"/></a>
												
													</td>											
												</tr>
											</table>
										</div>
										
										</div><!-- end of main_txt_mini_div div -->
									
									
									
									</div><!-- end of main_text_mini_wrap div -->
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
