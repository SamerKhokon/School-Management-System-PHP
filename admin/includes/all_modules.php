<?php
			include("db.php");
			
			
			
			$str = "SELECT * FROM `tbl_modules`";
			$sql = mysql_query($str);
?>		
	
<table>
<tr>
   <td>Folder name</td>
   <td>Module name</td>
   <td>Order Id</td>
</tr>
<?php	while($res = mysql_fetch_array($sql) ) {
					 $id 					= $res[0];
					 $folder_name   = $res[1];
					 $module_name = $res[2];
					 $order_id         = $res[3];
			?>	 
				 <tr>
				   <td><?php echo $folder_name ;   ?></td>
				   <td><?php echo $module_name ; ?></td>
				   <td><?php echo $order_id;          ?></td>
				 </tr>
 <?php  } ?>
</table>
