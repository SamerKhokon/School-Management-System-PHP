<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
<?php 
include('db.php') ;
if (	isset($_POST['sub_name']) &&
	  	isset($_POST['teacher_name']) 
		
		) {
		?>
		<div id="status"  <?php
	    if (empty($_POST['sub_name']) || empty($_POST['teacher_name'])
			) 
		{
		echo('class="error">Please fill in all three fields');
	    }
	  elseif (	sha1($_POST['new1']) != sha1($_POST['new2'])) {
		echo('class="error">password verification error');
	    }
	    else 
	    {
		 $day_name=$_POST['day_name'];
		 $rt_id=$_POST['id'];
		 $teacher_name=$_POST['teacher_name'];
		 $rt_value=$_POST['sub_name']."<br/>".$_POST['teacher_name'];
		 $sql2="update std_class_routine set $day_name='$rt_value' where id=$rt_id and NOT EXISTS 
    (SELECT name FROM std_class_routine WHERE $day_name like '%$teacher_name')";
		 
		$sql="update std_class_routine set $day_name='$rt_value' where id=$rt_id";
		mysql_query($sql);
		echo('class="ok">Data successfully inserted..'.$sql2);
	    }
	  ?></div><?php
}
?>
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

$select_subject.="<option value=\"$class_subject_result[1]\">$class_subject_result[1]</option>";

}
echo $select_subject.='</select>';


?>
<input type="hidden" name="day_name" value="<?php echo $_GET['day_name'];?>"/>
<input type="hidden" name="id" value="<?php echo $_GET['routine_id'];?>"/>

<br/><br/>
<input type="submit" value="Change Password" />
<legend>
</fieldset>


</form>