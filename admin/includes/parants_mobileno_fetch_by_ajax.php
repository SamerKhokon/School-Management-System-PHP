<script type="text/javascript">
$(document).ready(function(){ 
	$('#example1').dataTable( {	"sPaginationType": "full_numbers"	 });
});	
</script>		
<?php
require_once("../db.php"); 
$class_id = $_REQUEST['class_id'];
$branch_id = $_REQUEST['branch_id'];
$st = "select t1.stu_id as stu_id, t2.name as stu_name, t2.father_name as father, t2.mother_name as mother, t2.father_work_phone as mobile_no from std_class_info t1, std_profile t2 where t1.stu_id=t2.stu_id and t1.branch_id=$branch_id and t1.class_id=$class_id";
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
                </tr>
            </thead>
            <tbody>
			<?php  
			$sql = mysql_query($st);
            while($res = mysql_fetch_array($sql) )
            {									
            	   
				if($mobile_nos=='')
					$mobile_nos .= $res['mobile_no'];
				else
					$mobile_nos .= ','.$res['mobile_no'];	
					
				echo  "<td>".$res['stu_id']."</td>";								
				echo  "<td>".$res['stu_name']."</td>";
				echo  "<td>".$res['father']."</td>";
				echo  "<td>".$res['mother']."</td>";
				echo  "<td>".$res['mobile_no']."</td>";								
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
                </tr>
            </tfoot>
        </table>
    </div>
</table>
<br/>
<input type="button" id="confirm_notice_sms_send_to_parants" class="form-submit" value="Submit"/><input type="hidden" name="mobile_nos" id="mobile_nos" value="<?php echo $mobile_nos;?>" />