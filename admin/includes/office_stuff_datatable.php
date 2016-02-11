<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example1').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<?php
		require_once("../db.php"); 
		session_start();
        $branchid = $_SESSION['LOGIN_BRANCH'];		 			 
		
		$stuff_type 	  = trim($_POST['stuff_type']);
		
		  if($stuff_type=="Teacher")
		  {
			$st = "select teacher_name,mobile,email from std_teacher_info";
			$header = "<thead>
								<tr>
								   <th>Teacher Name</th>
								   <th>Mobileno</th>
								   <th>Email</th>					   
								</tr>
						</thead>";
		  }
		  else if($stuff_type=="Employee") 
		  {
			$st = "select name,mobileno,address from tbl_emp_salary_sturcture";		  
			$header = "<thead>
						<tr>
						   <th>Name</th>
						   <th>Mobileno</th>
						   <th>Address</th>					   
						</tr>
					</thead>";			
		  }
		  $sq = mysql_query($st); 		
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example1">
				<?php echo $header;?>
				<tbody>
					 <?php  $sql = mysql_query($st);
					        $i = 0;
							while($res = mysql_fetch_array($sql) )
							{									
								if ($i%2==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
								echo  "<td>".$res[0]."</td>";								
								echo  "<td>".$res[1]."</td>";
								echo  "<td>".$res[2]."</td></tr>";								
								$i++;
							}	
						?>
				</tbody>
				<tfoot>
					<tr>
						<th>&nbsp;</th>						
						<th>&nbsp;</th>						
						<th>&nbsp;</th>						
					</tr>
				</tfoot>
			</table>
		</div>
	</table>
<br/>

			<input type="button" id="confirm_sms_send_to_office_stuff" class="form-submit" value="Submit"/>