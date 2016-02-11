<div id="menu" class="box">
    <ul class="box f-right">
      <li><a href="#"><span><strong>Visit Site &raquo;</strong></span></a></li>
    </ul>
    <ul class="box">
	
	<?php 
  
    //$menu_stat=$_GET['menu_status'];	
	
//	   $sql_menu="select * from user_acl where user_id=$user_id";
	   $sql_menu="select user_type,(select main_menu from user_acl_group where id=user_group_id ) as main_menu,(select sub_menu1 from user_acl_group where id=user_group_id ) as sub_menu1 from user_info where login_id=$user_id";
	   $result_menu=mysql_query($sql_menu);
	                 
	    $row_menu=mysql_fetch_array($result_menu);	   
	    $main_menu=$row_menu["main_menu"];
	    $user_type=$row_menu["user_type"];
		$user_sub_menu_id1=$row_menu["sub_menu1"];
		
	
	if ($user_type!='Admin')	
	$query_head="select * from main_menu where id in ($main_menu) order by ordering";
	else
	$query_head="select * from main_menu order by ordering";	
	
	$result_head=mysql_query($query_head);	
	while ($row_head=mysql_fetch_row($result_head))
	
	{	
	   //echo "<li id=\"$_GET['menu_status']\"><a href=\"index.php?menu_status=menu-active\"><span>".$row[1]."</span></a></li>";
	   echo "<li><a href=\"?menu_id=$row_head[0]&nev=$row_head[2]\"><span>";
	   echo $row_head[1];
       echo "</span></a></li>";	   	   
	}
		
	?>
	
  <!--
      <li id="menu-active"><a href="http://www.free-css.com/"><span>Lorem ipsum</span></a></li>  
      <li><a href=""><span>Class Information</span></a></li>
      <li><a href=""><span>Result information</span></a></li>
      <li><a href=""><span>sss</span></a></li>
      <li><a href=""><span>Lorem ipsum</span></a></li>
      <li><a href=""><span>Lorem ipsum</span></a></li>
      <li><a href=""><span>Lorem ipsum</span></a></li>
    -->
  
  </ul>
  </div>
