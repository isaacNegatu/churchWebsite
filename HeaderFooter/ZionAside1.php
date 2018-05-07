<?php if(!isset($_SESSION)){
	
	session_start();
	date_default_timezone_set('America/Los_Angeles');
		
}?>
<aside id="main_side_one">
	<div id="maintable_one">
		<div id="DateTable">			
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
		</div> <!-- end of DateTable div -->
	</div>
</aside>
