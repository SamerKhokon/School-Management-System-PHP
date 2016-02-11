<div id="menu" class="box">
    <ul class="box f-right">
	            <?php   


              /*				$sss = "SELECT id,file_name,main_name FROM main_menu WHERE file_name='ref_home'";
				                $sst = mysql_query($sss);
							    $rst  = mysql_fetch_row($sst);
								
								$fid  = $rst[0];
								$fname   = $rst[1];
								$mname = $rst[2]; */
				?>
                 <li><a href="dashboard.php">
				 <span><strong>Module list  &raquo;</strong></span></a></li>
	  
	  
    </ul>
    <ul class="box">
	
	<?php   /*
    //$menu_stat=$_GET['menu_status'];		
	if (strtolower($user_type)=='user') 	{
	   $query_head="select * from main_menu where id in (11,12,1,3,6) order by ordering";
	}else if( strtolower($user_type) == 'user' ) {
	   $query_head="select * from main_menu order by ordering";	
	}
	
	$result_head=mysql_query($query_head);	
	while ($row_head=mysql_fetch_row($result_head))	{	
	   //echo "<li id=\"$_GET['menu_status']\"><a href=\"index.php?menu_status=menu-active\"><span>".$row[1]."</span></a></li>";
	   echo "<li><a href=\"?menu_id=$row_head[0]&nev=$row_head[2]\"><span>";
	   echo $row_head[1];
       echo "</span></a></li>";	   	   
	}	*/	
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
