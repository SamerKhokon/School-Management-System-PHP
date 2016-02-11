<?php		include("db.php");				
                session_start();
				$branchid   = $_SESSION['LOGIN_BRANCH'];
				$s =  "SELECT * FROM `std_class_exam_mark_setting` where branch_id=$branchid ORDER BY id DESC";				
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
														 <th>class</th>
														 <th>student id</th>
														 <th>subjective Mark</th>
														 <th>objective Mark</th>
														 <th>CT Mark</th>
														 <th>Year</th>
														 <th>Period </th>
														 <th>Branchid</th>										
												</tr>		
												</thead>			
												<tbody>
													<?php 	while($res =  mysql_fetch_array($str) ) {   
																			$count++;
																			if($count%2==0)
																			echo "<tr>";
																			else
																			echo "<tr class='bg'>";
													?>
															
																	<?php  $slno         = $res[0];    ?>
																	<td><?php	echo  $classid    = $res[1];    ?></td>
																	<td><?php	echo  $stu_id      = $res[2];    ?></td>
																	<td><?php	echo  $sb_mark = $res[3];    ?></td>
																	<td><?php	echo  $ob_mark = $res[4];    ?></td>
																	<td><?php	echo  $ct_mark   = $res[5];    ?></td>
																	<td><?php	echo  $year          = $res[6];    ?></td>
																	<td><?php	echo  $period      = $res[7];    ?></td>
																	<td><?php	echo  $branchid   = $res[8];   ?></td>										
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
																		 <th> </th>
																		 <th></th>										
																</tr>					
												</tfoot>
							</table>
			 </div>
</table>