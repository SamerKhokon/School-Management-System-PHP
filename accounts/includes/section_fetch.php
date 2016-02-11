<?php  require_once("../db.php");
		//section_fetch.php
		$class_id  = trim($_POST["class_id"]);
		$branch_id = trim($_POST["branch_id"]);
		
		echo $str = "SELECT id,section_name FROM `std_class_section_config` WHERE class_id=$class_id AND branch_id=$branch_id";  
		global $option;
		$sql = mysql_query($str);
		while($res = mysql_fetch_array($sql))
		{
			$option .= '<option value="'.$res[1].'">'.$res[1].'</option>';
		} 
		echo $option;
?>