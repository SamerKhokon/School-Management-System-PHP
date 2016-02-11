<?php
	include("excelwriter.inc.php");
	$file_name = "mark_result.xls";
	$excel         = new ExcelWriter($file_name);		
	unlink($file_name);
	
	$my_new_line = array("","");	
	$excel->writeLine($my_new_line);
	
	$class = array("<b>Class</b>","");
	$excel->writeLine($class);			
	
	$section = array("<b>Section</b>","");
	$excel->writeLine($section);				

    $sb_code = array("<b>Subject Code</b>","<b>101</b>","<b>102</b>","<b>103</b>","<b>104</b>");
	$excel->writeLine($sb_code);
	
	$ob_ct_sb = array("<b>Roll</b>","<b>Name</b>","<b>ST</b>","<b>OB</b>","<b>CT</b>" , "<b>ST</b>","<b>OB</b>","<b>CT</b>" , "<b>ST</b>","<b>OB</b>","<b>CT</b>" ,"<b>ST</b>","<b>OB</b>","<b>CT</b>");
	$excel->writeLine($ob_ct_sb);
		
	$my_data = array("20","Abul"," ","  "," "," "," "," ","  "," "," "," "," "," ");	
	$excel->writeLine($my_data);

	$y_data = array("21","Muhit"," "," "," "," "," "," "," "," "," "," "," ","");	
	$excel->writeLine($y_data);		
		
	$z_date = array("22","Hasan"," "," "," "," "," "," "," "," "," "," "," "," ");
	$excel->writeLine($z_date);
	
	//$user_name      = "Abul";
	//$reseller_name = "Active";
	//$my_data           = array("","",$user_name, $reseller_name);
	//$excel->writeLine($my_data);		

	$excel->close();			
	
	header("Expires: 0");  
	//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  	
	header("Cache-Control: no-store, no-cache, must-revalidate");  
	header("Cache-Control: post-check=0, pre-check=0", false);  
	header("Pragma: no-cache");  	
	//header("Content-type: application/pdf");  	
	header("Content-type: application/vnd.ms-excel;charset:UTF-8");
	header('Content-length: '.filesize($file_name));  
	header('Content-disposition: attachment; filename='.basename($file_name));  
	readfile($file_name);	
?>