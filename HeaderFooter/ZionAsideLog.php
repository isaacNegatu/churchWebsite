
<?php if(!isset($_SESSION)){
	
	session_start();
		
}?>
<div id = "Log_nav_wrap">
	<ul class = "Log_nav_menue">
		<li><a href="#">Welcome <?php echo $_SESSION['FName'] ?></a>
			<ul>
				<li><a href="../includes/logout.php" >Logout</a></li>
			</ul>
		</li>
	</ul>
</div>
