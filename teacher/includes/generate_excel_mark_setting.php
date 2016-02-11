<?php     session_start();				
				include("includes/excelwriter.inc.php");
				include("db.php");				  
				$file_name = "includes/mark_result.xls";		
                ob_start();  
				$branchid   = $_SESSION['LOGIN_BRANCH'];
						
				$excel         = new ExcelWriter($file_name);		
				
			    // $excel->sms();
			    // unlink($file_name);
				
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
				
				$content = ob_get_contents();  
				ob_end_clean();  
				header("Expires: 0");  
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
				header("Cache-Control: no-store, no-cache, must-revalidate");  
				header("Cache-Control: post-check=0, pre-check=0", false);  
				header("Pragma: no-cache");  
				header("Content-type: application/vnd.ms-excel;charset:UTF-8");  
				header('Content-length: '.strlen($content));  
				header('Content-disposition: attachment; filename='.basename($file_name));  
				// output all contents  
				//readfile($content);
				echo $content;  
				exit;				
				
				/*
				header("Expires: 0");  
				//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  	
				header("Cache-Control: no-store, no-cache, must-revalidate");  
				header("Cache-Control: post-check=0, pre-check=0", false);  
				header("Pragma: no-cache");  	
				//header("Content-type: application/pdf");  	
				header("Content-type: application/vnd.ms-excel;charset:UTF-8");
				header('Content-length: '.filesize($file_name));  
				header('Content-disposition: attachment; filename='.basename($file_name));  
				readfile($file_name);	*/
?>