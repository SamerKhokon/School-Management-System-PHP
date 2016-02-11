<?php
		require'../db.php';
	 	$fee_name  = $_POST['fee_name'];
        $category   = $_POST['category'];
	    $branch_id = $_POST['branch_id'];	  
	  
		$sel="select count(*) as chk from tbl_class_feehead where fee_head='$fee_name' and branch_id='$branch_id'";
		$res1=mysql_query($sel);
		$row1=mysql_fetch_array($res1);

		if($row1['chk']<1) {
			$ins_sql="insert into tbl_class_feehead(fee_head,category,branch_id) values('$fee_name','$category','$branch_id')";	    
			echo $ins_sql;	
			$result=mysql_query($ins_sql);		
			if($result){
					echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
			}else	{
					echo "Error";		
			}
		}else {	
			echo "This value is exists in database ";
		}		
	
		if($row1['chk'] < 1 ) {		
			$in_ql = mysql_query("SELECT id FROM tbl_class_feehead where fee_head='$fee_name' and branch_id='$branch_id' ");
			$res   = mysql_fetch_array($in_ql);	
			$g_id = $res['id'];	
			class_fee_tbl_gene($g_id,$branch_id);
		}
		
		function class_fee_tbl_gene($g_id,$branch_id)  {
			  $sel2="select id from std_class_config where branch_id='$branch_id' ";
			  $res2=mysql_query($sel2);
		  
			while($row2=mysql_fetch_array($res2))  {
				 $r=$row2['id'];			
				 $sel3=mysql_query("insert into tbl_class_fee_info(class_id,fee_head_id,amount,branch_id) values('$r','$g_id','0000','$branch_id')");
			}	   	  	     
		}
?>