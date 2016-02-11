<?php   require_once("../db.php");

	// $con = mysql_connect("localhost" , "root" , "");
	// mysql_select_db("school" , $con );
	
    $classid  = trim($_POST["class_id"]);
	$term     = trim($_POST["term_id"]);
	$branchid = trim($_POST["branchid"]);
	$roll     = trim($_POST["roll"]);									
	
	$result_process_str = "SELECT * FROM `std_final_result_after_process` where grade=='F'";		
    $result_process_sql = mysql_query($result_process_str); 
	$count = 0;		
	
?>	
<html>
<head>
    <script type="text/javascript">
	  $(document).ready(function(){
		$('#example').dataTable({
		   "sPaginationType": "full_numbers"				
		});	          
	  });
	</script>
</head>
<body>
<div id="container">		
	<div id="demo">
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
 <thead>
 <tr> 
		  <th>Stuid</th>
		  <th>Class</th>
		  <th>Class Section</th>
		  <th>Term</th>
	      <th>Cgpa</th>
		  <th>Grade</th>
		  <th>Year</th>
	   </tr> 

</thead>
<tbody>
<?php while( $rs = mysql_fetch_array($result_process_sql) ) {
            $slno                   = $rs[0];
			$stuid                  = $rs[1];
			$classid              = $rs[2];
			$term                  = $rs[3];
			$cgpa                 = $rs[4];  
			$grade                = $rs[5];  
			$year                   = $rs[6];
 ?>

       <tr> 
	      <td><?php echo $stuid;?></td>
		  <td><?php echo $classid;?></td>
		  <td><?php echo $class_sec;?></td>
		  <td><?php echo $term;?></td>
	      <td><?php echo $cgpa;?></td>
		  <td><?php echo $grade;?></td>
		  <td><?php echo $year;?></td>
	   </tr> 

<?php } ?>	   
</tbody>	
</tfoot>   
       <tr> 
	      <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td></td>
	      <td></td>
		  <td></td>
	   </tr> 
</tfoot>	   
</table>
</div>
<div class="spacer"></div>
</div>

</body>
</html>
