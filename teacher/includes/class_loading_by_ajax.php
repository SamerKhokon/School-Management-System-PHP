<?php
                include("../db.php");
				$class_id   =trim($_POST["class_id"]);
				$branchid  = trim($_POST["branchid"]);
				
				$qry = "SELECT  subject_code,subject_name FROM std_subject_config WHERE class_id=$class_id AND branch_id=$branchid";
							
				$str = mysql_query($qry);				
				global $option;
					
				while($res = mysql_fetch_array($str) ) {
				  $option .= "<option value='$res[0]'>$res[1]</option>";				
				}
				echo $option;  
?>