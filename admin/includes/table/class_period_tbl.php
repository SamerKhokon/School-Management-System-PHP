<?php
	require'../db.php';     
	$branch_id=$_REQUEST['branchid'];   	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>DataTables example</title>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#example').dataTable( {
        "sPaginationType": "full_numbers",
		"aaSorting": [[ 1, "asc" ]],	
		"aoColumns": [
			null,
			null,
			null,
			null,
			{ "bSortable": false }
		]
    } );
} );
</script>
</head>
<body id="dt_example" class="example_alt_pagination">
	<div id="container">
		<div id="demo">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
            <thead>
                <tr>
                    <th>Period</th>
                    <th>Start Time</th>
                    <th>End Time</th>          
                    <th>Break</th>
                    <th>Action</th>
                </tr>
            </thead>
			<tbody>
			<?php
			$qry = mysql_query("SELECT  * from std_class_period  where branch_id='$branch_id' and flag=1 order by start_time"); 		
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
				$period_id=$row['period_id'];
				$period=$row['period'];
				$start_time=$row['start_time'];
				$end_time=$row['end_time'];
				$break_flag=$row['break_flag'];
				$break = 'No';
				if($break_flag==1)
					$break = 'Yes';
				
				
				echo  "<td >$period</td>";
				echo  "<td>$start_time</td>";
				
				echo  "<td>$end_time</td>";
				echo  "<td>$break</td>";
				
				echo "<td><a href=\"includes/action/class_period_chng.php?period=$period&sub_action=delete&branch_id=$branch_id&period_id=$period_id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"20\" /> </a><a href=\"includes/action/class_period_chng.php?period=$period&sub_action=detail&branch_id=$branch_id&period_id=$period_id\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,300)\"><img src=\"custom_css/process_info.png\" width=\"20\" /> </a><a href=\"includes/action/class_period_chng.php?period=$period&sub_action=edit&branch_id=$branch_id&period_id=$period_id\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\"><img src=\"custom_css/001_45.png\" width=\"18\" /> </a></td>";		
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
	<div class="spacer"></div>
</div>
</body>
</html>