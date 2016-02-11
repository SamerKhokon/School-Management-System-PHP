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
	  <form action='ss.php' >
	  <input type='text'>
	  	  <input type='text'>
		  <input type='submit'>
	  </form>
	  
	  
      <div class="tabs box">
        <ul>
          <li><a href="#tab01"><span>Term Exam</span></a></li>
          <li><a href="#tab02"><span>Class Test</span></a></li>
          <li><a href="#tab03"><span>Spot Test</span></a></li>
		  
        </ul>
      </div>
      <!-- /tabs -->
      <!-- Tab01 -->
      
	  
	  <div id="tab01">
		<h3>Term 1</h3>
		
		<table>
        <tr>
          <th>Subject</th>
          <th>Exam Date</th>
          <th>Start</th>
          <th>End</th>
          <th>Exam Duration</th>
		  <th>Total Mark</th>
		  
		  
		  
        </tr>
        
		
		<?php 
		
		
		 $qry = mysql_query("select * from std_exam_schedule"); 		
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
				
		
		  
		  
		  
        echo  "<td>$row[7]</td>";
		echo  "<td>$row[8]</td>";
		echo  "<td>$row[9]</td>";
		echo  "<td>$row[10]</td>";
		echo  "<td>$row[11]</td>";
		echo  "<td>$row[12]</td>";
		
        echo "</tr>";
		$count++;
		}
		
		?>
		</table>
		
      </div>
      <!-- /tab01 -->
      <!-- Tab02 -->
      <div id="tab02">
		<h3>Class Test</h3>
		
		<table>
        <tr>
          <th>Subject</th>
          <th>Exam Date</th>
          <th>Start</th>
          <th>End</th>
          <th>Exam Duration</th>
		  <th>Total Mark</th>
		  
		  
		  
        </tr>
        
		
		<?php 
		
		
		 $qry = mysql_query("select * from std_exam_schedule"); 		
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
				
		
		  
		  
		  
        echo  "<td>$row[7]</td>";
		echo  "<td>$row[8]</td>";
		echo  "<td>$row[9]</td>";
		echo  "<td>$row[10]</td>";
		echo  "<td>$row[11]</td>";
		echo  "<td>$row[12]</td>";
		
        echo "</tr>";
		$count++;
		}
		
		?>
		</table>
      </div>
      <!-- /tab02 -->
      <!-- Tab03 -->
      <div id="tab03">
       		<h3>Spot Test</h3>


<form 
			
		<table>
        <tr>
          <th>Subject</th>
          <th>Exam Date</th>
          <th>Start</th>
          <th>End</th>
          <th>Exam Duration</th>
		  <th>Total Mark</th>
		  
		  
		  
        </tr>
        
		
		<?php 
		
		
		 $qry = mysql_query("select * from std_exam_schedule"); 		
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
				
		
		  
		  
		  
        echo  "<td>$row[7]</td>";
		echo  "<td>$row[8]</td>";
		echo  "<td>$row[9]</td>";
		echo  "<td>$row[10]</td>";
		echo  "<td>$row[11]</td>";
		echo  "<td>$row[12]</td>";
		
        echo "</tr>";
		$count++;
		}
		
		?>
		</table>
      </div>
      
      
      
      
      
      
      
      
      
     
      
      
     
    </div>
    <!-- /content -->
	