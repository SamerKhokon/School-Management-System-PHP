<?php require'db.php';?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').dataTable();
	/*$('#example').dataTable( {
		"sPaginationType": "full_numbers"	
	});*/
});
</script>
<?php
//echo 
$exam_id = $_REQUEST['exam_id'];
//echo "<br />";
//echo 
$exam_date = $_REQUEST['exam_date'];
//echo "<br />";
//echo 
$academic_year = $_REQUEST['academic_year'];
//echo "<br />";

//retrive period_ids of this exam//
$sql_ep_ids = "select `period_ids` from `std_exam_config_new` where `flag`=1 and `academic_year`=$academic_year and id=$exam_id";
$res_ep_ids = mysql_query($sql_ep_ids);
if($row_ep_ids = mysql_fetch_array($res_ep_ids))
	$period_ids = $row_ep_ids[0];
//retiving exam period's info//
$exam_period_array = array();
$sql_exm_prd = "select `id` as period_id, `period` as period,date_format(`start_time`,'%h:%i %p') as start_time,date_format(`end_time`,'%h:%i %p') as end_time from `std_exam_period` where `std_exam_period`.`flag`=1 and `std_exam_period`.`id` in ($period_ids) order by `std_exam_period`.`start_time` asc";
$res_exm_prd = mysql_query($sql_exm_prd);
$all_period = '';
while($row_exm_prd=mysql_fetch_array($res_exm_prd))
{
	$exam_period_array[] = array('period_id'=>$row_exm_prd['period_id'], 'period'=>$row_exm_prd['period'], 'start_time'=>$row_exm_prd['start_time'], 'end_time'=>$row_exm_prd['end_time']);
}
//print_r($exam_period_array);	
//echo "<br />";
$exam_period_len = $no_of_column = count($exam_period_array);
//retriving class info//
$class_array = array();
$sql_class = "SELECT `id` as class_id, `class_name` as class_name FROM `std_class_config` order by `class_order` asc";
$res_class = mysql_query($sql_class);
while($row_class = mysql_fetch_array($res_class))
{
	$class_array[] = array('class_id'=>$row_class['class_id'], 'class_name'=>ucfirst($row_class['class_name']));
}
//print_r($class_array);
//echo "<br />";
$class_len = $no_of_rows = count($class_array);

//forming the table//
echo '<div id="demo">';
echo '<table cellpadding="0" cellspacing="0" style="border:#000000 2px solid; padding:5px; border-collapse:collapse;" class="display" id="example">';
/*for($r=0; $r<=$no_of_rows; $r++)
{
	if($r==0)
	{
		for($col=0; $col<=$no_of_column; $col++)
		{
			
		}
	}
}*/
for($r=0; $r<=$no_of_rows; $r++)
{
	$bg_color = '#eaeaea';
	if($r%2!=0)
		$bg_color = '#ffffff';
	echo '<tr class="tbl_routine_new_tr" style="background-color:'.$bg_color.'">';
	if($r==0)
	{
		for($col=0; $col<=$no_of_column; $col++)
		{
			if($col==0)
			{
				echo '<td style="border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle; background-color:#dbdbdb;">&nbsp;</td>';
			}
			else
			{
				echo '<td class="tbl_routine_new_td" style="background-color:#dbdbdb; border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;"><strong>'.$exam_period_array[$col-1]['period'].'<br />'.$exam_period_array[$col-1]['start_time'].'-'.$exam_period_array[$col-1]['end_time'].'</strong></td>';
			}		
		}
	}
	else
	{
		for($col=0; $col<=$no_of_column; $col++)
		{
			if($col==0)
			{
				echo '<td style="border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle; background-color:#dbdbdb;"><strong>'.$class_array[$r-1]['class_name'].'</strong></td>';
				//echo '<td class="tbl_routine_new_td"><strong>'.$day_array[$r].'</strong></td>';
			}
			else
			{
				$class_id = $class_array[$r-1]['class_id'];
				$period_id = $exam_period_array[$col-1]['period_id'];
				$show = '<img src="../images/cog.png" />';
				$exam_sub = 0;
				$sql_exam = "select `subject_id` from `std_exam_routine_new` where `flag`=1 and `academic_year`=$academic_year and `exam_name_id`=$exam_id and `exam_date`=str_to_date('$exam_date', '%d-%m-%Y') and `exam_period_id`=$period_id and `class_id`=$class_id";
				$res_exam = mysql_query($sql_exam);
				if($row_exam = mysql_fetch_array($res_exam))
				{
					$exam_sub = $row_exam[0];
				}
				else
				{
					$exam_sub = 0;
				}
				if($exam_sub!=0)
				{
					$sql_exam_sub = "select `id`,`subject_name`, `subject_code` from `std_subject_config` where `id`=$exam_sub";
					$res_exam_sub = mysql_query($sql_exam_sub);
					if($row_exam_sub=mysql_fetch_array($res_exam_sub))
					{
						$show = $row_exam_sub[1];
						$show .= '<br />('.$row_exam_sub[2].')';
					}
				}
				echo '<td class="tbl_routine_new_td" style="border:#000000 2px solid; padding:5px; border-collapse:collapse; text-align:center; vertical-align:middle;"><a href="./includes/routine_function/demo_exam_schedule.php?exam_id='.$exam_id.'&exam_date='.$exam_date.'&academic_year='.$academic_year.'&class_id='.$class_id.'&period_id='.$period_id.'" onclick="return GB_showCenter(\'Add/Edit Data\', this.href,250,550)">'.$show.'</a></td>';
			}
		}	
	}
	echo '</tr>';	
}
echo '</table>';
echo '</div>';
?>
