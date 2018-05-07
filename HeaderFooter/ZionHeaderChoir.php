<?php if(!isset($_SESSION)){
	
	session_start();
	
		
}?>
	<!------------------------------------ logo start---------------------------------------->
		<header id = "main_header">
		
	 		<object>
			
			<param id="main_header1" name="flash" value="../flash/flashhtml.swf">
				<embed src="../includes/Tsion_Church_Web_Banner.swf" width="100%" height="200px" >
				</embed>
			</object> 
		</header>
		<!-- ------------------------logo end - Nav starts----------------------------------->
		<nav id ="main_nav">
			<div id = "nav_wrap">
				<ul class = "nav_menue">
					<li><a href="../index/Index.php">HOME</a></li>
					<li><a href="#">ABOUT US</a>
						<ul>
							<li><a href="../index/Welcome.php">PASTOR'S MESSAGE</a></li>
							<li><a href="../index/Faith_Statement.php">STATEMENT OF FAITH</a></li>
						</ul>
					</li>
					<li><a href="#">CHURCH SERVICE</a>
						<ul>
							<li><a href="../index/Devotional.php">DEVOTION</a></li>
							<li><a href="../index/Salvation.php">SALVATION</a></li>
							<li><a href="../index/Bible_study_groups.php">BIBLE STUDY GROUPS</a></li>
							<li><a href="../index/Prayer_request_form.php">PRAYER REQUEST</a></li>
							<li><a href="../index/Media.php">SERMON</a></li>
						</ul>
					</li>
					<li><a href="#">MINISTRIES</a>
						<ul>
							<li><a href="../index/page_in_progress.php">OUTREACH</a></li>
							<li><a href="../Choir/Choir_Index.php">CHOIR</a></li>
							<li><a href="../index/page_in_progress.php">CHILDREN</a></li>
							
						</ul>
					</li>
					<?php if(isset($_SESSION['valid_user']) && $_SESSION['valid_user']!=""){ 
								
								if ( ($_SESSION['Mem_mem_stat'] == "CHOIR")&&($_SESSION['Admin'] !== "ChoirAdmin")&&($_SESSION['Admin'] !== "AdminAll")) {
											
							
									require ('../includes/ChoirMemLI.php');
											
								}
								elseif( ($_SESSION['Mem_mem_stat'] == "CHOIR")&&(($_SESSION['Admin'] == "ChoirAdmin")||($_SESSION['Admin'] == "AdminAll"))){
									require ('../includes/AdminLI.php');
								
							
									}
								}
							?> 
				</ul>
				
			</div>
		</nav>