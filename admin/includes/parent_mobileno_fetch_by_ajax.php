<?php   require_once('db.php');

		$class_id = trim($_POST['class_id']);
		
		$str = "SELECT father_work_phone FROM std_profile where adm_class=$class_id";
		$stm = mysql_query($str);
		$numbers = "";
		while($res = mysql_fetch_array($stm)){
			$numbers .= $res[0].',';
		} 
		echo substr($numbers ,0,strlen($numbers)-1);
?>