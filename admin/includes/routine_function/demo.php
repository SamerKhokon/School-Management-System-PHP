<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
<?php 
		include('db.php') ;
		if (isset($_POST['sub_name']) && 	isset($_POST['teacher_name']) 	) {		
?>
<div id="status">
<?php
	    if (empty($_POST['sub_name']) || empty($_POST['teacher_name'])	) {
				echo('class="error">Please fill in all three fields');
	    } else   {
		    $day_name     = trim($_POST['day_name']);
		    $rt_id        = trim($_POST['id']);
		    $teacher_name = trim($_POST['teacher_name']);
  		    $rt_value     = trim($_POST['sub_name'])."<br/>".trim($_POST['teacher_name']);
			
			$parse_teacher = explode('<br/>',$rt_value);
			$subject_code = $parse_teacher[0];
			$teacher_name = $parse_teacher[1];			
			
			$teacher_name_finder_str = "SELECT SUBSTRING_INDEX(day_sat,'<br/>',-1) from std_class_routine where id=$rt_id";
			$teacher_name_finder_stm = mysql_query($teacher_name_finder_str);
		    $teacher_name_finder_res = mysql_fetch_row($teacher_name_finder_stm);	
			$teacher_name_from_substr = $teacher_name_finder_res[0];
			
			
			//$teacher_flag_count_str = "SELECT COUNT(*) FROM std_class_routine WHERE class_time='08:30' AND SUBSTRING_INDEX($day_name,'<br/>',-1)='$teacher_name'";
			
			$teacher_flag_count_str = "SELECT COUNT(*) FROM std_class_routine 
			WHERE id=$rt_id AND SUBSTRING($day_name,LOCATE('<br/>',$day_name)+5,LENGTH($day_name))='$teacher_name'";
			
			$teacher_flag_count_stm = mysql_query($teacher_flag_count_str);
			$teacher_flag_count_res = mysql_fetch_row($teacher_flag_count_stm);
			$teacher_flag_count = $teacher_flag_count_res[0];
			
		
		    if($teacher_flag_count==0 || $teacher_flag_count=="") {
				$sql2 = "update std_class_routine set $day_name='$rt_value' where id=$rt_id and NOT EXISTS 
				(SELECT name FROM std_class_routine WHERE $day_name like '%$teacher_name')";
			 
				$sql = "update std_class_routine set $day_name='$rt_value' where id=$rt_id";
				mysql_query($sql);
						
				echo('class="ok">Data successfully inserted..');
			}else{
				echo " Data already exist";
			}
	    }
?>
</div>
<?php  } 			 ?>
<hr>
<fieldset>
	<legend>Add Routine Data</legend>
	<form method="POST"  action="">
		<!--
		Old password: <input name="old"><br />
		New password: <input name="new1"><br />
		Retype new password: <input name="new2"><br />

		-->
		<?php
			$class_teacher_name=mysql_query("select * from std_teacher_info");
			echo "Teacher Name<select  name=\"teacher_name\">";
			while ($class_teacher_result=mysql_fetch_array($class_teacher_name))
			{
				echo "<option value=\"$class_teacher_result[1]\">$class_teacher_result[1]</option>";
			}
			echo "</select><br/><br/>";

			$class_subject_name=mysql_query("select * from std_subject_config");
			$select_subject='Subject Name<select name=\'sub_name\' tabindex=\'1001\'>';

			while ($class_subject_result=mysql_fetch_array($class_subject_name))
			{
				$select_subject.="<option value=\"$class_subject_result[2]\">$class_subject_result[3]</option>";
			}
			echo $select_subject.='</select>';
		?>
		<input type="hidden" name="day_name" value="<?php echo $_GET['day_name'];?>"/>
		<input type="hidden" name="id" value="<?php echo $_GET['routine_id'];?>"/>

		<br/><br/>
		<input type="submit" value="save" />
		<legend>
	</fieldset>
</form>