<div  id="content" class="box">        
<?php
    $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");   
	
    function get_month_num($month) 
	{
	  return date('m',strtotime($month));
	}
	
    function month_end_date($month) 
	{
      return date('t' , strtotime($month));
    }   
	
    function get_day_name($date) 
	{
      return date('D' , strtotime($date));
    }

    function first_seven_days_day_name($months) { 
	   $table = "<tr>";
	   
	   for($i=1;$i<=7;$i++) {
		$day_name =	get_day_name(date('Y-').get_month_num($months).'-0'.$i);
		$table .= "<td>&nbsp;&nbsp;$day_name&nbsp;&nbsp;</td>";
	   }	
		$table .="</tr>";
		echo $table;
	}	
        
	function  generate_calendar($months) 
	{
	    $yr     = date('Y');
	    $table  = "<span style='margin-left:50px;text-align:center;font-family:Arial;font-weight:bold;'>$months-".$yr."</span>";
	    $table .= "<table id='accademic_calendar' align='center' cellpadding='2' cellspacing='2' width='30%' height='30%'>";
		$table .= "<tr>";
		
		for($i=1;$i<=7;$i++) {
			$day_name =	get_day_name(date('Y-').get_month_num($months).'-0'.$i);
			$table .= "<th align='center' bgcolor='yellow'> $day_name</th>";
	    }		
		$off_days = 0;
		$table .="</tr><tr>";
		for($i=1 ; $i <= month_end_date($months) ; $i++)
		{   
		    if($i%7!=0) 
			{			 
				 $make_date = date('Y-').get_month_num($months).'-'.$i;
				 if( get_day_name($make_date) !="Fri") {
					$table .= "<td id='$make_date'>$i </td>";
				 }else{
				    $off_days++;
					$table .= "<th  id='$make_date' bgcolor='pink'> $i</th>";
				 }
			}else {
				 $make_date = date('Y-').get_month_num($months).'-'.$i;
				 $table .= "<td id='$make_date'>$i </td></tr>"; 			
			}
		}
		$table .="<tr><td colspan='7' bgcolor='#efefef;'>Total Offday: $off_days</td></tr>";
		$table .="<table>";
		echo $table;
	}
	
	for($i=0 ; $i < count($months) ; $i++)  {
		generate_calendar($months[$i]);
		echo "<br/>-------------------------------------------------------------------------------<br/>";
	}
   
?>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $("tr td").click(function(){
      var _id = $(this).attr('id');
	 alert(_id);
	 
   });
});
</script>