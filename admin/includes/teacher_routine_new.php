<?php session_start();
	$branchid = $_SESSION["LOGIN_BRANCH"];  
	$branch_id = $branchid;
?>
<style type="text/css">
.tbl_routine_new, .tbl_routine_new_tr, .tbl_routine_new_th, .tbl_routine_new_td{border:#CCCCCC 2px dotted; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$(".tabs > ul").tabs();
});
</script>
<div id="content" class="box">
<?php require_once("../db.php"); 
  
	$day_array = array('Friday','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday');
	echo "<div class=\"tabs box\"><ul>";
	$no_of_table = $day_array_len=count($day_array);
	//echo "<br />";
	for($d=1; $d<$day_array_len; $d++)
	{
		$day_tab=$day_array[$d];
		echo "<li><a href=\"#tab_$d\"><span>$day_tab</span></a></li>";
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

	///data existancy checking & inserting//
	//$routine_data = array();
	if($no_of_column>0 && $no_of_row>0)
	{
		for($i=1; $i<$no_of_table; $i++)
		{
			for($j=0; $j<$no_of_row-1; $j++)
			{
				for($k=0; $k<$no_of_column-1; $k++)
				{
					$day_r = $i;
					$period_id_r = $period_info[$k]['period_id'];
					$class_id_r = $section_info[$j]['class_id'];
					$section_id_r = $section_info[$j]['section_id'];
					$break_flag_r = $period_info[$k]['break_flag'];
					//$routine_data[] = array('day'=>$day_r, 'period_id'=>$period_id_r, 'class_id'=>$class_id_r, 'section_id'=>$section_id_r, 'break_flag'=>$break_flag_r);
					
					//checking data existancy//
					$chk_rtn_exist = 0;
					$sql_chk_rtn_ext = "SELECT count( * ) FROM `std_class_routine_new` WHERE `day` =$day_r AND `period_id` =$period_id_r AND `class_id` =$class_id_r AND `section_id` =$section_id_r AND `active_flag` =1 and branch_id ='$branch_id'";
					$res_chk_rtn_ext = mysql_query($sql_chk_rtn_ext);
					if($row_chk_rtn_ext = mysql_fetch_array($res_chk_rtn_ext))
					{
						$chk_rtn_exist = $row_chk_rtn_ext[0];
					}
					//inserting data//	
					if($chk_rtn_exist==0)
					{	
						$sql_ins = "insert into std_class_routine_new(day, period_id, class_id, section_id, break_flag, branch_id, entry_date) values($day_r, $period_id_r, $class_id_r, $section_id_r, $break_flag_r, '$branch_id', now())";
						mysql_query($sql_ins);	
					}	
				}
			}
		}	
	}
	
	//Genarating Routine for show//		
	if($no_of_column>0 && $no_of_row>0)
	{
		for($i=1; $i<$no_of_table; $i++)
		{
			echo "<div id=\"tab_$i\">";
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
								echo '<th class="tbl_routine_new_th">&nbsp;</th>';
							else
							{
								if($k==$break_period)
									echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea">'.$period_info[$k-1]['period'].'<br />'.$period_info[$k-1]['start_time'].'-'.$period_info[$k-1]['end_time'].'</td>';
								else
									echo '<td class="tbl_routine_new_td">'.$period_info[$k-1]['period'].'<br />'.$period_info[$k-1]['start_time'].'-'.$period_info[$k-1]['end_time'].'</td>';	
							}	
						}
					}
					else
					{
						for($k=0; $k<$no_of_column; $k++)
						{
							if($k==0)
							{
								echo '<th class="tbl_routine_new_th">'.ucfirst($section_info[$j-1]['class_name']).' '.ucfirst($section_info[$j-1]['section_name']).'</th>';
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
										$show = '<img src="../images/cog.png" />';//'--';
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
										?>
                                        
										<td class="tbl_routine_new_td">
										<a href="includes/routine_function/demo_new.php?routine_id=<?php echo $routine_id;?>&branch_id=<?php echo $branch_id;?>" onclick="return GB_showCenter('Detail Data', this.href,250,300)"><?php echo $show; ?>  	
                                         </a></td>
<?php                                        
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
	
	//Teacher+subject summery report//
	/*echo "<br />";
	echo "<br />";
	echo "<br />";
	$sql_t_info = "select `id`, `teacher_name`, `teacher_short_name` from `std_teacher_info` where `branch_id`=$branch_id order by `teacher_name`";
	$res_t_info = mysql_query($sql_t_info);
	$show_t_info = '';
	while($row_t_info = mysql_fetch_array($res_t_info))
	{
		$show_t_id = $row_t_info[0];
		$show_t_name = $row_t_info[1];
		$show_t_short_name = $row_t_info[2];
		$show_t_info .= $show_t_name.'('.$show_t_short_name.') = ';
		
		//counting a teacher's total number of classes//
		$sql_t_classes = "select count(`id`) from `std_class_routine_new` where `teacher_id`=$show_t_id and `active_flag`=1 and `branch_id`='$branch_id'";
		$res_t_classes = mysql_query($sql_t_classes);
		$total_classes_t = 0;
		if($row_t_classes = mysql_fetch_array($res_t_classes))
		{
			$total_classes_t = $row_t_classes[0];
			//echo '<br />';
		}
		$show_t_info .= $total_classes_t.'<br />';
	}
	
	$sql_sub_info = 
	"select 
		t1.`id` as sub_id, 
		t1.`subject_name` as sub_name, 
		t2.`class_name` as class 
	from 
		`std_subject_config` t1
		left join `std_class_config` t2
			on t1.`class_id`=t2.`id`
	";
	$res_sub_info = mysql_query($sql_sub_info);
	$show_sub_info = '';
	while($row_sub_info = mysql_fetch_array($res_sub_info))
	{
		$sub_id2 = $row_sub_info['sub_id'];
		$sub_name2 = $row_sub_info['sub_name'];
		$class = $row_sub_info['class'];
		
		//counting total classes of a subject//
		$sub_class_count = 0;
		$sql_sub_class_count = "select count(`id`) from `std_class_routine_new` where `subject_id`=$sub_id2 and `branch_id`='$branch_id' and `active_flag`=1";
		$res_sub_class_count = mysql_query($sql_sub_class_count);
		if($row_sub_class_count = mysql_fetch_array($res_sub_class_count))
		{
			$sub_class_count = $row_sub_class_count[0];
		}
		if($sub_class_count!=0)
		{
			$show_sub_info .= $sub_name2.'('.$class.')=';
			$show_sub_info .= $sub_class_count.'<br />';
		}	
	}	
	
	echo '<table style="border:#ff0000 3px dotted; border-collapse:collapse; background-color:#eaeaea;">';
		echo '<tr>';
			echo '<th>Teacher</th>';
			echo '<th>Subject</th>';
		echo '</tr>';
		echo '<tr>';
			echo '<td style="text-align:left;">'.$show_t_info.'</td>';
			echo '<td style="text-align:left;">'.$show_sub_info.'</td>';
		echo '</tr>';
	echo '</table>';*/
?>
</div>
<script type="text/javascript">
$(document).ready(function(){
   var refreshId = setInterval(function(){
   },2000);
});
</script>