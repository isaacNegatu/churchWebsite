
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
<link href="../CSSFolder/Choir.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
		/** if you want to add image
		1, add an img tag with id	: Img++	ex:	<img id="Img6" src="../Image/IMG_006.jpg" />
		2, add an li tag with id	: S++	ex:	<li id="S5">6</li>
		3, add an p tag with id		: SP++	ex:	<p id="SP0"> First Image</p>
		4, change the value of nrImg	
		*/
		var nrImg = 13; //the number of img
		var IntSeconds = 5; // the seconds between the imgs
		
		function Load()
		{
			nrShown = 0; // the image visible
			Vect = new Array(nrImg + 10);
			Vect[0] = document.getElementById("Img1");
			Vect[0].style.visibility = "visible";
			
			//when we do the "for" loop we state from 1
			
			
			for(var i = 1; i < nrImg; i++){
				Vect[i]= document.getElementById("Img"+(i+1));
				
			}
			
		
			document.getElementById("SP"+ nrShown).style.visibility="visible";
			
			mytime = setInterval(Timer, IntSeconds * 1000);
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
			mytime = setInterval(Timer, IntSeconds * 1000);
		
		}
		//Prev img
		function prev(){
			nrShown --;
			
			if(nrShown == -1) 
				nrShown = nrImg - 1;
			
			Effect();
			
			clearInterval(mytime);
			mytime = setInterval(Timer, IntSeconds * 1000);
		
		}
		
		//Here changes  the img + effect
		function Effect(){
		for(var i = 0; i < nrImg; i++){
			Vect[i].style.opacity="0"; // to add the fade effect
			Vect[i].style.visibility="hidden";
		
			
			document.getElementById("SP"+ i).style.visibility="hidden";
		}
		Vect[nrShown].style.opacity="1";
		Vect[nrShown].style.visibility="visible";
		
		document.getElementById("SP"+ nrShown).style.visibility="visible";
		
		}

</script>

