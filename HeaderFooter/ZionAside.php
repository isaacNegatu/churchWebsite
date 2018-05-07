
<aside id="main_side">
	<div id="maintable">
		<div id="DateTable">
			<p>&nbsp;</p>
			<script>var mydate=new Date()
					var year=mydate.getYear()
					if (year < 1000)
					year+=1900
					var day=mydate.getDay()
					var month=mydate.getMonth()
					var daym=mydate.getDate()
					if (daym<10)
					daym="0"+daym
					var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
					var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
					document.write("<center><font color='#800000' face='Colonna MT' size='22px'><b>"+dayarray[day]+"</b></font></center>")
					document.write("<center><font color='#800000' face='Arial'><b>"+montharray[month]+" "+daym+", "+year+"</b></font></center>")
					</script>
			<p>&nbsp;</p>
		</div>
		<div id="BibleTable">

			<img src="Image/Bible.png" id="Bible_img">
		</div>
		<div id="BibleVerceTable">
			<p>&nbsp;</p>

			<!-- START DAILY BIBLE VERSE CODE FROM ChristNotes.org -->
			<!-- CHANGING THIS CODE MAY RESULT IN ALTERED LOOKS OR ERRORS -->
			<div id= "verse_of_the_day">
				<p id="verse_od1">
					 <a id="BibleVerseHeader" href="http://www.christnotes.org/dbv.php"
						onclick="javascript:window.open('http://www.christnotes.org/dbv.php'); return false"> 
												<font color="#39695d"> 
												   <font face="Agency FB" size="5">V</font> 
												   <font size="4" face="Agency FB">erse Of The Day</font>
												</font>
					</a>
					
				</p>
				<p id="verse_od2">
					<script type="text/javascript"
						src="http://www.christnotes.org/syndicate.php?content=dbv&amp;
													type=js2&amp;
													tw=100%25&amp;
													tbg=#800000&amp;
													bw=#1&amp;
													bc=440044&amp;
													ta=C&amp;tc=#ffffff&amp;
													tf=Times+New+Roman&amp;
													ts=18&amp;
													ty=B&amp;
													va=C&amp;
													vc=007700&amp;
													vf=Times+New+Roman&amp;
													vs=17&amp;
													tt=7&amp;
													trn=ASV">
												</script>
				</p>
				
			</div>
			<!-- END DAILY BIBLE VERSE CODE FROM ChristNotes.org -->
		</div>
		<div id="ChurchEscTable" valign="top">

			<fieldset id="ChurchEscTable_fieldset">
				
			
					<p id="ChurchEscTable_legend1">
						<span id="WeeEv_p">You Are Invited 
						<br>To Worship With Us </span><br>
					</p><br>
					<p id="fi_p">Sunday</p>
					<p id="fi_p3">10:00 AM - 12:00 PM</p><br>
					<p id="fi_p">Saturday</p>
					<p id="fi_p3">3:00 PM - 5:00 PM</p><br>
					<p id="fi_p">Thursday</p>
					<p id="fi_p3">6:00 PM - 8:00 PM</p><br>	
								
					<P id="ChurchEscTable_legend2">Contact</P>
					<p id="fi_p3">651-734-5552</p>
					<p id="fi_p3">651-734-8043</p> 
					<p id="fi_p3">www.zionefc.com</p>
					
					
				<!--  	<a href="Stream.php"><img src="Image/Stream.png" width="150px" height="90px"
						style="border: 0px double #000000"></a> -->
			
			</fieldset>
			<p></p>

		</div>
	</div>
</aside>
