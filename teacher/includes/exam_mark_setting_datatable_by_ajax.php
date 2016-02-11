<?php		include("db.php");				
                session_start();
				$branchid   = $_SESSION['LOGIN_BRANCH'];
				$s =  "SELECT id,class_id,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,YEAR,period  FROM `std_class_exam_mark_setting` WHERE branch_id=$branchid ORDER BY id DESC";				
			    $str = mysql_query($s);
					$count=1;
?>			
<script type="text/javascript">
			$('#example').dataTable({  	"sPaginationType": "full_numbers"	 	});				
</script>			
<table  width=100% id="jq_tbl">
			<div id="demo">
							<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
												<thead>
												<tr>
														 <th>Subject</th> 
														 <th>SB<br/> Mark</th>
														 <th>OB<br/> Mark</th>
														 <th>CT<br/> Mark</th>
														 <th>Total Mark<br/>(Converted into 100)</th>
														 <th>Grade</th>
														 <th></th>
												</tr>		
												</thead>			
												<tbody>
													<?php   //id,class_id,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,YEAR,period
														while($res =  mysql_fetch_array($str) ) {   
																			$count++;
																	if($count%2==0) 
																	 echo "<tr>";
																	else	
																	echo "<tr class='bg'>";																										
																    $slno      = $res[0];   
																	$classid   = $res[1];
																	$stu_id     = $res[2];
																	$sub_id    = $res[3];
																	$sb_mark = $res[4];
																	$ob_mark = $res[5];
																	$ct_mark  = $res[6];
																	$tot_mark = $res[7];
																	$grade     = $res[8];
																	$year       = $res[9];
																	$period     = $res[10];
?>
																	<td><?php	echo  get_sub_name($sub_id,$classid,$branchid);   ?></td>
																	<td><?php	echo  $sb_mark;     ?></td>
																	<td><?php	echo  $ob_mark;     ?></td>
																	<td><?php	echo  $ct_mark;      ?></td>
																	<td><?php	echo  $tot_mark;     ?></td>
																	<td><?php	echo  $grade;         ?></td>
																	<td><a href="javascript:void(0);"  id="<?php echo $slno; ?>" class="exam_mark_trace"><img src="custom_css/001_45.png"/></a></td>
															</tr>		
												<?php				}  ?>
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
																</tr>					
												</tfoot>
							</table>
			 </div>
</table>
<?php 
             function get_class_name($classid) {
			        $st = "select class_name from std_class_config where id=$classid";
					$qry = mysql_query($st);
					$rs =  mysql_fetch_row($qry);
					return $rs[0];
			 }
             function get_sub_name($sub_code,$class_id,$branchid){
			            $str = "select subject_name from std_subject_config where subject_code=$sub_code and class_id=$class_id and branch_id=$branchid";
					   $qry = mysql_query($str);
					   $rs =  mysql_fetch_row($qry);
					   return $rs[0];
			 }
			 function get_period($period) {
			     if($period == 1) 
				 return "Term1";
				 else if($period==2)
				 return "Term2";
				 else if(period==3)
				 return "Term3";
			 }
?>