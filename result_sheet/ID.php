<?php      ob_start();
		   $con = mysql_connect("localhost","root","");	
		   mysql_select_db("school" , $con);
		   $class_id = trim($_GET["class_id"]);
		   
		   
		   $school_str = "SELECT name,address FROM `tbl_school_info` WHERE id=1";
		   $school_sql = mysql_query($school_str);
		   $school_res = mysql_fetch_row($school_sql);
		   $school_name  = $school_res[0];
		   $school_address =  $school_res[1];
		   
		  $string = "SELECT stu_id,NAME,adm_class,section,ovr_roll,father_name,mother_name,pre_address,
			(SELECT YEAR FROM std_class_info WHERE stu_id=a.stu_id) AS YEAR , 
			father_work_phone FROM std_profile AS a where adm_class=$class_id"; 
			
		 $query = mysql_query($string);  
		 while($res = mysql_fetch_array($query) ) {
		  $stu_id = $res[0];
		  $stu_name = $res[1];
		  $class = $res[2];
		  $section = $res[3]; 
		  $class_roll = $res[4]; 
		  $father_name 	  = $res[5];
		  $mother_name = $res[6];
		  $pre_address   = $res[7];
		  $session 		  = $res[8];
		  $father_work_phone = $res[9];
?>
<br/><br/>
  <table width="100%" cellpadding="0" cellspacing="3">
    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	
	<tr>
	<td style="width:350px;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr><td colspan="6">&nbsp;</td></tr>
					<tr>
						<td colspan="6" align="center" style="font-style:bold;text-align:center;"><?php echo $school_name;?><br />
							<?php echo $school_address;?>
						</td>
					</tr>
					<tr><td colspan="6">&nbsp;</td></tr>
					<tr><td colspan="5" style="font-style:italic;text-align:center;">Identity Card</td><td ></td></tr>
					<tr><td colspan="6">&nbsp;</td>	</tr>
					<tr>
						<td style="padding-left:5px;">Student ID</td>
						<td>:</td>
						<td colspan="4"><?php echo $stu_id;?></td>
					</tr>
					<tr>
						<td colspan="6"></td>
					</tr>
					<tr>
						<td style="padding-left:5px;">Class</td>
						<td>:</td>
						<td colspan="4"><?php echo $class;?></td>
					</tr>
					<tr>
						<td style="padding-left:5px;">Class Roll</td>
						<td>:</td>
						<td colspan="4"><?php echo $class_roll; ?></td>
					</tr>
					<tr>
						<td style="padding-left:5px;">Group</td>
						<td>:</td>
						<td>--</td>
						<td style="padding-left:5px;">Section</td>
						<td>:</td>
						<td><?php echo $section; ?></td>
					</tr>
					<tr>
						<td style="padding-left:5px;">Session</td>
						<td>:</td>
						<td><?php echo $session;?></td>
						<td style="padding-left:5px;">Shift</td>
						<td>:</td>
						<td>Morning</td>
					</tr>
					<tr>
						<td style="padding-left:5px;">Version</td>
						<td>:</td>
						<td>English</td>
						<td style="padding-left:5px;">Category</td>
						<td>:</td>
						<td>Civil</td>
					</tr>
				</table>
    </td>
	<td style="width:350px;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;">
			<table  cellpadding="0" cellspacing="0">
				<tr>
				   <td style="padding-left:5px;">Father</td>
				   <td>:</td>
				   <td colspan="3"><?php echo $father_name;?></td>
				</tr>
				<tr>
				   <td style="padding-left:5px;">Mother</td>
				   <td>:</td>
				   <td colspan="3"><?php echo $mother_name;?></td>
				</tr>	
				<tr>
				   <td style="padding-left:5px;">Address</td>
				   <td>:</td>
				   <td colspan="3"><?php echo $pre_address;?></td>				   
				</tr>	
				<tr>
				   <td style="padding-left:5px;">Contact No</td>
				   <td>:</td>
				   <td colspan="3"><?php echo $father_work_phone;?></td>
				</tr>		
				<tr>
				   <td style="padding-left:5px;">Blood Group</td>
				   <td>:</td>
				   <td colspan="3"></td>
				</tr>			
				<tr>
				   <td style="padding-left:5px;">Valid Upto</td>
				   <td>:</td>
				   <td colspan="3"></td>
				</tr>				
			</table>
 	</td>
    </tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
<br/><br/>	
<?php
    }
        $content = ob_get_clean();
		// convert to PDF
		
		include('html2pdf.class.php');				
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('test.pdf');
		}
		catch(HTML2PDF_exception $e)
		{
			echo $e;
			exit;
		}
?>
