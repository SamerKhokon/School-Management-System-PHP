 <?php 
 $pos_id=1;
 ?>
 


<!-- Content (Right Column) -->
    <div id="content" class="box">       
	  
	
	       <div class="title" >Pos collection Information</div> 
		   <br/>
		 
    
	
	
	
		 
		
		<table class="x3" width=100%>
        <tr>
          
		  <th>Pos Id</th>          
          <th>collection Amount</th>
          <th>Member Login ID</th>
          <th>Member Mobile No</th>
		  <th>Collection Agent</th>
		  <th>Agent Pin</th>
		  <th>Payment Request</th>
		  <th>Action</th>
		  
		 
		  
		  
        </tr>
        
		
		<?php 
		
		
		$qry = mysql_query("SELECT  * from pos_collection_amount where 1=1 and status='Panding'"); 		
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
				
		
		  
		  $pos_id=$row['pos_id'];
		  $collection_amount=$row['collection_amount'];
		  $login_id=$row['login_id'];
		  $member_mobieno=$row['member_mobileno'];
		  $collection_agent=$row['collection_agent'];
		  $agent_pin=$row['agent_pin'];
		  $request_date=$row['payment_req_date'];
		  
        echo  "<td>$pos_id</td>";
		echo  "<td>$collection_amount</td>";
		echo  "<td>$login_id</td>";
		echo  "<td>$member_mobieno</td>";
		echo  "<td>$collection_agent</td>";
		
		echo  "<td>$agent_pin</td>";
		echo  "<td>$request_date</td>";
		echo  "<td>Details Confirm Reject</td>";
		
        echo "</tr>";
		
		$count++;
		}
	
	
		?>
		</table>
	
    
     
    </div>
    <!-- /content -->
	