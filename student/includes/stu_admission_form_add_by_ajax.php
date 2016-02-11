<?php  require_once('db.php');

		$stu_name			= trim($_POST['stu_name']);
		$age				= trim($_POST['age']);
		$sex				= trim($_POST['sex']);			
		$dob   				= trim($_POST['birthday']);		
		
		echo $stu_name.' '.$age.' '.$sex.' '.$dob;

?>