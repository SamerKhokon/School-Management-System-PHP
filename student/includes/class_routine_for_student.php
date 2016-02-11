<style type="text/css">
.tbl_routine_new, .tbl_routine_new_tr, .tbl_routine_new_td{border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#class").focus();
});
function showDiv(class_id)
{
	//alert(class_id)
	$(".std_cr").hide();
	var show_div = '#tab'+class_id;
	$(show_div).show();
	$("#h_print_div").val('tab'+class_id);
}
function MyPrint()
{
	//var class_id = $('#class').val();
	//alert(document.getElementById('class').value());
	var id = $("#h_print_div").val();
	//alert(id);
	var MyWin = window.open('','','left=0, top=0, height=1, width=1');
	window.focus();
	//alert(document.getElementById(id).innerHTML);
	var Data = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><body><br/><br/>'+document.getElementById(id).innerHTML.toString()+'</body></html>';
	var Css = '<style type="text/css" media="print">@page{size: auto;/* auto is the initial value */ margin: 0mm;  /* this affects the margin in the printer settings */}body{margin: 0px;/* this affects the margin on the content before sending to printer */font-size:17px;}</style>';
	MyWin.document.write(Css); 
	//alert(Data);
	//alert(Data.replace(/display:none/ig, ""));
	MyWin.document.write(Data.replace(/none/ig, ""));
	MyWin.document.close();
	MyWin.print();
	MyWin.close();
}
	
