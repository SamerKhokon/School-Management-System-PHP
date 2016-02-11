<html>
<head>
<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
		
		
		$("#authenticate_single_student").click(function(){
			var student_id	= $("#student_id").val();
			var	student_name= $("#student_name").val();
			var	class_id	= $("#class_id").val();
			var	classs		= $("#class").val();
			var	amount		= $("#amount").val();
			var	secid		= $("#secid").val();
			var	sec			= $("#sec").val();
			var	month	    = $("#month").val();
			var	branch      = $("#branch").val();		  
		    var dataStr = "student_id="+student_id+"&student_name="+student_name+
			"&class_id="+class_id+"&classs="+classs+"&amount="+amount+"&secid="+secid+
			"&sec="+sec+"&month="+month+"&branch="+branch;
			
			$.ajax({
			  type:"post" ,
			  url:"includes/fee_authenticate_single_student.php" ,
			  data:dataStr ,
			  success:function(st){
			    // alert(st);
			     alert(st);
				 location.reload();
			  }
			});
			
			//alert(dataStr);
		  
		});
		
		
	});	
</script>
</head>
<body>		
<?php
	require_once('../db.php');
	global $str;
	
	
		   $std_id     = $_GET['std_id'];
		   $std_name   = $_GET['name'];
		   $classid    = $_GET['class_id'];
		   $class_name = $_GET['class'];
		   $amount     = $_GET['amount'];
		   $sectionid  = $_GET['secid'];
		   $section    = $_GET['sec'];
		   $months     = $_GET['month'];
		   $branch_id  = $_GET['branch'];
						
	
	
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
	
		
	if($std_id!="") {
		$where = "WHERE class_id=$classid AND section_id=$sectionid AND MONTH='$months' AND std_id='$std_id' AND branch_id=$branch_id";
	}else if($std_id=="") {
		$where = "WHERE class_id=$classid AND section_id=$sectionid AND MONTH='$months' AND branch_id=$branch_id";
	}
	$str = "SELECT id,class_id,class_name,section_id,std_id,std_name,fee_head_name,category,month,amount,generation_status,checker_status,collection_status FROM `std_fee_details` ".$where;

	//echo $str;
	
?>
<div id="content" class="box">



		<input type="hidden" id="student_id"  value="<?php echo  $_GET['std_id'];?>"/>
		<input type="hidden" id="student_name"  value="<?php echo  $_GET['name'];?>"/>
		<input type="hidden" id="class_id"  value="<?php echo  $_GET['class_id'];?>"/>
		<input type="hidden" id="class"  value="<?php echo  $_GET['class'];?>"/>
		<input type="hidden" id="amount"  value="<?php echo  $_GET['amount'];?>"/>
		<input type="hidden" id="secid"  value="<?php echo  $_GET['secid'];?>"/>
		<input type="hidden" id="sec"  value="<?php echo  $_GET['sec'];?>"/>
		<input type="hidden" id="month"  value="<?php echo  $_GET['month'];?>"/>
		<input type="hidden" id="branch"  value="<?php echo  $_GET['branch'];?>"/>




<input type="button" value="Authenticate" id="authenticate_single_student"/>
<br/><br/>
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
	
	
	 <br/>
      <a href="?SM_id=11&nev=payment_check&menu_id=22">
	  <input type="button" value="Back" />
	  </a>
</body>
</html>
   
</div>