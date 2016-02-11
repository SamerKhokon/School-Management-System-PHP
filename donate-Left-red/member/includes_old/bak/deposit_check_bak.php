 


<!-- Content (Right Column) -->
    <div id="content" class="box">       
	  
	
	       <div class="title" >Deposit Information</div> 
		   <br/>
		 
    
	
	
	
		 
		
		<table class="x3" width=100%>
        <tr>
          
		  <th>Pos Id</th>          
          <th>Depost</th>
          <th>Bank Name</th>
          <th>Account Number</th>
		  <th>Deposit Type</th>
		  <th>Deposit date</th>
		  <th>Action</th>
		  
		 
		  
		  
        </tr>
        
		
		<?php 
		
		$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=action_pos_deposit';
		$qry = mysql_query("SELECT  * from donate_pos_deposit where 1=1 and status='Panding'"); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
		{
			        			$mod=$count%2;
								
								if ($mod==0)
								{
								//$chk_class='odd';
								echo "<tr>";
								}
								else
								{
								//$chk_class='even';
								echo "<tr class=\"bg\">";
								}
				
		$deposit_id=$row['id'];
		  
		  $pos_id=$row['pos_id'];
		  $deposit=$row['deposit'];
		  $bank_name=$row['bank_name'];
		  $account_number=$row['account_number'];
		  $deposit_type=$row['deposit_type'];
		  $deposit_date=$row['deposit_date'];
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
	