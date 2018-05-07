
		<?php
			//initialize the page variables here so no errors occur in some server environments
			
			$one="myButtons";
			$three="myButtons";
			$four="myButtons";
			
			//this line gets the file name without the dot and extension
			$menuLinkid =basename($_SERVER['PHP_SELF'],".php");
			
			
			if($menuLinkid == 'RegisterChoir'){
				$one = "onlink";
			}			
			elseif($menuLinkid == 'AddSermon'){
				$three = "onlink";
			}
			elseif($menuLinkid == 'AddChoirNotice'){
				$two = "onlink";
			}
			elseif($menuLinkid == 'AddMezmur'){
				$four = "onlink";
			}
			elseif($menuLinkid == 'Notice'){
				$five = "onlink";
			}
			
		?>
		
		<div id ="nav_bar">
			<div id = "nav_holder">	
					
						<ul>
							<li><a id="<?php echo $one;?>" href="RegisterChoir.php">ኳየር መመዝጊቢያ</a></li>
							<li><a id="<?php echo $three;?>" href="AddSermon.php">ስብከት መጨመሪያ</a></li>
							<li><a id="<?php echo $four;?>" href="AddMezmur.php">መዝሙር መጨመሪያ</a></li>
							<li><a id="<?php echo $two;?>" href="AddChoirNotice.php">የሚጠኑ መዝሙሮች</a></li>
							<li><a id="<?php echo $five;?>" href="Notice.php">ማስታወቂያ</a></li>
							
						</ul>
				
			</div> <!-- end nav_holder div -->
			
		</div><!-- end nav_bar div -->