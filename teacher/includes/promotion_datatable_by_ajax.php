<?php   require_once("../db.php");

	// $con = mysql_connect("localhost" , "root" , "");
	// mysql_select_db("school" , $con );
	
    $classid  = trim($_POST["class_id"]);
	$term     = trim($_POST["term_id"]);
	$branchid = trim($_POST["branchid"]);
	$roll     = trim($_POST["roll"]);									
	
	$result_process_str = "SELECT class_id,stu_id,SUM(point) as pnt,class_id,period,sum(total_mark) as sm,grade,class_sec FROM `std_class_exam_mark_setting` 
	 where period=3	GROUP BY stu_id order by pnt desc";		
    $result_process_str = mysql_query($result_process_str); 
	
	
	
	$count = 0;		
	
	
	
	while( $res = mysql_fetch_array($result_process_str)) 
	{
	    $previous_class = $res[0];
		$old_stu_id     = $res[1];
		$total_point    = $res[2];
		$class_id       = $res[3];
		$term_id        = $res[4];
		$total_mark     = $res[5];		   
		$grade          = $res[6];
		$pre_sec        = $res[7];		
		$count++;
		
		$cgpa                   = $total_point/get_subject_counter($class_id);		
		$count_subject          = get_subject_counter($class_id);
		$previous_roll          = get_previous_class_roll($old_stu_id);
		$previous_sec_id        = get_previous_sectionid($old_stu_id);
		$previous_cls_year      = get_previous_year($old_stu_id);			
		$new_class_section_roll = get_new_class_section_roll($class_id , $previous_sec_id , $previous_cls_year);
		$new_class_roll         = get_new_class_roll($previous_cls_year , $old_stu_id );
		$new_class_year         = (int)$previous_cls_year+1;
		$check_flag             = checking_for_exist_or_not($old_stu_id,$previous_cls_year);	
				
		$new_class = $previous_class + 1;		
		
		$class_name     = get_class_name($new_class);					   
		//$max_class_roll = get_new_roll($class_name);
		$new_section    = get_esystem_section($new_class_roll,$new_class);								   
		  
		/*** if previously not exist data then insert ***/
		$promo_year = (int)$previous_cls_year+1;
		if( $check_flag =="" || $check_flag==0 )   
		{ 					    
		   // new row insert into std_mark_promo for result processing
		   $query = "INSERT INTO `school`.`std_mark_promo`(`pre_class`,`pre_stu_id`,`total_point`,`pre_class_sec_roll`,`new_class_roll`,`pre_year`,`new_year`,`pre_section`,`total_mark`,`grade`,`cgpa`,`termid`)
				VALUES($previous_class,'$old_stu_id',$total_point,$previous_roll,$count,'$previous_cls_year','$new_class_year','$previous_sec_id',$total_mark,'$grade',$cgpa,$term_id)";			
		   mysql_query($query);			
		   
		   $stuname = get_student_name($old_stu_id);   
		   
           // new row insert into std_class_info table for promotion purpose
		   $promo_str = "insert into std_class_info(`class_id`,`class_name`,`class_sec`,`stu_id`,`stu_name`,`class_roll`,`year`,`branch_id`) 
		   values($new_class,'$class_name','$new_section','$old_stu_id','$stuname',$new_class_roll,'$promo_year',$branchid)";   	
		   mysql_query($promo_str); 			
		}
	}		
	
    if($term!="" && $classid=="" && $roll == "")	 {
		$str_mark_promo = "select id,`pre_class`,`pre_stu_id`,`total_point`,`pre_class_sec_roll`,
		`new_class_roll`,`pre_year`,`pre_section`,`total_mark`,`grade`,`cgpa`,
		`termid` from std_mark_promo where termid=$term";
	}else if($term!="" && $classid!="" && $roll == ""){
		$str_mark_promo = "select id,`pre_class`,`pre_stu_id`,`total_point`,`pre_class_sec_roll`,
		`new_class_roll`,`pre_year`,`pre_section`,`total_mark`,`grade`,`cgpa`,
		`termid` from std_mark_promo where termid=$term and pre_class=$classid";	
	}else if($term!="" && $classid!="" && $roll != ""){
		$str_mark_promo = "select id,`pre_class`,`pre_stu_id`,`total_point`,`pre_class_sec_roll`,
		`new_class_roll`,`pre_year`,`pre_section`,`total_mark`,`grade`,`cgpa`,
		`termid` from std_mark_promo where termid=$term and pre_class=$classid and pre_stu_id='$roll'";		
	}
	
	
	$sql_mark_promo = mysql_query($str_mark_promo);
