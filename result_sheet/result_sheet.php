<?php   ob_start(); 
		$con = mysql_connect("localhost","root",""); 
		mysql_select_db("school",$con);
		
		 $school_str = "SELECT name,address FROM `tbl_school_info` WHERE id=1";
		   $school_sql = mysql_query($school_str);
		   $school_res = mysql_fetch_row($school_sql);
		   $school_name  = $school_res[0];
		   $school_address =  $school_res[1];
		
		
		
		$stuid = trim($_GET["stu_id"]);//"2013111";
		$year = trim($_GET["year"]);//"2013";
		$class_id = trim($_GET["class_id"]);//"1";
		$term = trim($_GET["term_id"]);//"1";
		
		if($term==1){$term_title = "First";}
		else if($term==2){$term_title = "Second";}
		else if($term==3){$term_title = "Final";}
		
		$tot_point = 0;
		$tot_mark =0;
		$f_counter=0;
		
		$where = " WHERE stu_id='$stuid' AND class_id=$class_id";
		if($stuid=="") {
			$your_string = "SELECT stu_id,class_id FROM std_class_info";
		}else{
		    $your_string = "SELECT stu_id,class_id FROM std_class_info $where";
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
						<span style="text-align:center;font-size:Arial;font-style:italic;font-size:18px;"><?php echo $term_title;?> Term Result</span>		
		
	</p>
	<br/>

	<table align="center"  cellpadding="0" cellspacing="0">
	<tr>
		<td style="width:250px;">		
			<table  align="left" cellpadding="0" cellspacing="0" >
				<tr >
					<td  style="background-color:#fff;font-style:italic;">Student ID</td>
					<td style="font-family:Arial;font-style:italic;"><?php echo $std_id;?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr  >
					<td style="background-color:#fff;font-style:italic;">Name</td>
					<td style="font-family:Arial;font-style:italic;"><?php echo get_name($std_id);?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr  >
					<td  style="background-color:#fff;font-style:italic;">Roll</td>
					<td style="font-style:italic;"><?php echo get_class_roll($std_id);?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
                <tr  >
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td  style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">Program</td>
					<td  style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;"><?php echo $class_id;?></td>
					<td  style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">Section</td>
					<td  style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;"><?php echo get_section($std_id);?></td>
				</tr>
				<tr  >
					<td   style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">Group</td>
					<td  style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">--</td>
					<td   style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">Shift</td>
					<td  style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">Morning</td>
				</tr>   
				<tr  >
					<td   style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">Version</td>
					<td   style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">English</td>
					<td   style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;">Session</td>
					<td   style="background-color:#fff;font-family:Arial;border:1px solid #000;width:50px;"><?php echo $year;?></td>
				</tr>      
			</table>
		</td>
        <td style="width:240px;">&nbsp;</td>
		<td style="width:140px;">
			<table style="border:1px solid #000;" cellpadding="0" cellspacing="0" width="40%">
					<tr>
						<td align="center" style="background-color:#c1c1c1;font-family:Arial;">Letter<br/>Grade</td>
						<td align="center" style="background-color:#c1c1c1;font-family:Arial;">Class<br/>Interval</td>
						<td align="center" style="background-color:#c1c1c1;font-family:Arial;">Grade<br/>Point</td>	
					</tr>			   
					<tr>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">A+</td>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">80-100</td>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">5.00</td>	
					</tr>
					<tr>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">A</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">70-79</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">4.00</td>	
					</tr>   
					<tr>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">A-</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">60-69</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">3.50</td>	
					</tr>      
					<tr>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">B</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">50-59</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">3.00</td>	
					</tr>  
					<tr>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">C</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">40-49</td>
						<td align="center"  style="background-color:#D0DCE0;font-family:Arial;">2.00</td>	
					</tr>  
					<tr>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">D</td>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">33-39</td>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">1.00</td>	
					</tr>  
					<tr>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">F</td>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">0-32</td>
						<td align="center" style="background-color:#D0DCE0;font-family:Arial;">0.00</td>	
					</tr>     
			</table>
		</td>
	</tr>
	</table>

<br/>

	<table cellpadding="0" cellspacing="0" align="center" >
        <tr>
	        <th rowspan="2"  align="center" style="width:20px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Sl.</th>
		    <th rowspan="2"  align="center"  style="width:180px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Subjects</th>
		    <th rowspan="2"  align="center"   style="width:70px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Course<br/>Work<br/>30%</th>
		    <th colspan="5"  align="center"   style="width:250px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"> Examination</th>
			<th rowspan="2"  align="center"   style="width:60px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Total<br/> Mark<br/> 100%</th>
			<th  rowspan="2"  align="center"   style="width:60px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Letter<br/> Grade</th>
			<th rowspan="2"  align="center"   style="width:60px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Grade <br/>Point</th>
	    </tr>	   
	    <tr>
				<th  align="center"   style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">OB</th>
				<th align="center"   style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">SB</th>
				<th align="center"   style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">PR</th>
				<th  align="center"   style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Total</th>
				<th  align="center"   style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">70%</th>
		</tr>

		


		<?php  

		  $str = " SELECT stu_id,
			(SELECT subject_name FROM `std_subject_config` WHERE subject_code=a.sub_id) AS  subject_name
			,subjective_mark,objective_mark,ct_mark,total_mark,grade,`point`
			FROM `std_class_exam_mark_setting` AS a WHERE 
			stu_id='$std_id' AND class_id=$classid AND `year`='$year'
			AND period=$term";
		$sql = mysql_query($str);
		$sl = 1;
		while($res = mysql_fetch_assoc($sql) ){
		$total_mark = $res['total_mark'];
		$percentage = ($total_mark*70)/100;
		$tot_mark += $total_mark;
		$tot_point += $res['point'];
		if($res['grade'] == "F"){
		  $f_counter++;
		}
		?>
		
	    <tr>
	       <td  align="center"  style="border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php  echo $sl; ?></td>
		   <td  align="left"       style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php  echo $res['subject_name']; ?></td>
		   <td  align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">18</td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $res['subjective_mark']; ?></td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $res['objective_mark']; ?></td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $res['ct_mark']; ?></td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $total_mark; ?></td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $percentage; ?></td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $res['total_mark']; ?></td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $res['grade']; ?></td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $res['point']; ?></td>		   
	    </tr>
	    <?php $sl++;
		}
		$pnt =$tot_point/$sl;
		
		//echo $pnt; 
		//$f_counter;
		?>  
		  
		  
		  
		
		
	    <tr>
	       <td colspan="8"  align="center" style="border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Total Marks and Grade Point Average(GPA)</td>
		   <td  align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $tot_mark; ?></td>
		   <td style="border-bottom:1px solid #000;">&nbsp;</td>
		   <td align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;text-align:right;">
		   <?php echo substr($pnt,0,5);?></td>		   
	    </tr>	  
	</table>	
	<br/>

	<table align="center" cellpadding="0" cellspacing="0" border="0" width="100%" style="border:1px solid #000;">
		<tr>
			<td align="center" style="width:100px;font-family:Arial;">Final Grade:</td>
			<td style="width:30px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;font-size:14px;border-right:1px solid #000;" ><?php echo substr($pnt,0,5);?></td>
			<td align="center" style="width:100px;font-family:Arial;">Letter Grade:</td>
			<td  style="width:30px;border-right:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;font-size:14px;"><?php 
			if($f_counter >=1 )
			{ 
			echo "F";
			}
			else{
			    //echo "block";
				echo get_grade($pnt);
			}?>
				</td>
			<td align="center" style="width:100px;font-family:Arial;">Working Days: </td>
			<td  style="width:30px;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-left:1px solid #000;font-size:14px;">0</td>
			<td align="center" style="width:100px;font-family:Arial;">Present Days: </td>
			<td style="width:30px;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;font-size:14px;">10</td>
			<td align="center" style="width:100px;font-family:Arial;">Position:</td>
			<td  style="width:30px;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;font-size:14px;">22</td>
		</tr>
	</table>

	<br/>
<br/><br/><br/><br/><br/><br/><br/><br/>
	<table align="center" border="0" >
		<tr >
		<td colspan="11" style="border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;width:180px;border-right:1px solid #000;height:50px;" >Remarks:&nbsp;</td>
		</tr>
		<tr><td colspan="11">&nbsp;</td></tr>
		<tr>
		    <td>&nbsp;</td><td>-------------------</td>
			<td >&nbsp;</td><td>------------------------------</td>
			<td >&nbsp;</td><td>-------------------</td>		 
		</tr>
		<tr>
		    <td>&nbsp;</td><td style="width:200px;">Class Teacher</td>
			<td >&nbsp;</td><td style="width:280px;">Principal</td>
			<td >&nbsp;</td><td style="width:200px;">Guardian</td>		 
		</tr>		
	</table>
	
			<?php if($sl==0){?>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>			
			<?php }else if($sl==1){?>						
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>			
			<?php }else if($sl==2){?>
			<br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<?php }else if($sl==3){?>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<?php }else if($sl==4){?>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<?php } ?>				
	
  <?php
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
		  
		$content = ob_get_clean();
		// convert to PDF

		include('html2pdf.class.php');				
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output($school_name.'_term_result_sheet.pdf');
		}
		catch(HTML2PDF_exception $e)
		{
			echo $e;
			exit;
		}
?>