</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body onload="Load()">
	<div id="main_wrapper"><!-- the contains all the the page content -->

		<?php require ('../HeaderFooter/ZionHeaderChoirMain.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table id="mainTable">
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
						
							
																
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->									
									
								<div id="Choir_slider">
								
									<div id="Choir_image">
										<img id="Img13" src="../ChoirImage/Choir13.jpg" />
										<img id="Img12" src="../ChoirImage/Choir12.jpg" />		
										<img id="Img11" src="../ChoirImage/Choir11.jpg" />
										<img id="Img10" src="../ChoirImage/Choir10.jpg" />	
										<img id="Img9" src="../ChoirImage/Choir9.jpg" />	
										<img id="Img8" src="../ChoirImage/Choir8.jpg" />	
										<img id="Img7" src="../ChoirImage/Choir7.jpg" />										
										<img id="Img6" src="../ChoirImage/Choir6.jpg" />
										<img id="Img5" src="../ChoirImage/Choir5.jpg" />
										<img id="Img4" src="../ChoirImage/Choir4.jpg" />
										<img id="Img3" src="../ChoirImage/Choir3.jpg" />
										<img id="Img2" src="../ChoirImage/Choir2.jpg" />
										<img id="Img1" src="../ChoirImage/Choir1.jpg" />									
									</div><!-- end of image div -->
									
									<!-- Here is going to be the left right buttons, the info and the imgs shown -->
									<div id="Choir_Snav">
										<div id="Choir_SnavUp"><!-- here is the circles, showes the current imag -->
											<div id="Choir_Scircles">
												<p id="ch_p1">Choir</p>
											</div><!-- end of Scircles div -->										
										</div><!-- end of SnavUp div -->
										
										
										<div id="SnavMiddle"><!-- the left and right button -->
											<img id="Sleft" src="../Image/leftButton3.png" onclick="prev()"/>
											<img id="Sright" src="../Image/rightButton3.png" onclick="next()"/>										
										</div><!-- end of SnavMiddle div -->
										
										<!-- the info -->
										<div id="Choir_SnavBottom">
											<p id="SP0"> First Image</p>
											<p id="SP1"> Second Image</p>
											<p id="SP2"> Third Image</p>
											<p id="SP3"> Fourth Image</p>
											<p id="SP4"> Alexandrea, Minnesota</p>
											<p id="SP5"> Sixth Image</p>
											<p id="SP6"> First Image</p>
											<p id="SP7"> Alexandrea, Minnesota</p>
											<p id="SP8"> Alexandrea, Minnesota</p>
											<p id="SP9"> Alexandrea, Minnesota</p>
											<p id="SP10">Denver, Colorado </p>
											<p id="SP11"> Denver, Colorado </p>
											<p id="SP12">መዝሙር 47 ፡ 6 - 7</p>
										
										</div><!-- end of SnavBottom div -->
									
									</div><!-- end of Snav div -->
								
								</div><!-- end of slider div -->									


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
							
							<div id="choir_statment">
								<div id ="choir_statment_one">
									ራዕይ
								</div>
								<div id ="choir_statment_three">
									<ul>
										<li id="choir_li_one">ራዕያችን እግዚአብሔርን በማወቅ እያደግን በወንድማማች መዋደድ እየጨመርን እርስ በእርሳችን በመቀባበልና ፀጋችንን 
											በማሳደግ የክርስቶስን አካል በዝማሬና በመንፈሳዊ ቅኔ በማነጽ መንፈሳዊ መስዋእትን ለእግዚአብሔር ማቅረብ ነው።</li>
										<li id="choir_li_one">በቅድስናና በጽድቅ እግዚአብሔርን በመምሰልና በመፍራት በውስጥና በውጭ ባሉት ሁሉ ዘንድ በመልካም ምሳሌነት መመላለስ።</li>
									</ul>
								</div>
								<br>
							</div><!-- end of choir_statment div -->
							
							<div id="choir_statment">
								<div id ="choir_statment_one">
									የዝማሬ አገልግሎት
								</div>									
										
								<div align="justify" id ="choir_statment_two">									
									የዝማሬ አገልግሎት ለቤተክርስቲያን ጤነኛ እድገት ሁነኛ ድርሻ ያለው መሆኑን ያህል ሰፋ ያለና የጠለቀ ምልከታን የሚጠይቅ በመሆኑ ሁሉንም ነገር አንስቶ 
									ለመነጋገር ይህ ድህረ-ገጽ ለመዳሰስ ከተነሳበት አላማ አርቆ ያወጣናል። ሆኖም በብሉይ ኪዳንና በአዲስ ኪዳን፣ ሰዎች ከእግዚአብሔር ጋር ባላቸው ህብረት 
									ውስጥ መዝሙር የነበረውን አስተዋጽኦ እና ጠቀሜታ መነሻ በማድረግ ጥቂት ምሳሌዎችን አንስተን ለመዳሰስ እንሞክራለን
								</div>
								<div id ="choir_statment_four">
									መዝሙር በብሉይ ኪዳን
								</div>
								<div align="justify" id ="choir_statment_two">									
									በብሉይ ኪዳን ዘመን ለእግዚአብሔር ተለይተው የነበሩት እስራእላውያን የአምልኮት ስርአታቸውን ሲፈጽሙ፣ እግዚአብሔር ላደረገላቸው ማዳንና ለሰጣቸው 
									ድል ምላሽን ሲሰጡ፣ እንዲሁም ተግሳጽና ምክርን ሲቀበሉ መዝሙር አይነተኛ መንገድ ይሆንላቸው እንደነበረ ታሪካቸው ያስረዳናል።  በዘፀ 15 ፥ 1 – 18
									 ላይ “ በዚያም ጊዜ ሙሴ እና የእስራኤል ልጆች ይህን መዝሙር ለእግዚአብሔር ዘመሩ ……..” በማለት ከጽኑ ባርነት ደርሶ ነፃ ላወጣቸው አምላክ የልባቸውንና 
									 አልፎም የነፍሣቸውን ምልአት በመዝሙር ማፍሰሳቸውን እናያለን። በዘኁ 21 ፥ 17 – 18 ላይ ደግሞ ከባርነት ያላቀቃቸው እግዚአብሔር በምድረበዳ ምንም
									  በማይታሰብበት ሥፍራ ውሃን እንዲጠጡ በሰጣቸው ጊዜ “...በዚያም ጊዜ እስራኤል ይህን መዝሙር ዘመረ...”  በማለት የሆነውን ነገር ያመላክተናል። 
									  ከ40 አመት ጉዟቸው በሗላ የተስፋይቱን ምድር ሊወርሱ ባሉበት ሰአት እንኳን በእግዚአብሔር አላማ እና ሃሳብ ከግብጽ መርቶ ያወጣቸው ሙሴ እስራኤል ሕዝብ 
									  ወደመሆን ከመድርሱ አስቀድሞ ከአባታቸው ከያእቆብ ጀምሮ እግዚአብሔር ያደረገላቸውን፤ የእስራኤልም ሕዝብ ለተደረገለት በጎነት የሰጠውን የአመጻ ምላሽ እና፣
									   ያስከተለባቸውን መዘዝ በዝርዝር በሚያስረዳ መንገድ ለመግለጽ የተጠቀመው መዝሙርን እንደሆነ በዘዳ 31 ፥ 30 እስከ 32 ፥ 43 ባለው ክፍል ያስነብበናል። 
									   በግለሰቦችም ደረጃ በ2ኛ ሳሙኤል 22 ፥ 2 – 51 በንጉሱ በዳዊት ሕይወትና፣ በመሳፍንት 5፥2-31 በዲቦራ እና በባርቅ ሕይወት ተጨማሪ መዝሙርን 
									   እንዴት እንደ ተጠቀሙበት ያሳየናል።
								</div>
								<div align="justify" id ="choir_statment_two">									
									የመዝሙርን አስተዋፅኦ ከላይ ለማየት በሞከርናቸው ሐሳቦች ብቻ ባለመገደብ በዚህ አቅጣጫ ጠለቅ ያለ ጥናት ያደረጉ ሰዎች ጨምረው እውነታን ለቀጣዩ ትውልድ 
									ለማስተላለፍ የሚጠቅም መሆኑን ይናገራሉ። ለዚህም በዋቢነት በዘፀ 15 ፥ 1-18 ከላይ ያየነውን መዝሙር በአለማችን ረዥም እድሜን ያስቆጠረና የእስራኤል ሕዝብ
									 ከእግዚአብሔር ጋር ያለውን የኪዳን ታሪክ የያዘ መዝሙር አድርገው ያቀርቡታል።
								</div>
								<div align="justify" id ="choir_statment_two">									
									ሌላው የብሉይ ኪዳን መፃህፍት መዝሙርን እስካሁን ካየንባቸው አቅጣጫዎች በተጨማሪ ትንቢትን ከመናገር ጋር ተጓዳኝ አድርገው የማስቀመጣቸውን ጉዳይ ነው። 
									1ኛዜና 25 ፥ 1 ላይ ንጉሱ ዳዊት (በመዝሙር አኳያ ብዙ ሊባልለት የሚችል ሰው) ከሰራዊቱ አለቆች ጋር በመሆን “....ከአሳፍና ከኤማን ከኤዶታም 
									ልጆች በመሰንቆና በበገና በጸናጽልም ትንቢት የሚናገሩትን ሰዎች ለማገልገል ለዩ ...” በማለት ያስረግጥልናል። በ1ኛ ሳሙ 10 ፥ 5 ላይ እንዲሁ ነብዩ 
									ሳሙኤል የእስራኤል ሕዝብ እግዚአብሔርን ንጉስ አንግስልን ብለው በጠየቁት ጊዜ መልስ ሆኖ የተገለጠውን ሳኦልን ከቀባው በሗላ በነገረው ትንቢታዊ መልእክት
									 ውስጥ “....ወደዚያም ወደ ከተማይቱ በደረስህ ጊዜ፥ በገናና ከበሮ እምቢልታና መሰንቆ ይዘው ትንቢት እየተናገሩ ከኮረብታው መስገጃ የሚወርዱ የነቢያት
									  ጉባኤ ያገኙሃል። ” በማለት መዝሙርንና ትንቢት መናገርን አጣምሮ አስቀምጦት እናያለን። በዘፀ 15 ፥ 20 ላይ ስለ ነቢይቱ ስለማርያም ከበሮ ይዛ ልትዘምር 
									  የመምጣቷ ሐሳብ ይህንኑ የሚያጎላና የሚያጠናክር ነው። እንግዲህ መዝሙር በብሉይ ኪዳን በእግዚአብሔርና በሕዝቡ መሀከል የጎላ ተግባር እንደነበረው በጥቅሉ እንረዳለን።
								</div>
								<div id ="choir_statment_four">
									መዝሙር በአዲስ ኪዳን
								</div>
								<div align="justify" id ="choir_statment_two">									
									ወደ አዲስ ኪዳን ስንመለስ መንፈስ ቅዱስ በአማኞች ላይ ገና ሳይወርድና ጌታ ኢየሱስም ገና ሳያርግ የእግዚአብሔር ሰዎች የቀደመውን ዘመን(ብሉይ ኪዳንን) ልማድ 
									መከተላቸውን እናስተውላለን። ለአብነት በሉቃ 1 ፥ 46 - 55 የምናገኘው  ማርያም ከኤልሳቤጥ ጋር በተገናኘችበት ሰአት የእግዚአብሔር መንፈስ በኤልሳቤጥ ውስጥ 
									ሞልቶ ለተናገረቻት መልእክት የመለሰችውን ምላሽ የመጽሀፍ ቅዱስ ማብራሪያን የጻፉ ሰዎች የላቲኑን(Latin) ቋንቋ ትርጉም ተከትለው የክፍሉን የመጀመሪያውን 
									ቃል (magnificat)ወይንም  ወደ እንግሊዝኛው ምፅሀረ-ቃል ሲለወጥ (magnificient) ሲሆን በአማርኛችን ዕጹብ ድንቅ ማለት መሆኑን አስጨብጠው፣ 
									የክፍሉ ይዘት መዝሙር እንደሆነ እና እንዲያውም የሀሳቡ አቀራረብ ተከትሎ ባለው ዘመን ለህብረት ሙዚቃ እና መዝሙሮች(choral, music and hymns)
									መሰረት ጣይ መሆኑን ያወሳሉ። ብዙም ሳንርቅ በዚያው በሉቃ 1 ፥ 67 - 79 ላይ የምናገኘው ሌላ ክፍል፣ ለወራት ከተሸበበው ከዘካርያስ አፍ የወጣውን የትንቢት ቃል 
									በተመሳሳይ መንገድ ከላቲኑ ቋንቋ ሲተረጎም፣ የመጀመሪያውን የክፍሉን ቃል ቤኔዲክተስ (Benedictus) ወይንም ወደ እንግሊዝኛው አቻ ቃል ሲመለስ (Benediction) 
									ማለት ሲሆን የአማርኛው ትርጓሜ ቡራኬ የሚል ሀሳብን የያዘ መዝሙር መሆኑን ይናገሩለታል። በዘካርያስ ንግግር ውስጥ ከላይ በብሉይ ኪዳን ዘመን ያየነው የትንቢት ቃልና መዝሙር 
									ተቀናጅተው መከሰታቸውን አንባቢው ያስተውላል። መንፈስ ቅዱስ በአማኞች ላይ ከወረደ በሗላ መዝሙር በህብረትና በተናጠል ከመዘመሩ ባሻገር የክርስቶስን አካል ለማነፅ በአማኞች
									መካከል ከሚሰሩ ስጦታዎች ጋር አብሮ የሚያገለግል መንፈሳዊ መሳሪያ ሆኖ መቅረቡን በ 1ኛ ቆሮ 14 ፥26-27 ባለው ክፍል መመልከት እንችላለን። በጌታ በኢየሱስ የመስቀል ስራ
									ከእግዚአብሔር አብ ጋር ወደዘላለማዊ ሕብረት የገቡ የአዲስ ኪዳን አማኞች በዚህ ምድር ላይ እያሉ በአካሉ ውስጥ እርስ በርስ ለመተናነጽ መዝሙርን ከመጠቀማቸው አልፎ የዘላለሙ 
									ኑሮ ሲጀምር በጌታ በአምላክ መገኘት ውስጥ መዘመር መቀጠላቸውንና የዋጃቸውን ጌታ ማክበራቸውን በራዕይ 14፥ 1-5 (አይሁዳውያንም ቢሆኑ እንኳ በጸጋ እንደሌሎች አማኞች 
									መዳናቸውን ልብ ይበሉ) እና በራዕይ 15፥ 2-4 ላይ ባሉት ክፍሎች የሰፈረው በምሳሌነት ሊያስረዳን ይችላል።
								</div>
								<div align="justify" id ="choir_statment_two">									
									በአዲስ ኪዳንም ሆነ በብሉይ ኪዳን መዝሙር ሲነሳ ሳንጠቅስ የማናልፈው ነገር ሰዎች ከልባቸው ለእግዚአብሔር ክብር ሲዘምሩና ሁለንተናቸውን ሲያፈሱ እግዚአብሔርም ሲከብር 
									የእግዚአብሔርን የማዳን ኃይል የሚያስለቅቅና አቅጣጫን የሚያሲዝ ምሪት የሚያመጣ መሆኑን ነው። ለዚህም በ2ኛ ዜና 20፥21-23 ኢዮሳፍጥና ሕዝቡ ያዩት የእግዚአብሔር ክንድ
									 የተገለጠው ጌጠኛን ልብስ ለብሰው የተነሰለፉ መዘምራን ባሰሙትና ወደ እግዚአብሔር ጸባኦት በደረሰ በመዝሙር ውስጥ በቀረበ ምስጋና እንጂ በወታደራዊ ኃይል ብልጫ አለመሆኑ 
									 ምስክር ነው። በሐዋ 16፥ 25-34 ላይ የምናገኘው የጳውሎስና የሲላስ በጸሎታቸው ውስጥ ለእግዚአብሔር በዜማ ታጅቦ የቀረበ ምስጋና የእግዚአብሔርን ታላቅ ኃይል ከመግለጡም 
									 በላይ ለወህኒው ጠባቂና ለቤተሰቡ መዳን ምክንያት ሊሆን መቻሉን እንደምሣሌ ማየት እንችላለን።
								</div>
								<div align="justify" id ="choir_statment_two">									
									እንግዲህ በዚህ ዘመን ባለችው ቤተ ክርስቲያን ስለዝማሬ አገልግሎት ስናስብና ስንነጋገር የአገልግሎት ዘርፎችን ቁጥር ከማበራከት በዘለለ ከላይ ለማየት የሞከርናቸውን መጽሀፍ ቅዱስን 
									መሠረት ያደረጉ ሃሳቦችን ግንዛቤ ውስጥ በማስገባት ሲሆን እንደሚገባው ራሱ የዘማሪያንና የመዝሙሮቻቸው (ሁሉንም ዘማሪያን ባይወክልም ቁጥራቸው ጥቂት ያይደለን ማለታችን 
									እንደሆነ ሊተኮርበት ይገባል) አግባብ ያልሆነ የጉዞ አዝጣጫ ግድ ይለናል። ይህንን መጽሀፍ ቅዱሳዊ ምልከታ የሚያንሸራሽሩ ሦስት አቢይ ሐሳቦችን አይተን የተነሳንበትን ሀሳብ እንቋጫለን።
								</div>
								<div id ="choir_statment_four">
									1.	የዝማሬ አገልግሎት ማእከሉ
								</div>
								<div align="justify" id ="choir_statment_two">									
									የዝማሬ አገልግሎት በቤተክርስቲያን የዳኑ ሠዎች የዝማሬን ፀጋ ተቀብለው በአንድ ልብ እና በአንድ ሀሳብ ለአንድ አላማ፣ እሱም በመዝሙር አምልኮን ምስጋናን ውዳሴን እንዲሁም አንዳንዴ 
									ጸሎትንና ምልጃን የሚያቀርቡበት መንገድ ነው። የዚህ አገልግሎት ተቀባይ ደግሞ ሁሉን በሁሉ የሞላ፤ የሁሉ ምንጭ እና መሰረት፤ አለምና በውስጧ ያሉት ወደመኖር ከመምጣታቸው አስቀድሞ
									 የነበረ ያለና የሚኖር፤ ከሰው ልጆች በፊት ከመላእክት አምልኮን የተቀበለ፤ ቤተክርስቲያን ተብላ የምትጠራዋን ተቋም (Institution) ህልውና የሰጣትና በህያውነት ለመቀጠሏ ብቸኛ 
									 እስትንፋሷ የሆነላት እግዚአብሔር ብለን የምንጠራው ታላቅ አምላክ ነው። ለዚህም የአገልጋዮቹም(የዘማርያን) ሆነ የተገልጋዩ ሕዝም አእምሮና ልብ ውስጥ እንዲሁም የሚቀርበው የመዝሙር 
									 መስዋእት እምብርት ወይም  ማእከሉ ጌታ ብቻውን ሊሆን ይገባል። ዛሬ በቤተክርስቲያን የምናስተውለው ከዚህ እውነት የተንሸራተተ አካሄድ ከእውነተኛ አምልኮ የራቀንና የተደጋገመ የሰው 
									 የሆነን ነገር አብዝተን የምናይበትና በእግዚአብሔር ቤት ሰዎች የሚሰላቹበትን ሁኔታ ለመፍጠሩ ብዙ ምስክር አያሻንም። የሚዘምሩት መዝሙሮች ጌታን የማከሉ (God-Centered) 
									 ከመሆን ይልቅ በዘማሪዎች እኔነት ዙሪያ የሚያጠነጥኑ መሆናቸውን ብዙዎች የሚታዘቡት ጉዳይ ነው። መፍትሔው ወደ እግዚአብሔር ቃል እውነት መመለሳችን ይሆናል። ቆላ 3 ፥ 16 – 17
								</div>
								<div id ="choir_statment_four">
									2.	ከወጭቱ ጥራት ያልፋል
								</div>
								<div align="justify" id ="choir_statment_two">									
									የዝማሬ አገልግሎት ዘማሪዎች በአለም ዙሪአ ልብሰው ከሚገለጡባቸው ህብረ-ቀለማት ካላቸው የመዘምራን አልባሳት በ እጅጉ ያለፈ አገልግሎት መሆኑን መረዳት አስፈላጊ ነው። ብዙዎችን ወደ 
									አገልግሎቱ የሚስብ ዋና ነገር በየዘመናቱ እርሱ ሆኖ ተገኝቷልና። ይልቁንም ከጌታ ጋረ የቅድሚያ ግንኙነትና ቷቅ የሚፈልግ፤ ጥሪን የሚፈልግ፤ ራስን፣ ጊዜን እና ያለንን መስጠት የሚጠይቅ፤ 
									አገልግሎቱ የምጠይቀውን ፀጋና የመዘመር ችሎታ (ሙዚቃን የመለየት፣ ምትን የመከተልና በግል እና በሕብረት ከመሳሪያ ጋር  ተዋህዶ የመዘመርንና ሌሎችን መስፈርቶች) የሚጠይቅ የፍቅር 
									ድካም ያለበት አገልግሎት ነው። በመድረክ ላይ ከብዙ አድካሚ ልምምድ በሗላ በሕዝቡ ጉባኤ ለጌታ ሰቀርቡ ለስላሳ ሆኖ እንደሚሰማውና ሰሚውን እንደሚማርከው ዝማሬ ዝግጅቱ ስፍታራ ጋ 
									ያለው ነገር የቀለለ ያለመሆኑን ግንዛቤን የሚጠይቅ አገልግሎት ነው። ይህ ብቻ ሳይሆን ከመድረኩ ውጪ እንደማንም ብዙ ጉድለት ካለባቸው ሰዎች ጋር ተጠምዶ የሚገለገልበት፣ ከዚህም የተነሳ 
									የአንዱ ባህርይ በሌላው የሚገለጽበትና የራስን አመል ለጌታ ክብር የሚጥሉበት፤ እንድም ወይንም እህት ከራስ ይልቅ እንዲሻሉ በመቁጠር አብሮ ለማገልገልና ለማደግ ራስን ገልጠው የሚሰጡበት 
									የመፈተኛ ማሣ ነው። ትህትናንም እንደልብስ መታጠቅ የሚያስፈልግበትና ሌላው ውንድም ወይም እህት እግዚአብሔር በሰጣቸው ጸጋ ሲያድጉ ባለመቅናትና በንጹህ ህሊና መደገፍን የሚጠይቅ 
									አገልግሎት ነው። ፊሊ 2 ፥ 2 – 8
								</div>
								<div id ="choir_statment_four">
									3.	ተጠያቂነት አለበት
								</div>
								<div align="justify" id ="choir_statment_two">									
									የመጨረሻው የምናነሳው ሀሳብ እግዚአብሔር በ እርግጥ ሰውን ወደዚህ አገልግሎት  ጠርቶ ከሆነና የሚያስፈልገውን ፀጋ ሁሉ አፍስሶ ከሆነ እርሱ እራሱ ተቀባዩን የሚጠይቅበት ጊዜ እንዳለው፤ 
									ያም ብቻ አይደለም ብድራትንም እንደሚከፍል አጥብቆ በመረዳት ማገልገልን የሚጠይቅ አገልግሎት ነው። ማቴ 24፥45-51 ሠዎችን ብቻ በፊቱ አኑሮ ሰው ለእርሱ የሚመቸውን እንዳያደርግና 
									አገልግሎበት እንዲያተርፍበት በአደራ በተቀበለው ፀጋ መቆሙን እንጂ ከራሱ የሆነ አንዳች እንደሌለው እየገባው ጌታን በማላቅ የሚያገለግሉበት አገልግሎት ነው።
								</div>
								<div align="justify" id ="choir_statment_two">									
									ባጠቃላይ በዝማሬ አገልግሎት ውስጥ ያሉ አገልጋዮችም ሆኑ ገና ወደ አገልግሎት ለመግባት ልባቸው የሚከጅል ሁሉ አበክረው ሊያስቡ የሚገባቸው አገልግሎቱ ጌታን እንጂ እነሱን ለማድመቅ 
									አለመሆኑን እና የአገልግሎቱ ባለቤት ለራሱ ስራ ግድ የሚለው፤ የርሱ ፈቃድ እና ሀሳብ ያለው መሆኑን ነው
								</div>
								
								<br>
							</div>
																	
							<div id="choir_statment">
								<div id ="choir_statment_one">
									ዕብ 13 ፥ 20 - 21
								</div>
										
								<p align="justify" id ="choir_statment_two">
									“በዘላለም ኪዳን ደም ለበጎች ትልቅ እረኛ የሆነውን ጌታችንን ኢየሱስን ከሙታን ያወጣው የሰላም አምላክ፥ በኢየሱስ ክርስቶስ በኩል በፊቱ ደስ የሚያሰኘውን በእናንተ እያደረገ ፈቃዱን 
									ታደርጉ ዘንድ በመልካም ስራ ሁሉ ፍጹማን ያድርጋችሁ፤ ለእርሱ እስከ ዘላለም ድረስ ክብር ይሁን፤ አሜን” 
								</p>
									
								<br>
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
