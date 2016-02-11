<html>
<head>
<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>
</head>
<body>		
<?php
	require_once('../db.php');
	global $str;
	
	
	$class_id = trim($_POST['class_id']);
	$class_sec= trim($_POST['class_sec']);	
	$month    = trim($_POST['month']);
	$roll     = trim($_POST['roll']);
	$branch_id = trim($_POST['branch_id']);
	
	
	
	function get_section_id($class_id,$section_name,$branch_id) {
	  $st  = "SELECT id FROM `std_class_section_config` WHERE class_id=$class_id AND section_name='$section_name' and branch_id=$branch_id";
      $ss = mysql_query($st);	  
	  $rs = mysql_fetch_row($ss);
	  return $rs[0];
	}
	
	function get_section_name($class_id,$section_id,$branch_id) {
		$st  = "SELECT section_name FROM `std_class_section_config` WHERE class_id=$class_id AND id=$section_id and branch_id=$branch_id";
      $ss = mysql_query($st);	  
	  $rs = mysql_fetch_row($ss);
	  return $rs[0];	
	}
	
	$section_id =  get_section_id($class_id,$class_sec,$branch_id);
	
		
	if($roll!="") {
		$where = "WHERE class_id=$class_id AND section_id=$section_id AND MONTH='$month' AND std_id='$roll' AND branch_id=$branch_id";
	}else if($roll=="") {
		$where = "WHERE class_id=$class_id AND section_id=$section_id AND MONTH='$month' AND branch_id=$branch_id";
	}
	$str = "SELECT id,class_id,class_name,section_id,std_id,std_name,fee_head_name,category,month,amount,generation_status,checker_status,collection_status FROM `std_fee_details` ".$where;

	//echo $str;
	
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <th>Student ID </th>
							   <th>Name</th>
							   <th>Class</th>
							   <th>Section</th>
							   <th>Fee Name</th>							
							   <th>Amount</th>
							   <th>Month</th>							   
							   <th>Generating Status</th>
							   <th>Checker Status</th>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
						  $qr = mysql_query($str);		
							while ($res = mysql_fetch_array($qr)){
								$id = $res['id'];
								$classid = $res['class_id'];
								$classname = $res['class_name'];
								$sectionid = $res['section_id'];
								$section_name  = get_section_name($classid,$sectionid,$branch_id);
								$std_id = $res['std_id'];
								$std_name = $res['std_name'];
								$fee_head_name = $res['fee_head_name'];
								$category = $res['category'];
								$amount = $res['amount'];
								$generation_status = $res['generation_status'];
								$checker_status = $res['checker_status'];
								$collection_status = $res['collection_status'];
								$months = $res['month'];
								
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>$std_id</td>";
							   echo  "<td>$std_name</td>";
							   echo "<td>$classname</td>";
							   echo  "<td>$section_name </td>";				
							   echo  "<td>$fee_head_name </td>";				
							   echo  "<td>$amount</td>";
							   echo  "<td>$months</td>";
							   echo  "<td>$generation_status</td>";
							   echo  "<td>$checker_status</td>";							   							   
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
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</body>
</html>