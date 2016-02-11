<?php  ob_start(); 
	$con = mysql_connect("localhost","root",""); 
		mysql_select_db("school",$con);
	$sql_std = "select 	t1.`stu_id` as stu_id,
	t1.`class_name` as class,t1.`class_sec` as section,
	t1.`year` as year,t1.`class_roll` as class_roll, t2.`name` as stu_name, 
	t2.`father_name` as father_name, t2.`mother_name` as mother_name, 
	t2.`pre_address` as address, t2.`emer_mobile1` as contact_no, 
	t3.`branch_name` as branch_name from `std_class_info` t1, `std_profile` t2, `std_branch` t3 
	where 	t1.`stu_id`=t2.`stu_id`	and t2.`branch_id`=t3.`id`";
$res_std = mysql_query($sql_std);
?>
<table align="center" cellpadding="0" cellspacing="0">
<?php
while($row_std = mysql_fetch_array($res_std))
{
	$stu_id = $row_std['stu_id'];
	$stu_name = $row_std['stu_name'];
	$class = $row_std['class'];
	$class_roll = $row_std['class_roll'];
	$section = $row_std['section'];
	$session = $row_std['year'];
	$father = $row_std['father_name'];
	$mother = $row_std['mother_name'];
	$address = nl2br($row_std['address']);
	$contact_no = $row_std['contact_no'];
	?>
		<tr>
			<td align="center" >
				<table align="center" cellpadding="0" cellspacing="0" >
					<td align="center" valign="middle">
						<table border="0" cellpadding="0" cellspacing="0" >
							<tr>
								<td colspan="6" style="text-align:left; font-size:11px; font-weight:bold;">Bir Shreshtha Noor Mohammad Public College<br />
									Peelkhana,Dhaka
								</td>
							</tr>
							<tr>
								<td colspan="3" style="text-align:right; padding-right:2px;"><strong><em>Identity Card</em></strong></td>
								<td colspan="3" rowspan="5" valign="top" align="right"><img src="profile_image.jpg" style="width:2cm; height:2.5cm; border:#333333 1px dashed; margin-top:-0.2cm;" /></td>
							</tr>
							<tr>
								<td>Student ID</td>
								<td>:</td>
								<td><strong><?php echo $stu_id;?></strong></td>
							</tr>
							<tr>
								<td colspan="3"><strong><?php echo $stu_name;?></strong></td>
							</tr>
							<tr>
								<td>Class</td>
								<td>:</td>
								<td><strong><?php echo $class;?></strong></td>
							</tr>
							<tr>
								<td>Class Roll</td>
								<td>:</td>
								<td><strong><?php echo $class_roll;?></strong></td>
							</tr>
							<tr>
								<td>Group</td>
								<td>:</td>
								<td><strong>--</strong></td>
								<td>Section</td>
								<td>:</td>
								<td><?php echo $section;?></td>
							</tr>
							<tr>
								<td>Session</td>
								<td>:</td>
								<td><strong><?php echo $session;?></strong></td>
								<td>Shift</td>
								<td>:</td>
								<td><strong>Morning</strong></td>
							</tr>
							<tr>
								<td>Version</td>
								<td>:</td>
								<td><strong>English</strong></td>
								<td>Category</td>
								<td>:</td>
								<td>Civil</td>
							</tr>
						</table> 
					</td>
				</table>
			</td>
			
					
			<td align="center"  >
				<table align="center" cellpadding="0" cellspacing="0" >
					<td align="center" valign="middle">
						<table border="0" cellpadding="0" cellspacing="0" >
							<tr>
								<td valign="top" style="width:1.7cm; text-align:left;">Father</td>
								<td style="width:0.2cm;" valign="top">:</td>
								<td valign="top" colspan="2"><?php echo $father;?></td>
							</tr>
							<tr>
								<td valign="top" style="width:1.7cm; text-align:left;">Mother</td>
								<td style="width:0.2cm;" valign="top">:</td>
								<td valign="top" colspan="2"><?php echo $mother;?></td>
							</tr>
							<tr>
								<td valign="top" style="width:1.7cm; text-align:left;">Address</td>
								<td style="width:0.2cm;" valign="top">:</td>
								<td colspan="2" valign="top"><?php echo $address;?></td>
							</tr>
							<tr>
								<td valign="top" style="width:1.7cm; text-align:left;">Contact No</td>
								<td style="width:0.2cm;" valign="top">:</td>
								<td valign="top" colspan="2"><strong><?php echo $contact_no;?></strong></td>
							</tr>
							<tr>
								<td valign="top" style="width:1.7cm; text-align:left;">Blood Group</td>
								<td style="width:0.2cm;" valign="top">:</td>
								<td valign="top" colspan="2"><strong>A+</strong></td>
							</tr>
							<tr>
								<td style="width:1.7cm; text-align:left;">Valid upto</td>
								<td style="width:0.2cm;" valign="top">:</td>
								<td style="width:3cm;"><strong>31-Jan-2014</strong></td>
								<td style="border-bottom:#000000 1px solid;"></td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td align="center" ><strong>Principal</strong></td>
							</tr>
						</table> 
					</td>
				</table>
			</td>
		</tr>
	<?php
}
?>    
</table>
<?php
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