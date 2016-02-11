<?php
function do_offset($level){
    $offset = "";  
    for ($i=1; $i<$level;$i++){
    $offset = $offset."";
    }
    return $offset;
}
function show_array($array, $level, $sub,$array_name){
    if (is_array($array) == 1){ 
	if ($sub=0)
	  echo "<tr>";	      	  
       foreach($array as $key_val => $value) 	   {   
	    
           $offset = "";
		   
           if (is_array($value) == 1)
			   {   
		     
			   $offset = do_offset($level);
			   
			   //echo $offset."<td>".$key_val."<td>";
			   
			   echo "<td>$i".$key_val."<td>";
			   
		      $ar_name=$key_val;
			   
			   show_array($value, $level+1, 1,$ar_name);
			   
			   }
           else
		       {              
			   
				   if ($sub != 1)
				   {          			
					   $offset = do_offset($level);
				   }
			           $sub = 0;				
					   
					   
					   /*					   
					   if ($value!='5_name,t_name' and ($array_name=='SAT' or $array_name=='SUN' or $array_name=='MON' or $array_name=='TUE' or $array_name=='WED' or $array_name=='THU'))
					   $value='----';
					   */
					   
					   
					      echo $offset."<td>".$value."</td>"; 
					   
					   
					   /*
					   if($array_name=='Class' or $array_name=='Time')   
				       
					   echo $offset."<td>".$value."</td>"; 
					   else
					   echo $offset."<td><a href=\"#\">".$value."</a></td>"; 
				 	   */
	  
                }
				
  
       } 
	  
	   echo "</tr>";
	  
    }  
    else{ 
        return;
    }
	
}

function html_show_array($array)
{

  echo "<table cellspacing=\"0\" border=\"2\">\n";
  
  show_array($array, 1, 0,'0');
  
  echo "</table>\n";
  
  
  
  
}

?> 
