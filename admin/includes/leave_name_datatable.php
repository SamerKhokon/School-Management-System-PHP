<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<?php
		require_once("../db.php"); 
		session_start();
        $branchid = $_SESSION['LOGIN_BRANCH'];			 			 		
		 //leave_name_datatable.php
		$str = "select * from tbl_leaves where branch_id=$branchid";
		 
		 
		$wuery  = mysql_query($str);
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
					   
					   <th>Name</th>					
					   <th>No of Days</th>
					   <th>Action</th>					   					   
					</tr>
				</thead>
				<tbody>
 					 <?php $i=0;
							while( $res = mysql_fetch_array($wuery) )
							{	
								 $leave_id   		  = $res[0];
								 $leave_name   		  = $res[1];
								 $no_of_days   		  = $res[2];
							
								if ($i%2==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
								
								echo  "<td>".$leave_name."</td>";
								echo  "<td>".$no_of_days."</td>";									
								echo  "<td>&nbsp;</td>";								
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
