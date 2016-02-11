<?php  session_start();
      include("../db.php");
	  
	  $class_id = trim($_POST["class_id"]);
	  $branch_id = $_SESSION['LOGIN_BRANCH'];; 
	  
	  $str = "SELECT subject_code,subject_name FROM std_subject_config WHERE class_id=$class_id AND branch_id=$branch_id";
	  $sql = mysql_query($str);
	  while($res = mysql_fetch_array($sql) ){
	     $option .= "<option value='".$res[0]."'>".$res[1]."</option>";
	  }
	  
	  echo  $option;
?>