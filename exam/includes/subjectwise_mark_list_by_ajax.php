<?php require_once("../db.php");
            
			 $term_id  = trim($_POST["term_id"]);
			 $class_id = trim($_POST["class_id"]);
			 $roll      = trim($_POST["roll_id"]);
			 $year_id   = trim($_POST["year_id"]);
			 $section_id = trim($_POST["section_id"]);
             global $str,$where;	
			
?>
				<html>
				<head>
				<script type="text/javascript">
					$(document).ready(function(){ 
						$('#example').dataTable( {
							"sPaginationType": "full_numbers"	
						});
					});	
				</script>		
				</head>
				<body>
				<table width=100% id="jq_tbl">	
				<div id="demo">
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
						   <th>Name</th>
						   <th>Subject</th>
						   <th>Subjective</th>
						   <th>Objective</th>
						   <th>CT</th>
						   <th>Total Mark</th>
						   <th>Grade</th>
						   <th>Point</th>						   
						   <th>Term</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$count = 0;
						
						//echo  $roll."  term:".$term_id." class_id:".$class_id." year:".$year_id."  sec;".$section_id."<br/> ";
					if($roll=="" && $term_id=="" && $class_id=="" && $year_id=="" && $section_id=="")	 { ?>
						<tr>
								<td>&nbsp;</td>
							   <td>&nbsp;</td>
							   <td>&nbsp;</td>
							   <td>&nbsp; </td>
							   <td>&nbsp;</td>
							   <td>&nbsp; </td>
							   <td>&nbsp; </td>
							   <td>&nbsp;</td>
							   <td>&nbsp;</td>
						</tr>
					     
					<?php
					}else{
					    //echo '1';
						if($roll=="" && $term_id!="" && $class_id!="" && $year_id!="" && $section_id!="")		
						{ 
							$where = " WHERE class_id=$class_id AND YEAR='$year_id' AND period=$term_id";						
							//echo '0';
						}
						else if($roll != ""  && $term_id!="" && $class_id!="" && $year_id!="" && $section_id!="") 
						{
							$where = " WHERE class_id=$class_id AND YEAR='$year_id' AND period=$term_id AND stu_id='$roll'";									

							//echo '-1';
						}		
							$str = "SELECT class_id,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,total_mark,grade,point,period FROM `std_class_exam_mark_setting`".$where;				
							$qr = mysql_query($str);		
							while ($res = mysql_fetch_array($qr)){
								$class_id   = $res[0];
								$std_id	    = $res[1];
								$name        = get_std_name($std_id);
								$scode       = $res[2];
								$sub           = get_sub_name($scode);
								$sb             = $res[3];
								$ob             = $res[4];
								$ct               = $res[5];
								$total           = $res[6];							
								$grade        = $res[7];							
								$point          = $res[8];		
								$period = $res[9];		
								
								$mod=$count%2;
								if ($mod==0){echo "<tr>";}else{	echo "<tr class=\"bg\">";	}	   
								?>								
							   <td><?php echo $name;   ?></td>
							   <td><?php echo $sub;    ?></td>
							   <td><?php echo $sb;     ?> </td>
							   <td><?php echo $ob;     ?> </td>
							   <td><?php echo $ct;     ?></td>
							   <td><?php echo $total;  ?> </td>
							   <td><?php echo $grade;  ?> </td>
							   <td><?php echo $point;  ?></td>
							   <td>Term-<?php echo $period;  ?></td>
						</tr>		
						<?php					   
							$count++;
						}						
					}
					?>
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
							<th>&nbsp;</th>
						</tr>
					</tfoot>
				</table>
				</div>
				</table>	
				</body>	
				</html>
		<?php
		
			function get_std_name($std_id) {
			   $str  = "select name from std_profile where stu_id='$std_id'";
			   $sql = mysql_query($str);
			   $rs = mysql_fetch_row($sql);
			   return $rs[0];
			}
			function get_sub_name($scode) {
			   $str = "select subject_name from std_subject_config where subject_code='$scode'";
			   $sql = mysql_query($str);
			   $rs = mysql_fetch_row($sql);
			   return $rs[0];
			}
		?>