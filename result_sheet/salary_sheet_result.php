<?php   ob_start();  															
		$con = mysql_connect("localhost" , "root", "");
		mysql_select_db("school" , $con);
			
	   $school_str          = "SELECT name,address FROM `tbl_school_info` WHERE id=1";
	   $school_sql         = mysql_query($school_str);
	   $school_res         = mysql_fetch_row($school_sql);
	   $school_name     = $school_res[0];
	   $school_address =  $school_res[1];					
		
		$class_id       = 1;//trim($_GET["class_id"]);
		$month_id     = "2013-07-01";//trim($_GET["month_id"]);			
		$month_date =  date("Y-m-01",strtotime($month_id));
?>

	<table align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td style="width:260px;">
				<p style="text-align:center;">
						<span style="font-size:13px;font-family:Arial;font-weight:bold;"><?php echo $school_name;?></span><br/>
						<span style="font-size:10px;font-family:Arial;font-weight:bold;"><?php echo $school_address;?></span>     &nbsp; &nbsp;<br/>
						<span style="font-size:10px;font-family:Arial;font-weight:bold;">Phone:7593593795793</span>     &nbsp; &nbsp;<br/>
						<span style="font-size:12px;text-decoration:underline;font-family:Arial;font-weight:bold;">Salary Sheet ( Jul-2013 )</span><br/>
				</p>
			</td>
		</tr>
	</table>
	<br/>	
	
	<table align="center" cellpadding="0" cellspacing="0" border="0">		
		<tr>
				<th rowspan="2" style="width:30px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Sl</th>
				<th rowspan="2" style="width:150px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Name</th>
				<th rowspan="2" style="width:70px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Designation</th>
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Basic</th>	
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Medical</th>
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">House Rent</th>
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Gross</th>		
				<th colspan="4" style="width:200px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Attendance Information</th>
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Absent Deduct</th>  
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Advance</th>  				
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Festival Bonus</th>					
				<th rowspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Net Amount</th>
				<th rowspan="2" style="width:70px;text-align:center;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Signature</th>				
		</tr>		
		<tr>
				<th style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total open</th>
				<th style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total Attend</th>
				<th style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total Absent</th>
				<th style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total Holidays</th>			
		</tr>
	    <tr>
					<td style="width:30px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">1</td>    
					<td style="width:150px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Salam</td> 			
					<td style="width:70px;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Jr. Teacher</td>    
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">5500</td> 			
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">2500</td>    
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">2000</td> 		
					<td style="width:30px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">100</td>    
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">27</td> 			
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">26</td>    
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">1</td> 			
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">4</td>    
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">2000</td> 						
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">2000</td> 											
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">5500</td> 			
					<td style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">2500</td>    
					<td style="width:70px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"></td> 							
		</tr>
		  <tr>
					<td   colspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Total:</td>
					<td colspan="14" style="width:50px;text-align:left;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"> &nbsp;2500</td>
		  </tr>				
		  <tr>
					  <td   colspan="2" style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">(In words):</td>
					  <td colspan="14" style="width:50px;text-align:center;border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"></td>
		  </tr>
	</table>
	
	
	<br/>	
	<table  align="center" cellpadding="0" cellspacing="0" >
			<tr>
				<td style="font-size:11px;width:305px;">--------------------------</td>
				<td  style="font-size:11px;width:305px;">-------------------------</td>
				<td style="font-size:11px;width:305px;">--------------------------</td>
			</tr>	  	  	    	  	
			<tr>
				<td style="font-size:11px;width:305px;">&nbsp;&nbsp;&nbsp;Prepared By <br/>   </td>
				<td  style="font-size:11px;width:305px;">&nbsp;&nbsp;&nbsp;Checked By<br/></td>
				<td style="font-size:11px;width:305px;">&nbsp;&nbsp;&nbsp;Authorized By <br/>	</td>
			</tr>	  	  	    	  
	</table>			
	

<?php
				$content = ob_get_clean();
				
				// convert to PDF
				include('html2pdf.class.php');				
				try
				{
					$html2pdf = new HTML2PDF('L', 'A4', 'fr');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
					$html2pdf->Output($school_name.'_salary_sheet.pdf');
				}
				catch(HTML2PDF_exception $e)
				{
					echo $e;
					exit;
				}
?>