<?php   include("../db.php");

       $class_id   = trim($_POST["class_id"]);
	   $term_id    = trim($_POST["term_id"]);
	   $year_id    = trim($_POST["year_id"]);
	   $branchid   = trim($_POST["branchid"]);
	   
	   
	   
	   
	    $st = "SELECT stu_id,class_id,period,year,branch_id,class_sec,SUM(POINT) as tot_point,
			(SELECT class_roll FROM std_class_info WHERE ovr_roll=a.stu_id AND class_id=a.class_id) AS section_roll,
			(SELECT ovr_roll FROM std_class_info WHERE ovr_roll=a.stu_id AND class_id=a.class_id) AS class_roll
			FROM `std_class_exam_mark_setting` AS a WHERE YEAR='$year_id' AND class_id=$class_id
			AND period=$term_id AND branch_id=$branchid GROUP BY stu_id";	   
       
        $sq = mysql_query($st);
	    while($rs = mysql_fetch_assoc($sq) ) 
	    {
		   $stuid       = $rs['stu_id'];
		   $classid     = $rs['class_id'];
		   $period      = $rs['period'];
		   $year        = $rs['year'];
		   $branch_id   = $rs['branch_id'];
		   $tot_sub     = get_subject_counter($class_id);
		   $class_sec   = $rs['class_sec'];
		   $total_point = $rs['tot_point'];
		   $cgpa        = $total_point/$tot_sub;
		   $ur_grade    = get_my_grade($cgpa);
		   $prev_section_roll = $rs['section_roll'];
		   $prev_class_roll   = $rs['class_roll'];			   
		   $total_student     = total_student($class_id);
		   $chk = row_exist_check($stuid,$year,$classid,$period,$branch_id);
			   
			if($chk =="" || $chk==0) 
			{
			   $newClassRoll = getssNewClassRoll($class_id);	
			   $newSectionRoll = getssNewSectionRoll($class_id,$class_sec);
			   $add_str = "INSERT INTO `school`.`std_final_result_after_process`(`stu_id`,`class_id`,`class_sec`,`prev_sec_roll`,`prev_class_roll`,`new_sec_roll`,`new_class_roll`,`period`,`cgpa`, `grade`,`year`, `branch_id`)
				VALUES('$stuid',$classid,'$class_sec',$prev_section_roll,$prev_class_roll,$newClassRoll,$newSectionRoll,$period, $cgpa,'$ur_grade','$year',$branch_id)";
				mysql_query($add_str);
			}	
			
			
					
			section_roll_adjust($class_id,$class_sec,$term_id,$year);
			class_roll_adjust($class_id,$term_id,$year);				
	    }
		
		
		function getssNewSectionRoll($class_id,$class_sec)
		{
		  $classId = (int)$class_id + 1;
		  $str = "select max(class_roll) from 
		  std_class_info where class_id=$classId
		  and class_sec='$class_sec'";
		  $sql = mysql_query($str);
		  $res = mysql_fetch_row($sql);
		  if($res[0]=="" || $res[0]==0)
		  return 1;
		  else
		  return $res[0]+1;		
		}
		
		
		function getssNewClassRoll($class_id)
		{
		  $classId = (int)$class_id + 1;
		  $str = "select max(ovr_roll) from 
		  std_class_info where class_id=$classId";
		  $sql = mysql_query($str);
		  $res = mysql_fetch_row($sql);
		  if($res[0]=="" || $res[0]==0)
		  return 1;
		  else
		  return $res[0]+1;		
		}
		
		function section_roll_adjust($class_id,$class_sec,$term_id,$year_id) 
		{
		    $str = "select * from std_final_result_after_process where class_id=$class_id and class_sec='$class_sec' and period=$term_id and year='$year_id' order by cgpa desc";
		    $sql = mysql_query($str);
		    $rl = 1;
		    while($res = mysql_fetch_assoc($sql)) 
		    {
		         $stu_id=$res['stu_id'];				 
		         $update_section_roll = "update std_final_result_after_process set new_sec_roll=$rl where stu_id='$stu_id' and class_id=$class_id and period=$term_id and year='$year_id'";
				 mysql_query($update_section_roll);
				 $rl++;
		    }
		}
		
		function class_roll_adjust($class_id,$term_id,$year_id) 
		{
			  $str = "select * from std_final_result_after_process where class_id=$class_id and period=$term_id and year='$year_id' order by cgpa desc";
			  $sql = mysql_query($str);		  
			  $rl = 1;
			  while($rs = mysql_fetch_assoc($sql)) 
			  {
				$stu_id = $rs['stu_id'];
				$update_class_roll = "update std_final_result_after_process set new_class_roll=$rl where stu_id='$stu_id' and class_id=$class_id and period=$term_id and year='$year_id'";
				mysql_query($update_class_roll);
				$rl++;
			  }
		}
		
		function total_student($class_id) 
		{
			  $str = "select count(*) from std_final_result_after_process";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  if($res[0]=='' || $res[0]==0)
			  return 1;
			  else 
			  return $res[0];
		}
		
		$string = "select id,stu_id,class_id,class_sec,prev_sec_roll,prev_class_roll,new_sec_roll,new_class_roll,period,cgpa,grade,year,branch_id from std_final_result_after_process where year='$year_id' and period=$term_id and class_id=$class_id";
		$queries = mysql_query($string);
