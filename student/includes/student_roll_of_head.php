<script type="text/javascript">
 $(document).ready(function(){			   
    $('#example').dataTable( {
		"sPaginationType": "full_numbers"				
    });			   
	 $("#class_name").focus();										  
     $("#class_name").keydown(function(event)    {
	     if(event.keyCode == 13 )	{
	 		$("#sec_name").focus();
		}									
	});
	$("#sec_name").keydown(function(event)    {
		 if(event.keyCode == 13 )	{
			 $("#month_id").focus();
		}									
	});
	$("#month_id").keydown(function(event)     {
		 if(event.keyCode == 13 )	{
				 $("#year_id").focus();
		}									
	});
	$("#year_id").keydown(function(event)	     {
		 if(event.keyCode == 13 ){
				 $("#sub_btn").focus();
		}
	});									
	$("#sub_btn").click(function(event)	  {									
		//var class_name=$("#class_name").val();
 	    //var sec_name  =$("#sec_name").val();
	});
});	
</script>

<div id="content" class="box">
<legend>Details for each fee of student</legend>
<table width=100% id="jq_tbl">	
<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		  <th>Class Name</th>          
          <th>Section Name</th>
          <th>Month </th>
		  <th>Fee Name</th>	 
		  <th>Roll</th>        		
		</tr>
	</thead>
	<tbody>
 <?php
 //$url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
      $class_id=$_REQUEST['class_id'];
   	  $sec_name=$_REQUEST['section_name'];
	  $month_name=$_REQUEST['month_name'];
	  $year_id=$_REQUEST['year_name'];	
	    function month_to_num($month_id)   {
				 if($month_id=='Jan'){ return '01' ; }
				 if($month_id=='Feb'){ return '02' ; }
				 if($month_id=='Mar'){ return '03' ; }
				 if($month_id=='Apr'){ return '04' ; }
				 if($month_id=='May'){ return '05' ; }
				 if($month_id=='Jun'){ return '06' ; }
				 if($month_id=='Jul'){ return '07' ; }
				 if($month_id=='Aug'){ return '08' ; }
				 if($month_id=='Sep'){ return '09' ; }
				 if($month_id=='Oct'){ return '10' ;}
				 if($month_id=='Nov'){ return '11' ;}
				 if($month_id=='Dec'){ return '12' ;}						
 	    }
		   //$mon_id=month_to_num($month_name);
		  $month_id=month_to_num($month_name)."-".$year_id;		  
		  $month_nam=$month_name."-"."$year_id";		
		//  $mon_id=date('m-Y',month_id);					   
	 
	 $qu="select id from std_class_section_config where class_id='$class_id' and section_name='$sec_name'  and branch_id='$branchid'";
	$q=mysql_query($qu);
	$r=mysql_fetch_array($q);
	$sec_id=$r['id'];	 

		if (isset($_POST['submit'])){ 
			//echo $qry = "select fee_head_name,sum(amount),class_name from std_fee_details where class_id='$class_id' and section_id='$sec_id' and branch_id='$branchid' and month='$month_id' group by fee_head_name";
			$qry="select fee_head_name,sum(amount),class_name from std_fee_details where class_id='$class_id' and section_id='$sec_id' and branch_id='$branchid' and month='$month_nam' group by fee_head_name";
	  
			$qr=mysql_query($qry);
			$count=1;
			$total_amount=0;
		
			while ($row=mysql_fetch_array($qr)){
				$mod=$count%2;
				if ($mod==0)	{
				echo "<tr>";
				}else	{
				echo "<tr class=\"bg\">";
				}
		   
				  $class_name=$row['class_name'];
				  $head_name=$row[0];
				  $amount=$row[1];		  
				  $total_amount=$total_amount+$amount;		  
				  $class_name=$row[2];
					echo  "<td>$class_name</td>";
					echo  "<td>$sec_name</td>";
					echo  "<td>$month_name</td>";
					echo   "<td><a href= \"$url\">$head_name</a></td>";
					echo  "<td>$amount</td>";
					echo "</tr>";
					$count++;
			}			
		}			
?>   
	</tbody>
	<tfoot>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		    <th></th>
			<th align="center">Total:<?php echo $total_amount; ?></th>
		<!--	<th>&nbsp;</th> -->
		</tr>
        		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		    <th>&nbsp;</th>
			<th>&nbsp;</th>
		<!--	<th>&nbsp;</th> -->
		</tr>
	</tfoot>
</table>
			</div>
		</table>
</div>