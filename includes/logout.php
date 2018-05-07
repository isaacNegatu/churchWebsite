<?php
	session_start();
	session_destroy();
	header("Location:../index/Index.php");
	exit();
?>
