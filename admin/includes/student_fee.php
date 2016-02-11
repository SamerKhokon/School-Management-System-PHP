<!-- Content (Right Column) -->
    <div id="content" class="box">
	
      <h1><?php echo $_GET['nev'];?></h1>
      
	  
	  
	  <!-- Headings -->
      
	  <!--
	  <h2>Heading H2</h2>
      <h3>Heading H3</h3>
      <h4>Heading H4</h4>
      <h5>Heading H5</h5>
	  -->
      <!-- System Messages -->
      
	  <!--
	  <h3 class="tit">System Messages</h3>
      <p class="msg warning">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg info">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg done">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg error">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	  -->
      <!-- Tabs -->
      
	  
	  <!--
	  <h3 class="tit">Tabs</h3>
	  -->
	  
	  
	  
      <div class="tabs box">
        <ul>
          <li><a href="#tab01"><span>All section</span></a></li>
          <li><a href="#tab02"><span>Section A</span></a></li>
          <li><a href="#tab03"><span>Section B</span></a></li>
		  <li><a href="#tab03"><span>Section C</span></a></li>
		  <li><a href="#tab03"><span>Section D</span></a></li>
        </ul>
      </div>
      <!-- /tabs -->
      <!-- Tab01 -->
      
	  
	  <div id="tab01">
        
		
		
		
		<table>
        <tr>
          <th>Class</th>
          <th>Section</th>
		  <th>Roll</th>
          <th>Student Name</th>
          
          <th>Tution fee</th>
		  <th>Hostel fee</th>
		  <th>Exam fee</th>
		  <th>Miscellanies</th>
		  <th>Pre Due</th>
		  <th>Fee for month</th>
		  <th>Payment Status</th>
		  
		  
        </tr>
        
		
		<?php 
		
		
		 $qry = mysql_query("select * from std_fee_details"); 		
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
				
		
		  
		  
		  
        echo  "<td>$row[2]</td>";
		echo  "<td>$row[3]</td>";
		echo  "<td>$row[5]</td>";
		echo  "<td>$row[6]</td>";
		echo  "<td>$row[7]</td>";
		echo  "<td>$row[8]</td>";
		echo  "<td>$row[9]</td>";
		echo  "<td>$row[10]</td>";
		echo  "<td>$row[11]</td>";
		echo  "<td>$row[12]</td>";
		echo  "<td>$row[13]</td>";
        echo "</tr>";
		$count++;
		}
		
		?>
		</table>
		
      </div>
      <!-- /tab01 -->
      <!-- Tab02 -->
      <div id="tab02">
        <p>Donec ornare, libero vitae facilisis molestie, mi sapien venenatis felis, sed mattis lectus nisi ac massa.</p>
      </div>
      <!-- /tab02 -->
      <!-- Tab03 -->
      <div id="tab03">
        <p>Nam ut lorem eu orci placerat iaculis.</p>
      </div>
      <!-- /tab03 -->
      
    </div>
    <!-- /content -->
	