?>
<script type="text/javascript">
$(document).ready(function()
{
	$('#example').dataTable({  	
		"sPaginationType": "full_numbers",
		"aaSorting" : [[3,'desc']]			
	});				
});			
</script>			
<table  width=100% id="jq_tbl">
			<div id="demo">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>
					 <th>Name</th> 
					 <th>Class</th>
					 <th>Class</th>
					 <th>PSR</th>
					 <th>PCR</th>
					 <th>NSR</th>
					 <th>NCR</th>
					 <th>Term</th>
					 <th>Cgpa</th>
					 <th>Grade</th>
				</tr>		
			</thead>			
			<tbody>
<?php   
				$c=0 ; 
				while($res =  mysql_fetch_assoc($queries) ) 
				{   
					$c++;
					if($c%2==0) 
						echo "<tr>";
					else	
						echo "<tr class='bg'>";																										
					$slno      = $res['id'];   
					$stu_id    = $res['stu_id'];																	
					$clases_id = $res['class_id'];
					$section = $res['class_sec'];
					$term      = $res['period'];
					$cgpa      = $res['cgpa'];
					$grade     = $res['grade'];
					$year      = $res['year'];
					
					$prev_sec_roll    = $res['prev_sec_roll'];
					$prev_class_roll  = $res['prev_class_roll']; 
					$new_sec_roll     = $res['new_sec_roll'];
					$new_class_roll   = $res['new_class_roll'];
?>
							<td><?php	echo  get_stu_name($stu_id);     ?></td>
							<td><?php	echo  "Class-".$clases_id;     ?></td>
							<td><?php	echo  $section;      ?></td>
							<td><?php	echo  $prev_sec_roll;      ?></td>
							<td><?php	echo  $prev_class_roll;      ?></td>
							<td><?php	echo  $new_sec_roll;      ?></td>							
							<td><?php	echo  $new_class_roll;      ?></td>														
							<td><?php	echo  "Term-".$term;      ?></td>
							<td><?php	echo  $cgpa;     ?></td>
							<td><?php	echo  $grade;         ?></td>
					</tr>		
<?php			}  			?>
			</tbody>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>							
						</tr>					
					</tfoot>
			</table>
		</div>
</table>		
<?php	
		/*************
		 all functions
		 **************/
		function get_stu_name($stdid) 
		{
		     $st = "select stu_name from std_class_info where
			 ovr_roll='$stdid'";
			 $sq = mysql_query($st);			 			 $rs = mysql_fetch_row($sq);
			 return $rs[0];
		}
		
		
		function row_exist_check($stu_id,$year,$classid,$period,$branch_id) 
		{
		   $str = "SELECT COUNT(*) FROM `std_final_result_after_process` WHERE  stu_id='$stu_id' and YEAR='$year' AND 
		   class_id=$classid  AND period=$period AND branch_id=$branch_id";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
		}
				
		function get_student_name($stdid) 
		{
		  $str = "select name from std_profile where stu_id='$stdid'";
		  $sql = mysql_query($str);
		  $res= mysql_fetch_row($sql);
		  return $res[0];
		}
		
		function get_class_name($class_id) 
		{
		   $str = "select class_name from std_class_config where id=$class_id";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
		}
		
        function get_subject_counter($class_id) 
		{		
			$str    = "SELECT COUNT(*) FROM std_subject_config WHERE class_id=$class_id AND branch_id=1";    
			$querys = mysql_query($str);
			$res    = mysql_fetch_row($querys);
			return $res[0];						
        }  
		
		function get_my_grade($point) {
		     if($point >= 5.00)  {
			   return "A+";
			 }else if($point>= 4.50 && $point < 5.00) {
			   return "A";
			 }else if($point>= 4.00 && $point < 4.50) {
			   return "A-";
			 }else if($point>= 3.50 && $point < 4.00) {
			   return "B+";
			 }else if($point>= 3.25 && $point < 3.50) {
			   return "B";
			 }else if($point>= 3.00 && $point < 3.25) {
			   return "B-";
			 }else if($point>= 2.50 && $point < 3.00) {
			   return "C+";
			 }else if($point>= 2.25 && $point < 2.50) {
			   return "C";
			 }else if($point>= 2.00 && $point < 2.25) {
			   return "C-";
			 }else if($point>= 1.00 && $point < 2.00) {
			   return "D";
			 }else if($point>= 0 && $point < 1.00) {
			   return "F";
			 }
		}
?> 