?>	
<html>
<head>
    <script type="text/javascript">
	  $(document).ready(function(){
		$('#example').dataTable({
		   "sPaginationType": "full_numbers"				
		});	          
	  });
	</script>
</head>
<body>
<div id="container">		
	<div id="demo">
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
 <thead>
 <tr> 
	      <th>pre class</th>
		  <th>pre stuid</th>
		  <th>totalpoint</th>
		  <th>pre roll</th>
		  <th>new roll</th>
	      <th>pre sec</th>
		  <th>total mark</th>
		  <th>Grade</th>
		  <th>Cgpas</th>
	   </tr> 

</thead>
<tbody>
<?php while( $rs = mysql_fetch_array($sql_mark_promo) ) {
            $previous_class = $rs[1];
			$previous_stuid = $rs[2];
			$total_point    = $rs[3];
			$previous_class_sec_roll = $rs[4];
			$new_class_roll   = $rs[5];
			$previous_year    = $rs[6];  
			$previous_section = $rs[7];  
			$total_mark       = $rs[8];
			$grade            = $rs[9];
			$cgpas            = $rs[10];
			$termsid          = $rs[11];
 ?>

       <tr> 
	      <td><?php echo $previous_class;?></td>
		  <td><?php echo $previous_stuid;?></td>
		  <td><?php echo $total_point;?></td>
		  <td><?php echo $previous_class_sec_roll;?></td>
		  <td><?php echo $new_class_roll;?></td>
	      <td><?php echo $previous_section;?></td>
		  <td><?php echo $total_mark;?></td>
		  <td><?php echo $grade;?></td>
		  <td><?php echo $cgpas;?></td>
	   </tr> 

<?php } ?>	   
</tbody>	
</tfoot>   
       <tr> 
	      <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
	      <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
	   </tr> 
</tfoot>	   
</table>
</div>
<div class="spacer"></div>
</div>


</body>
</html>
<?php
		/*************
		 all functions
		**************/
		
		function get_student_name($stdid) {
		  $str = "select name from std_profile where stu_id='$stdid'";
		  $sql = mysql_query($str);
		  $res= mysql_fetch_row($sql);
		  return $res[0];
		}
		
        function get_new_roll($class_name) {		
			$max_roll_str   = "select max(class_roll) from std_class_info where class_name='$class_name'";
			$max_roll_qry   = mysql_query($max_roll_str);
			$max_roll_res   = mysql_fetch_row($max_roll_qry);
			return $max_roll_res[0]+1;
        }		
		
		function get_esystem_section($num,$class_id)	 
		{
			global $index;
			
			$str = "SELECT count(section_name) FROM  `std_class_section_config`  WHERE class_id=$class_id";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);	
			$tot_sec = $res[0]; 
			
			$st = "SELECT section_name FROM  `std_class_section_config`  WHERE class_id=$class_id";
			$sr = mysql_query($st);		
			$sections = array();
			while($res = mysql_fetch_array($sr) ) 
			{
			  $sections[] = $res[0];
			}
			
			$index = $num%$tot_sec;
			if($index == 0) 
			{
				$index = $tot_sec-1;
			}
			else
			{
				$index = $index-1;
			}
			return $sections[$index];
		}	
		
		function get_class_name($class_id) {
		   $str = "select class_name from std_class_config where id=$class_id";
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