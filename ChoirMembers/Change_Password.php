<!-- EditChoirMember.php -->

<?php 

	if(!isset($_SESSION)){
		session_start();
		date_default_timezone_set('America/Los_Angeles');
	}
	if ($_SESSION['Admin'] != 'ChoirAdmin'){
	
		if ($_SESSION['Admin'] != 'AdminAll'){
			header("Location:../includes/SignIn_Choir.php");
			exit();
		}
	}
?>
	<?php 
	


	if(isset($_POST["submit"])){
		// Storing the form contents to php variables
		$pass = htmlspecialchars(strip_tags($_POST["password1"]));
		$uid = $_POST["uid"];
	
	
		// Creating DB Connection
		include ('includes/connection.php');
		$connection = new createConnection(); //i created a new object
		$connection->connectToDatabase(); // connected to the database
		$connection->selectDatabase();// closed connection
		$conn = $connection->myconn;
	
		$userSQL="UPDATE choirmember SET Password=sha1('$pass') WHERE id='$uid'";
	
		$result = mysql_query($userSQL,$conn);
		 
		if($result)
		{
			header('Location: users.php');
			exit;
		}
		else
		{
			echo "Error inserting data!";
			exit;
		}
	
		$connection->closeConnection();
	
	}



?>



<!doctype html>
<html
	lang="en">
<!------------------------------------head starts------------------------------------->
<head>
<meta charset="utf-8">
<title>Zion Evangelical Felowsip Church</title>
<link href="../CSSFolder/MainAll.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/Admin.css" rel="stylesheet" type="text/css" />
<link href="../CSSFolder/HeaderFooter.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../CSSFolder/Navigation.css" type="text/css">



</head>
<!-- ---------------------------------------head ends------------------------------------- -->
<body>
	<div id="main_wrapper"><!-- it contains all the page content -->

		<?php require ('../HeaderFooter/ZionHeaderChoir.php');?>

		<div id="sec_asi_div">
			<section id="main_section">
				<table id="mainTable">
					<tr id="mainTr">

						<!-- ////////////////////////////// main box start////////////////////////////////// -->

						<td id="main_text">
						<?php include_once ("TabNavAdminIndex.php");?>
							<div id="bodyContainer">
							<div id="bodyContentContainer">
								
								<div id="choir_registration_div">
								<?php 
									if (isset($_GET['id']) && $_GET['id'] > 0) {
							 			$uid = $_GET['id'];
									}
					 			?>
							      <form name="register" id="register" method="post" action="<?=$_SERVER['PHP_SELF']?>">
							            <fieldset class="legend">
							            <legend id="legend5">RESET PASSWORD</legend>
							                <p><br>
							                  <label>Password* </label>
							                    <input name="password1" id="password1" type="password"/><br/><br>
							                    
							                    <label>Repeat Password* </label>
							                    <input name="password2" id="password2" type="password"/>
							                    
							                   <input type="hidden" name="uid" id="uid" value="<?=$uid?>">
							                </p><br><br>
							            </fieldset>
							            <div><button id="ChoirSubmit" name="submit" class="button">Save Changes &raquo;</button></div>
							      </form>	
								</div>
							</div> <!-- end bodyContentContainer div -->
							</div> <!-- end bodyContainer div -->
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
