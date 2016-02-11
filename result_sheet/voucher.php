<?php  		 //include('num.php');
			ob_start();  		
			
			include("../db.php");
			
			$school_str = "SELECT name,address FROM `tbl_school_info` WHERE id=1";
		   $school_sql = mysql_query($school_str);
		   $school_res = mysql_fetch_row($school_sql);
		   $school_name  = $school_res[0];
		   $school_address =  $school_res[1];
					
			
			$class_id = trim($_GET["class_id"]);
			$month_id = trim($_GET["month_id"]);
			
			$month_date =  date("Y-m-01",strtotime($month_id));
			
			
		 	$string = "SELECT voucher_id,std_id,(SELECT NAME FROM std_profile WHERE stu_id=a.std_id) AS stu_name
,(SELECT section FROM std_profile WHERE stu_id=a.std_id) AS section,
(SELECT ovr_roll FROM std_profile WHERE stu_id=a.std_id) AS class_roll,class_id,
(SELECT quota FROM std_profile WHERE stu_id=a.std_id) AS category,year 
FROM std_voucher_summery AS a where class_id=$class_id";


           $page_counter  = 0;
			$query = mysql_query($string);
            while($res = mysql_fetch_array($query) ) {  
			$voucher_id = $res[0];
			$student_id = $res[1];
			$stu_name   = $res[2];
			$section    = $res[3];
			$class_roll = $res[4];
			$class_id   = $res[5];
			$category   = $res[6];
			$year       = $res[7];
			$page_counter++;
		?>
		
<table align="center" cellpadding="0" cellspacing="0">
<tr>

<td style="width:260px;">
	<p style="text-align:center;">
		<span style="font-size:13px;font-family:Arial;"><?php echo $school_name;?></span><br/>
		<span style="font-size:10px;font-family:Arial;"><?php echo $school_address;?></span>     &nbsp; &nbsp;(Bank Copy)<br/>
		<span style="font-size:12px;text-decoration:underline;font-family:Arial;">Payment Voucher</span><br/>
	</p>
	<br/>	
	
	<table cellpadding="0" cellspacing="0">
	   <tr>
	   <td style="width:80px;">D.NO:<?php echo $voucher_id; ?></td> 
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:50px;">Roll: <?php echo $class_roll;?></td>
	   </tr>
	   <tr><td colspan="5"  style="width:160px;">Student Name:<?php echo $stu_name;?></td></tr>	   
	   <tr>
	   <td  style="width:50px;">Class:<?php echo $class_id ; ?> </td>
	   <td style="width:15px;">&nbsp;</td>
	   <td   style="width:50px;"> Section:<?php echo $section;?></td>
	   <td style="width:15px;">&nbsp;</td>
	   <td    style="width:50px;">Session:<?php echo $year; ?></td>
	   </tr>	   
	</table>
	<br/>	
	
	
	<table align="center" cellpadding="0" cellspacing="0" border="0"   class="tbl">
		<tr>
		    <th style="width:260px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Description</th>
			<th style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Amount</th>
		</tr>
		
		<?php $tot1 = 0;
		    $nrow1 = 0;
			$fee_string = "SELECT fee_head_name,amount FROM std_fee_details WHERE std_id='$student_id' AND class_id=$class_id and month='$month_id'"; 
			$fee_query = mysql_query($fee_string);
			while($rs = mysql_fetch_array($fee_query) ) {
			$nrow1++;
			$fee_head_name = $rs[0];
			$fee_amount = $rs[1];
			$tot1 += $fee_amount;
		?>		
	    <tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #fff;border-bottom:0px solid #fff;border-right:1px solid #000;"><?php echo $fee_head_name;?></td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #fff;border-bottom:0px solid #fff;border-right:1px solid #000;"><?php echo $fee_amount;?></td> 			
		</tr>
		
		<?php } 
		$due_amount = get_due_amount($month_date,$student_id);
		$tot1 = $tot1+$due_amount;
		?>
		
		<tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">Details of Arrear</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;"><?php echo $due_amount;?></td> 
		</tr>		
		
		<?php  for($i=1;$i<=20-$nrow1;$i++){ ?>
		
		<tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">&nbsp;</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">&nbsp;</td> 
		</tr>
		<?php  } ?>
		<tr>
			<td style="text-align:right;width:260px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total&nbsp;</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?php echo $tot1;?></td> 
		</tr>
	</table>
	
	
	
	<br/>
	<table cellpadding="0" cellspacing="0" >
	  <tr><td>(In words):<?php //echo  $tot1; ?></td></tr>
	  <tr><td>Deposit these fees at Peelkhana booth of Bank Asia Ltd.</td></tr>	  
	  <tr><td>to the Account No.02133000551 within 28/05/2013 </td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>	  
	</table>	
	
	<table cellpadding="0" cellspacing="0" >
	<tr>
		<td style="font-size:11px;width:105px;">-----------------------------</td>
		<td  style="font-size:11px;width:105px;">----------------------------</td>
		<td style="font-size:11px;width:105px;">-----------------------------</td>
		</tr>	  	  	    	  	
		<tr>
		<td style="font-size:11px;width:105px;">Authorized Signature <br/>(Accounts)   </td>
		<td  style="font-size:11px;width:105px;">Authorized Signature<br/>Class Teacher</td>
		<td style="font-size:11px;width:105px;">Authorized Signature <br/>	(Bank)</td>
		</tr>	  	  	    	  
	</table>
</td>
   
  <!--  1st portion  -->
  <td style="width:10px;"></td>
 
  
  <td style="width:260px;">
	<p style="text-align:center;">
		<span style="font-size:13px;font-family:Arial;"><?php echo $school_name;?></span><br/>
		<span style="font-size:10px;font-family:Arial;"><?php echo $school_address;?></span>     &nbsp; &nbsp;(Institution Copy)<br/>
		<span style="font-size:12px;text-decoration:underline;font-family:Arial;">Payment Voucher</span><br/>
	</p>
	<br/>	
	
	<table cellpadding="0" cellspacing="0">
	   <tr>
	   <td style="width:80px;">D.NO:<?php echo $voucher_id; ?></td> 
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:50px;">Roll: <?php echo $class_roll;?></td>
	   </tr>
	   <tr><td colspan="5"  style="width:160px;">Student Name:<?php echo $stu_name;?></td></tr>	   
	   <tr>
	   <td  style="width:50px;">Class:<?php echo $class_id ; ?> </td>
	   <td style="width:15px;">&nbsp;</td>
	   <td   style="width:50px;"> Section:<?php echo $section;?></td>
	   <td style="width:15px;">&nbsp;</td>
	   <td    style="width:50px;">Session:<?php echo $year; ?></td>
	   </tr>	   
	</table>
	<br/>	
	
	
	<table align="center" cellpadding="0" cellspacing="0" border="0"   class="tbl">
		<tr>
		    <th style="width:260px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Description</th>
			<th style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Amount</th>
		</tr>
		
		<?php $tot1 = 0;
		    $nrow1 = 0;
			$fee_string = "SELECT fee_head_name,amount FROM std_fee_details WHERE std_id='$student_id' AND class_id=$class_id and month='$month_id'"; 
			$fee_query = mysql_query($fee_string);
			while($rs = mysql_fetch_array($fee_query) ) {
			$nrow1++;
			$fee_head_name = $rs[0];
			$fee_amount = $rs[1];
			$tot1 += $fee_amount;
		?>		
	    <tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #fff;border-bottom:0px solid #fff;border-right:1px solid #000;"><?php echo $fee_head_name;?></td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #fff;border-bottom:0px solid #fff;border-right:1px solid #000;"><?php echo $fee_amount;?></td> 			
		</tr>
		
		<?php } 
		$due_amount = get_due_amount($month_date,$student_id);
		$tot1 = $tot1+$due_amount;
		?>
		
		<tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">Details of Arrear</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;"><?php echo $due_amount;?></td> 
		</tr>		
		
		<?php  for($i=1;$i<=20-$nrow1;$i++){ ?>
		
		<tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">&nbsp;</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">&nbsp;</td> 
		</tr>
		<?php  } ?>
		<tr>
			<td style="text-align:right;width:260px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total&nbsp;</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?php echo $tot1;?></td> 
		</tr>
	</table>
	
	
	
	<br/>
	<table cellpadding="0" cellspacing="0" >
	  <tr><td>(In words):<?php //echo  $tot1; ?></td></tr>
	  <tr><td>Deposit these fees at Peelkhana booth of Bank Asia Ltd.</td></tr>	  
	  <tr><td>to the Account No.02133000551 within 28/05/2013 </td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>	  
	</table>	
	
	<table cellpadding="0" cellspacing="0" >
	<tr>
		<td style="font-size:11px;width:105px;">-----------------------------</td>
		<td  style="font-size:11px;width:105px;">----------------------------</td>
		<td style="font-size:11px;width:105px;">-----------------------------</td>
		</tr>	  	  	    	  	
		<tr>
		<td style="font-size:11px;width:105px;">Authorized Signature <br/>(Accounts)   </td>
		<td  style="font-size:11px;width:105px;">Authorized Signature<br/>Class Teacher</td>
		<td style="font-size:11px;width:105px;">Authorized Signature <br/>	(Bank)</td>
		</tr>	  	  	    	  
	</table>
</td>
  <!--  2nd portion -->
  
  
    <td style="width:10px;"></td>
 
  
  <td style="width:260px;">
	<p style="text-align:center;">
		<span style="font-size:13px;font-family:Arial;"><?php echo $school_name;?></span><br/>
		<span style="font-size:10px;font-family:Arial;"><?php echo $school_address;?></span>     &nbsp; &nbsp;(Student Copy)<br/>
		<span style="font-size:12px;text-decoration:underline;font-family:Arial;">Payment Voucher</span><br/>
	</p>
	<br/>	
	
	<table cellpadding="0" cellspacing="0">
	   <tr>
	   <td style="width:80px;">D.NO:<?php echo $voucher_id; ?></td> 
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:10px;">&nbsp;</td>
	   <td style="width:50px;">Roll: <?php echo $class_roll;?></td>
	   </tr>
	   <tr><td colspan="5"  style="width:160px;">Student Name:<?php echo $stu_name;?></td></tr>	   
	   <tr>
	   <td  style="width:50px;">Class:<?php echo $class_id ; ?> </td>
	   <td style="width:15px;">&nbsp;</td>
	   <td   style="width:50px;"> Section:<?php echo $section;?></td>
	   <td style="width:15px;">&nbsp;</td>
	   <td    style="width:50px;">Session:<?php echo $year; ?></td>
	   </tr>	   
	</table>
	<br/>	
	
	
	<table align="center" cellpadding="0" cellspacing="0" border="0"   class="tbl">
		<tr>
		    <th style="width:260px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Description</th>
			<th style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Amount</th>
		</tr>
		
		<?php $tot1 = 0;
		    $nrow1 = 0;
			$fee_string = "SELECT fee_head_name,amount FROM std_fee_details WHERE std_id='$student_id' AND class_id=$class_id and month='$month_id'"; 
			$fee_query = mysql_query($fee_string);
			while($rs = mysql_fetch_array($fee_query) ) {
			$nrow1++;
			$fee_head_name = $rs[0];
			$fee_amount = $rs[1];
			$tot1 += $fee_amount;
		?>		
	    <tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #fff;border-bottom:0px solid #fff;border-right:1px solid #000;"><?php echo $fee_head_name;?></td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #fff;border-bottom:0px solid #fff;border-right:1px solid #000;"><?php echo $fee_amount;?></td> 			
		</tr>
		
		<?php } 
		$due_amount = get_due_amount($month_date,$student_id);
		$tot1 = $tot1+$due_amount;
		?>
		
		<tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">Details of Arrear</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;"><?php echo $due_amount;?></td> 
		</tr>		
		
		<?php  for($i=1;$i<=20-$nrow1;$i++){ ?>
		
		<tr>
			<td style="width:260px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">&nbsp;</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:0px solid #000;border-bottom:0px solid #000;border-right:1px solid #000;">&nbsp;</td> 
		</tr>
		<?php  } ?>
		<tr>
			<td style="text-align:right;width:260px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total&nbsp;</td>    
			<td style="width:50px;text-align:right;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?php echo $tot1;?></td> 
		</tr>
	</table>
	
	
	
	<br/>
	<table cellpadding="0" cellspacing="0" >
	  <tr><td>(In words):<?php //echo  ucfirst(convert_number_to_words($tot1))." taka only."; ?></td></tr>
	  <tr><td>Deposit these fees at Peelkhana booth of Bank Asia Ltd.</td></tr>	  
	  <tr><td>to the Account No.02133000551 within 28/05/2013 </td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td></tr>	  
	</table>	
	
	<table cellpadding="0" cellspacing="0" >
	<tr>
		<td style="font-size:11px;width:105px;">-----------------------------</td>
		<td  style="font-size:11px;width:105px;">----------------------------</td>
		<td style="font-size:11px;width:105px;">-----------------------------</td>
		</tr>	  	  	    	  	
		<tr>
		<td style="font-size:11px;width:105px;">Authorized Signature <br/>(Accounts)   </td>
		<td  style="font-size:11px;width:105px;">Authorized Signature<br/>Class Teacher</td>
		<td style="font-size:11px;width:105px;">Authorized Signature <br/>	(Bank)</td>
		</tr>	  	  	    	  
	</table>
</td>
  <!--  3rd portion -->
</tr>
</table>	

<?php
if($page_counter <=9 ) {
	$page_counter  = "0".$page_counter;
}else{
	$page_counter  = $page_counter;
}
?>
<br/>
<table cellpadding="0" cellspacing="0" align="left">
  <tr><td style="width:980px;">&nbsp;</td><td style="margin-left:100px;font-style:italic;">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;<?php echo "Page-".$page_counter;?></td></tr>
</table>

<?php

}		$content = ob_get_clean();
				// convert to PDF
				include('html2pdf.class.php');				
				try
				{
					$html2pdf = new HTML2PDF('L', 'A4', 'fr');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
					$html2pdf->Output($school_name.'_voucher.pdf');
				}
				catch(HTML2PDF_exception $e)
				{
					echo $e;
					exit;
				}
				
				
		function get_due_amount($month_date,$student_id)
		{
		    $str = "select sum(total_amnt) from `std_voucher_summery` where std_id='$student_id' and 
		   month_date < $month_date and payment_stat='due'";
		   
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   if($res[0]=="")
		   return 0;
		   else
		   return $res[0];
		}		
?>