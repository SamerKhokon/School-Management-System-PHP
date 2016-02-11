<?php
			require_once("../db.php");
			$stu_id					 =	trim($_POST["stu_id"]);
			$password            = trim($_POST["password"]);
			$retype_password = trim($_POST["retype_password"]);
			
			if( duplicacy_check($stu_id) ==0 ){
			$insert = "insert into web_std_profile(std_id,password)  values('$stu_id','$password')";
			mysql_query($insert);			
			echo "Successfully created account!";
			}else{
			  echo "Account already exist of ID:$stu_id";
			}
			
			function duplicacy_check($stu_id) {
				$str = "select count(*) from web_std_profile    where std_id ='$stu_id'";
				$sql = mysql_query($str);
				$res = mysql_fetch_row($sql);
				
				if($res[0]=="")
				return 0;
				else
				return $res[0];
			}
?>