<!-- Aside (Left Column) -->
    <div id="aside" class="box">
      <div class="padding box">
        <!-- Logo (Max. width = 200px) -->
        <p id="logo"><a href="http://www.free-css.com/"><img src="tmp/logo.gif" alt="" /></a></p>
        <!-- Search -->
        
		
		<?php
	  if (isset($_GET['menu_id']))
	   {
		   $main_manu_id=$_GET['menu_id'];
		   $query="select * from main_menu where id=$main_manu_id";	   
							   
		   $result=mysql_query($query);
		   $row=mysql_fetch_row($result);						   
?>	
		
        <!-- Create a new project -->
        <p id="btn-create" class="box"><a href="javascript:void(0);"><span><?php echo $row[1];?></span></a></p>
      </div>
      <!-- /padding -->
      <ul class="box">	  
	  <?php 	   
		if($user_type!='Admin')
			$query="select * from sub_menu1 where id in ($user_sub_menu_id1) and main_menu_id=$main_manu_id";
		else
			$query="select * from sub_menu1 where main_menu_id=$main_manu_id";
					   
		   $result=mysql_query($query);
		   $var=1;
		   $effect="";
		   $getid=$_GET['SM_id']; //SM_id1 ----for sub menu1
						   
						   
   while ($row=mysql_fetch_row($result))
   {
   
   //echo $row[0];
   //$par="id".$var;	 
   $par=$row[0];
   $class_id=$row[6];
	if (isset($_GET['SM_id']))
	{
	if ($par==$getid)
	$par="submenu-active";
	}
   
   echo "<li id=$par><a href=\"?SM_id=$par&menu_id=$main_manu_id&nev=$row[3]\">$row[1]</a>";
   
			   $sub2=$row[2];
			   if($sub2!=0 and $par=="submenu-active")
			   {
				echo "<ul>";
					
					
					if($user_type!='Admin')
					$query_sub2="select * from sub_menu2 where id in($user_sub_menu_id2) and sub_menu1_id=$getid";
					else
					$query_sub2="select * from sub_menu2 where sub_menu1_id=$getid";
					
					
					
					$result_sub2=mysql_query($query_sub2);	
					while($row_sub2=mysql_fetch_row($result_sub2))
					{
					echo "<li><a href=?SM_id=$getid&nev=$row_sub2[4]&menu_id=$main_manu_id>$row_sub2[1]</a></li>";
					}
				  echo "</ul>";
				}
				echo "</li>";
				$var=$var+1;
			}
						   
		}
	else
	{	
    					   
	   ?>
       
	   <p id="btn-create" class="box"><a href="#"><span>Home</span></a></p>
      </div>
     <?php
} ?>	 
        
      </ul>
    </div>
    
	