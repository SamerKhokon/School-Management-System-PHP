
<div id="content" class="box">


<?php

include("routine_function/show_class_routine.php");



echo "<div class=\"tabs box\"><ul>";
$class_name_tab=mysql_query("select class_id,class_name,sec_id from std_class_routine group by class_id");
while ($class_name_tab_result=mysql_fetch_array($class_name_tab))
{

echo "<li><a href=\"#$class_name_tab_result[1]\"><span>$class_name_tab_result[1]</span></a></li>";}
echo "</ul></div>";

$class_routine=mysql_query("select class_id,class_name,sec_id from std_class_routine group by class_id");
while ($class_result=mysql_fetch_array($class_routine))
{

echo "<div id=\"$class_result[1]\">";



						$class_routine2=mysql_query("select class_id,class_name,sec_id from std_class_routine where class_id=$class_result[0] group by sec_id");
                        while ($class_result2=mysql_fetch_array($class_routine2))
						{
						
						$rtn_class_id=$class_result2[0];
						 $rtn_class_name=$class_result2[1];
						
						$rtn_sec_id=$class_result2[2]; 
						echo "<p class=\"msg info\"><b>$rtn_class_name -- $rtn_sec_id.</b></p>";
						
						
						
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
						html_show_array($array,$rtn_class_id,$rtn_sec_id);
						
						}
						
						
echo "</div>";
}
		  
   
    
    

?>

</div>