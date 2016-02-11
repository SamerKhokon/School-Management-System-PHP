<?php		error_reporting(0);
			require_once 'reader.php';            
			$er = new Spreadsheet_Excel_Reader();
			$excel_file = "modify_mark_result.xls";
			$er->read($excel_file);			
   						
			$con = mysql_connect("localhost","root","");
			mysql_select_db("school",$con);
			
			$rows = $er->sheets[0]['numRows'];
			$cols = $er->sheets[0]['numCols'];
			
			$school_name = $er->sheets[0]['cells'][1][1];
			$class_id    = $er->sheets[0]['cells'][2][2];
			$section_id  = $er->sheets[0]['cells'][3][2];
			$branch_id   = 1;
			
			if($school_name=="")
			{
			    echo "Please enter school name in your excel file."; 
			}
			else if($class_id=="")
			{
				echo "Please enter class name in your excel file.";
			}
			else if($section_id=="")
			{
				echo "Please enter section in your excel file.";
			}
			else if($school_name!="" && $class_id!="" && $section_id!="") 
			{
			
				for( $c = 1 ; $c < $cols ; $c++ ) 
				{
					$code = $er->sheets[0]['cells'][4][$c+3];
					if($code!="") 
					{
					 $sub_codes[] =$code;				
					} 
				}			
				
				for($r = 6; $r<=$rows;$r++ ) 
				{
					$serialno =  $er->sheets[0]['cells'][$r][1];
					$roll_no  =  $er->sheets[0]['cells'][$r][2];
					$stu_name =  $er->sheets[0]['cells'][$r][3];
					for($i=0 ; $i<count($sub_codes) ; $i++)
					{
						$sub_code = $sub_codes[$i];
						$st = 	($i+1)*4;
						$sb = $er->sheets[0]['cells'][$r][$st];				
						$ob = $er->sheets[0]['cells'][$r][$st+1];
						$ct = $er->sheets[0]['cells'][$r][$st+2];
						$pr = $er->sheets[0]['cells'][$r][$st+3];
						$total_mark = $sb+$ob+$ct+$pr;
						$grade = get_grade($total_mark,$branch_id);
						echo $i."  ".$r."  ".$st."  ".$roll_no."  ".$stu_name."  ".$sub_code." ".$sb." ".$ob." ".$ct." ".$pr." ".$total_mark."  ".$grade."  <br/>";
						
					}
					echo "<br/>";
				}
			}else{
			  echo "Please enter school name,section,class in your excel file.";			
			}
			
	
			
			function get_grade($total_mark , $branch_id)
			{
				$aplus_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=1";
				$aplus_mark_query = mysql_query($aplus_mark_str);
				$aplus_mark_res = mysql_fetch_row($aplus_mark_query);								
				$aplus_mark_start   = $aplus_mark_res[0];
				$aplus_mark_end    = $aplus_mark_res[1];
				$aplus_mark_grade = $aplus_mark_res[2];
				$aplus_mark_point  = $aplus_mark_res[3];
				
				$a_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=2";
				$a_mark_query = mysql_query($a_mark_str);
				$a_mark_res = mysql_fetch_row($a_mark_query);								
				$a_mark_start   = $a_mark_res[0];
				$a_mark_end    = $a_mark_res[1];
				$a_mark_grade = $a_mark_res[2];
				$a_mark_point  = $a_mark_res[3];					
				
				$aminus_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=3";
				$aminus_mark_query = mysql_query($aminus_mark_str);
				$aminus_mark_res = mysql_fetch_row($aminus_mark_query);								
				$aminus_mark_start   = $aminus_mark_res[0];
				$aminus_mark_end    = $aminus_mark_res[1];
				$aminus_mark_grade = $aminus_mark_res[2];
				$aminus_mark_point  = $aminus_mark_res[3];										

				$bplus_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=4";
				$bplus_mark_query = mysql_query($bplus_mark_str);
				$bplus_mark_res = mysql_fetch_row($bplus_mark_query);								
				$bplus_mark_start   = $bplus_mark_res[0];
				$bplus_mark_end    = $bplus_mark_res[1];
				$bplus_mark_grade = $bplus_mark_res[2];
				$bplus_mark_point  = $bplus_mark_res[3];
				
				$b_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=5";
				$b_mark_query = mysql_query($b_mark_str);
				$b_mark_res = mysql_fetch_row($b_mark_query);								
				$b_mark_start   = $b_mark_res[0];
				$b_mark_end    = $b_mark_res[1];
				$b_mark_grade = $b_mark_res[2];
				$b_mark_point  = $b_mark_res[3];																						

				$bminus_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=6";
				$bminus_mark_query = mysql_query($bminus_mark_str);
				$bminus_mark_res = mysql_fetch_row($bminus_mark_query);								
				$bminus_mark_start   = $bminus_mark_res[0];
				$bminus_mark_end    = $bminus_mark_res[1];
				$bminus_mark_grade = $bminus_mark_res[2];
				$bminus_mark_point  = $bminus_mark_res[3];															
				
				$cplus_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=7";
				$cplus_mark_query = mysql_query($cplus_mark_str);
				$cplus_mark_res = mysql_fetch_row($cplus_mark_query);								
				$cplus_mark_start   = $cplus_mark_res[0];
				$cplus_mark_end    = $cplus_mark_res[1];
				$cplus_mark_grade = $cplus_mark_res[2];
				$cplus_mark_point  = $cplus_mark_res[3];																				
				
				$c_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=8";
				$c_mark_query = mysql_query($c_mark_str);
				$c_mark_res = mysql_fetch_row($c_mark_query);								
				$c_mark_start   = $c_mark_res[0];
				$c_mark_end    = $c_mark_res[1];
				$c_mark_grade = $c_mark_res[2];
				$c_mark_point  = $c_mark_res[3];															
			
				$cminus_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=9";
				$cminus_mark_query = mysql_query($cminus_mark_str);
				$cminus_mark_res = mysql_fetch_row($cminus_mark_query);								
				$cminus_mark_start   = $cminus_mark_res[0];
				$cminus_mark_end    = $cminus_mark_res[1];
				$cminus_mark_grade = $cminus_mark_res[2];
				$cminus_mark_point  = $cminus_mark_res[3];																			
				
				$d_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=10";
				$d_mark_query = mysql_query($d_mark_str);
				$d_mark_res = mysql_fetch_row($d_mark_query);								
				$d_mark_start   = $d_mark_res[0];
				$d_mark_end    = $d_mark_res[1];
				$d_mark_grade = $d_mark_res[2];
				$d_mark_point  = $d_mark_res[3];																								
				
				$f_mark_str = "select mark_start,mark_end,grade,point from tbl_grade_setting where branchid=$branch_id and id=11";
				$f_mark_query = mysql_query($f_mark_str);
				$f_mark_res = mysql_fetch_row($f_mark_query);								
				$f_mark_start   = $f_mark_res[0];
				$f_mark_end    = $f_mark_res[1];
				$f_mark_grade = $f_mark_res[2];
				$f_mark_point  = $f_mark_res[3];																													
							
				
				if($total_mark >= $aplus_mark_start) 
				{
					
					return  $aplus_mark_grade.",".$aplus_mark_point;
				}
				else if($total_mark >= $a_mark_start && $total_mark <= $a_mark_end ) 
				{
					return $a_mark_grade.",".$a_mark_point;
				}
				else if($total_mark >= $aminus_mark_start && $total_mark <= $aminus_mark_end ) 
				{
				   return  $aminus_mark_grade.",".$aminus_mark_point;
				}
				else if($total_mark >= $bplus_mark_start && $total_mark <= $bplus_mark_end ) 
				{
					return  $bplus_mark_grade.",".$bplus_mark_point;
				}
				else if($total_mark >= $b_mark_start && $total_mark <= $b_mark_end ) 
				{
				   return  $b_mark_grade.",".$b_mark_point;
				}
				else if($total_mark >= $bminus_mark_start && $total_mark <= $bminus_mark_end ) 
				{
					return  $bminus_mark_grade.",".$bminus_mark_point;
				}
				else if($total_mark >= $cplus_mark_start && $total_mark <= $cplus_mark_end ) 
				{
				   return  $cplus_mark_grade.",".$cplus_mark_point;
				}
				else if($total_mark >= $c_mark_start && $total_mark <= $c_mark_end ) 
				{
				   return $c_mark_grade.",".$c_mark_point;
				}
				else if($total_mark >= $cminus_mark_start && $total_mark <= $cminus_mark_end ) 
				{
				   return $cminus_mark_grade.",".$cminus_mark_point;
				}
				else if($total_mark >= $d_mark_start  && $total_mark <= $d_mark_end ) 
				{
				   return  $d_mark_grade .",".$d_mark_point ;
				}
				else if($total_mark >= $f_mark_start && $total_mark <= $f_mark_end ) 
				{
				   return $f_mark_grade.",".$f_mark_point;
				}											
			}	
?>