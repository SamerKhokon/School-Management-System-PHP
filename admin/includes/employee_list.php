<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>		
<div id="content" class="box" style="border:0px;">
<?php
	 require_once("../db.php"); 
  session_start();
	$branchid = $_SESSION['LOGIN_BRANCH']; 

	$str = "SELECT empid,NAME,join_date,address,mobileno FROM `tbl_emp_salary_sturcture` order by empid desc";	
	 
	//$sql = mysql_query($str);	
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <th>Name</th>
							   <th>Address</th>
							   <th>Mobileno</th>
							   <th>Join Date</th>
							   <th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
						  $qr = mysql_query($str);		
							while ($res = mysql_fetch_array($qr)){
							    $id 		  = $res[0];
								$name   = $res[1];
								$join_date	      = $res[2];
								$address   = $res[3];
								$mobile = $res[4];
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	    ?>
							   <td><?php echo $name;?></td>
							   <td><?php echo $address;?></td>
							   <td><?php echo $mobile;?></td>
							   <td><?php echo $join_date;?></td>
							<td>
								<a href="includes/action/employee_list_chng.php?id=<?php echo $id;?>&sub_action=delete&name=<?php echo $name;?>&mobile=<?php echo $mobile;?>&address=<?php echo $address;?>&join_date=<?php echo $join_date;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)"><img src="custom_css/delete_image.png" width="20" /> </a>
								<a href="includes/action/employee_list_chng.php?id=<?php echo $id;?>&sub_action=detail&name=<?php echo $name;?>&mobile=<?php echo $mobile;?>&address=<?php echo $address;?>&join_date=<?php echo $join_date;?>" id="img2"  onclick="return GB_showCenter('Detail Data', this.href,250,550)"><img src="custom_css/process_info.png" width="20" /> </a>
								<a href="includes/action/employee_list_chng.php?id=<?php echo $id;?>&sub_action=edit&name=<?php echo $name;?>&mobile=<?php echo $mobile;?>&address=<?php echo $address;?>&join_date=<?php echo $join_date;?>" id="img1"  onclick="return GB_showCenter('Edit Data', this.href,250,450)"><img src="custom_css/001_45.png" width="18" /> </a>
							</td>							   
<?php							   
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
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</div>