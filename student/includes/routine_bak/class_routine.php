
<div id="content" class="box">
<?php
include("show_routine.php");



$class_qryy=mysql_query("select class_id,class_name,sec_id from std_class_routine group by class_id,sec_id");

while ($class_result=mysql_fetch_array($class_qryy))
{

$rtn_class_id=$class_result[0];
$rtn_class_name=$class_result[1];
$rtn_sec_id=$class_result[2];
						$routine_result = mysql_query("select * from std_class_routine where class_id=$rtn_class_id and sec_id=$rtn_sec_id"); 		
						//$routine_result = mysql_query("select * from std_class_routine where class_id=1 and sec_id=1"); 		
						$i=0;

						while ($routine_row=mysql_fetch_array($routine_result))
						{	
						$array['period'][$i]=$routine_row[1];
						$array['Time'][$i]=$routine_row[10];
						$array['SAT'][$i]=$routine_row[2];
						$array['SUN'][$i]=$routine_row[3];
						$array['MON'][$i]=$routine_row[4];
						$array['TUE'][$i]=$routine_row[5];
						$array['WED'][$i]=$routine_row[6];
						$array['THU'][$i]=$routine_row[7];

						
						$i++;
						}

						  html_show_array($array);

echo "<br/><br/>";
						  
	}
		  
   
    /* Sample Data
	$array['period'] = array('1','2','3','4',' X ','5','6','7','8',);  
	$array['Time'] =array('7-8','8-9','9-10','10-11','11-12','12-13','13-14','14-15','15-16');
    $array['SAT'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
    $array['SUN'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['MON'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['TUE'] = array('s_name,t_name','5_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['WED'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
	$array['RHU'] = array('s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',' X ','s_name,t_name','s_name,t_name','s_name,t_name','s_name,t_name',);
   */
    

		





?>
<?php // include_once("analyticstracking.php") ?>
</div>