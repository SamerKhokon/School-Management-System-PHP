
<div id="content" class="box">
<?php
include("show_array.php");


        $routine_result = mysql_query("select * from std_class_routine group by class_id"); 		
		$i=1;

		$array['Piriod'][0]="<b>Time</b>";
		
		$k=1;
		while ($routine_row=mysql_fetch_array($routine_result))
		{	
		
		$j=1;
	    $array['Piriod'][$i]=$routine_row[12];
		  
		     $insql=mysql_query("select class_time,day_sat from std_class_routine where  class_id=$routine_row[8]"); 		
			 while ($insql_row=mysql_fetch_array($insql))
		      {	
			  $array[$j][0]=$insql_row[0];	 
			  $array[$j][$k]=$insql_row[1];	 
			  
			  
			  $k++;
			  $j++;
			  }
			  
		
			 
		  
		
		
		$i++;
		
		}






     // $array['period'] = array('1','2','3','4',' X ','5','6','7','8',);  
    /*
	$array['Time'] =array('7-8','8-9','9-10','10-11','11-12','12-13','13-14','14-15','15-16');
    $array['SAT'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
    $array['SUN'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['MON'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['TUE'] = array('s_name,t_name','5_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['WED'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['RHU'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
     */
    
html_show_array($array);
		





?>
<?php // include_once("analyticstracking.php") ?>
</div>