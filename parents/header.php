<div id="menu" class="box">
    <ul class="box f-right">
 <?php  
		require_once('../db.php');
		$main_menu_str = "SELECT id,main_name FROM main_menu WHERE flag='parents_home'"; 
		$main_menu_sql = mysql_query($main_menu_str);      
		$main_menu_res = mysql_fetch_row($main_menu_sql);
		$fid        = $main_menu_res[0];
		$fname 		= $main_menu_res[1];
 ?>
	  
     <!-- <li><a href="../dashboard.php"><span><strong><?php //echo $fname;?> &raquo;</strong></span></a></li>-->
    </ul>
    <ul class="box">	
	<?php 
	if (strtolower($user_type)=='parents')		 
	{
		$query_head="select * from main_menu where flag='parents' order by order_id asc";
	}	
	
	$result_head=mysql_query($query_head);	
	while ($row_head=mysql_fetch_row($result_head))	
	{	
	   echo "<li><a href=\"javascript:void(0);\" class=\"main_menu_link\" id=\"$row_head[0]\"><span>";
	   echo $row_head[1];
       echo "</span></a></li>";	   	   
	}		
	?> 
  </ul>
  </div>
  <input type="hidden" id="main_menu_container" value=""/>
  <script type="text/javascript">
	$(document).ready(function()
	{
		$(".main_menu_link").click(function(){
			var link_id = $(this).attr("id");
			$("#main_menu_container").val(link_id);
			$("#left_menu").load("left.php",{'menu_id':$("#main_menu_container").val()});
		});
	
		$(".sub_menu_link").live('click',function(){	
			var link_id = url = $(this).attr("id");
			var main_menu_id = $("#main_menu_container").val();
			load_content_div(url,main_menu_id);		
			$(".sub_menu_link").each(function()
			{
				if($(this).attr("id")!=link_id)
				{
					$(this).css({'background-color':'#eaeaea','color':'#000'});
				}
				else
				{
					$(this).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
					$(this).css({'background-color':'#DF0000','color':'#fff'});	
				}	
			});		
		});
		var load_content_div = function(url,main_menu_id)
		{
			$("#ur_content").load("includes/"+url+".php",function(){});		
		}	
	});
  </script>