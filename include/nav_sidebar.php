<div class="page-sidebar navbar-collapse collapse">
         <!-- BEGIN SIDEBAR MENU -->        
         <ul class="page-sidebar-menu">
            <li>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
               <div class="sidebar-toggler hidden-phone"></div>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
               <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
               
               <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            
            <?php
$Select = mysql_query("SELECT * FROM `hierarchy`");
while($Row = mysql_fetch_assoc($Select)){
	if($Row['category'] == 'm'){
		$Arr[$Row['hierarchy_id']] = $Row['sub_category'];
	}else{
		$Childs[$Row['category']][$Row['hierarchy_id']] = $Row['sub_category'];
	}
}

function gettree($Array,$view,$macs){
	global $Childs;
	$i=1;
		foreach($Array as $key => $value){
			
			////////////////////////////////////////////////////////////////////////////////
			//print_r($macs);
			//echo $value;
			if(array_key_exists($value,@$macs)){
			////////////////////////////////////////////////////////////////////////////////
			
				$sql_category_name = "SELECT * FROM t_modules WHERE moduleid = '".escape($value)."'";
				$qry_category_name = mysql_query($sql_category_name); 
				while($rs_category_name = mysql_fetch_array($qry_category_name))
				{ 
					//$moduleid = $rs_category_name['moduleid'];
					$name = $rs_category_name['name'];
					$page_link = $rs_category_name['page_link'];
					$icon = $rs_category_name['icon'];
				}
			
				$qry_is_main_cat = mysql_query("SELECT category FROM `hierarchy` WHERE hierarchy_id=$key");
				$is_main_cat = mysql_result($qry_is_main_cat, 0, "category");
				
				
				$qry_moduleid = mysql_query("SELECT moduleid FROM t_modules WHERE page_link='".$view."'");
				@$moduleid = mysql_result($qry_moduleid, 0, "moduleid");
				
				
				$qry_is_act = mysql_fetch_assoc(mysql_query("SELECT * FROM `hierarchy` WHERE sub_category='".$moduleid."'"));
				$category = $qry_is_act['category'];
				//echo "cat=".$category;
				//echo "moduleid=".$moduleid;
				//if($category == $moduleid) echo 'class="active navAct "';
			
				
				
				echo '<li id="module_'.$value.'" ';
					if($page_link == $view) echo 'class="active "';
				echo '>';
					echo '<a   href="'.urlroute($page_link).'"';
					//if($category == $moduleid) echo 'class="expand subOpened"';
					//if($category == $moduleid) echo 'id="current"';
					echo '>';
						echo '<i class="'.$icon.'"></i>';
						echo '<span class="title">';
						echo $name;
						echo '</span>';
						echo '<span class="selected"></span>';
						if($page_link == '#'){ 
							echo '<span id="module_anchor_'.$value.'" class="arrow"></span>';
						}
					echo '</a> ';
					
				if($is_main_cat != 'm'){	
					echo '</li>';
				}
			
			
			
				if(isset($Childs[$key])){
					echo '<ul class="sub-menu" id="module_ul_'.$value.'" >';
					gettree($Childs[$key],$view,$macs);
					echo '</ul>';
				}
			
			////////////////////////////////////////////////////////////////////////////////
			} 	
			////////////////////////////////////////////////////////////////////////////////
			
		}
}


gettree($Arr,$view,$macs);

?>
            
         </ul>
         <!-- END SIDEBAR MENU -->
      </div>