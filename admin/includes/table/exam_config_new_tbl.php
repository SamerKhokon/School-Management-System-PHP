<?php
	require'../db.php';        	
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>DataTables example</title>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$('#example').dataTable({
					"sPaginationType": "full_numbers"	
				});
			});
		</script>
	</head>
	<body id="dt_example" class="example_alt_pagination">
		<div id="container">
			<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
						  <th>Exam Name</th>
						  <th>Academic Year</th>
                          <th>Periods</th>
						  <th>Action</th>          
						</tr>
					</thead>
					<tbody>
					<?php

					$qry = mysql_query("SELECT  * from std_exam_config_new"); 		
					$count=1;
					while ($row=mysql_fetch_array($qry))
					{
						$mod=$count%2;

						if ($mod==0)
						{
							echo "<tr>";
						}
						else
						{
							echo "<tr class=\"bg\">";
						}

						$id=$row['id'];
						$exam_name = $row['exam_name'];
						$academic_year = $row['academic_year'];
						$period_ids=$row['period_ids'];
						$sql_period = "select `period`,date_format(`start_time`,'%h:%i %p') as start_time, date_format(`end_time`,'%h:%i %p') as end_time from `std_exam_period` t1 where `id` in($period_ids) order by t1.`start_time`";
						$res_period = mysql_query($sql_period);
						$periods = '';
						while($row_period = mysql_fetch_array($res_period))
						{
							$periods .= $row_period['period'].'['.$row_period['start_time'].'-'.$row_period['end_time'].']<br />';				
						}
						echo  "<td>$exam_name</td>";	
						echo  "<td>$academic_year</td>";
						echo  "<td>$periods</td>";
						echo "<td><a href=\"includes/action/exam_config_new_chng.php?id=$id&exam_name=$exam_name&sub_action=delete&period_ids=$period_ids&academic_year=$academic_year\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,300,400)\"><img src=\"custom_css/delete_image.png\" width=\"20\" title=\"Delete\" /> </a><a href=\"includes/action/exam_config_new_chng.php?id=$id&exam_name=$exam_name&sub_action=detail&period_ids=$period_ids&academic_year=$academic_year\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,300,400)\"><img src=\"custom_css/process_info.png\" width=\"20\" title=\"Show Details\" /> </a><a href=\"includes/action/exam_config_new_chng.php?id=$id&exam_name=$exam_name&sub_action=edit&period_ids=$period_ids&academic_year=$academic_year\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,300,400)\"><img src=\"custom_css/001_45.png\" width=\"18\" title=\"Edit\" /> </a></td>";		
						echo "</tr>";

						$count++;
					}
					?>
					</tbody>
					<tfoot>
						<tr>
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
	</body>
</html>