<?php     include("../db.php");
         		$excel_file   =  $_FILES["excel_file"]["name"];				
				$file_name  = "./../upload/".$excel_file;
				
				if(file_exists($file_name) ) 
				{
				    unlink($file_name);
					move_uploaded_file($_FILES["excel_file"]["tmp_name"],$file_name );										
					echo "<p style='text-align:center;'>sucessfully uploaded excel file!</p>";
				}
				else
				{
				    move_uploaded_file($_FILES["excel_file"]["tmp_name"],$file_name );										
					echo "<p style='text-align:center;'>sucessfully uploaded excel file!</p>";
				}
?>
<br/>
 <!-- <img src="./../upload/Penguins.jpg"/>  -->
 
<a href="?meu_id=11&nev=exam_mark_setting">  <input type="button" value="Back"/> </a>