</script>
<div id="content" class="box">
<?php
	require_once('../db.php');
	session_start();
	$branch_id = $_SESSION['LOGIN_BRANCH'];
	//retriving all classes with section according to branch//
	$class_array = array();
	$class_section = 0;
	$sql_class = "select `id` as class_id, `class_name` as class_name from `std_class_config` where `branch_id`=$branch_id order by `class_order`";
	$res_class = mysql_query($sql_class);
	while($row_class = mysql_fetch_array($res_class))
	{	
		$class_id = $row_class['class_id'];
		$class_name = $row_class['class_name'];
		
		$sql_sec = "select `id` as section_id, `section_name` as section_name from `std_class_section_config` where `branch_id`=$branch_id and `class_id`=$class_id";
		$res_sec = mysql_query($sql_sec);
		while($row_sec = mysql_fetch_array($res_sec))
		{
			$section_id = $row_sec['section_id'];
			$section_name = $row_sec['section_name'];
			$class_array[] = array('order'=>$class_section, 'class_id'=>$class_id, 'class'=>$class_name, 'section_id'=>$section_id, 'section'=>$section_name);
			$class_section++;
		}
	}
	$no_of_table = $class_array_len = count($class_array);
	/*echo "<div class=\"tabs box\"><ul>";
	for($c=0; $c<$class_array_len; $c++)
	{
		$class_sec_tab=$class_array[$c]['order'];
		$class_section = ucfirst($class_array[$c]['class']).'('.ucfirst($class_array[$c]['section']).')';
		echo "<li><a href=\"#tab$class_sec_tab\"><span>$class_section</span></a></li>";
	}
	echo "</ul></div>";
	echo "<br /><br />";*/
	echo 'Select Class:&nbsp;&nbsp;<select name="class" class="tabs box" onchange="showDiv(this.value)" style="width:200px;">';
	for($c=0; $c<$class_array_len; $c++)
	{
		$class_sec_tab = $class_array[$c]['order'];
		$class_section = ucfirst($class_array[$c]['class']).'('.ucfirst($class_array[$c]['section']).')';
		echo '<option value="'.$class_sec_tab.'">'.$class_section.'</option>';
    }	
    echo '</select>';
	echo '<br />';
	echo '<input type="button" name="btn_print" id="btn_print" onclick="MyPrint()" value="Print" />';
	echo '<input type="hidden" name="h_print_div" id="h_print_div" value="tab0" />';
	echo "<br /><br />";
	
	$day_array = array('Friday','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday');
	$no_of_row = $day_array_len=count($day_array); 
	
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
	//Genarating Routine for show//		
	if($no_of_column>0 && $no_of_row>0)
	{
		for($tbl=0; $tbl<$no_of_table; $tbl++)
		{
			$display='none';
			if($tbl==0)
				$display='';
					
			echo "<div class=\"std_cr\" id=\"tab$tbl\" style=\"display:$display\">";
				echo '<h3>Routine of '.ucfirst($class_array[$tbl]['class']).'('.ucfirst($class_array[$tbl]['section']).')'.'</h3>';
					//echo '<table class="tbl_routine_new" cellpadding="0" cellspacing="0" style="border:#000000 2px solid; padding:5px; border-collapse:collapse;">';
					echo '<table class="tbl_routine_new" cellpadding="0" cellspacing="0" style="border:#000000 2px solid; padding:5px; border-collapse:collapse;">';
					for($r=0; $r<$no_of_row; $r++)
					{
						$bg_color = '#eaeaea';
						if($r%2!=0)
							$bg_color = '#ffffff';
						echo '<tr class="tbl_routine_new_tr" style="background-color:'.$bg_color.'">';
						if($r==0)
						{
							for($col=0; $col<$no_of_column; $col++)
							{
								if($col==0)
								{
									echo '<td class="tbl_routine_new_td" style="border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;">Day/Period</td>';
									//echo '<td class="tbl_routine_new_td">Day/Period</td>';
								}
								else
								{
									if($col==$break_period)
									{
										echo '<td class="tbl_routine_new_td" style="background-color:#999999; border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;"><strong>'.$period_info[$col-1]['period'].'<br />'.$period_info[$col-1]['start_time'].'-'.$period_info[$col-1]['end_time'].'</strong></td>';
										//echo '<td class="tbl_routine_new_td" style="background-color:#999999;"><strong>'.$period_info[$col-1]['period'].'<br />'.$period_info[$col-1]['start_time'].'-'.$period_info[$col-1]['end_time'].'</strong></td>';
									}	
									else
									{
										echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea;  border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;"><strong>'.$period_info[$col-1]['period'].'<br />'.$period_info[$col-1]['start_time'].'-'.$period_info[$col-1]['end_time'].'</strong></td>';
										//echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea;"><strong>'.$period_info[$col-1]['period'].'<br />'.$period_info[$col-1]['start_time'].'-'.$period_info[$col-1]['end_time'].'</strong></td>';	
									}	
								}
							}
						}
						else
						{
							for($col=0; $col<$no_of_column; $col++)
							{
								if($col==0)
								{
									echo '<td class="tbl_routine_new_td" style="border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;"><strong>'.$day_array[$r].'</strong></td>';
									//echo '<td class="tbl_routine_new_td"><strong>'.$day_array[$r].'</strong></td>';
								}
								else
								{
									$d = $r;
									$p = $period_info[$col-1]['period_id'];
									$c = $class_array[$tbl]['class_id'];
									$s = $class_array[$tbl]['section_id'];
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
										echo '<td class="tbl_routine_new_td" style="border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;">'.$show.'</td>';
										//echo '<td class="tbl_routine_new_td">'.$show.'</td>';
									}	
									else
									{
										echo '<td class="tbl_routine_new_td" style="background-color:#999999;border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;">&nbsp;</td>';	
										//echo '<td class="tbl_routine_new_td" style="background-color:#999999;">&nbsp;</td>';
									}
									/*if($col==$break_period)
										echo '<td class="tbl_routine_new_td" style="background-color:#eaeaea">&nbsp;</td>';
									else
										echo '<td class="tbl_routine_new_td">&nbsp;</td>';*/	
								}	
							}
						}	
						echo '</tr>';
					}
					echo '</table>';
			echo "</div>";
		}
	}
	/*
	//retriving class & section info//
	$sql_section = "select * from std_class_section_config where branch_id=$branch_id";
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
			echo "<div id=\"tab$i\">";
				echo '<h3>Class Routine of '.$day_array[$i].'</h3>';
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
	*/
	
	
	/*
	//Teacher+subject summery report//
	echo "<br />";
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