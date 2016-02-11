<?php	include('db.php');
			$str = mysql_query("SELECT * FROM`tbl_menu_group`");			
?>			
<table>			
<?php	while($res = mysql_fetch_array($str) )    {
			   $id                          = $res[0];
			   $user_name             = $res[1];
			   $password                = $res[2];
			   $main_menu_id         = $res[3];
			   $sub_menu1              = $res[4];
			   $sub_menu2              = $res[5];
			   $branch_id                 = $res[6];
			   $class_id                    = $res[7];
			   $subject_id                 = $res[8];
			   $other                        = $res[9];
			   $regdate                     = $res[10];
			   $reg_expire                 = $res[11];
			   $access_permission    = $res[12];
			   $module_permission    = $res[13];	
?>			   
			<tr>
				  <!--<td><?php // echo  $id ;                  ?></td>-->
				   <td><?php echo  $user_name ;            ?></td>
				   <td><?php echo  $password ;               ?></td>
				   <td><?php echo  $main_menu_id ;        ?></td>
				   <td><?php echo  $sub_menu1 ;            ?></td>
				   <td><?php echo  $sub_menu2 ;            ?></td>
				   <td><?php echo  $branch_id ;              ?></td>
				   <td><?php echo  $class_id ;                 ?></td>
				   <td><?php echo  $subject_id ;              ?></td>
				   <td><?php echo  $other  ;                    ?></td>   
				   <td><?php echo  $regdate  ;                 ?></td>
				   <td><?php echo  $reg_expire ;              ?></td>
				   <td><?php echo  $access_permission ; ?></td>
				   <td><?php echo  $module_permission  ;?></td>
			 </tr>
<?php 	
        }
?>
</table>