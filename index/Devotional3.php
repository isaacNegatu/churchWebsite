
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
											<font id="font1" color= "black"></font>
											<font id = "Amharic_pp1">እንጹም እንጸልይ </font><br><br><br>
										
												<p id = "Amharic_pp2"><i>“በአምላካችን ፊት ራሳችንን እናዋርድ ዘንድ ከእርሱም የቀናውን መንገድ ለኛና ለልጆቻችን ለንብረታችንም
																 ሁሉ እንለምን ዘንድ በዚያ በአህዋ ወንዝ አጠገብ ጾም አወጅሁ . . . . .ስለዚህም ነገር ጾምን ወደ
																  እግዚአብሔርም ለመንን፤ እርሱም ተለመነን”  &nbsp;&nbsp;<span id="verse">ዕዝራ 8 ፥ 21 - 23</span></i> </p><br>
												
											
												<p id = "p5">ካህኑ ዕዝራና አብረውት ያሉት ሰዎች የእግዚአብሔርን ቤት ለመስራት ሲነሱ ከፊታቸው የተደቀነ ትልቅ ችግር 
															እንመለከታለን፦ ጠላት በመንገድ ላይ ሸምቋል። ምን ጊዜ ላይ የትኛው ቦታ ላይ እንደሚያጠቋቸው አይታወቅም። 
															ጉዟቸው የስጋት ጉዞ ሊሆን ነው አደገኛ ነገር ነው። ተዘጋጅቶ ከተቀመጠ ጠላት ጋር ህጻናትና አዛውንቱ ቀርቶ 
															ስልጡን ወታደር እንኳን ጉዳት ያገኘዋል። ከንጉስ ሰራዊት አይጠይቁ ነገር የአምላካቸውን ሀያልነት በኩራት ሲናገሩ 
															ነበር። ምላስ ማጠፉ አሳፋሪ ሆኖ ተገኝቷል። ታዲያ ምን መፍትሔ አለ? መፍትሔው ጾም ጸሎት ነው።ጾምና ጸሎት
															 ባስፈሪው ጎዳና በደህና በሰላም ያሳልፋል። ምስጢሩ አቅመ-ቢስነትን ተረድቶ ሁሉ ለሚቻለው ጌታ መገዛት ነው። 
															 “በራሴ አልችልም” የምንል ከሆነ ኤልሻዳዩ ስር ራሳችንን ማዋረድ ትልቅ ጥበብ ነው። በጾምና በጸሎት ፊቱን የምንሻ 
															 ከሆንን የክብር ጌታ ወደ ውርደታችን ይመለከታል። በዚህ ሁኔታ ወደርሱ ለቀረቡ ጌታ ይለመናቸዋል። ከችግራችን ጋር 
															 ከመፋጠጥ ይልቅ በጸጋው ዙፋን ስር በጾም በጸሎት መውደቅ ውጤታማ ነው።  </p><br>
											
												<p id = "p5">እንጹም እንጸልይ የሸመቀ ጠላት አያገኘንም።</p><br>
									
										</div>
										
										<div id="buttonDiv">
											<table id="buttonTable">
												<tr>
													<td>
													<a  id="aleft" href='Devotional4.php'>
													<img src= "../Image/previous1.png"/></a>
													
													
													<a  id="aright"href='Devotional2.php'>
													<img src= "../Image/next1.png"/></a>
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
