<div id="content" class="box">

<?php   	include("../db.php");
			$excel_file = $_FILES["excel_file"]["name"];				
			$class_id   = trim($_POST['class_id']);
			$period     = trim($_POST['term_id']);      // alias of term				
			$section_id = trim($_POST['section_id']);   			
			$branch_id  = trim($_SESSION['LOGIN_BRANCH']); 			
			$file_name = date('Ymdhis').$excel_file;
			   			
			move_uploaded_file($_FILES["excel_file"]["tmp_name"],"./../upload/".$file_name );						
		
			require_once 'Excel/reader.php';				
			$data = new Spreadsheet_Excel_Reader();
			$data->read("./../upload/".$file_name);									
					
		    function get_grade($total_mark,$branch_id)
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
										
				
						if($total_mark >= $aplus_mark_start && $total_mark <= $aplus_mark_end ) 
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
				 
            function num_convert($sb_user,$ob_user,$ct_user,$class_id) 
			{
                    $query = "select SB_total,OB_total,CT_total from `tbl_class_exam_mark_distribution` where class_id=$class_id";  
				    $sql_query = mysql_query($query);
					while($res = mysql_fetch_array($sql_query) )
					{					
						$sb_db = (float)$res[0];
						$ob_db = (float)$res[1];
						$ct_db = (float)$res[2];
					}										
				     $total_db = $sb_db+$ob_db+$ct_db;    																
					 $total_user = $sb_user+$ob_user+$ct_user;					
				 	 $total_geting_mark = ($total_user*100)/$total_db;					
		            return $total_geting_mark;    
			}				 	 		
				 
				 
			function myfunc($period,$class_id,$section_id,$sub_code ,$roll,$name,$curent_row,$st,$tot,$branch_id,$file_name) 
			{
						$mrk  = "";
						$st   = $st*3;
						$ed   = $st+3;							
						$sm   = $st;
						$om   = $st+1;
						$cm   = $st+2;
						$year = date('Y');
						
						$data = new Spreadsheet_Excel_Reader();
						$data->read("./../upload/".$file_name);	

						$sub_mark  = $data->sheets[0]['cells'][$curent_row][$sm];						
						$ob_mark    = $data->sheets[0]['cells'][$curent_row][$om];
						$ct_mark     = $data->sheets[0]['cells'][$curent_row][$cm];						
						
						$grand_total_mark =	num_convert($sub_mark,$ob_mark,$ct_mark,$class_id);																							
						$vgrade      = get_grade($grand_total_mark,$branch_id);							
						$parse       =  explode(",",$vgrade);
						$gt_grade  = $parse[0];
						$gt_point   = $parse[1];											
						
						$grand_total_mark = substr($grand_total_mark,0,5);						
						
						if( $sub_code !="" &&  $sub_mark!="" && $ob_mark !="" && $ct_mark !="" ) 	
						{								
								echo $query =  "insert into tbl(class_id,class_sec,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,point,year,period,branch_id)  values($class_id,'$section_id','$roll','$sub_code',$sub_mark,$ob_mark,$ct_mark,$total_mark,'$gt_grade',$gt_point,$year,$period,$branch_id,$grand_total_mark)<br/>";
						}		   
			}
			
			$num_rows = $data->sheets[0]['numRows'];
			$num_cols  = $data->sheets[0]['numCols'];		 
			// 3 values  below come from form
		 
			$subject_code = array();
			for( $j = 0 ; $j < $num_cols ; $j++ )  
			{
				if($data->sheets[0]['cells'][4][$j+2]  != "" ) 
				{
					$subject_code[] = $data->sheets[0]['cells'][4][$j+2];
				}
			}
					//print_r($subject_code);											
			$no_of_subject_code = count($subject_code);
			for( $i = 1;  $i < $num_rows ; $i++ ) 
			{
				 // marks start from row5 
				 $row = $i+5;
				 if($row <= $num_rows)	 
				 {				 
					$roll     = $data->sheets[0]['cells'][$i+5][1];
					$name = $data->sheets[0]['cells'][$i+5][2];						 
					for( $k = 0 ;  $k <= $no_of_subject_code  ;  $k++ ) 
					{
						myfunc($period , $class_id , $section_id , $subject_code[$k] , $roll , $name , $row , $k+1 , $no_of_subject_code , $branch_id , $file_name );
					}
				}
			}  	
?>							
 <a href="?SM_id=19&nev=excel_mark_setting&menu_id=9">  <input type="button" value="Back"/> </a> 						
<br/>
</div>