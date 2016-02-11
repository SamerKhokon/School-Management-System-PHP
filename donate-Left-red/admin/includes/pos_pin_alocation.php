
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"
				} );
			} );
		</script>

<!-- Content (Right Column) -->
    <div id="content" class="box">       
	  
<div class="title" >Hadding</div> 
	
	<div id="container">
		

	
	<br/>
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Member Id</th>
			<th>Mobile No</th>
			<th>Alocated ID</th>
			<th>Alocation Date</th>
			<th>Status</th>
            
		</tr>
	</thead>
	<tbody>
	
	
	

		
	
<?php
 session_start();
require_once("db.php");
$pos_id = $_SESSION["pos_id"];
//$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=member_account';

		//$url_par=$_SERVER['PHP_SELF'];
		//$url_par=$_SERVER['QUERY_STRING'];
		//echo "SELECT  * from alocation_id_to_pos where pos_id='$pos_id' order by id desc";
		
		$qry = mysql_query("SELECT  * from alocation_id_to_pos where pos_id='$pos_id' order by id desc"); 		
		
		while ($row=mysql_fetch_array($qry))
		{
		
		
		 //$row_id=$row['id'];		  
		  $member_login_id=$row['member_login_id'];
		  
		  $member_mobile_no=$row['member_mobile_no'];
		  $alo_login_id_set=$row['alo_login_id_set'];
		  $creation_time=$row['alo_date'];
		  $status=$row['status'];
		  echo "<tr class=\"gradeA\">";
        
		echo  "<td>$member_login_id</td>";
		echo  "<td>$member_mobile_no</td>";
		echo  "<td>$alo_login_id_set</td>";
		echo  "<td>$creation_time</td>";
		echo  "<td>$status</td>";
		
		//echo  "<td><a href=\"$url_par&deposit_id=$deposit_id\">Details</a> Confirm Reject</td>";		
        echo "</tr>";

		
	

?>	
 
 
<?php
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
			<div class="spacer"></div>
			
		
			</div>
		
	
	
    
     
    </div>
    <!-- /content -->
	