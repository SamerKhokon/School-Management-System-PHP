<?php   require_once('../db.php');
		$class_name = trim($_POST["class_name"]);
		$branch_id = trim($_POST["branch_id"]);
		echo $class_name.'  '.$branch_id;
?>