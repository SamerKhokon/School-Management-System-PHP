<?php
include('db.php');
/*exam_id='.$exam_id.'&exam_date='.$exam_date.'&academic_year='.$academic_year.'&class_id='.$class_id.'&period_id='.$period_id.'*/

$exam_id = $_REQUEST['exam_id'];
$exam_date = $_REQUEST['exam_date'];
$academic_year = $_REQUEST['academic_year'];
$class_id = $_REQUEST['class_id'];
$period_id = $_REQUEST['period_id'];

?>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" />
<?php 

///retriving time of the period///
$sql_ptime = "select `start_time`, `end_time` from `std_exam_period` where `id` = $period_id";
$res_ptime = mysql_query($sql_ptime);
if($row_ptime = mysql_fetch_array($res_ptime))
{
	$start_time = $row_ptime[0];
	$end_time = $row_ptime[1];
}
$nsub_ids = '-1';
$sql_exist_sub = "SELECT `subject_id` FROM `std_exam_routine_new` WHERE `academic_year`=$academic_year and 
`exam_name_id` = $exam_id and `class_id`=$class_id and `flag`=1";
$res_exist_sub = mysql_query($sql_exist_sub);

while($row_exist_sub = mysql_fetch_array($res_exist_sub))
{
	$nsub_ids .= ','.$row_exist_sub[0];
}
$nsub_ids .= ',-1';
//echo $nsub_ids;

$this_period_sub = '';
$sql_sub_p = "SELECT `id`, `subject_id` FROM `std_exam_routine_new` WHERE `academic_year`=$academic_year and 
`exam_name_id` = $exam_id and `class_id`=$class_id and `exam_period_id`=$period_id and `flag`=1 and `exam_date`=str_to_date('$exam_date','%d-%m-%Y')";
$res_sub_p = mysql_query($sql_sub_p);
$exam_r_id = 0;
if($row_sub_p = mysql_fetch_array($res_sub_p))
{
	$this_period_sub = $row_sub_p[1];
	$exam_r_id = $row_sub_p[0];	
}
else
{
	$this_period_sub = '';
	$exam_r_id = 0;
}	
//echo $exam_r_id;
//echo "<br />";

if($this_period_sub != '')
{
	$nsub_ids = str_replace(','.$this_period_sub.',',',',$nsub_ids);
}
//echo $nsub_ids;	
?>
<!-- 
<body onunload="redirectToparent()">
-->
<body>
<fieldset>
	<legend>Add/Edit Exam Schedule by Date</legend>
	<form method="POST"  action="">
    	<table style="border:0px;" cellpadding="10" cellspacing="5">
            <tr>
            	<td><label>Subject</label></td>
            	<td>
                <?php
                $sql_sub = "select `id`,`subject_name`, `subject_code` from `std_subject_config` where `class_id`=$class_id and `id` not in ($nsub_ids)";
				?>
                <select name="sub_list" id="sub_list">
                	<option value="0">-Select-</option>
                    <?php
					$res_sub = mysql_query($sql_sub);
					while($row_sub=mysql_fetch_array($res_sub))
					{
						$selected_s = '';
						if($this_period_sub!='')
						{
							if($row_sub[0]==$this_period_sub)
								$selected_s = 'selected="selected"';
						}		
						echo '<option value="'.$row_sub[0].'" '.$selected_s.'>'.$row_sub[1].'('.$row_sub[2].')</option>';
					}
					?>
            	</select>
                </td>
            </tr>
			<tr>
            	<td>&nbsp;
                	<input type="hidden" name="h_exam_id" id="h_exam_id" value="<?php echo $exam_id;?>" />
                    <input type="hidden" name="h_exam_date" id="h_exam_date" value="<?php echo $exam_date;?>" />
                    <input type="hidden" name="h_academic_year" id="h_academic_year" value="<?php echo $academic_year;?>" />
                    <input type="hidden" name="h_class_id" id="h_class_id" value="<?php echo $class_id;?>" />
                    <input type="hidden" name="h_period_id" id="h_period_id" value="<?php echo $period_id;?>" />
                    <input type="hidden" name="h_period_id" id="h_period_id" value="<?php echo $period_id;?>" />
                    <input type="hidden" name="h_start_time" id="h_start_time" value="<?php echo $start_time;?>" />
                    <input type="hidden" name="h_end_time" id="h_end_time" value="<?php echo $end_time;?>" />
                    <input type="hidden" name="h_exam_r_id" id="h_exam_r_id" value="<?php echo $exam_r_id;?>" />
                    
                </td>
                <td><input type="submit" name="save" id="save" value="SAVE" /></td>
			</tr>
		</table>
    </form>    
	<legend>
</fieldset>
</body>
<?php 
if(isset($_REQUEST['save']))
{
	$exam_id = $_REQUEST['h_exam_id'];
	$exam_date = $_REQUEST['h_exam_date'];
	$academic_year = $_REQUEST['h_academic_year'];
	$class_id = $_REQUEST['h_class_id'];
	$period_id = $_REQUEST['h_period_id'];
	$start_time = $_REQUEST['h_start_time'];
	$end_time = $_REQUEST['h_end_time'];
	$subject_id = $_REQUEST['sub_list'];
	$exam_r_id = $_REQUEST['h_exam_r_id'];
	if($exam_r_id==0)
	{
		$ins_sql="insert into std_exam_routine_new set academic_year=$academic_year, exam_name_id='$exam_id', exam_date=str_to_date('$exam_date','%d-%m-%Y'), exam_period_id=$period_id, start_time='$start_time', end_time='$end_time', class_id=$class_id, section_id=0, subject_id=$subject_id, entry_date=now(), flag=1, branch_id=1";
		$r = mysql_query($ins_sql);
		if($r) echo "Your Data Has Been Entered Successfully !!!";
		else echo "Data Not Inserted!! Try Again.";	
	}
	else
	{
		$up_sql="update std_exam_routine_new set academic_year=$academic_year, exam_name_id='$exam_id', exam_date=str_to_date('$exam_date','%d-%m-%Y'), exam_period_id=$period_id, start_time='$start_time', end_time='$end_time', class_id=$class_id, section_id=0, subject_id=$subject_id, entry_date=now(), flag=1, branch_id=1 where id=$exam_r_id";
		$r = mysql_query($up_sql);
		if($r) echo "Your Data Has Been Updated Successfully !!!";
		else echo "Data Not Updated!! Try Again.";	
	}
	
}
?>
<script type="text/javascript">

function redirectToparent()
{
	//parent.parent.window.location = '../../?SM_id=53&menu_id=28&nev=exam_schedule_config_new';
	//parent.parent.GB_hide();
}
</script>