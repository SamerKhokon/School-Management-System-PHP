<?php session_start(); require_once("../db.php");
$branch_id = $_SESSION['LOGIN_BRANCH'];
$user_value = trim($_POST['month_year']); 				
				$month_date = date('Y-m-',strtotime($user_value));				
				$date = date('Y-m-01',strtotime($user_value));
				$days = array("sun","mon","tue","wed","thu","fri","sat");				
				
                $dates = array();
				$friday_counter = 0;				
				$parse = explode("-",$user_value);
				$month_portion = $parse[0];	
						
						
				function get_last_day_of_month($month_portion,$branch_id) {
					$str =	"SELECT COUNT(*) FROM `tbl_acc_calendar`
						WHERE SUBSTRING(DATE_FORMAT(DATE,'%M'),1,3)='$month_portion' and branch_id=$branch_id";
					$sql = mysql_query($str);	
					$res = mysql_fetch_row($sql);
					return $res[0];
				}
				//echo "SELECT * FROM `tbl_acc_calendar` WHERE SUBSTRING(DATE_FORMAT(DATE,'%M'),1,3)='$month_portion'";	
				
				function check_event_flag($month_date,$month_portion,$branch_id){
						$str = "SELECT COUNT(*) FROM tbl_acc_calendar WHERE 
							flag=1 AND SUBSTRING(DATE_FORMAT(DATE,'%M'),1,3)='$month_portion' 
							AND DATE='$month_date' and branch_id=$branch_id";
							
						$sql = mysql_query($str);	
						$res = mysql_fetch_row($sql);
						return $res[0];
				}
				
				for( $i = 1 ; $i <= get_last_day_of_month($month_portion,$branch_id) ; $i++ )  
				{					    
				     $new_date = $month_date.$i;
					 $dates[$i-1]  =  date('D',strtotime($new_date));						
				}					

				//print_r($dates);
				for($l=0;$l<count($dates);$l++) {
					if($dates[$l]=="Fri") 	{
					    $friday_counter++;
					}
				}
													
				$pos = array_search(strtolower($dates[0]) , $days) + 1;					
				echo '<br/><br/><table id="calendar" border="0" width="80%" cellpadding="2" cellspacing="2">';					
					
					/*******************************************
					*** day names
					********************************************/
					//echo '<tr><td colspan="7">&nbsp;</td></tr>';										
					for( $j = 0 ; $j < count($days) ; $j++ )	{
					   echo '<th style="background:#e4e4e4;"> '. ucfirst($days[$j]) .' </th>';
					}
					echo '</tr>';									
					
					/*****************************************************
					***** calendar dates
					******************************************************/
					echo '<tr>';
					for( $i = 1 ; $i < $pos ; $i++ )	{
					  echo '<td  style="height:60px;width:60px;border:1px solid #ccc;">&nbsp;</td>';
					}	
					
					for( $i = 1 ;  $i <= 7-$pos+1 ; $i++ ) 		{
							$cell_date = $month_date.$i;
							$flag         = check_event_flag($month_date.$i ,$month_portion,$branch_id);
							$evt           = get_event_description($month_date.$i,$branch_id);														
						    if($flag ==0 ) {
							    echo '<td  style="height:60px;width:60px;border:1px solid #ccc;color:#99000;"> '.$i.'<br/>'.$evt .' </td>';
							}else{
								echo '<td  style="background:yellow;height:60px;width:60px;border:1px solid #ccc;color:#99000;"> '.$i.'<br/>'.$evt.' </td>';							
							}
					}						
					echo '</tr>';
					
					$break = 7-$pos+2;
					
					echo '<tr>';
					$c= 1;
					for( $i = $break ; $i <= get_last_day_of_month($month_portion,$branch_id)  ; $i++ ) {	                        				
						if( $c % 7 ) 
						{	  
						    $cell_date = $month_date.$i;
							$flag         = check_event_flag($month_date.$i , $month_portion,$branch_id);	
							$evt = get_event_description($month_date.$i,$branch_id);							
							if( $flag != 1 ) 	
							{
								echo '<td style="height:60px;width:60px;border:1px solid #ccc;color:#99000;"> '.$i.'<br/>'.$evt.' </td>';
							} 
							else
							{
								echo '<td  style="background:yellow;height:60px;width:60px;border:1px solid #ccc;color:#99000;"> '.$i.'<br/>'.$evt.' </td>';								
							}	
						}
						else if( $c % 7 != 1 )	
						{
						    $cell_date = $month_date.$i;
							$flag         = check_event_flag( $month_date.$i , $month_portion, $branch_id);
							$evt = get_event_description($month_date.$i,$branch_id);
							if($flag != 1)
							{
								echo '<td style="height:60px;width:60px;border:1px solid #ccc;"> '.$i.'<br/>'.$evt.' </td>';
							}
							else	
							{
								echo '<td  style="background:yellow;height:60px;width:60px;border:1px solid #ccc;"> '.$i.'<br/>'.$evt.' </td>';								
							}								
							echo '</tr>';
						}	
						$c++;	
					}		
					echo '<tr><td colspan="7">&nbsp;</td></tr>';					
					echo '<tr><td colspan="7">Offdays:'. get_total_off_days($month_portion,$branch_id).'</td></tr>';
					echo '</table>';					
					
					function get_event_description($event_date,$branch_id) 
					{
					    $str = "select evtn_name from tbl_acc_calendar where date='$event_date' and branch_id=$branch_id";
						$sql = mysql_query($str);
						$res = mysql_fetch_row($sql);
						return $res[0];
					}
					
					function get_total_off_days($month_portion,$branch_id) 
					{
					  $str = "select count(*) from tbl_acc_calendar where substring(date_format(date,'%M'),1,3)='$month_portion'  and flag=1 and branch_id=$branch_id"; 
					  $sql = mysql_query($str);
					  $res = mysql_fetch_row($sql);
					  return $res[0];
					}
					
					function get_day_name( $date ) 
					{
					   return date('D',strtotime($date));
					}										
?>
<style type="text/css">
#calendar  tr td,th
  {
    font-family:Verdana;
	font-size:18px;
	text-align:center;
  }
</style>