<script type="text/javascript">
$(document).ready(function(){ 
	$('#example1').dataTable( {	"sPaginationType": "full_numbers"	 });
});	
</script>		
<?php
require_once("../db.php"); 

/*var dataA = 'class_id='+class_id+'&year='+$('#year').val()+'&month='+$('#month').val()+'&branch_id='+$('#branch_id').val();*/


$class_id = $_REQUEST['class_id'];
$branch_id = $_REQUEST['branch_id'];
$year = $_REQUEST['year'];
$month = $_REQUEST['month'];
$m=$month;
if($month<10)
	$m='0'.$month;
$month_date = $year.'-'.$m.'-01';

$st = "SELECT `std_id` as stu_id,sum(`amount`) as total_fee FROM `std_fee_details` where `collection_status`='unpaid' and branch_id=$branch_id and class_id=$class_id and month_date='$month_date' group by `std_id`";
$mobile_nos = '';
?>
<table width=100% id="jq_tbl">	
    <div id="demo">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example1">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>Mobile No</th>
                    <th>SMS</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $sql = mysql_query($st);
                while($res = mysql_fetch_array($sql) )
                {									
                       
                    $std_prf = "select name as stu_name, father_name as father, mother_name as mother, father_work_phone as mobile_no from std_profile where stu_id=".$res['stu_id'];
                    $sql_std_prf = mysql_query($std_prf);
                    if($res_std_prf = mysql_fetch_array($sql_std_prf))
                    {
                        if($mobile_nos=='')
                            $mobile_nos .= $res_std_prf['mobile_no'];
                        else
                            $mobile_nos .= ','.$res_std_prf['mobile_no'];
                        $mon = date("F", mktime(0, 0, 0, $month+1, 0, 0, 0));	
                        $msg_body = "Your Child ".$res_std_prf['stu_name']."'s (".$res['stu_id'].") due fee of ".$mon."-".$year." is ".$res['total_fee'];		
                    }	
                        
                    echo "<tr>";
					echo  "<td>".$res['stu_id']."</td>";								
                    echo  "<td>".$res_std_prf['stu_name']."</td>";
                    echo  "<td>".$res_std_prf['father']."</td>";
                    echo  "<td>".$res_std_prf['mother']."</td>";
                    echo  "<td>".$res_std_prf['mobile_no']."</td>";
                    echo  "<td>".$msg_body."</td>";
					echo "</tr>";
                                                    
                }	
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>&nbsp;</th>						
                    <th>&nbsp;</th>						
                    <th>&nbsp;</th>						
                    <th>&nbsp;</th>						
                    <th>&nbsp;</th>						
                    <th>&nbsp;</th>						
                </tr>
            </tfoot>
        </table>
    </div>
</table>
<br/>
<input type="button" id="confirm_notice_sms_send_to_parants" class="form-submit" value="Submit"/><input type="text" name="mobile_nos" id="mobile_nos" value="<?php echo $mobile_nos;?>" />