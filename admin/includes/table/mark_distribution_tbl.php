<?php   require'../db.php';        	?>
 <html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />		
		<title></title>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"				
				});
			});
		</script>		
	</head>
	<body id="dt_example" class="example_alt_pagination">
		<div id="container">
		
				<div id="demo">
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
	      <th>Class</th>
          <th>Subjective</th>
		  <th>Objective</th>
		  <th>CT</th>
		  <th>Total</th>
		  <th>&nbsp;</th>          
		</tr>
	</thead>
	<tbody>
 
 <?php
		$st = "SELECT * FROM `tbl_class_exam_mark_distribution`";
		$qry = mysql_query($st); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
		{
			$mod=$count%2;								
			if ($mod==0)
			{
				echo "<tr>";
			}
			else
			{
				echo "<tr class=\"bg\">";
			}

		  $id=$row['id'];
		  $class_name=$row['class_id'];
		  $ob=$row['OB_total'];
		  $sb=$row['SB_total'];
		  $ct=$row['CT_total'];
          $tot = $ob+$sb+$ct;
		  
		echo  "<td>Class-".$class_name."</td>";	
		echo  "<td>$sb</td>";
		echo  "<td>$ob</td>";
		echo  "<td>$ct</td>";
		echo  "<td>$tot</td>";
		
		?>
		
		<td>
			<a href="includes/action/mark_config_chng.php?id=<?php echo $id;?>&class_id=<?php echo $class_name;?>&sub_action=delete&sb=<?php echo $sb;?>&ob=<?php echo $ob;?>&ct=<?php echo $ob;?>&tot=<?php echo $tot;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)">
			<img src="custom_css/delete_image.png" width="20" /> </a>
			<a href="includes/action/mark_config_chng.php?id=<?php echo $id;?>&class_id=<?php echo $class_name;?>&sub_action=detail&sb=<?php echo $sb;?>&ob=<?php echo $ob;?>&ct=<?php echo $ob;?>&tot=<?php echo $tot;?>" id="img2"  onclick="return GB_showCenter('Detail Data', this.href,250,550)">
			<img src="custom_css/process_info.png" width="20" /> </a>
			<a href="includes/action/mark_config_chng.php?id=<?php echo $id;?>&class_id=<?php echo $class_name;?>&sub_action=edit&sb=<?php echo $sb;?>&ob=<?php echo $ob;?>&ct=<?php echo $ob;?>&tot=<?php echo $tot;?>" id="img1"  onclick="return GB_showCenter('Edit Data', this.href,250,450)">
			<img src="custom_css/001_45.png" width="18" /> </a>
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
			<th>&nbsp;</th>			
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			
		
			</div>
	</body>
   
</html>