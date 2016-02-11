<?php   error_reporting(0);
		ob_start();  
		$con = mysql_connect("localhost","root",""); 
		mysql_select_db("school",$con);
		
		
	$school_str = "SELECT name,address FROM `tbl_school_info` WHERE id=1";
		   $school_sql = mysql_query($school_str);
		   $school_res = mysql_fetch_row($school_sql);
		   $school_name  = $school_res[0];
		   $school_address =  $school_res[1];		
		
		$stuid = trim($_GET["stu_id"]);//"2013111";
		$year = trim($_GET["year"]);
		$class_id = trim($_GET["class_id"]);//"1";
		
		
		$tot_point = 0;
		$tot_mark =0;
		$f_counter=0;
		
		
		$where = " WHERE stu_id='$stuid' AND class_id=$class_id";
		if($stuid=="") {
			$your_string = "SELECT stu_id,class_id FROM std_class_info";
		}else{
		    $your_string = "SELECT stu_id FROM std_class_info $where";
		}
		
		$your_query = mysql_query($your_string);
	while($rw = mysql_fetch_assoc($your_query)) 
	{		
			$std_id = $rw['stu_id'];
			$classid = $rw['class_id'];
 ?>	
			<p style="text-align:center;">
				<span style="font-size:28px;font-family:Arial;"><?php echo $school_name;?></span><br/>
				<span style="font-size:18px;font-family:Arial;"><?php echo $school_address;?></span><br/>
				<span style="font-size:21px;text-decoration:underline;font-family:Arial;">Academic Transcript</span><br/>
				<span style="text-align:center;font-size:Arial;font-style:italic;font-size:18px;">Aggregate Result</span>				
			</p>
			<br/>	

			<table cellspacing="0" cellpadding="0" align="center">
			<tr>
			<td style="border:1px solid #000;width:150px;">
					<table>
					   <tr >
						 <td style="font-style:italic;">ID:</td>
						 <td  style="font-style:italic;"><?php echo $std_id;?></td>
						</tr>
						<tr>	
						 <td  style="font-style:italic;">Name:</td>
						 <td  style="font-style:italic;"><?php echo get_name($std_id);?></td>
						</tr>
						<tr>
						 <td  style="font-style:italic;">Roll</td>
						 <td  style="font-style:italic;"><?php echo get_class_roll($std_id);?></td>	 
					   </tr>
					</table>
			</td>
			<td style="width:10px;">&nbsp;</td>

			<td>
				<table cellpadding="0" cellspacing="0">
				   <tr>
					 <td  style="border-left:1px solid #000;border-top:1px solid #000;border-right:0px solid #000;border-bottom:1px solid #000;width:100px;">Program: </td>
					 <td  style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;"><?php echo $class_id;?></td>
					 <td  style="border-left:1px solid #000;border-top:1px solid #000;border-right:0px solid #000;border-bottom:1px solid #000;width:100px;">Section</td>
					 <td  style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;"><?php echo get_section($stuid);?></td>	 
				   </tr>
				   <tr>
					 <td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:0px solid #000;border-bottom:1px solid #000;">Version</td>
					 <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;">English</td>
					 <td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:0px solid #000;border-bottom:1px solid #000;">Shift</td>
					 <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;">Morning</td>	 
				   </tr>   
				   <tr>
					 <td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:0px solid #000;border-bottom:1px solid #000;">Group</td>
					 <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;">--</td>
					 <td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:0px solid #000;border-bottom:1px solid #000;">Session</td>
					 <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo $year; ?></td>	 
				   </tr>      
				</table>
			</td>

			<td style="width:10px;">&nbsp;</td>

			<td>
					<table cellpadding="0" cellspacing="0">
					   <tr>
						 <td  style="border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;" colspan="2">Promotion Status</td>
						</tr>
						<tr>
							<td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;">Promoted Class</td>
							<td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;">&nbsp;Class3</td>
						</tr>
						<tr>	
							<td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;">Section</td>
							<td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;">&nbsp;B</td>
						</tr>
						<tr>	
							<td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;">Roll</td>
							<td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;width:100px;">&nbsp;23</td>
						</tr>	
					</table>	
			</td>
			</tr>
			</table>
			<br/>
			<table align="center" cellpadding="0" cellspacing="0" border="0">
				<tr>
				  <td rowspan="2" style="border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;width:250px;">Subjects</td>	
				  <td colspan="4" style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;width:200px;">Course Work</td>
				  <td colspan="4" style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;width:200px;">Subjective</td>
				  <td colspan="4" style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;width:200px;">Objective</td>	
				  <td rowspan="2" style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;width:50px;">Total <br/>Marks</td>		  	  
				  <td rowspan="2" style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;width:50px;">Total <br/>Grade</td>		  
				  <td rowspan="2" style="border-left:0px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;width:50px;">GPA</td>		  	  
				</tr>     
				<tr>
				  <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">1st<br/>25%</td>
				  <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">2nd<br/>25%</td>	  
				  <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">3rd<br/>50%</td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">Total</td>	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">1st<br/>25%</td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">2nd<br/>25%</td>	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">3rd<br/>50%</td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">Total</td>	  	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">1st<br/>25%</td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">2nd<br/>25%</td>	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">3rd<br/>50%</td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;">Total</td>	  	  	  	  
				</tr>     	
							
				<?php  $sl = 0;
					$sum_gpa = 0;
					$sub_str = "SELECT sub_id,(SELECT subject_name FROM std_subject_config WHERE subject_code=a.sub_id) AS sub_name
								FROM `std_class_exam_mark_setting`  AS a WHERE YEAR='$year' AND stu_id='$std_id'
								GROUP BY sub_id";
					$sub_sql   = mysql_query($sub_str);
					while($res = mysql_fetch_array($sub_sql) ) 
					{
						$subjectCode  =  $res[0]; 		       
						$subjectName =  $res[1];	
						
						$three_sb = get_three_sb_result($subjectCode,$year);			
						$parse_sb = explode(",",$three_sb);
						$first_sb      =$parse_sb[0]; 
						$second_sb =$parse_sb[1];
						$third_sb     =$parse_sb[2];			
						
						$first_sb_25       = (($first_sb*25)/100);
						$second_sb_25 = (($second_sb*25)/100);
						$third_sb_25     = (($third_sb*25)/100);			
						$total_sb_25 = $first_sb_25 +$second_sb_25+$third_sb_25;			
						
						$three_ob = get_three_ob_result($subjectCode,$year);						
						$parse_ob   = explode(",",$three_ob);
						$first_ob      =$parse_ob[0]; 
						$second_ob =$parse_ob[1];
						$third_ob     =$parse_ob[2];
						
						$first_ob_25      = (($first_ob*25)/100);
						$second_ob_25 = (($second_ob*25)/100);
						$third_ob_25     = (($third_ob*25)/100);		
						$total_ob_25 = $first_ob_25 +$second_ob_25+$third_ob_25;			
						
						$three_ct  = get_three_ct_result($subjectCode,$year);									
						$parse_ct   = explode(",",$three_ct);
						$first_ct      =$parse_ct[0]; 
						$second_ct =$parse_ct[1];
						$third_ct     =$parse_ct[2];												

						$first_ct_25      = (($first_ct*25)/100);
						$second_ct_25 = (($second_ct*25)/100);
						$third_ct_25     = (($third_ct*25)/100);						
						$total_ct_25     = $first_ct_25 +$second_ct_25+$third_ct_25;
						
						$tottalMark  = $total_ct_25+$total_sb_25+$total_ob_25; 
						$totalGrade =  get_grade_from_mark($tottalMark);
						$gpa 		  =  get_gpa($totalGrade);
						$sum_gpa += $gpa;
				?>	
				<tr>
				  <td  style="border-left:1px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $subjectName;?></td>
				  <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $first_ct_25; ?></td>	  
				  <td  style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $second_ct_25; ?></td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $third_ct_25; ?></td>	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $total_ct_25; ?></td>
				  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $first_sb_25; ?></td>	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $second_sb_25; ?></td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $third_sb_25; ?></td>	  	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $total_sb_25; ?></td>
				  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $first_ob_25; ?></td>	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $second_ob_25; ?></td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $third_ob_25; ?></td>	  	  	  	  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $total_ob_25; ?></td>	
				  
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $tottalMark; ?></td>
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $totalGrade; ?></td>	  	  	  	
				  <td   style="border-left:0px solid #000;border-top:0px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;"><?php echo $gpa; ?></td>	  	  	  	
				</tr>

				<?php   $sl++;
					}
					if($sum_gpa=="" || $sum_gpa==0) {
						$pnt = 0;
					}else{
						$pnt = $sum_gpa/$sl;	
					}
					?> 
			</table>

			<br/>
<br/><br/>
			<table align="center" cellpadding="0" cellspacing="0" style="border:0px solid #000;height:50px;">
				<tr style="border-left:0px solid #000;height:30px;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">
				  <td style="width:90px;">Final Grade:</td>
				  <td style="width:40px;height:10px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?php echo $pnt; ?></td>
					<td >Letter Grade:</td>
					<td style="width:40px;height:10px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><?php echo get_grade($pnt);?></td>
					<td >Position: </td>
					<td style="width:40px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">10</td>
					<td>Total marks and grade Average:  </td>
					<td style="width:40px;border-left:1px solid #000;height:10px;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">105</td>		
				</tr>
			</table>	


			<br/>
			<table align="center" cellpadding="0" cellspacing="0">
				<tr>
				  <td >--------------------------<br/>Class Teacher</td>
				  <td style="width:250px;">&nbsp;</td>
				  <td>--------------------------<br/> Principal</td>
				  <td style="width:250px;">&nbsp;</td>
				  <td>-------------------------- <br/>Guardian</td>
				</tr>
			</table>
			
			<?php if($sl==0){?>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>			
			<?php }else if($sl==1){?>						
			<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>			
			<?php }else if($sl==2){?>
			<br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<?php }else if($sl==3){?>
			<br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<?php } ?>			
<?php
	}
			function get_grade_from_mark($totalMark) {
				if($totalMark>=80)
				return "A+";
				else if($totalMark>= 70 && $totalMark<80)
				return "A";
				else if($totalMark>= 60 && $totalMark<70)
				return "A-";			
				else if($totalMark>= 50 && $totalMark<60)
				return "B";						
				else if($totalMark>= 40 && $totalMark<50)
				return "C";						
				else if($totalMark>= 33 && $totalMark<40)
				return "D";						
				else if($totalMark>= 0 && $totalMark <= 32)
				return "F";									
			}

			function get_three_sb_result($subjectCode , $year) {
				$three_str = "SELECT subjective_mark FROM `std_class_exam_mark_setting`
					WHERE sub_id='$subjectCode' and year='$year'";
				$three_sql = mysql_query($three_str);
				$blank = "";
				while($rs = mysql_fetch_array($three_sql ) ) {
				  $blank .= $rs[0].",";
				}
				return substr($blank,0,strlen($blank)-1);
			}
			function get_three_ob_result($subjectCode , $year) {
				$three_str = "SELECT objective_mark FROM `std_class_exam_mark_setting`
					WHERE sub_id='$subjectCode' and year='$year'";
				$three_sql = mysql_query($three_str);
				$blank = "";
				while($rs = mysql_fetch_array($three_sql ) ) {
				  $blank .= $rs[0].",";
				}
				return substr($blank,0,strlen($blank)-1);
			}		
			function get_three_ct_result($subjectCode , $year) {
				$three_str = "SELECT ct_mark FROM `std_class_exam_mark_setting`
					WHERE sub_id='$subjectCode' and year='$year'";
				$three_sql = mysql_query($three_str);
				$blank = "";
				while($rs = mysql_fetch_array($three_sql ) ) {
				  $blank .= $rs[0].",";
				}
				return substr($blank,0,strlen($blank)-1);
			}				
			function get_name($stuid){
			   $str = "select name from std_profile where stu_id='$stuid'";
			   $sql = mysql_query($str);
			   $rs = mysql_fetch_row($sql);
			   return $rs[0];
			}
			function get_class_roll($stuid){
			   $str = "select ovr_roll from std_profile where stu_id='$stuid'";
			   $sql = mysql_query($str);
			   $rs = mysql_fetch_row($sql);
			   return $rs[0];
			}
			function get_section($stuid){
			   $str = "select section from std_profile where stu_id='$stuid'";
			   $sql = mysql_query($str);
			   $rs = mysql_fetch_row($sql);
			   return $rs[0];
			}  
			function get_grade($pnt){
				if($pnt>=5)
				return "A+";
				else if($pnt>=4 && $pnt<5)
				return "A";
				else if($pnt>=3.5 && $pnt<4)
				return "A-";
				else if($pnt>=3 && $pnt<3.5)
				return "B";	
				else if($pnt>=2 && $pnt<3)
				return "C";
				else if($pnt>=1 && $pnt<2)
				return "D";
				else if($pnt>=0 && $pnt<1)
				return "F";					
			}
			function get_gpa($pnt)
			{  
				if($pnt=="A+")
				return "5.0";
				else if($pnt=="A")
				return "4.0";
				else if($pnt =="A-")
				return "3.5";
				else if($pnt =="B")
				return "3.0";	
				else if($pnt =="C")
				return "2.0";
				else if($pnt =="D")
				return "1.0";
				else if($pnt =="F")
				return "0.0";		
			}

			$content = ob_get_clean();
			// convert to PDF
			include('html2pdf.class.php');				
			try
			{
				$html2pdf = new HTML2PDF('L', 'A4', 'fr');
				$html2pdf->pdf->SetDisplayMode('fullpage');
				$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output($school_name.'_aggregate_result_sheet.pdf');
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
?>