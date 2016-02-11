<?php session_start();
	require_once("../db.php");
	$branchid = $_SESSION["LOGIN_BRANCH"];
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
</script>
<style type="text/css">
.tbl_routine_new, .tbl_routine_new_tr, .tbl_routine_new_th, .tbl_routine_new_td{border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;}
</style>
<div id="content" class="box">
<?php
	$branch_id = $branchid;

	$day_array = array('Friday','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday');
	echo "<div class=\"tabs box\"><ul>";
	$no_of_table = $day_array_len=count($day_array);
	//echo "<br />";
	for($d=1; $d<$day_array_len; $d++)
	{
		$day_tab=$day_array[$d];
		echo "<li><a href=\"#$d\"><span>$day_tab</span></a></li>";
	}
	echo "</ul></div>";
	
	//retriving all period info//
	$sql_period = "select * from std_class_period where branch_id=$branch_id and flag=1 order by start_time";
	$res_period = mysql_query($sql_period);
	$period_count = 1;
	$period_info = array();
	$break_period = 0;
	while($row_period = mysql_fetch_array($res_period))
	{
		$period_id = $row_period['period_id'];
		$period = $row_period['period'];
		$start_time_tmp = $row_period['start_time'];
		$start_timeA = explode(':',$start_time_tmp);
		$start_time = $start_timeA[0].':'.$start_timeA[1];
		$end_time_tmp = $row_period['end_time'];
		$end_timeA = explode(':',$end_time_tmp);
		$end_time = $end_timeA[0].':'.$end_timeA[1];
		$break_flag = $row_period['break_flag'];
		if($break_flag==1)
			$break_period = $period_count;
		$period_info[] = array('period_id'=>$period_id, 'period'=>$period, 'start_time'=>$start_time, 'end_time'=>$end_time, 'break_flag'=>$break_flag);
		$period_count++;
	}
	$no_of_column = $period_count;
	//echo "<br />";
	//print_r($period_info);
	//echo "<br />";
	
	//retriving class & section info//
	$sql_section = "select a.* from std_class_section_config a, std_class_config b where a.branch_id=$branch_id and a.class_id=b.id order by b.class_order, a.section_name";
	$res_section = mysql_query($sql_section);
	$section_count = 1;
	$section_info = array();
	while($row_section = mysql_fetch_array($res_section))
	{
		$section_id = $row_section['id'];
		$section_name = $row_section['section_name'];
		$class_id = $row_section['class_id'];
		$class_name = $row_section['class_name'];
		$section_info[] = array('section_id'=>$section_id, 'section_name'=>$section_name, 'class_id'=>$class_id, 'class_name'=>$class_name);
		$section_count++;
	}
	$no_of_row = $section_count;
	//echo "<br />";

	//Genarating Routine for show//		
	if($no_of_column>0 && $no_of_row>0)
	{
		for($i=1; $i<$no_of_table; $i++)
		{
			echo "<div id=\"$i\">";
				echo '<h3>Teacher\'s Routine for '.$day_array[$i].'</h3>';
				echo '<table class="tbl_routine_new" cellpadding="0" cellspacing="0">';
				
				for($j=0; $j<$no_of_row; $j++)
				{
					echo '<tr class="tbl_routine_new_tr">';
					if($j==0)
					{
						for($k=0; $k<$no_of_column; $k++)
						{
							if($k==0)
								echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea">&nbsp;</td>';
							else
							{
								if($k==$break_period)
									echo '<td class="tbl_routine_new_td" style="background-color:#999999"><strong>'.$period_info[$k-1]['period'].'<br />'.$period_info[$k-1]['start_time'].'-'.$period_info[$k-1]['end_time'].'</strong></td>';
								else
									echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea"><strong>'.$period_info[$k-1]['period'].'<br />'.$period_info[$k-1]['start_time'].'-'.$period_info[$k-1]['end_time'].'</strong></td>';	
							}	
						}
					}
					else
					{
						for($k=0; $k<$no_of_column; $k++)
						{
							if($k==0)
							{
								echo '<th class="tbl_routine_new_th" style="background-color:#eaeaea">'.ucfirst($section_info[$j-1]['class_name']).' '.ucfirst($section_info[$j-1]['section_name']).'</th>';
							}	
							else
							{
								if($k==$break_period)
									echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea">&nbsp;</td>';
								else
								{
									$d = $i;
									$p = $period_info[$k-1]['period_id'];
									$c = $section_info[$j-1]['class_id'];
									$s = $section_info[$j-1]['section_id'];
									$sql_routine = "select id, teacher_id, subject_id, break_flag from std_class_routine_new where day=$d and period_id=$p and class_id=$c and section_id=$s and branch_id='$branch_id' and active_flag=1";
									$res_routine = mysql_query($sql_routine);
									if($row_routine = mysql_fetch_array($res_routine))
									{
										$routine_id = $row_routine['id'];
										$break_flag_r = $row_routine['break_flag'];
										$teacher_id = $row_routine['teacher_id'];
										$subject_id = $row_routine['subject_id'];
									}
									if($break_flag_r==0)
									{
										$show = 'X';
										if($teacher_id!=0)
										{
											$sql_t = "select `teacher_name`,`teacher_short_name` from `std_teacher_info` where `id`=$teacher_id";
											$res_t = mysql_query($sql_t);
											if($row_t = mysql_fetch_array($res_t)){
												//$show = substr($row_t[0],0,3);
												//$show = $row_t[0];
												$show = $row_t[1];	
											}	
										}
										if($subject_id!=0)
										{
											$sql_s = "select `subject_code` from `std_subject_config` where `id`=$subject_id";
											$res_s = mysql_query($sql_s);
											if($row_s = mysql_fetch_array($res_s))
												$show .= "<br />".$row_s[0];
										}	
										echo '<td class="tbl_routine_new_td">'.$show.'</td>';
									}	
									else
									{
										echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea">&nbsp;</td>';	
									}	
								}			
							}	
						}
					}
					echo '</tr>';
					
				}
				
				echo '</table>';
			echo "</div>";
		}	
	}
	//print_r($section_info);
	//echo "<br />";
?>
</div>
<script type="text/javascript">
$(document).ready(function(){
   var refreshId = setInterval(function(){
   },2000);
});
</script>