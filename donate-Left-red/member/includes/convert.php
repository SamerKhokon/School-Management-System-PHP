
<?php

     function int_to_month($value)
               {
			    if($value==1)
				   {
				    $ret="jan";
				   }
				   
				 elseif($value==2)
				   {
				    $ret= "feb";
				   }  
				   elseif($value==3)
				   {
				   $ret= "mar";
				   } 
				   elseif($value==4)
				   {
				   $ret= "apr";
				   } 
				   elseif($value==5)
				   {
				    $ret= "may";
				   } 
				    elseif($value==6)
				   {
				    $ret= "jun";
				   } 
				    elseif($value==7)
				   {
				    $ret= "jul";
				   }
				    elseif($value==8)
				   {
				    $ret ="aug";
				   } 
				    elseif($value==9)
				   {
				   $ret= "sep";
				   }   
				   elseif($value==10)
				   {
				   $ret= "oct";
				   } 
				    elseif($value==11)
				   {
				    $ret= "nov";
				   } 
				    elseif($value==12)
				   {
				   $ret= "dec";
				   } 
				   else
				   {
				    $ret="invali month";
				   }
				   
				   return $ret;
				   
			   }




?>