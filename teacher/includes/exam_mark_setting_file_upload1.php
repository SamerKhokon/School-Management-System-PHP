<?php   	include("../db.php");
               
			$excel_file = $_FILES["excel_file"]["name"];				
			$class_id   = $_POST['class_id'];
			$period     = $_POST['term_id'];      // alias of term				
			$section_id = $_POST['section_id'];   			
			$branch_id  = $_SESSION['LOGIN_BRANCH']; 
			// if upload then next task
			
			$file_name = date('Ymdhis').$excel_file;
			
			move_uploaded_file($_FILES["excel_file"]["tmp_name"],"./../upload/".$file_name );				
		
			require_once 'Excel/reader.php';				
			$data = new Spreadsheet_Excel_Reader();
			$data->read("./../upload/".$file_name);	
					
				function get_grade($total_mark) {
				
				
						if($total_mark >= 80 && $total_mark <= 100 ) {
							return 'A+';
						}else if($total_mark >= 75 && $total_mark <= 79 ) {
						   return 'A';
						}else if($total_mark >= 70 && $total_mark <= 74 ) {
						   return 'A-';
						}else if($total_mark >= 65 && $total_mark <= 69 ) {
						   return 'B+';
						}else if($total_mark >= 60 && $total_mark <= 64 ) {
						   return 'B';
						}else if($total_mark >= 55 && $total_mark <= 59 ) {
						   return 'B-';
						}else if($total_mark >= 50 && $total_mark <= 54 ) {
						   return 'C+';
						}else if($total_mark >= 45 && $total_mark <= 49 ) {
						   return 'C';
						}else if($total_mark >= 40 && $total_mark <= 44 ) {
						   return 'C-';
						}else if($total_mark >= 33 && $total_mark <= 39 ) {
						   return 'D';
						}else if($total_mark >= 0 && $total_mark <= 32 ) {
						   return 'F';
						}											
				 }			
                 function num_convert($sb_user,$ob_user,$ct_user,$class_id) {
				    $sql_query = mysql_query("select  SB_total,OB_total,CT_total from `tbl_class_exam_mark_distribution` where class_id=$class_id");
					$sb_res =  mysql_fetch_row($sql_query);
					
					$sb_db = $sb_res[0];
					$ob_db = $sb_res[0];
					$ct_db  = $sb_res[0];					
					$total_db = $sb_db+$ob_db+$ct_db;
										
					$total_user = $sb_user+$ob_user+$ct_user;
					
					$total_geting_mark = ($total_user*100)/$total_db;
					
					return $total_geting_mark;
				 }				 
				 function myfunc($period,$class_id,$section_id,$sub_code ,$roll,$name,$curent_row , $st,$tot,$branch_id,$file_name) {
						$mrk  = "";
						$st   = $st *3;
						$ed   = $st+3;							
						$sm   = $st;
						$om   = $st+1;
						$cm   = $st+2;
						$year = date('Y');
						$data = new Spreadsheet_Excel_Reader();
						$data->read("./../upload/".$file_name);	

						$sub_mark   = $data->sheets[0]['cells'][$curent_row][$sm];						
						$ob_mark    = $data->sheets[0]['cells'][$curent_row][$om];
						$ct_mark    = $data->sheets[0]['cells'][$curent_row][$cm];
						
						$grand_total_mark =  num_convert($sub_mark,$ob_mark,$ct_mark,$class_id);						
						$grade      = get_grade($grand_total_mark);							
						
						if( $sub_code !="" &&  $sub_mark!="" && $ob_mark !="" && $ct_mark !="" ) 	{								
								echo $query =  "insert into tbl(class_id,class_sec,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,year,period,branch_id)  values($class_id,'$section_id','$roll','$sub_code',$sub_mark,$ob_mark,$ct_mark,$total_mark,$grade,$year,$period,$branch_id)<br/>";
						}		   
				 }
			
					$num_rows = $data->sheets[0]['numRows'];
					$num_cols  = $data->sheets[0]['numCols'];		 
				   // 3 values  below come from form
		 
					$subject_code = array();
					for( $j = 0 ; $j < $num_cols ; $j++ )  {
							if($data->sheets[0]['cells'][4][$j+2]  != "" ) {
								  $subject_code[] = $data->sheets[0]['cells'][4][$j+2];
							}
					}
					//print_r($subject_code);											
					$no_of_subject_code = count($subject_code);
					for( $i = 1;  $i < $num_rows ; $i++ ) {
						 // marks start from row5 
						 $row = $i+5;
						 if($row <= $num_rows)	 {				 
							  $roll = $data->sheets[0]['cells'][$i+5][1];
							  $name = $data->sheets[0]['cells'][$i+5][2];						 
							  for( $k = 0 ;  $k <= $no_of_subject_code  ;  $k++ ) 
							  {
								myfunc($period,$class_id,$section_id,$subject_code[$k] , $roll , $name , $row , $k+1 , $no_of_subject_code,$branch_id,$file_name);
							   }
						 }
					}  	
?>							
 <a href="?SM_id=19&nev=excel_mark_setting&menu_id=9">  <input type="button" value="Back"/> </a> 						
<br/>