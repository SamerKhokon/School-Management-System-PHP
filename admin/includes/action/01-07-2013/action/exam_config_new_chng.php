<script>
	function get_clos()
	{
		Window.close();
	}
</script>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
<?php
	include('../db.php') ;
    $id=$_GET['id'];
    $exam_name=$_GET['exam_name'];
	$sub_action=$_GET['sub_action'];
	$period_ids=$_GET['period_ids'];
	$academic_year=$_GET['academic_year'];
	$sql_period = mysql_query("select `period`,date_format(`start_time`,'%h:%i %p') as start_time, date_format(`end_time`,'%h:%i %p') as end_time from `std_exam_period` where `id` in($period_ids) order by `start_time`");
	$periods = '';
	while($row_period = mysql_fetch_array($sql_period))
	{
		$periods .= $row_period['period'].'['.$row_period['start_time'].'-'.$row_period['end_time'].']<br />';				
	}
	
	//retiving all exam period//
	$sql_exm_prd = "select `id`, `period`,date_format(`start_time`,'%h:%i %p'),date_format(`end_time`,'%h:%i %p') from `std_exam_period` where `flag`=1";
	$res_exm_prd = mysql_query($sql_exm_prd);
	$all_period = '';
	while($row_exm_prd=mysql_fetch_array($res_exm_prd))
	{
		$period_idAll = $row_exm_prd[0];
		$periodAll = $row_exm_prd[1];
		$start_timeAll = $row_exm_prd[2];
		$end_timeAll = $row_exm_prd[3];
		$checked = '';
		if(strrpos($period_ids,','.$period_idAll.','))
		{	
			$all_period .= '<input type="checkbox" class="chk_period" name="chk_period[]" id="chk_period'.$period_idAll.'" value="'.$period_idAll.'" checked="checked" />&nbsp;'.$periodAll.' ['.$start_timeAll.'-'.$end_timeAll.']<br />';
		}
		else
		{
			$all_period .= '<input type="checkbox" class="chk_period" name="chk_period[]" id="chk_period'.$period_idAll.'" value="'.$period_idAll.'" $checked />&nbsp;'.$periodAll.' ['.$start_timeAll.'-'.$end_timeAll.'] <br />';
		}
	}
	
	if($exam_name!=="" && $sub_action=='delete')
	{
	    delete_record($id);
	     
	}
	function delete_record($id)
	{
	?>
		<form name="frm_d" id="frm_d" action="" method="post">
			<fieldset>
				<legend>Delete Records</legend>
				<table>
					<tr>
						<td > Click OK or Cancel </td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="OK" name="ok_btn"  />
							<input type="button" value="Cancel" name="can_btn" id="can_btn" onclick="get_clos();"/>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
		<?php  
		if (isset($_POST['ok_btn']))
		{
			$res="delete from std_exam_config_new where id='$id'";
			mysql_query($res);
			if($res)
			{
				echo "Deleted Successfully";
			}
			else
			{
				echo "error";
			}
		}

	     
	}
	if($exam_name!=="" && $sub_action=='detail')
	{
		detail_record($id,$exam_name,$periods,$academic_year);
	}
	function detail_record($id,$exam_name,$periods,$academic_year)
	{
		?>
		<fieldset>
			<legend>Detail About Exam</legend>
			<table>
				<tr><td> id: </td><td><?Php echo $id; ?> </td></tr>
				<tr><td> Exam Name:</td><td> <?Php echo $exam_name; ?> </td></tr>
				<tr><td> Academic Year:</td><td ><?Php echo $academic_year; ?> </td></tr>
				<tr><td> Periods: </td><td><?Php echo $periods; ?> </td></tr>
			</table>
		</fieldset>
		<?php    
	}
	if($exam_name!=="" && $sub_action=='edit')
	{
		edit_record($id,$exam_name,$all_period,$academic_year);
	}
	   
	function edit_record($id,$exam_name,$all_period,$academic_year)
	{
		?>

		<form name="frm_e" id="frm_e" action="" method="post">	  
			<fieldset> 
				<legend>Edit Records</legend>	
				<table>
					<tr><td>Exam Name:</td><td><input type="text" name="exam_name" value="<?php echo $exam_name; ?>" /></td></tr>
                    <tr><td>Academic Year:</td><td><input type="text" name="academic_year" readonly="readonly" value="<?php echo $academic_year; ?>" /></td></tr>
					<tr><td style="vertical-align:top;"> Period     :</td><td style="vertical-align:top;"><!--<div style="height:70px; overflow:auto;"> --><?php echo $all_period;  ?><!--</div> --></td></tr>
					<tr><td><input type="submit" name="edit_btn" value="submit" /><input type="hidden" id="id" name="id" value="<?php echo $id;?>" />			
				</table>
			</fieldset>
		</form>
		<?php  
		if (isset($_POST['edit_btn']))
		{  
			$id=$_POST["id"];
			$exam_name=$_POST["exam_name"];
			$chk_period=$_POST["chk_period"];
			$period_ids = implode(',',$chk_period);
			echo $period_ids = '-1,'.$period_ids.',-1';
			$academic_year = $_GET['academic_year'];
			
			$ress="UPDATE std_exam_config_new SET exam_name='$exam_name',period_ids='$period_ids' WHERE id='$id'";
			$sqll=mysql_query($ress); 
			//echo $ress;
			if($sqll)
		    {
				echo "Update Successfully";
			} 
			else
			{
				echo "Error ";
			}
				 
		}		   
	    
	     
	}
?>
