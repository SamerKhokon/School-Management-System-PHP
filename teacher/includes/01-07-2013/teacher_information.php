<script type="text/javascript">
$(document).ready(function(){			  
    $('#example').dataTable( {
		"sPaginationType": "full_numbers"	
	});			   
	$("#class_name").focus();										  
	$("#class_name").keydown(function(event)  {
	    if(event.keyCode == 13 ) {
	 		$("#sec_name").focus();
 	    }									
	});
	$("#sec_name").keydown(function(event)   {
		if(event.keyCode == 13 ){
			$("#sub_btn").focus();
		}
	});									
	$("#sub_btn").click(function(event) {									
		//var class_name=$("#class_name").val();
		//	var sec_name  =$("#sec_name").val();
	});														
});	
</script>
<div id="content" class="box">
<?php require_once("../db.php");
session_start();
$branchid = $_SESSION["LOGIN_BRANCH"];
 ?>

<fieldset class="login">
<legend>Teacher Details</legend>

<table width=100% id="jq_tbl">	
<div id="demo">
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		  <th>Name</th>   
          <th>Code</th>      
          <th>Mobile </th>
		  <th>Email</th>
		  <th> Subject</th>  
		  <th>Status</th>   
          <th>Salary</th>     
	
		<!--  <th>Action&nbsp&nbsp</th>-->
		</tr>
	</thead>
	<tbody>
 <?php
 
 


 
$qry = mysql_query("SELECT  * from std_teacher_info where branch_id='$branchid'");
		$count=1;
		while ($row=mysql_fetch_array($qry)){
			$mod=$count%2;
			if ($mod==0){
			echo "<tr>";
			}else {
			echo "<tr class=\"bg\">";
			}
			  $tid = $row['id'];
			  $teacher_name=$row['teacher_name'];
			  $teacher_code=$row['teacher_code'];
			  $mobile=$row['mobile'];
			  $email=$row['email'];
			  $subject=$row['subject'];
			  $present_status=$row['present_status'];
			  $salary=$row['basic'];
			   $url='?SM_id='.$_REQUEST['SM_id'].'&tid='.$tid.'&menu_id='.$_REQUEST['menu_id'].'&nev=teacher_view_form';

			echo  "<td><a href='" .$url. "' targer='_blank'>$teacher_name</a></td>";
			echo  "<td>$teacher_code</td>";
			echo  "<td>$mobile</td>";
			echo  "<td>$email</td>";	
			echo  "<td>$subject</td>";
			echo  "<td>$present_status</td>";
			echo  "<td>$salary</td>";		
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
		</tr>
	</tfoot>
</table>
			</div>
		</table>	
</fieldset>
</div>