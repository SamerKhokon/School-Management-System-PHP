<?php    include("../../db.php");
				
    $classid     = trim($_POST["class_id"]);
	$term        = trim($_POST["term_id"]);
	$branchid  = trim($_POST["branchid"]);
	//$roll          = trim($_POST["roll"]);
	
    if($term!="" && $classid!="" )	 
	{
		$str_mark_promo = "SELECT * FROM `std_final_result_after_process`
		WHERE class_id=$classid AND period=$term and branch_id=$branchid order by cgpa desc";
	}
	
	$sql_mark_promo = mysql_query($str_mark_promo);
?>	
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		<thead>
			<tr>
				  <th>Stuid</th>
				  <th>Name</th>
				  <th>Class</th>
				  <th>Section</th>
				  <th>PSR</th>		  
				  <th>PCR</th>		  
				  <th>NSR</th>		  		  
				  <th>NCR</th>		  		  		  
				  <th>Cgpa</th>
				  <th>Grade</th>
				  <th>Period</th>
				  <th>Year</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				  <th>Stuid</th>
				  <th>Name</th>
				  <th>Class</th>
				  <th>Section</th>
				  <th>PSR</th>		  
				  <th>PCR</th>		  
				  <th>NSR</th>		  		  
				  <th>NCR</th>		  		  		  
				  <th>Cgpa</th>
				  <th>Grade</th>
				  <th>Period</th>
				  <th>Year</th>
			</tr>
		</tfoot>
		<tbody>
<?php $rl = 0; 
		while( $rs = mysql_fetch_assoc($sql_mark_promo) ) 
		{
		    $rl++;
            $slno 			= $rs['id'];
			$previous_stuid = $rs['stu_id'];
			$student_name   = get_student_name($previous_stuid);
			$class          = $rs['class_id'];
			$class_name     = get_class_name($class);
			$section 		= $rs['class_sec'];
			$period         = $rs['period'];
			$cgpa           = $rs['cgpa'];
			$grade          = $rs['grade'];
			$year           = $rs['year'];  
			$prev_sec_roll  = $rs['prev_sec_roll'];
			$prev_class_roll = $rs['prev_class_roll'];
			$new_sec_roll    = $rs['new_sec_roll'];
			$new_class_roll  = $rs['new_class_roll'];
			
			if($rl%2==0)
			echo '<tr class="odd gradeA">';
			else
			echo '<tr class="odd gradeC">';						
 ?>  
			  <td><?php echo $previous_stuid;?></td>
			  <td><?php echo $student_name;  ?></td>
			  <td><?php echo $class_name;?></td>		  
			  <td><?php echo $section;?></td>
			  <td><?php echo $prev_sec_roll;?></td>		  		  
			  <td><?php echo $prev_class_roll;?></td>		  
			  <td><?php echo $new_sec_roll;?></td>		  
			  <td><?php echo $new_class_roll;?></td>		  		  
			  <td><?php echo $cgpa;?></td>
			  <td><?php echo $grade;?></td>		  
			  <td><?php echo get_term_name($period , $year);?></td>		  
			  <td><?php echo $year;?></td>		  
		   </tr>
<?php 	} ?>	   
</tbody>	
</table>
<?php
		/*************
		 all functions
		**************/
		function get_student_name($stu_id) {
		  $str = "SELECT NAME FROM std_profile WHERE stu_id='$stu_id'";
		  $sql = mysql_query($str);
		  $res = mysql_fetch_row($sql);
		  return $res[0];
		}
		
		function get_term_name($period , $year) {
		  $str = "select exam_name from std_exam_config_new where id=$period and academic_year=$year";
		  $sql = mysql_query($str);
		  $res = mysql_fetch_row($sql);
		  return $res[0];
		}
		
		
		function get_class_name($class){
		   $str = "SELECT class_name FROM `std_class_config` WHERE id=$class";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
		}
		
		
        function get_subject_counter($class_id) {		
			$str    = "SELECT COUNT(*) FROM std_subject_config WHERE class_id=$class_id AND branch_id=1";    
			$querys = mysql_query($str);
			$res    = mysql_fetch_row($querys);
			return $res[0];						
        }  
		
		function checking_for_exist_or_not($old_stu_id , $previous_cls_year) {
		    $st = "select count(*) from std_mark_promo where pre_stu_id='$old_stu_id' and pre_year='$previous_cls_year'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_class_roll( $stu_id ) {
		    $st = "select class_roll from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_sectionid( $stu_id ){
		    $st = "select class_sec from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_year( $stu_id ) {
		    $st = "select year from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_new_class_section_roll( $class_id , $section_id , $year ) {
			$st = "SELECT MAX(class_roll) FROM std_class_info WHERE YEAR='$year' AND class_id=$class_id AND class_sec='$section_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_new_class_roll( $year , $pre_stu_id ) {
		    $st = "SELECT MAX(new_class_roll) FROM `std_mark_promo` WHERE pre_year='$year' AND pre_stu_id='$pre_stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			if($rs[0]==0)
			return 1;
			else 
			return $rs[0]+1;
		}		
?> 