<?php	//$month_id = "Mar-2013";
			$month_id = trim($_POST["month_id"]);			
			
			/**************************
			*** by default each
			*** month
			************************/
			
			$total_open_day = date('t' , strtotime($month_id));
			$total_friday        = get_number_of_friday_each_month($total_open_day , $month_id);
			$actual_open_day       = $total_open_day -   $total_friday;
			
			//echo $total_open_day.'   '.$total_friday.'  '.$actual_open_day;			
			echo $actual_open_day;
			
            function get_number_of_friday_each_month( $total_open_day , $month_id ) 
		    {			
					$count_fri = 0;
					for(  $i=1 ; $i <= $total_open_day ; $i++ )  
					{
						$date = date('Y-m' , strtotime($month_id)) . '-' . $i;
						if( date('D' , strtotime($date)) == "Fri") 
						{
							$count_fri++;
						} 
					}			
					 $total_friday = $count_fri;			
				     return $total_friday;
			}			
			
?>