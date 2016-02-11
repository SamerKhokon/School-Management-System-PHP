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
	  
	  
	  <form action='' >
	  Roll <input type=text>
	  	 Name<input type='text'>
		  <input type='submit'>
	  </form>
	  
      <div class="tabs box">
        <ul>
          <li><a href="#tab_all"><span>All section</span></a></li>
          <li><a href="#taba"><span>Section A</span></a></li>
          <li><a href="#tab03"><span>Section B</span></a></li>
		  <li><a href="#tab04"><span>Section C</span></a></li>
		  <li><a href="#tab05"><span>Section D</span></a></li>
        </ul>
      </div>
      <!-- /tabs -->
      <!-- Tab01 -->
      
	  
	  <div id="tab_all">
        
		
		
		
		<table class="x3" width=100%>
        <tr>
          <th>Roll</th>
          <th>Student Name</th>
          <th>Class</th>
          <th>Section</th>
          <th>Total Open Day</th>
		  <th>Total Abs</th>
		  <th>Total Leave</th>
		  <th>Previos result</th>
		  <th>Previous marks</th>
		  <th>Profile</th>
		  <th>present result</th>
		 
		  
		  
        </tr>
        
		
		<?php 
		
		
		 $qry = mysql_query("select * from std_class_info"); 		
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
				
		
		  
		  
		  
        echo  "<td>$row[6]</td>";
		echo  "<td>$row[5]</td>";
		echo  "<td>$row[2]</td>";
		echo  "<td>$row[3]</td>";
		echo  "<td>$row[7]</td>";
		echo  "<td>$row[8]</td>";
		echo  "<td>$row[9]</td>";
		echo  "<td>$row[14]</td>";
		echo  "<td>$row[15]</td>";
		echo  "<td>Details</td>";
		echo  "<td>Details</td>";
		
        echo "</tr>";
		
		$count++;
		}
		echo  $_GET['section'];
		?>
		</table>
		
      </div>
      <!-- /tab01 -->
      <!-- Tab02 -->
      <div id="taba">
        <p>Donec ornare, libero vitae facilisis molestie, mi sapien venenatis felis, sed mattis lectus nisi ac massa.</p>
		This is section A
      </div>
      <!-- /tab02 -->
      <!-- Tab03 -->
      <div id="tab03">
        <p>Nam ut lorem eu orci placerat iaculis.</p>
      </div>
      <!-- /tab03 -->
      
    </div>
    <!-- /content -->
	