<?php
			$given_string = "php string replace";
			$result_string = str_replace("replace"," replace example",$given_string);
			//echo $result_string;
								
			$ar = array("<b>101 c1</b>","<b>102 c1</b>");
			
			foreach($ar as $r)   {
			       if(strpos($r,"c1") != false)
				   $str = str_replace("c1"," ",$r);
				   echo $str.'<br/>';
			}		
			
?>