<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
<?php
		include('../db.php') ;

	    $sub_action= $_GET['sub_action'];
		$id 	   = $_GET['id'];
		$class_id  = $_GET['class_id'];
		$sec_name  = $_GET['sec_name'];
		$fee_head  = $_GET['fee_head'];
		$month	   = $_GET['month'];
		$amount    = $_GET['amount'];
	    $branch_id = $_GET['branch_id'];
	          
        
	    if($id!=="" && $sub_action=='detail')
		{	
	     detail_record($id,$class_id,$sec_name,$fee_head,$month,$amount,$branch_id);	     
		}
	   
		function  detail_record($id,$class_id,$sec_name,$fee_head,$month,$amount,$branch_id)
	    {
	   ?>
	   	<fieldset>
		<legend>Detail Record</legend>
	     <table>
        
		  <tr>
			  <td> Class Name:      </td><td>Class-<?Php echo $class_id; ?> </td></tr>
			  <td> Section:  </td><td> <?Php echo $sec_name; ?> </td></tr><tr>
			  <tr>
			  <td> Fee Name:  </td><td> <?Php echo $fee_head; ?> </td></tr><tr>
			  <td> Amount:     </td><td> <?Php echo $amount; ?> </td></tr><tr>
			  <td> Month:</td><td> <?Php echo $month; ?> </td></tr>					
      </table>
	  </fieldset>
	<?php
	   }
	   
	   if($id!=="" && $sub_action=='edit')
	   {	          
	        edit_record($id,$class_id,$sec_name,$fee_head,$month,$amount,$branch_id);	     
	   }	   
	   function edit_record($id,$class_id,$sec_name,$fee_head,$month,$amount,$branch_id)
	    {
?>
	   
			<form name="frm_e" id="frm_e" action="" method="post">	  
			<fieldset> 
			<legend>Edit Records</legend>	
			<table>         
			<tr><td> Class Name:</td><td><input type="text" name="class_id" value="<?php echo 'Class-'.$class_id; ?>" /></td></tr>
			<tr><td> Section :</td><td><input type="text" name="sec_name" value="<?php echo $sec_name; ?>" /></td></tr>
			<tr><td> Fee Name :</td><td><input type="text" name="fee_head" value="<?php echo $fee_head; ?>" /></td></tr>			
			<tr><td> Amount :</td><td><input type="text" name="amount" value="<?php echo $amount;  ?>" /></td></tr>
			<tr><td> Month :</td><td><input type="text" name="month" value="<?php echo $month; ?>" /></td></tr>			
			<input type="hidden" name="branch_id" value="<?php  echo $branch_id; ?>" />
            <input type="hidden" name="id" value="<?php  echo $id; ?>" />
	
			<tr><td><input type="submit" name="edit_btn" value="submit" />			
			</table>
			</fieldset>
			</form>
<?php  
			if (isset($_POST['edit_btn']))
			{  
			   $class_id  = $_POST["class_id"];
			   $sec_name  = $_POST["sec_name"];
			   $fee_head  = $_POST["fee_head"];
			   $amount    = $_POST["amount"];			   
			   $month     = $_POST["month"];
			   $branch_id = $_POST["branch_id"];			   
				
				
			   $voucher_str = "SELECT COUNT(*) FROM `std_voucher_summery` WHERE MONTH='$month' AND class_id=$class_id AND branch_id=$branch_id";	
               $voucher_sql = mysql_query($voucher_str);
			   $voucher_res = mysql_fetch_row($voucher_sql);
			    if($voucher_res[0]==0) 
				{
					echo $ress="UPDATE std_fee_details SET amount=$amount where id=$id and branch_id=$branch_id and class_id=$class_id and fee_head_name='$fee_head'";
				
					$sqll=mysql_query($ress);
					if($sqll)
					{
						echo "Update Successfully";
					}else {
						echo "Error ";
					}  				
				}	else{
                    echo "Data cannot be edit because voucher already generated for ".$month;									
				}				
			}		   	    	     
		}
?>