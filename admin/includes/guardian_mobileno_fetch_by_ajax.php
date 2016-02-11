<?php
			include("db.php");
			
			$class_id = trim($_POST["class_id"]);
			
			$str =  "SELECT home_phone FROM std_profile WHERE adm_class=$class_id";
			$qry = mysql_query($str);
			
			$mobileno = "";
			
			while( $res = mysql_fetch_array($qry)  ) {
			          $mob =  $res[0];
					  $mobileno .=  $mob.",";
			}
			
			$mobileno = substr($mobileno , 0 , strlen($mobileno)-1);	
			
			echo $mobileno ;
			//guardian_mobileno_fetch_by_ajax.php
?>