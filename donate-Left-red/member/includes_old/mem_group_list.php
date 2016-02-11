


<!-- Content (Right Column) -->
    <div id="content" class="box">       
	  	<div id="container">
		
	<h1 >My Group List</h1>
	
	<hr/><br/>
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Member Id</th>
			<th>Line</th>
			<th>Member name</th>
			<th>Mobile No</th>
			<th>Status</th>
            
		</tr>
	</thead>
	<tbody>

	
	<?php
	
	getmember_list($login_id);
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
	
	
	<?php
	function getmember_list($id){
	$query = "SELECT * FROM user_info where s_id='".$id."' and status='Active'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);	
	//$_SESSION['s'] = $_SESSION['s']+$count;
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
	{
	 echo "<tr class=\"gradeA\">";
	 
	echo "<td>".$row["login_id"]."</td>";
	echo "<td>".$row["form_type"]."</td>";
	echo "<td>".$row["m_name"]."</td>";
	echo "<td>".$row["mobile_no"]."</td>";
	echo "<td>".$row["status"]."</td>";
	echo "</tr>";
	
        getmember_list($row["login_id"]);
	}
	
	mysql_free_result($result);
	//echo $count."<br />";
	return "";	
}

	?>