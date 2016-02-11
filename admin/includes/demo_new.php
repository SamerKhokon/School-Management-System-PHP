<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
<?php 
include('db.php') ;
$routine_id = $_REQUEST['routine_id'];
$branch_id = $_REQUEST['branch_id'];

/*$period_array = array();
$sql_period = "select `period_id`, `break_flag` from `std_class_period` where `branch_id`='$branch_id' and `flag`=1 order by `start_time`";
$res_period = mysql_query($sql_period);
while($row_period = mysql_fetch_array($res_period))
{
	$period_array[] = array('period_id'=>$row_period[0],'break_flag'=>$row_period[1]);
}
$search_period = 3;
myArraySrch($search_period);
//echo array_search($search_period,$period_array);
function myArraySrch($search_period)
{
	global $period_array;
	foreach($period_array as $key => $value)
	{
		if($value['period_id'] == $search_period){
			echo $value['break_flag'];
			echo $key;//return index 
			break;
		}
	} 
}*/
$sql_routine_info = "select * from `std_class_routine_new` where `active_flag`=1 and `id`=$routine_id and `branch_id`='$branch_id'";
$res_routine_info = mysql_query($sql_routine_info);
while($row_routine_info=mysql_fetch_array($res_routine_info))
{
	$day = $row_routine_info['day'];
	$period_id = $row_routine_info['period_id'];
	$class_id = $row_routine_info['class_id'];
	$section_id = $row_routine_info['section_id'];
	$teacher_id = $row_routine_info['teacher_id'];
	$subject_id = $row_routine_info['subject_id'];
}
$teach_ids_notin_prd = '-1,';

$teacher_cndtn = '';                    
if($teacher_id!=0)
{
	$teacher_cndtn = ' and `teacher_id`!='.$teacher_id;
}
	$sql_teach_ids_notin_prd = "select `teacher_id` from `std_class_routine_new` where `day`=$day and `period_id`=$period_id $teacher_cndtn and `branch_id`=$branch_id";
	$res_teach_ids_notin_prd = mysql_query($sql_teach_ids_notin_prd);
	if(mysql_num_rows($res_teach_ids_notin_prd))
	{
		while($row_teach_ids_notin_prd=mysql_fetch_array($res_teach_ids_notin_prd))
		{
			$t_id = $row_teach_ids_notin_prd[0];
			if($t_id!=0)
				$teach_ids_notin_prd.=$t_id.',';	
		}		
	}
	

$teach_ids_notin_prd .= '-1';

$sub_ids_notin_prd = '-1,';
                    
if($subject_id!=0)
{
	$sql_sub_ids_notin_prd = "select `subject_id` from `std_class_routine_new` where `day`=$day and `period_id`=$period_id and `subject_id`!=$subject_id and `class_id`=$class_id and `branch_id`=$branch_id";
	$res_sub_ids_notin_prd = mysql_query($sql_sub_ids_notin_prd);
	if(mysql_num_rows($res_sub_ids_notin_prd))
	{
		while($row_sub_ids_notin_prd=mysql_fetch_array($res_sub_ids_notin_prd))
		{
			$sub_id = $row_sub_ids_notin_prd[0];
			if($sub_id!=0)
				$sub_ids_notin_prd.=$sub_id.',';	
		}		
	}
	
}
$sub_ids_notin_prd .= '-1';
?>
<!--<hr> -->
<fieldset>
	<legend>Add/Edit Routine Data</legend>
	<form method="POST"  action="">
    	<table style="border:0px;" cellpadding="10" cellspacing="5">
            <!--<tr>
                <td><label>Break</label></td>
                <td><select name="break_flag" id="break_flag">
                    <option value="0">No</option>
                    <option value="1"> Yes</option>
                </select>
                </td>
            </tr> -->
            <tr>
                <td><label>Teacher</label></td>
                <td><select name="teacher_list" id="teacher_id">
                    <option value="0">-Select-</option>
                    <?php
					$sql_teacher = "select `id`,`teacher_name` from `std_teacher_info` where `branch_id`='$branch_id' and `id` not in ($teach_ids_notin_prd)";
					$res_teacher = mysql_query($sql_teacher);
					while($row_teacher=mysql_fetch_array($res_teacher))
					{
						$selected_t = '';
						if($row_teacher[0]==$teacher_id)
							$selected_t = 'selected="selected"';
						echo '<option value="'.$row_teacher[0].'" '.$selected_t.'>'.$row_teacher[1].'</option>';
					}
					?>
                </select>
                </td>
            </tr>    
            <tr>
            	<td><label>Subject</label></td>
            	<td><select name="sub_list" id="sub_list">
                	<option value="0">-Select-</option>
                    <?php
					$sql_sub = "select `id`,`subject_name` from `std_subject_config` where `branch_id`='$branch_id' and `class_id`=$class_id and `id` not in ($sub_ids_notin_prd)";
					$res_sub = mysql_query($sql_sub);
					while($row_sub=mysql_fetch_array($res_sub))
					{
						$selected_s = '';
						if($row_sub[0]==$subject_id)
							$selected_s = 'selected="selected"';
						echo '<option value="'.$row_sub[0].'" '.$selected_s.'>'.$row_sub[1].'</option>';
					}
					?>
            	</select>
                </td>
            </tr>
            <!--<tr>
            	<td><label>Extand With</label></td>
                <td>
                	<input type="radio" name="extand_with" id="extand_withNone" value="none" checked="checked" />&nbsp;None&nbsp;
                    <input type="radio" name="extand_with" id="extand_withNxt" value="nxt" />&nbsp;Next&nbsp;
                    <input type="radio" name="extand_with" id="extand_withPrev" value="prev" />&nbsp;Previous&nbsp;
                </td>
            </tr> -->    
			<tr>
            	<td>&nbsp;</td>
                <td><input type="submit" name="save" id="save" value="save" /><input type="hidden" name="id" value="<?php echo $_REQUEST['routine_id'];?>"/><input type="hidden" name="h_day" id="h_day" value="<?php echo $day;?>" /><input type="hidden" name="h_period" id="h_period" value="<?php echo $period_id;?>" /></td>
			</tr>
		</table>
    </form>    
	<legend>
</fieldset>
<?php 
if(isset($_REQUEST['save']))
{
	$sel_tch = $_REQUEST['teacher_list'];
	//echo '<br />';
	$sel_sub = $_REQUEST['sub_list'];
	//echo '<br />';
	//$extand_with = $_REQUEST['extand_with'];
	$extand_with = 'none';
	//echo '<br />';
	$sel_day = $_REQUEST['h_day'];
	$sel_period = $_REQUEST['h_period'];
	$rtn_id = $_REQUEST['id'];
	if($extand_with=='none')
	{
		/*$sql_chk_t = "select `id` from `std_class_routine_new` where `day`=$sel_day and `period_id`=$sel_period and `teacher_id`=$sel_tch";
		$res_chk_t = mysql_query($sql_chk_t);
		if(mysql_num_rows($res_chk_t)>0)
		{
			echo '<font style="color:#FF0000; font-weight:bold;">>This Teacher already has class in this period!!!</font>';
		}*/
		$sql_up = "update `std_class_routine_new` set `teacher_id`=$sel_tch, `subject_id`=$sel_sub where `id`=$rtn_id";
		if(mysql_query($sql_up)){
			echo '<font style="color:#006600; font-weight:bold;">Your Action was Successfull!!!</font>';
		}
	}
}
?>