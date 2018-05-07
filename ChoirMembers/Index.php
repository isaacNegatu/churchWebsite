<!-- Choir index page ChoirMembers/Index.php -->

<?php 	
	if(!isset($_SESSION)){
		session_start();
		date_default_timezone_set('America/Los_Angeles');		
	}	
	if ($_SESSION['Mem_mem_stat'] != 'CHOIR'){
		header("Location:../includes/SignIn_Choir.php");
		exit();
	} 				
?>

<!doctype html>
<html lang="en">
<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8"/>
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/ChoirMember.css" type="text/css"/>
<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css"/>

<script type="text/javascript" src="../CSSFolder/jquery-1.7.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$(".accordion h3:first").addClass("active");
		$(".accordion ul:not(:first)").hide();
	
		$(".accordion h3").click(function(){
			$(this).next("ul").slideToggle("slow")
			.siblings("ul:visible").slideUp("slow");
			$(this).toggleClass("active");
			$(this).siblings("h3").removeClass("active");
		});
	
	});
</script>
</head>
<!------------------------------------end of head section and start of body section------------------------------------->
<body>
	<div id="main_wrapper"><!-- it wrappes all the the page content -->
	
		<?php require ('../HeaderFooter/ZionHeaderChoir.php');?>
		
		<div id="sec_asi_div">
			<section id="main_section"><!-- wrapes all content body -->
				<table id="mainTable">
					<tr id="mainTr">
						<td id="main_text">
							<?php include_once ("TabedNavChoirIndex.php");?>
							<div id="bodyContainer">
							<div id="bodyContentContainer">
							<?php								
									// Creating DB Connection
									include ('../includes/connection.php');
										
									$connection = new createConnection(); //i created a new object
									$connection->connectToDatabase(); // connected to the database
									$connection->selectDatabase();// closed connection
									$conn = $connection->myconn;
								
								
								echo"	<div id='Choir_notice_div'>";
								
											echo"	<div id='mastaw_div'>
														<label id ='mittd3'> <h3>ማስታወቂያ</h3></label>";
															if(($_SESSION['Admin'] == 'ChoirAdmin')||($_SESSION['Admin'] == 'AdminAll')){
																echo"	<label id ='mittd5' ><a id='row33' href='NoticeList.php'>ማስታወቂያዎች በዝርዝር</a></label>";
															}
											echo"	</div>";
										
											
											
											$sql1 = "SELECT * FROM notification WHERE Stat='ON'";
											
											$result = mysql_query($sql1,$conn);
											
											if(!$result){
												echo( "<p>Unable to query database at this time.</p>" );
											}
											echo"<div>";
											echo"<ul type='square'>";
											while( $row1 = mysql_fetch_assoc($result)){
												
											echo"<li id='ChoirNoticeLiID'>".$row1['Notice']."&nbsp&nbsp&nbsp";
												if(($_SESSION['Admin'] == 'ChoirAdmin')||($_SESSION['Admin'] == 'AdminAll')){
													echo"<a href='CancelNotice.php?Value=".$row1['ID'].",".$row1["Stat"]."'>CANCEL</a>";
												}
												echo"</li>";
											}
											echo"</ul>";
											echo"</div>";
											
										
											
								echo"	</div><!-- end of choir_notice_div -->
										<div id='yemitenu'>";
								
										$sql = "SELECT * FROM yemitenu_mezmur WHERE Status='YEMITENA'";
												
										$result = mysql_query($sql,$conn);
										
										if(!$result){
										   		echo( "<p>Unable to query database at this time.</p>" );
										}
										     	
										$num_results = mysql_num_rows($result);
												
										echo "<div id='Yemitena_mezmur_table';>
											<div id='mittr4'>	
												<p Id='yetetenuMez'>የሚጠኑ መዝሙሮች</p>
											</div>";
										
										
										 
										while( $row = mysql_fetch_assoc($result)){
													
										echo"	<div id='mittr1'>
													<div id ='mittd3'> ".$row['Qene']." </div>";
												if(($_SESSION['Admin'] == 'ChoirAdmin')||($_SESSION['Admin'] == 'AdminAll')){										
													echo"	<div id ='mittd4' ><a id='row3' href='EditChoirNotice.php?id=".$row['ID']."'>CHANGE</a></div>";
												}else{
														echo"<div id ='mittd4' >&nbsp&nbsp</div>";
													}		
										echo"	</div>
												<div id='mittr2'>
													<label id='mitlab1'> ".$row['Mez_One_dis']."&#32;&#32;&raquo;&#32;&#32;</label><label id='mitlab2'>&#35;&#32;".$row['MezOne_quter']." </label>
													<span id='mitlab3'>";
														if($row['MezOne_quter']<= 9){
															echo"&nbsp&nbsp";
														}
													
													echo"".$row['MezOne']." </span>
												</div>";
												if($row['Mez_Two_dis']!=""){
										
													echo"	<div id='mittr3'>
																<label id='mitlab1'> ".$row['Mez_Two_dis']."&#32;&#32;&raquo;&#32;&#32;</label><label id='mitlab2'>&#35;&#32;".$row['MezTwo_quter']." </label>
																<span id='mitlab3'>";
																if($row['MezTwo_quter']<= 9){
																	echo"&nbsp&nbsp";
																}
																
													echo"".$row['MezTwo']." </span>
															</div>";
												}
										echo"<br>";
													
										}
											
										echo "</div>";						
									
							
								echo"	</div><!-- end of yemitenu -->
										<div id='yetetenu'>";
													
										$sql2 = "SELECT * FROM yemitenu_mezmur WHERE Status='YETETENA'";
												
										$result2 = mysql_query($sql2,$conn);
										
										if(!$result){
										   		echo( "<p>Unable to query database at this time.</p>" );
										}
										     	
										$num_results = mysql_num_rows($result2);
										$connection->closeConnection();
												
										echo "<div id='Yemitena_mezmur_table';>
											<div id='mittr4'>	
												<p Id='yetetenuMez'>የተገለገሉ መዝሙሮች</p>
											</div>";
										$num = 0;
										 
										//while(($row = mysql_fetch_assoc($result2))&&($num < 10)){
										while ($row = mysql_fetch_assoc($result2)){												
												$num++;
										echo"	<div id='mittr1'>
													<div id ='mittd3'> ".$row['Qene']." </div>";
													if(($_SESSION['Admin'] == 'ChoirAdmin')||($_SESSION['Admin'] == 'AdminAll')){	
														echo"	<div id ='mittd4' ><a id='row3' href='EditChoirNotice.php?id=".$row['ID']."'>CHANGE</a></div>";
													}else{
														echo"<div id ='mittd4' >&nbsp&nbsp</div>";
													}
										echo"	</div>
												<div id='mittr2'>
													<label id='mitlab1'> ".$row['Mez_One_dis']."&#32;&#32;&raquo;&#32;&#32;</label><label id='mitlab2'>&#35;&#32;".$row['MezOne_quter']." </label>
													<span id='mitlab3'>";
														if($row['MezOne_quter']<= 9){
															echo"&nbsp&nbsp";
														}
													echo"".$row['MezOne']." </span>
												</div>";
												if($row['Mez_Two_dis']!=""){
										
													echo"	<div id='mittr3'>
																<label id='mitlab1'> ".$row['Mez_Two_dis']."&#32;&#32;&raquo;&#32;&#32;</label><label id='mitlab2'>&#35;&#32;".$row['MezTwo_quter']." </label>
																<span id='mitlab3'>";
																	if($row['MezTwo_quter']<= 9){
																		echo"&nbsp&nbsp";
																	}
																
																
															echo"".$row['MezTwo']." </span>
															</div>";
												}
										echo"<br>";
													
										}
											
										echo "</div>";					
								
								
									echo"	</div><!-- end of yetetenu div -->";
								?>
								
								<div class="contentCell">
									<div class="accordion">
										<h3>የኳየር ኮሚቴ</h3>
											<ul type="square">
												<li id="ChoirRuleLiID">ተጠሪነቱ ለቤተክርስቲያኒቱ ፓስተርና ለኳየሩ አባላት ይሆናል</li>
												<li id="ChoirRuleLiID">በቁጥር ሁለት ወይንም ሶስት ሊሆን ይችላል። እንደ አስፈላጊነቱ የኮየሩ አባላት የኮሚቴውን ቁጥር ሊጨምሩና ሊቀንሱ ይችላሉ። ነገር ግን ከሁለት ማነስ የለበትም።</li>
												<li id="ChoirRuleLiID">የኳየሩ ኮሚቴ ከኳየሩ መካከል በኳየሩ አባላት የተመረጡ መሆን አለባቸው።</li>
												<li id="ChoirRuleLiID">በኮሚቴው ስር አብረው የሚያገለግሉ ኮሚቴዎች
													<ol>
														<li id="ChoirRule_mainPoint_inner_LiID">ሳንሱር ኮሚቴ </li>
														<li id="ChoirRule_mainPoint_inner_LiID">ግብረገብ ኮሚቴ (social committee)</li>
														<li id="ChoirRule_mainPoint_inner_LiID">የፀሎት ኮሚቴ</li>
													</ol>
												</li>
											</ul>											
										
										<h3>የኮሚቴው ሀላፊነትና ግዴታ</h3>
											<ul type="square">
												<li id="ChoirRuleLiID">የኳየሩን የመንፍሳዊና የአገልግሎት አቅጣጭ በቅርብ ሆኖ ይከታተላል</li>
												<li id="ChoirRuleLiID">በኳየሩ መካከል በመልካም ምሳሌነት በፍቅር እና በትህትና በመመላለስ አርአያ ይሆናል፡ እንዲሁም በታማኝነት ማገልገል የኮሚቴው አባላት ይጠበቅባቸዋል   </li>
												<li id="ChoirRuleLiID">የአባላትን አንድነት እንደ እግዚአብሔር ቃል በፀሎት እና በምክር ይጠብቃል </li>
												<li id="ChoirRuleLiID">ለኳየሩ መንፈስዊ ሕይወት እና አገልግሎት እድገት የሚጠቅሙ እንዲሁም የሚያስፈልጉ ትምህርቶችን እና ፕሮግራሞቸን ያዘጋጃል። </li>
												<li id="ChoirRuleLiID">የኳየሩ አባላት በዝማሬ እና በሙዚቃ እውቀት የሚያድጉበትን ሁኔታ ያመቻቻል ወይንም ይፈጥራል</li>
												<li id="ChoirRuleLiID">በየሳምንቱ የኳየሩን የፀሎት ፣ የልምምድ እና የቃል ፕሮግራሞችን ያዘጋጃል። እንዲሁም ኳየሩ የሚያገለግላቸውን መዝሙሮች ከሳንሱር ኮሚቴው ጋር በጋራ በመምረጥ ያቀርባል </li>
												<li id="ChoirRuleLiID">ለአገልግሎት የተመረጡትን መዝሙሮች ኳየሩ የሚገባውን ልምምድ እና ዝግጅት እንዲያደርግ ያደርጋል</li>
												<li id="ChoirRuleLiID">የኳየሩን መተዳደሪያ ደንብ በመከተል የኳየሩ አባላት በሚገባ ትኩረት ሰጥተው አገልግሎቱን በታመኝነት እንዲያገለገሉ ያበረታታል፡ </li>
												<li id="ChoirRuleLiID">በኳየሩ ውስጥ ያለ ስርአት የሚሔዱትን በቅርብ ጉዳዩን ተከታትሎ በመምከር ወይንም በመገሰጽ አባሉን በፍቅር ለማቅናት ይሞክራል፡፡ ሆኖም በመተዳደሪያው ደንብ መሰረት ከአግባብ ውጪ በሚሆኑት አባላት ላይ፣ቁጥጥር በማድረግ የመቅጫ አንቀጹን በመመርኮዝ እርምጃ ይወስዳል</li>
												<li id="ChoirRuleLiID">በኮሚቴው ስር ሆነው የሚያገለግሉትን ንኡስ ኮሚቴዎች ያስተባብራል</li>
												<li id="ChoirRuleLiID">የኳየሩን ንብረት በቅርብ ይቆጣጠራል</li>
												<li id="ChoirRuleLiID">የኳየሩን የአመት በጀት በማውጣት ለቤተ ክርስቲያን ያቀርባል</li>
												<li id="ChoirRuleLiID">የኳየሩን የአመት እቅድ እና ፕላን ያወጣል</li>
												<li id="ChoirRuleLiID">አዲስ አባላትን በኳየሩ መተዳደሪያ ደንብ መሰረት ይቀበላል</li>
										
											</ul>
										
										<h3>የሳንሱር ኮሚቴ</h3>
											<ul type="square">
												<li id="ChoirRuleLiID">የሳንሱር ኮሚቴ ከኳየሩ መካከል በኳየሩ አባላት የተመረጡ መሆን አለባቸው። ኮሚቴው ከተመረጠ በሗላ ከመካከሉ አንድ ሰብሳቢ ወይንም አስተባባሪ ይመርጣሉ</li>
												<li id="ChoirRuleLiID">የቁጥር ብዛት ከሶስት እስክ አምስት እንደ አስፈላገነቱ ሊመረጥ ይችላል</li>
												<li id="ChoirRuleLiID">የሳንሱር ኮሚቴዋች መዝሙር የመጻፍ እና ዜማ የማውጣት ብቃት ያላቸው መሆን አለባቸው</li>
												<li id="ChoirRuleLiID">የሳንሱር ኮሚቴዎች በእግዚአሔር ቃል የተሞሉ እና በፀሎት ህይወታቸውም ያደጉ መሆን አለባቸው</li>
												<li id="ChoirRuleLi_mainPoint_ID">የሳንሱር ኮሚቴ ሀላፊነት እና ግዴታ
													<ol>
														<li id="ChoirRule_mainPoint_inner_LiID">በሳምንት ወይንም በሁለት ሳምንት አንድ ጊዜ በመገናኘት አብሮ መፀለይ እና መዝሙር ማዘጋጀት አለበት</li>
														<li id="ChoirRule_mainPoint_inner_LiID">መዝሙሮችን እንደ እግዚአብሔር ቃል ያርማል። የመዝሙሮችን ይዘትና ክብደት እንደ እግዚአብሔር ቃል እውነት መዝኖ እርማት እንደ አስፈላጊነቱ ይሰጣል</li>
														<li id="ChoirRule_mainPoint_inner_LiID">ለሳንሱር ኮሚቴው የሚቀርቡትን መዝሙሮች እንደ አስፈላጊነቱ የማረምና የማስተካከል ወይንም የመለወጥ ሙሉ ስልጣን አለው፡ ስለዚህ እንደ አስፈላጊነቱ መለወጥ ወይንም መስተካከል የሚገባቸወን የመዝሙሮች ቃል እና ዜማ በማስተካከል ወይንም በመለወጥ ያርማል</li>
														<li id="ChoirRule_mainPoint_inner_LiID">እንደ እስፈላጊነቱ ከኳየሩ ኮሚቴዎች ጋር ኳየሩን መዝሙር ያስጠናል </li>
														<li id="ChoirRule_mainPoint_inner_LiID">የኮሚቴውን አባላት የመንፈስ አንድነት ከሚያበላሽ ነገር ሁሉ መራቅና እራስን መጠበቅ ይጠበቅበታል </li>
														<li id="ChoirRule_mainPoint_inner_LiID">በፍቅር እርስ በእርስ መቀባበል እና የሌላውን ፅጋ በማክበር ማገልገል አለበት</li>
														<li id="ChoirRule_mainPoint_inner_LiID">ተጠሪነቱ ለኳየሩ ኮሚቴ ይሆናል</li>
													</ol>
												</li>
											</ul>											
										<h3>ግብረገብ ኮሚቴ (social committee)</h3>
											<ul type="square">
												<li id="ChoirRuleLiID">የግብረገብ ኮሚቴው አባላት ከኳየሩ መካከል በኳየሩ አባላት የተመረጡ መሆን አለባቸው።</li>
												<li id="ChoirRuleLiID">ቁጥራቸው ሁለት ይሆናል። ነገር ግን ኳየሩ እንደ አስፈላጊነቱ ቁጥሩን መጨመር ወይንም መቀነስ ይቻላል</li>
												<li id="ChoirRuleLiID">በፍቅርና በምሳሌነት በኳየሩ መካከል የሚመላለሱ መሆን አለባቸው</li>
												<li id="ChoirRuleLi_mainPoint_ID">ግብረገብ ኮሚቴ ሀላፊነትና ግዴታ
													<ol>
														<li id="ChoirRule_mainPoint_inner_LiID">ኳየሩ የሚያዘጋጃቸውን ልዩ ልዩ ፕሮግራሞች ያስተባብራል ። ለምሳሌ ፦ ፆም ፅሎት፣ ፒክኒክ ወዘተ...</li>
														<li id="ChoirRule_mainPoint_inner_LiID">የኳየሩን ወርሀዊ መዋጮ ይሰበስባል</li>
														<li id="ChoirRule_mainPoint_inner_LiID">ተጠሪነቱ ለኳየሩ ኮሚቴዎች ይሆናል</li>
													</ol>
												</li>
											</ul>											
										<h3>የኳየር አባላት መብትና ግዴታ</h3>
											<ul type="square">
												<li id="ChoirRuleLiID">ኳየሩ ተጠሪነቱ ለቤተክርስቲያኗ ፓስተሮች ይሆናል</li>
												<li id="ChoirRuleLiID">በእግዚአብሔር ቃል እና በፀሎት ሕይወት በሚገባ ማደግ ይጠበቅበታል።</li>
												<li id="ChoirRuleLiID">በአስራቱ ሁሉ ታማኝ መሆን </li>
												<li id="ChoirRuleLiID">እግዚአብሔር በወንድሞች ሕብረት ውስጥ ያዘዘውን በረከትና ሕይወት በመውረስ መጠቀም</li>
												<li id="ChoirRuleLiID">በኳየሩ ሕብረት መካከል እርስ በእርስ በመቀባበል በፍቅር መመላለስና ማደግ።</li>
												<li id="ChoirRuleLiID">እያንዳንዱ አባል የመንፈስ አንድነትን ለመጠበቅ መትጋት ይጠበቅበታል ። የህብረቱን አንድነት ከሚያፈርስ ወይንም ከሚያበላሽ ማንኛውም አይንት ነገር መራቅ አለበት። ለምሳሌ ፡- ሀሜት ፤ ውሸት ፣ አድመኝት ፤ ወገንተኝነት ወዘተ……</li>
												<li id="ChoirRuleLiID">እያንዳንዱ የኳየር አባል ለኳየሩ የሚሰጠው ትልቅ አስተዋጽኦ እንዳለው በመረዳት አንዱ የሌላውን መብት እና ፀጋ በማክበር መቀበል አለበት</li>
												<li id="ChoirRuleLiID">የቤተ ክርስቲያን መሪዎችና እንዲሁም በኳየር ኮሚቴዎች እንደ አስፈላጊነቱ በሚዘጋጁት ፕሮግራሞች ወይም የትምህርት ጊዜዎች ሁሉ ላይ በሰአቱ በመገኘት መሳተፍ አለበት።</li>
												<li id="ChoirRuleLiID">በኳየሩ የልምምድ ጊዜ ላይ በሰአት መገኘት ይጠበቅበታል። ሳያስፈቅዱ በሚያረፍዱ እና በሚቀሩ አባላት ላይ በመቅጫው አንቀጽ መሰረት ኮሚቴው እርምጃ ይወስዳል።<br>እሁድ ከ 6፡00 AM እስከ 9፡30 AM </li>
												<li id="ChoirRuleLiID">በኳየር የልምምድ ሰአት በሚገባ ትኩረት ሰጥቶ መዝሙሮችን መለማመድ አለበት። የመዝሙሮችን ዜማና ቅላጼ በሚገባ ለመያዝ በቂ ጥረት ማድረግ አለበት።</li>
												<li id="ChoirRuleLiID">የኳየር መሪዎች ለኳየሩ አገልግሎት እድገት ይጠቅማሉ ብለው በሚያመጧቸው ወይንም በሚያቀርቧቸው ሀሳቦች ላይ የሚገባውን ትኩረት በመስጠት ሀላፊነትን በግል መወጣት ይጠበቅባቸዋል። ለምሳሌ ፦ መዝሙሮችን ከሰኞ እስከ አርብ ባሉት ጊዜያት ወስጥ በቃል ለመያዝ መሞከር የመሳሰሉ ነገሮችን፡ </li>
												<li id="ChoirRuleLiID">ዘወትር በግልም ሆነ በህብረት ስለ ኳየሩ በእግዚአብሔር ፊት መፀለይ እና ቃሉን በማጥናት ማደግ አለበት</li>
												<li id="ChoirRuleLiID">በኳየሩ መካከል ቃል በማምጣት ወይንም ፀሎት በመምራት የማገልገል ወይንም የበመገልገል መብትና ግዴታ አለበት </li>
												<li id="ChoirRuleLiID">ለኳየሩ እድገት ይጠቅማል ወይም ያንፃል ብሎ የሚያስባቸውን ሀሳቦች ሆነ ምክሮች የማምጣት ሀላፊንትና ግዴታ አለበት።</li>
												<li id="ChoirRuleLiID">አዳዲስ ከጌታ የተሰጡትን መዝሙሮች ጽፎ ማምጣት ይጠበቅበታል። በተጨማሪም ይጠቅማሉ ብሎ የሚያስባቸውን የካሴት መዝሙሮች ፅፎ ማምጣት ይችላል</li>
												<li id="ChoirRuleLiID">ለኳየሩ የተሰጡ መዝሙሮች ሁሉ የኳየሩ ንብረቶች ናቸው። ኳየሩ መዙሮቹን እንደአስፈላጊነቱ ሊያገለግልባቸው ወይንም በካሴት ሊያወጣቸው ሙሉ ስልጣን አለው</li>
												<li id="ChoirRuleLiID">በተለያየ የአገልግሎት ዘርፍ ውስጥ ሆንው በኳየር ውስጥ የሚያገለግሉትን ወገኖች በማክበር መታዘዝ ይጠበቅበታል</li>
												<li id="ChoirRuleLiID">እያንዳንዱ አባል የራሱስ የኳየር ልብሶት በንጽህናና በጥሩ ሁኔታ የመያዝ ሀላፊነትና ግዴታ አለበት።</li>
												<li id="ChoirRuleLiID">እያንዳንዱ አባል የኳየሩን ንብረትና የመለማመጃ ክፍል በሚገባ በጥንቃቄና በንጽህና የመያዝ ሀላፊነትና ግዴታ አለበት።</li>
											</ul>											
										<h3>የእርማት እርምጃ (discipline action)</h3>
											<ul type="square">
												<li id="ChoirRuleLi_mainPoint_ID">በማርፈድ ላይ</li>
												<li id="ChoirRuleLiID">እያንዳንዱ የኳየር አባል በኳየሩ የልምምድ ጊዜ ላይ በሰአቱ የመገኘት ሀላፊነት እና ግዴታ አለበት። ነገር ግን በሰአቱ መድረስ የማይችል ከሆነ ከ ሁለት ሰአት በፊት ቀደም ብሎ በመደወል ለኳየሩ ኮሚቴዎች ማስታወቅ አለበት። ለኮሚቴ ሳያስታውቅ ለሚያረፍድ ሰው ፡-
													<ol>
														<li id="ChoirRule_mainPoint_inner_LiID">ለመጀመሪያ ጊዜ በምክር ይታለፋል</li>
														<li id="ChoirRule_mainPoint_inner_LiID">በሁለተኛ ጊዜ ማስጠንቀቂያ ይሰጠዋል</li>
														<li id="ChoirRule_mainPoint_inner_LiID">ለሶስተኛ ጊዜ ካረፈደ አንድ አገልግሎት ይቀጣል(አባሉ ባያገልግልም እንኳን በኳየሩ የልምምድ ሰአቶች ሁሉ ላይ መገኘት ይጠበቅበታል)</li>
														<li id="ChoirRule_mainPoint_inner_LiID">አራተኛ ጊዜ ካረፈደ የኳየሩ ኮሚቴ ቀርቦ ግለሰቡን በማነጋገር ችግሩን ለመረዳትና ለመፍታት ይሞክራል። ይህም ሆኖ ግን ግለሰቡ ከዚህ ጥፋት እርምት የማይወስድ ከሆነ ኮሚቴው ለቤተ ክርስቲያን መሪዎች ጉዳዩን አሳልፎ ይሰጣል።</li>													
													</ol>
												</li>
												<li id="ChoirRuleLiID">የኳየሩን ኮሚቴ እያስፈቀዱም በተደጋግሞሽ በሚያረፍዱ አባላት ላይ ኮሚቴው ሁኔታውን አጥንቶ እንደ አስፈላጊነቱ የእርምት እርምጃ ይወስዳል</li>
												<li id="ChoirRuleLi_mainPoint_ID">በመቅረት ጉዳይ ላይ</li>
												<li id="ChoirRuleLiID">እያንዳንዱ የኳየር አባል አገልግሎቱን በሚገባ ተርድቶና ክብደት ሰጥቶ በታማኝነት በቦታው በመገኘት ማገልገል አለበት። ነገር ግን አባሉ ሊገኝ የማይቸልበት ጉዳይ ከገጠመው ከ ሁለት ሰአት በፊት አስቀድሞ ለኳየሩ ኮሚቴዎች በመደወል ማስፈቀድ ይችላል። ነገር ግን ለኮሚቴ ሳያስፈቅድ የሚቀር አባል ፦
													<ol>
														<li id="ChoirRule_mainPoint_inner_LiID">ለመጀመሪያ ጊዜ አንድ አገልግሎት ይታገዳል። አባሉ ባያገለግልም እንኳን በኳየሩ የልምምድ ጊዜ ላይ መገኘት አለበት።</li>
														<li id="ChoirRule_mainPoint_inner_LiID">ለሁለተኛ ጊዜ ሳያስፈቅድ ከቀረ ኮሚቴው ቀርቦ ግለሰቡን በማነጋገር ችግሩን ለመረዳትና መፍትሔ ለማምጣት ይሞክራል። በዚህ ጊዜ አባሉ ለሁለት የአገልግሎት ክፍሎች እንዳይቆም ይታገዳል። (አባሉ ባያገለግልም እንኳን በኳየሩ የልምምድ ጊዜ ላይ መገኘት አለበ)</li>
														<li id="ChoirRule_mainPoint_inner_LiID">ይህም ሆኖ ግን ግለሰቡ እርምት ካልወሰደ የኳየሩ ኮሚቴ ለቤተ ክርስቲያን አገልጋዮች ጉዳዩን አሳልፎ በመስጠት ለተወሰነ ጊዜ አባሉን ከአገልግሎት ያግዳል (አባሉ ከቤተ ክርስቲያን አገልጋዮች ጋር ጉዳዩን ከጨረስ በህዋላ ለኳየር ኮሚቴዎች አስታውቆ ወደ አገልግሎት መመለስ ይችላል። ነገር ግን አባሉ ከተመለስ በህዋላ  ሁለት አገልግሎት አይቆምም ። ሆኖም ግን በልምምድ ሰአቶች ሁሉ መገኘት የጠበቅበታል)</li>
														<li id="ChoirRule_mainPoint_inner_LiID">አንድ የኳየሩ አባል ሳያስፈቅድ በተከታታይ ለአራት ሳምንታት ከቀረ አባሉ በፈቃደኝነት ኳየሩን እንደለቀቀ ይቆጠራል። ወደ ኳየሩ መመለስ ቢፈለግ አስቀድሞ ይኳየሩን ኮሚቴና የቤተ ክርስቲያን አገልጋዮች ማነጋገር አለበት።  </li>													
													</ol>
												</li>
												<li id="ChoirRuleLiID">አንድ የኳየር አባል ከአቅም በላይ በሆነ ምክንያት ለተወስኑ ወራት ወይንም ሳማንታት ከኳየር ለመቅረት ቢገደድ (ለምሳሌ ፦ አገር ቤት ቢሔድ ፣ በህመም ምክንያ ፣ ልጅ መውለድ ወዘተ….) ለኳየሩ ኮሚቴ ቀደም ብሎ በመንገር ማስፈቀድ ይችላል። አባሉ በሚመለስበት ጊዜ ለአንድ ወር ያክል ሳያገለገል ከኳየሩ ጋር በመለማመድ ይቆያል። እንደ አስፈላጊነቱ የአባሉን ብቃት አይቶ ኮሚቴው ጊዜውን ሊያራዝም ይችላል። </li>
												<li id="ChoirRuleLiID">ኳየሩን ኮሚቴ እያስፈቀዱም ቢሆን በተደጋግሞሽ በሚቀሩ አባላት ላይ ኮሚቴው ሁኔታውን አጥንቶ የእርምት እርምጃ ይወስዳል</li>
											</ul>											
										<h3>የአዲስ ሰው ኳየር የመግቢያ ቅድመ መስፈርት</h3>
											<ul type="square">
												<li id="ChoirRuleLiID">ግለሰቡ የቤተክርስቲያንዋን ደንብ አንብቦ የተቀበለና ቢያንስ ለ አንድ አመት በአባልነት የቆየ መሆን አለበት</li>
												<li id="ChoirRuleLiID">ግለሰቡ መዘመር ስለሚወድ ወይም ስለሚፈልግ ሳይሆን ለአገልግሎቱ ጥሪ እና ሸክም ኖሮት አገልግሎቱ ሊጠይቀው የሚችለውን ዋጋ ሁሉ ከፍሎ ለማገልገል የተዘጋጀ መሆን አለበት።</li>
												<li id="ChoirRuleLiID">ቅዳሜንና እሁድን በኳየሩ የልምምድ እና የአገልግሎት ሰአት ላይ ሁሉ መገኘት መቻል አለበት። ይህም ማለት ግለሰቡ በነዚህ ሰአታት ሁሉ ላይ ከስራም ሆነ ከማንኛውም አይነት ሌሎች ተግባራት እራሱን ነፃ ማድረግ መቻል አለበት።</li>
												<li id="ChoirRuleLiID">የኳየሩ ኮሚቴ በቅድሚያ ግለሰቡን በአካል አግኝቶ ቃለ መጠይቅ ካደረገ በኋል ግለሰቡ ለአገልግሎቱ ብቁ ሆኖ ከተገኘ በቀጠሮ ግለሰቡ የድምጽና የሙዚቃ ፈተና ይፈተናል። በዚህ ሁሉ ውስጥ ግለሰቡ ካለፈ በህዋላ ለኳየሩ አገልግሎት የሚበቃ ሆኖ ኮሚቴው ካገኘው ግለሰቡን ወደ ቤተ ክርስቲያኑ መጋቢዎች ይመራል። የቤተክርስቲያኑ መጋቢዎች ከግለሰቡ ጋር ተነጋግረው የግለሰቡን ወደ ኳየር መቀላቀል ካመኑበት ግለሰቡ ወደ ኳየር ይቀላቀላል።</li>
												<li id="ChoirRuleLiID">ግለሰቡ ወደ ኳየር ከተቀላቀለ በህዋላ ለ ሶስት ወራት ያክል ወደ መድረክ አገልግሎት ሳይወጣ ከኳየሩ ጋል በልምምድ ያሳልፋል። ጊዜውን የኳየሩ ኮሚቴ የግለሰቡን ብቃት አይቶ ሊያስረዝም ይችላል።</li>
												<li id="ChoirRuleLiID">አዲሱ አባል በሚገባ የልምምድ ጊዜውን ከጨረሰ በህዋላ ወደ መድረክ አገልግሎት ከመውጣቱ በፊት የቤተ ክርስቲያንዋ አገልጋዮች በኳየሩ መካከል ተገኝተው ይፀልዩለታል።</li>
												<li id="ChoirRuleLiID">ከዚህ ጊዜ ጀምሮ ግለሰቡ የኳየሩ ሙሉ አባል ሆኖ ማገልገል ይጀምራል።</li>
											</ul>	
									</div>								
								</div><!-- end of ChoirRuleDiv end -->
							</div> <!-- end bodyContentContainer div -->
							</div> <!-- end bodyContainer div -->						
						</td><!-- end of main_text -->
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
					
					</tr><!-- end of mainTr  -->
				</table><!-- end of mainTable table -->			
			</section> <!-- end of main_section div -->		
		</div><!-- end of sex_asi_div div -->	
		<?php require ('../HeaderFooter/ZionFooter.php');?>
	</div><!-- end of main_wrapper div -->
</body>
</html>
	