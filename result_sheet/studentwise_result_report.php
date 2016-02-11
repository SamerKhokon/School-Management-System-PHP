<?php   ob_start(); 
		$con = mysql_connect("localhost","root",""); 
		mysql_select_db("school",$con);
		
		$year = trim($_GET["year"]);//"2013";
		$class_id = trim($_GET["class_id"]);//"1";
		$term = trim($_GET["term_id"]);//"1";
		$student_id = trim($_GET["student_id"]);
		
		if($term==1){$term_title = "First";}
		else if($term==2){$term_title = "Second";}
		else if($term==3){$term_title = "Final";}
		
		$tot_point = 0;
		$tot_mark =0;
		$f_counter=0;
  ?>		
	<p style="text-align:center;">
		<span style="font-size:28px;font-family:Arial;">Bir Shrestha Noor Mohammad Public College</span><br/>
		<span style="font-size:18px;font-family:Arial;">Peelkhana,Dhaka</span><br/>
		<span style="font-size:21px;text-decoration:underline;font-family:Arial;">Academic Transcript</span><br/>		
	</p>
	<br/>


<br/>

	<table cellpadding="0" cellspacing="0" align="center" >
        <tr>
	        <th rowspan="2"  align="center" style="width:20px;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Sl.</th>
		    <th rowspan="2"  align="center"  style="width:180px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Name</th>
		    <th rowspan="2"  align="center"   style="width:70px;border-left:0px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;">Subjects</th>
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

		$str = "SELECT class_id,stu_id,
			(SELECT subject_name FROM `std_subject_config` WHERE subject_code=a.sub_id) AS  subject_name
			,subjective_mark,objective_mark,ct_mark,total_mark,grade,`point`
			FROM `std_class_exam_mark_setting` AS a WHERE stu_id='$student_id' and class_id=$class_id AND `year`='$year'
			AND period=$term";
		$sql = mysql_query($str);
		$sl = 1;
		while($res = mysql_fetch_assoc($sql) ){
		$classid   =  $res['class_id'];
		$stu_id     = $res['stu_id'];
		$total_mark = $res['total_mark'];
		$percentage = ($total_mark*70)/100;
		$tot_mark += $total_mark;
		$tot_point += $res['point'];
		if($res['grade'] == "F"){
		  $f_counter++;
		}
		?>
		
	    <tr>
	       <td  align="center" style="border-left:1px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php  echo $sl; ?></td>
		   <td  align="left"   style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo get_name($stu_id,$classid)."(".$stu_id.")";  ?></td>
		   <td  align="center" style="border-left:0px solid #000;border-top:0px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;font-family:Arial;"><?php echo $res['subject_name'];?></td>
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
		?>  
	</table>	
	<br/>


	<br/>

	
	
  <?php
  
		function get_name($stuid , $class_id)
		{
		   $str = "SELECT stu_name FROM `std_class_student_info` 
				WHERE stu_id='$stuid' AND class_id='$class_id'";
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
			$html2pdf->Output('test.pdf');
		}
		catch(HTML2PDF_exception $e)
		{
			echo $e;
			exit;
		}
?>