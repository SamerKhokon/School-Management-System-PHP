<h3>Site Index</h3>
<ul>

   <?php

				require 'db.php';
				
				if (isset($_GET['menu_id']))
				
		
				$menu_id=$_GET['menu_id'] ;
				  
				   
					  $sql_menu="select sub_menu1,user_type from user_acl where user_id=$user_id";
					  $result_menu=mysql_query($sql_menu,$mysql_connection);
										
					   $row_menu=mysql_fetch_array($result_menu);	   
					   $sub_menu=$row_menu["sub_menu1"];
					   $user_type=$row_menu["user_type"];
					   
				 
						   if ($user_type=='super')
							    $sql="select * from sub_menu1 where main_menu_id=$menu_id";	  
							 else			  
							   $sql="select * from sub_menu1 where main_menu_id=$menu_id and sub_menu_id in($sub_menu) order by sub_menu_id asc";	  
							   $result=mysql_query($sql,$mysql_connection)
							   or die(mysql_error()); 
							   
					
						
						
						
						$count=0;	
					   while($row=mysql_fetch_array($result))
					   {	   
						$sub_menu_name=$row["sub_menu_name"];
						$sub_menu_content=$row["sub_menu_content"];	
						$sub_menu_id=$row["sub_menu_id"];
						
						
						
						
							 
						echo "<li><a href=./index.php?pagetitle=$sub_menu_content&sub_menu_id=$sub_menu_id&menu_id=$menu_id>                        $sub_menu_name</a></li>";  
						
						$count++;		 
					   }
					  
					
			
				mysql_close($mysql_connection);
				
			?>

</ul>