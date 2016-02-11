
 <div id="topheader">
   <div class="top_strip"><a href="#" class="signuphere">Signup here</a> <a href="#" class="freeregistration">Free Registration</a> <a href="#" class="bookmark">Bookmark this Page</a> <a href="#" class="suscribe">Suscribe Here</a> </div>
   <div class="top_search">
     <div class="searchname">
       <label>
       <input name="textfield" type="text" class="searchtextbox" value="Enter Keywords" />
       </label>
     </div>
     <div class="searchname1">
       <div align="center"><a href="#" class="go">go</a></div>
     </div>
     <div class="searchname1">
       <div align="center"><a href="#" class="advance_search">Advance Search </a></div>
     </div>
   </div>
   <div class="menu_area">
   
   
   <?php
	 
	
//	  require 'db.php';
	 
	  //$user_id=$_SESSION["user_id"];
	    
	  
	   $sql_menu="select main_menu,user_type from user_acl where user_id='$user_id'";
	   $result_menu=mysql_query($sql_menu,$mysql_connection)
	                 or die (mysql_error());	
	   $row_menu=mysql_fetch_array($result_menu);	   
	   $main_menu=$row_menu["main_menu"];
	   $user_type=$row_menu["user_type"];
		 
		
		      if ($user_type=='admin')
			   $sql="select * from main_menu";	  
			  else			  
	           $sql="select * from main_menu where id in($main_menu)";	  
	  
		      $result=mysql_query($sql,$mysql_connection)
	  
	           or die(mysql_error());
			   
	
			    //echo "<ul>";
	   
	   while($row=mysql_fetch_array($result))
	   {	   
	    $menu_name=$row["menu_name"];
		$menu_content=$row["menu_content"];	
		$menu_id=$row["menu_id"]; 
		
				 		 		
		echo	"<a href=\"./index.php?pagetitle=$menu_content&menu_id=$menu_id\"  class=\"menu\">$menu_name</a>";  		 
	   }
	
//	echo "</ul>";
	
//	mysql_close($mysql_connection);

    
 ?>

   
  <!--<a href="#" class="menu_hover">Home</a>        <a href="#" class="menu">About Us</a>        <a href="#" class="menu">Testimonials</a>        <a href="#" class="menu">Meetings</a>        <a href="#" class="menu">Support</a>        <a href="#" class="menu">Questions</a>        <a href="#" class="menu">Ideas</a>        <a href="#" class="menu">Contact Us</a>-->
   </div>
 </div>
 
 
 
 