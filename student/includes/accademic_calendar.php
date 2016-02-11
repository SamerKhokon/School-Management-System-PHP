<div  id="content" class="box"> 
<div style="width:80%;margin:0 auto;">
<?php	$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");   ?>
<table>
    <tr>
        <td>Month</td>
        <td><select id="month_year" class="styledselect-normal">
            <option value="">Select Month</option>
            <?php 
            for($i=0 ; $i<count($months) ; $i++) 
            { 
            ?>
            <option value="<?php echo $months[$i].'-'.date('Y');?>"><?php echo $months[$i].'-'.date('Y');?></option>	
            <?php 
            }            
            ?>	
        </select>
        </td>
    </tr>
</table>

<div id="ur_calendar"></div>
<input type="hidden" id="month_container" value=""/>
<div   id="ur_dialog" title="Add New Event"></div>
</div>
<link type="text/css" href="css/hot-sneaks/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $("#month_year").change(function(){
		var month_year = $("#month_year").val();		  
		//alert(month_year);
		if(month_year!="") 
		{
			$("#month_container").val(month_year);
			$.ajax({
				type:"post" ,
				url:"includes/load_calendar.php" ,
				data:"month_year="+month_year,
				success:function(st)
				{
					//alert(st);	
					$("#ur_calendar").html(st);
				}
			});  
		}
		else
		{
			$("#ur_calendar").html(" ");
		}
   });
   /*$("#calendar td").live("click",function()
	{
			var evt = $(this).text();
			var month_container= $("#month_container").val();
			if(evt != "" ) 
			{
				$.ajax({
					type:"post" ,
					url:"includes/event_add_by_ajax.php" ,
					data:"date="+evt+"&month="+month_container ,
					success:function(st)
					{
					   $("#ur_dialog").html(st);
					   $("#ur_dialog").dialog({ width:450, height:280});
					}
				});
			}
			else
			{
				alert("Select Date");
				$("#ur_dialog").html(' ');
			}
	});	
	$("#new_event_add").live("click",function()
	{
			var event_date   = $("#event_date").val();
			var event_desc  = $("#event_desc").val();
			var month_year = $("#month_container").val();		  
			var dataStr  = "event_date="+event_date+"&event_desc="+event_desc;
			$.ajax({
				type:"post" ,
				url:"includes/new_event_add_by_ajax.php" ,
				data:dataStr , 
				success:function(st){
				   alert(st);
				   $("#ur_dialog").close();
				   $("#ur_calendar").load("includes/load_calendar.php",{"month_year":month_year},function(){});
				}
			});   
			$("#ur_calendar").load("includes/load_calendar.php",{"month_year":month_year},function(){});
	});	   
	
	
	$("#inactive").live("click",function(){
		var event_date   = $("#event_date").val();		
		var month_year = $("#month_container").val();	
		if($("#inactive").is(":checked")==true) 
		{	
		   $("#event_desc").attr("disabled","disabled");			
		   $.ajax({
			  type:"post" ,
			  url:"includes/event_inactive_by_ajax.php" ,
			  data:"event_date="+event_date ,
			  success:function(st){
				 alert(st);
				$("#ur_calendar").load("includes/load_calendar.php",{"month_year":month_year},function(){});
			  }
		   });
		   $("#ur_calendar").load("includes/load_calendar.php",{"month_year":month_year},function(){});
		}else{
		   $("#event_desc").attr("disabled",false);			
		} 
		$("#ur_calendar").load("includes/load_calendar.php",{"month_year":month_year},function(){});
	});*/
});
</script>
</div>