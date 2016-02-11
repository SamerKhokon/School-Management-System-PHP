<?php     session_start();				
				include("Excel/excelwriter.inc.php");
				include("../db.php");	
			   
	$term_id     = trim($_POST["term_id"]);
	$class_id    = trim($_POST["class_id"]);	
	$class_sec = trim($_POST["section_id"]);
	$branchid    = trim($_POST["branchid"]);
	$filename    = date('Ymdhis').".xls"; 
	
	$excel         = new ExcelWriter("../../upload/".$filename);
	
	$ob_class  = array("<b>Class</b>","Class-".$class_id);
	$excel->writeLine($ob_class);
			
	$ob_section = array("<b>Section</b>",$class_sec);
	$excel->writeLine($ob_section);

	$ob_term = array("<b>Term</b>",$term_id);
	$excel->writeLine($ob_term);	
	
	$subject_str = "SELECT subject_code,subject_name FROM std_subject_config WHERE class_id=$class_id";
	$subject_sql = mysql_query($subject_str);	

	$ob_ct_sb            = array("<b>Serial</b>" , "<b>Student ID</b>" , "<b>Class Roll</b>" , "<b>Name</b>");
	$second_header = array("<b> </b>" , "<b> </b>" , "<b> </b>" , "<b> </b>" );				
		
	$str = "SELECT stu_name,stu_id,class_roll FROM std_class_info WHERE class_id=$class_id AND class_sec='$class_sec'";								
	$sql = mysql_query($str);

	
	$subject_counter =  0;
	while( $subject_res = mysql_fetch_array($subject_sql) ) 
	{
			$subject_id        = $subject_res[0];
			$subject_name = $subject_res[1];	   
			$subject_counter++;
			array_push($second_header , "<b>$subject_id # $subject_name </b>");
			array_push($ob_ct_sb  ,  "<b>SB</b>","<b>OB</b>","<b>CT</b>","<b>PT</b>");
	}		
	
	$excel->writeLine($second_header);	
	$excel->writeLine($ob_ct_sb);	
	
	$i=1;		
	while( $res = mysql_fetch_array($sql) )
	{	
	   $stu_id = $res[1];
	    $stu_name = $res[0];
		$class_roll = $res[2];
		$my_data = array($i , $stu_id , $class_roll, $stu_name  , "   " , "   "  ,"   " , "   " );	
				
		while($subject_counter>=0) 
		{
		  array_push($my_data , "     ");
		  $subject_counter --;
		}		
				
		$excel->writeLine($my_data);
		$i++;
	}		
	
	
	$excel->close();				
?>	
<p style="font-size:13px;font-style:bold;"><a href="<?php echo "../upload/".$filename;?>"  style="font-size:13px;font-style:bold;">Click Here</a> For Download</p>