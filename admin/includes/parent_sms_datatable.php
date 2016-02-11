<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<?php
		require_once("../db.php"); 
		session_start();
        $branchid = $_SESSION['LOGIN_BRANCH'];			 			 		
		$class_id = trim($_POST['class_id']);		
		 
		$str = "SELECT stu_id,name,adm_class,section, 
  NAME,father_name,father_work_phone,father_work_phone FROM std_profile AS a WHERE adm_class=$class_id";
		 
		 
		$wuery  = mysql_query($str);
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
					   <th>Student ID</th>
					   <th>Name</th>					
					   <th>Class</th>
					   <th>Section</th>					   					 			   
					   <th>Father Name</th>
					   <th>Father Work Phone</th>					   					   
					</tr>
				</thead>
				<tbody>
 					 <?php $i=0;
							while( $res = mysql_fetch_array($wuery) )
							{	
								 $class_name   		  = $res['adm_class'];
								 $class_sec   		  = $res['section'];
								 $stud_id   		  = $res['stu_id'];
								 $stu_name   		  = $res['name'];
								 $father_name   	  = $res['father_name'];
								 $father_work_phone   = $res['father_work_phone'];
							
								if ($i%2==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
								
								echo  "<td>".$stud_id."</td>";
								echo  "<td>".$stu_name."</td>";									
								echo  "<td>Class-".$class_name."</td>";								
								echo  "<td>".$class_sec."</td>";
								echo  "<td>".$father_name."</td>";								
								echo  "<td>".$father_work_phone."</td>";								
								$i++;
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
			<input type="button" id="confirm_sms_send_to_parents" class="form-submit" value=""/>	
