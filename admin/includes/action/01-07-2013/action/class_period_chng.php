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
/*period=$period&sub_action=delete&branch_id=$branch_id&period_id=$period_id*/
// echo  $sub_name=$_GET['sub_name'];
$period=$_GET['period'];
$sub_action=$_GET['sub_action'];
$branch_id=$_GET['branch_id'];
$period_id=$_GET['period_id'];
 
$qry = mysql_query("SELECT  * from std_class_period where period_id='$period_id' and branch_id='$branch_id'" ); 		
while ($row=mysql_fetch_array($qry))
{
	$start_time=$row['start_time'];
	$end_time=$row['end_time'];	
	$break = 'No';
	$break_flag=$row['break_flag'];
	if($break_flag==1)
		$break = 'Yes';	
}	   
if($period_id!=="" && $sub_action=='delete')
{
	delete_record($period_id,$branch_id);
}

function delete_record($period_id,$branch_id)
{
?>
	<form name="frm_d" id="frm_d" action="" method="post">
	<fieldset>
	<legend>Delete Records</legend>
	<table>
		<tr>
			<td > Click OK or Close </td>
		</tr>
		<tr>
			<td>   
				<input type="submit" value="OK" name="ok_btn"  />
				<!--<input type="button" value="Cancel" name="can_btn" id="can_btn" onclick="get_clos();"/> -->
			</td>
		</tr>
	</table>
	</fieldset>
	</form>
	<?php  
	if (isset($_POST['ok_btn']))
	{
		
		$res="delete from std_class_period where period_id=$period_id and branch_id='$branch_id'";
		mysql_query($res);
	   
		if($res)
		{
			echo "delete successfully";
		}
		else
		{
		echo "error";
		}
	}
}
if($period_id!=="" && $sub_action=='detail')
{
	detail_record($period,$start_time,$end_time,$break,$period_id);
}
   
function  detail_record($period,$start_time,$end_time,$break,$period_id)
{
?>
	<fieldset>
	<legend>Detail About Period</legend>
	<table>
		<tr><td> Period:      </td><td> <?Php echo $period; ?> </td></tr>
		<tr><td> Start Time:  </td><td> <?Php echo $start_time; ?> </td></tr>
		<tr><td> End Time:    </td><td> <?Php echo $end_time; ?> </td></tr>
		<tr><td> Break:       </td><td> <?Php echo $break; ?> </td></tr>
	</table>
	</fieldset>
<?php    
}
if($period_id!=="" && $sub_action=='edit')
{
	edit_record($period,$start_time,$end_time,$break_flag,$branch_id,$period_id);
}
function edit_record($period,$start_time,$end_time,$break_flag,$branch_id,$period_id)
{
	
	$start_time_array = explode(':',$start_time);
	$start_hour = (int)$start_time_array[0];
	$start_min = (int)$start_time_array[1];
	
	$end_time_array = explode(':',$end_time);
	$end_hour = (int)$end_time_array[0];
	$end_min = (int)$end_time_array[1];
	
	?>
	<form name="frm_e" id="frm_e" action="" method="post">	  
		<fieldset> 
		<legend>Edit Records</legend>	
			<table>
				<tr>
					<td> Class Period:</td>
					<td>
                    	<input type="text" name="period" value="<?php echo $period; ?>" />
                        <input type="hidden" name="period_id" id="period_id" value="<?php echo $period_id;?>" />
                    </td>
				</tr>
				<tr>
					<td> Start Time :</td>
					<td><select id="start_hour" class="styledselect-day" name="start_hour">					
					<?php
                    for($i=0;$i<=23;$i++ ){
                        if($start_hour==$i)
							echo "<option selected=\"selected\" value=\"$i\">$i</option>";
						else
							echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                    </select>
                    <select id="start_min" class="styledselect-month" name="start_min">
                    <?php		
                    for($i=0;$i<60;$i=$i+5 ){
                        if($start_min==$i)
							echo "<option selected=\"selected\" value=\"$i\">$i</option>";
						else
							echo "<option value=\"$i\">$i</option>";
                    }
                    ?>					
                    </select></td>
				</tr>
				<tr>
					<td> End Time :</td>
					<td><select id="end_hour" class="styledselect-day" name="end_hour">					
					<?php
                    for($i=0;$i<=23;$i++ ){
                        if($end_hour==$i)
							echo "<option selected=\"selected\" value=\"$i\">$i</option>";
						else
							echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                    </select>
                    <select id="end_min" class="styledselect-month" name="end_min">
                    <?php		
                    for($i=0;$i<60;$i=$i+5 ){
                        if($end_min==$i)
							echo "<option selected=\"selected\" value=\"$i\">$i</option>";
						else
							echo "<option value=\"$i\">$i</option>";
                    }
                    ?>					
                    </select></td>
				</tr>
				<tr>
					<td> Break :</td>
					<td>
						<select class="styledselect-month" id="break_flag" name="break_flag">
                            <option value="0" <?php if($break_flag==0){ echo 'selected="selected"';}?>>No</option>
                            <option value="1" <?php if($break_flag==1){ echo 'selected="selected"';}?>>Yes</option>
                        </select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="edit_btn" value="submit" /><input type="hidden" name="branch_id" id="branch_id" value="<?php echo $branch_id;?>" /></td>
					<td></td>
				</tr>    			
			</table>
		</fieldset>
	</form>
	<?php  
	if (isset($_POST['edit_btn']))
	{  
		$period=$_POST["period"];
		$start_hour=$_POST["start_hour"];
		$start_min=$_POST["start_min"];
		$end_hour=$_POST["end_hour"];
		$end_min=$_POST["end_min"];
		$branch_id=$_POST["branch_id"];
		$break_flag=$_POST["break_flag"];
		
		$s_time = $start_hour.":".$start_min.":00";
		$e_time = $end_hour.":".$end_min.":00";
		//echo $sub_name;
			
		$ress="UPDATE std_class_period SET period='$period',start_time='$s_time',end_time='$e_time',break_flag='$break_flag' where period_id='$period_id' and branch_id='$branch_id'";
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
