
<?php if(!isset($_SESSION)){
	
	session_start();
	date_default_timezone_set('America/Los_Angeles');
		
}?>
<li><a href="#">ADMIN</a>
	<ul>
		<li><a href="../ChoirMembers/Index.php">CHOIR HOME</a></li>
		<li><a href="../ChoirMembers/RegisterChoir.php">ADMIN PAGE</a></li>
		<li><a href="../index/Add_bibleStudy_group.php">ADD BIBLE_S_GROUP</a></li>
		
	</ul>
</li>