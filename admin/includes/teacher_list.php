<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>		
<div id="content" class="box" style="border:0px;">
<?php
	include('db.php');
	$str = "SELECT id,teacher_name,mobile,email,present_add,present_status FROM `std_teacher_info`";	
	 
	//$sql = mysql_query($str);	
?>
<table width=100% id="jq_tbl" border="0" style="border:0px;">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <td>Name</td>
							   <td>Mobile</td>
							   <td>Email</td>
							   <td>Address</td>
							   <td>Present Status</td>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
						  $qr = mysql_query($str);		
							while ($res = mysql_fetch_array($qr)){
							    $id 		 = $res[0];
								$teacher_name= $res[1];
								$mobile      = $res[2];
								$email       = $res[3];
								$present_add = $res[4];
						    	$present_status = $res[5];
								
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>$teacher_name</td>";
							   echo  "<td>$mobile </td>";
							   echo  "<td>$email </td>";
							   echo  "<td>$present_add</td>";
							   echo  "<td>$present_status </td>";
							   echo "</tr>";		
							 $count++;
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
</div>