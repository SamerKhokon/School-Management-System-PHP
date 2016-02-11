<?php		include("db.php");				
                session_start();
				$branchid   = $_SESSION['LOGIN_BRANCH'];
				
				$cid = trim($_POST['class_id']);
				if($cid=="all"){
					//$s =  "SELECT id,class_id,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,year,period FROM `std_class_exam_mark_setting` where branch_id=$branchid ORDER BY id DESC";				
					$s = "SELECT stu_id,SUM(total_mark) AS sm FROM `std_class_exam_mark_setting` WHERE branch_id=$branchid GROUP BY stu_id ORDER BY sm DESC";
				}else{
				    $s = "SELECT stu_id,SUM(total_mark) AS sm FROM `std_class_exam_mark_setting` WHERE class_id=$cid and branch_id=$branchid GROUP BY stu_id ORDER BY sm DESC";
					//$s =  "SELECT id,class_id,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,year,period FROM `std_class_exam_mark_setting` where branch_id=$branchid and class_id=$cid ORDER BY id DESC";				
				}
			    $str      = mysql_query($s);
				$count = 1;
?>			
<script type="text/javascript">
			$('#example').dataTable({  	"sPaginationType": "full_numbers"	 	});				
</script>			
<table  width=100% id="jq_tbl">
			<div id="demo">
							<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
												<thead>
												<tr>
														 <th>Student id</th>
														 <th>Mark</th>
												</tr>		
												</thead>			
												<tbody>
													<?php 	while($res =  mysql_fetch_array($str) ) {   
																			$count++;
																			if($count%2==0)
																			echo "<tr>";
																			else
																			echo "<tr class='bg'>";
																			//id,class_id,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,year,period
													?>
															
																	<td><?php	echo  $res[0];    ?></td>
																	<td><?php	echo  $res[1];    ?></td>
															</tr>		
												<?php				}  ?>
												</tbody>
												<tfoot>
																<tr>
																		 <th></th>										
																		 <th></th>
																</tr>					
												</tfoot>
							</table>
			 </div>
</table>
<?php
            function get_classname($class_id) {
			     $query = "select class_name from std_class_config where id=$class_id";
				 $query_res =  mysql_query($query);
				 $res = mysql_fetch_row($query_res);
				 return $res[0];
			}
			function get_subject_name($sub_code) {
			   $query = "SELECT subject_name FROM `std_subject_config` WHERE subject_code = '$sub_code'";
			   $query_res = mysql_query($query);
			   $res = mysql_fetch_row($query_res);
			   return $res[0];
			}
            function get_period($period) {
			     if($period == 1)
				 return "Term1";
				 else if($period==2)
				 return "Term2";
				 else if($period==3)
				 return "Term3";
			}
?>