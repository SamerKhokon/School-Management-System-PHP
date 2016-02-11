 <style type="text/css">
 
.paginate {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
}

a.paginate {
	border: 1px solid #000080;
	padding: 2px 6px 2px 6px;
	text-decoration: none;
	color: #000080;
}


a.paginate:hover {
	background-color: #000080;
	color: #FFF;
	text-decoration: underline;
}

a.current {
	border: 1px solid #000080;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#000080;
	color: #FFF;
	text-decoration: none;
}

span.inactive {
	border: 1px solid #999;
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	padding: 2px 6px 2px 6px;
	color: #999;
	cursor: default;
}

table {
	margin: 8px;
}

tha {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	background: #666;
	color: #FFF;
	padding: 2px 6px;
	border-collapse: separate;
	border: 1px solid #000;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	border: 1px solid #DDD;
}
</style>
<script>
function hilite(elem)
{
	elem.style.background = '#FFC';
}

function lowlite(elem)
{
	elem.style.background = '';
}
</script>
 
   <div id="content" class="box">       
	  
	
	       <div class="title" >Deposit Information</div> 
		   <br/>
		 
 <!-- Content (Right Column) -->
  

	
	<div id="container">
		
	<h1 >hadding</h1>
	
	<hr/><br/>
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		  <th>Pos Id</th>          
          <th>Depost</th>
          <th>Bank Name</th>
          <th>Account Number</th>
		  <th>Deposit Type</th>
		  <th>Deposit date</th>
		  <th>Action</th>
	        
		</tr>
	</thead>
	<tbody>
	
	    
	
	
	
		 
		
		  
		 
		  
		  
        
		
		<?php 

		$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=action_pos_deposit';
		//$url_par=$_SERVER['PHP_SELF'];
		//$url_par=$_SERVER['QUERY_STRING'];
		
		$qry = mysql_query("SELECT  * from donate_pos_deposit where 1=1 and status='Panding' $pages->limit"); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
		{
			        			$mod=$count%2;
								
				
		  $deposit_id=$row['id'];
		  
		  $pos_id=$row['pos_id'];
		  $deposit=$row['deposit'];
		  $bank_name=$row['bank_name'];
		  $account_number=$row['account_number'];
		  $deposit_type=$row['deposit_type'];
		  $deposit_date=$row['deposit_date'];
		  echo "<tr class=\"gradeA\">";
        echo  "<td>$pos_id</td>";
		echo  "<td>$deposit</td>";
		echo  "<td>$bank_name</td>";
		echo  "<td>$account_number</td>";
		echo  "<td>$deposit_type</td>";
		echo  "<td>$deposit_date</td>";
		echo  "<td><a href=\"$url_par&deposit_id=$deposit_id\">Details</a> Confirm Reject</td>";
		
        echo "</tr>";
		
		$count++;
		}
	
	
		?>
		</table>
	
     
    </div>
    <!-- /content -->
	