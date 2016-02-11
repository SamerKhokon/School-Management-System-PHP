<?php       require_once('../db.php');
			//"class_id="+class_id+"&class_sec="+class_sec+"&month="+month+"&branch="+branch_id;						
            
			
			
			$class_id  = trim($_POST["class_id"]);
			$class_sec = trim($_POST["class_sec"]);
			$month     = trim($_POST["month"]);
			$branch_id = trim($_POST["branch"]);
			
			
			function get_section_id($class_id,$class_sec,$branch_id) {
			  $st  = "SELECT id FROM `std_class_section_config` WHERE class_id=$class_id AND section_name='$class_sec' and branch_id=$branch_id";
			  $ss = mysql_query($st);	  
			  $rs = mysql_fetch_row($ss);
			  return $rs[0];
			}
			
			$section_id = get_section_id($class_id,$class_sec,$branch_id);
			
			$chk = "select count(*) from std_fee_details where checker_status='checked' and class_id=$class_id and section_id=$section_id and month='$month' and branch_id=$branch_id";
		    $chk_str = mysql_query($chk);	
			$chk_res = mysql_fetch_row($chk_str);
			//if( $chk_res[0] == 0 ) 	{	
			    $str = "select * from std_fee_details where checker_status='unchecked' and class_id=$class_id and section_id=$section_id and branch_id=$branch_id and month='$month'";
				$sql = mysql_query($str);
				while($rs = mysql_fetch_array($sql)) 
				{			
				    
					$student_id   =$rs["std_id"];
					$student_name =$rs["std_name"];
					$classid	  =$rs["class_id"];
					$class   	  =$rs["class_name"];
					$amount		  =$rs["amount"];
					$secid		  =$rs["section_id"];			
					$months		  =$rs["month"];
					$branch		  =$rs["branch_id"];
					$update = "update std_fee_details set checker_status='checked' where std_id='$student_id' and class_id=$classid and section_id=$secid and month='$months' and branch_id=$branch";
					mysql_query($update);
				}				
			//}
			//else{ 	   echo 'Already authenticated';			}
			echo 'Successfully finished authentication!!!';
?>