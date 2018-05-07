
		<?php
			//initialize the page variables here so no errors occur in some server environments
			
			$one="myButtons";
			$two="myButtons";
			$three="myButtons";
			$four="myButtons";
			
			//this line gets the file name without the dot and extension
			$menuLinkid =basename($_SERVER['PHP_SELF'],".php");
			
			if($menuLinkid == 'Index'){
				$one= "onlink";
			}
			elseif($menuLinkid == 'Yeras_mezmur'){
				$two = "onlink";
			}			
			elseif($menuLinkid == 'Yelela_mezmur'){
				$three = "onlink";
			}
			elseif($menuLinkid == 'Choir_MembersList'){
				$four = "onlink";
			}
			
		?>
		
		<div id ="nav_bar">
			<div id = "nav_holder">	
					
						<ul>
							<li><a id="<?php echo $one;?>" href="Index.php">የኳየር ዋና ቤት</a></li>
							<li><a id="<?php echo $two;?>" href="Yeras_mezmur.php">የራስ መዝሙር</a></li>
							<li><a id="<?php echo $three;?>" href="Yelela_mezmur.php">የሌላ መዝሙር</a></li>
							<li><a id="<?php echo $four;?>" href="Choir_MembersList.php">የኳየር አባላት</a></li>
							
						</ul>
				
			</div> <!-- end nav_holder div -->
			
		</div><!-- end nav_bar div -->