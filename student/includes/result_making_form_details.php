<?php  
				include("../db.php");
				$class_id = trim($_GET["class"]);
				$term = trim($_GET["term"]);
				$roll   = trim($_GET["roll"]);
				$branchid = trim($_GET["bid"]);
				
				$str =  "SELECT  stu_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,POINT,YEAR,period  FROM `std_class_exam_mark_setting` WHERE period=$term AND branch_id=$branchid AND class_id=$class_id AND stu_id=$roll";				
				
				$qry = mysql_query($str);
				
		    function get_term($period) {
	             if($period==1)
				  return "Term1";
				 else if($period == 2)
				 return "Term2";
				 else if($period == 3)
				 return "Term3";
	        }

				
?>
<div id="content" class="box">	
<fieldset>	<legend>Result Details</legend>		
				<script type="text/javascript">
							$('#example').dataTable({  	"sPaginationType": "full_numbers"	 	});				
				</script>			
				<table  width=100% id="jq_tbl">
							<div id="demo">
								<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
									<thead>
										<tr>
											<th>Subjective Mark</th>
											<th>Objective Mark</th>
											<th>CT Mark</th>
											<th>Total Mark</th>																		 
											<th>Grade</th>
											<th>Point</th>
											<th>Year</th>
											<th>Term</th>														 
										</tr>		
									</thead>			
									<tbody>				
											<?php 	$count = 0;
															while( $res = mysql_fetch_array($qry)  ) {
																   $stuid         = $res[0];
																   $sb_mark   = $res[1];
																   $ob_mark  = $res[2];
																   $ct_mark   = $res[3];
																   $total_mark      = $res[4];
																   $grade       = $res[5];
																   $point       = $res[6];
																   $year     = $res[7];
																   $period     = $res[8];
																	$count++;
																	if($count%2==0)
																	echo "<tr>";
																	else
																	echo "<tr class='bg'>";					   
											?>					   				   
									   
														<td><?php echo $sb_mark;?></td>
														<td><?php echo $ob_mark;?></td>
														<td><?php echo $ct_mark;?></td>
														<td><?php echo $total_mark; ?></td>
														<td><?php echo $grade; ?></td>
														<td><?php echo $point; ?></td>
														<td><?php echo $year; ?></td>
														<td><?php echo get_term($period); ?></td>
													   </tr>
										<?php 			}  ?>

									</tbody>
										<tfoot>
											<tr>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>												
											</tr>
										</tfoot>
									</table>
					</div>
					<div class="spacer"></div>
			</div>										
										
</fieldset>
</div>	