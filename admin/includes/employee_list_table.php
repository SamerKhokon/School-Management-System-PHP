<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<?php
		require_once("../db.php"); 
		session_start();
        $branchid = $_SESSION['LOGIN_BRANCH'];			 			 		
		 
		$str = "SELECT empid,name,category,join_date,address,mobileno FROM  `tbl_emp_salary_sturcture`";	 		 
		$wuery  = mysql_query($str);
		

?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
					   <th>Name</th>					
					   <th>Category</th>
					   <th>Joining Date</th>					   
					   <th>Address</th>					   
					   <th>Mobileno</th>
					</tr>
				</thead>
				<tbody>
 					 <?php $i=0;
							while( $res = mysql_fetch_array($wuery) )
							{	
										$empid  		= $res['empid'];
										$emp_name  = $res['name'];		
									$category    = $res['category'];		
									$join_date   = $res['join_date'];	
									$address     = $res['address'];
									$mobileno    = $res['mobileno'];
							
								if ($i%2==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
								
								echo  "<td>".$emp_name."</td>";
								echo  "<td>".$category."</td>";									
								echo  "<td>".$join_date."</td>";								
								echo  "<td>".$address."</td>";
								echo  "<td>".$mobileno."</td>";								
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
					</tr>
				</tfoot>
			</table>
		</div>
	</table>
	<br/>
