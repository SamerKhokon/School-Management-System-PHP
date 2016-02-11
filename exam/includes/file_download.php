<?php 
				//$filename = "excel download.xls";
				
				
				echo "<a href='./mark_result.xls'>dl</a>";
				
				header("Pragma: no-cache");  
				header("Content-type: application/vnd.ms-excel;charset:UTF-8");  
				//header('Content-length: '.strlen($content));  
				header('Content-disposition: attachment; filename='.basename($file_name));  				
		
				/*
				$file_name = "mark_result.xls";				
				header("Pragma: public"); 
				$display = "attachment";
				header('Content-Type: application/vnd.ms-excel');
				header("Content-Disposition: $display; filename=./../../".$filename);
				header("Cache-Control: no-cache");
				*/

/*

						header("Expires: 0");  
						//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
						header("Cache-Control: no-store, no-cache, must-revalidate");  
						header("Cache-Control: post-check=0, pre-check=0", false);  
						header("Pragma: no-cache");  
						header("Content-type: application/vnd.ms-excel;charset:UTF-8");  
						header('Content-length: '.strlen($content));  
						header('Content-disposition: attachment; filename='.basename($file_name));  
						
						//readfile("./".basename($file_name));
						
						echo $content;  
						exit;			*/
             						
			
?>