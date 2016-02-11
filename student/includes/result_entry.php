<!-- Content (Right Column) -->    
<script type="text/javascript">
i=0;
$(document).ready(function(){  
  $('input,select').keydown(function(key){
        if(key.which==13)	{
	    		
				if($(this).attr('id')=="100")				
					$('#101').focus();
				else if($(this).attr('id')=="101")
					$('#102').focus();
				else if($(this).attr('id')=="102")
					$('#103').focus();
				else if($(this).attr('id')=="103")
					$('#104').focus();
				else if($(this).attr('id')=="104")
					$('#105').focus();
				else if($(this).attr('id')=="105")				
					$('#150').focus();					
                else if($(this).attr('id')=="106")				
					$('#107').focus();
				else if($(this).attr('id')=="107")
					$('#108').focus();					
				else if($(this).attr('id')=="108")
					$('#109').focus();					
				else if($(this).attr('id')=="109")
					$('#110').focus();					
				else if($(this).attr('id')=="110")
					$('#111').focus();								
				else if($(this).attr('id')=="111")
				$('#112').focus();								
				else if($(this).attr('id')=="112")
					$('#151').focus();
				else if($(this).attr('id')=="114")
					$('#115').focus();
				else if($(this).attr('id')=="115")
					$('#116').focus();					
				else if($(this).attr('id')=="116")
					$('#117').focus();					
				else if($(this).attr('id')=="117")
					$('#118').focus();					
				else if($(this).attr('id')=="118")
					$('#119').focus();
				else if($(this).attr('id')=="119")				
					$('#152').focus();
			}
        });  
		$("button").click(function(){    
			if($(this).attr('id')=="150"){
					$("#load100").load('includes/result_add.php');
					$("#100").focus();
			}else if($(this).attr('id')=="151"){
					$("#load101").load('includes/result_add.php');
					$("#8").focus();
			}else if($(this).attr('id')=="152"){
					$("#load102").load('includes/result_add.php');
					$("#16").focus();
			}	
		 });
});
</script>
	<div id="content" class="box">	
	  <h3 class="tit">Result Information</h3>
	        <div class="tabs box">
                <ul>		
					<?php 
							$qry = mysql_query("select exam_name from std_exam_config where prefix='t' group by exam_name"); 							
							while ($row=mysql_fetch_array($qry))		{
									echo "<li><a href=\"#$row[0]\"><span>$row[0]</span></a></li>";
							}
					?>						  
               </ul>
            </div>
				  <?php
								  $qry2 = mysql_query("select exam_name from std_exam_config where prefix='t' group by exam_name"); 		
								  $id         = 100;
								  $bt_id     = 150;
								  $load_id  = 100;
								  while ($row2 = mysql_fetch_array($qry2))	{
									echo "<div id=\"$row2[0]\">";
					?>
			
			
			
	            <fieldset class="login">
				        <table>
						    
						</table>				
                </fieldset>  							
<!--			
		      Section <select id="<?php echo $id;?>" style="width:150px" name='section'>
							<option value="1" selected="selected">A</option>
							<option value="3">B</option>
							<option value="7">C</option>				
    			</select>	  
				
				<?php echo $id;?>
	  
				  Subject <select id="<?php echo $id++;?>" style="width:150px" name='subject'>
							<option value="1" selected="selected">Bangla</option>
							<option value="3">English</option>
							<option value="7">Math</option>				
						</select>
				  <?php echo $id;?>
	  <p>
				  Roll<input type="text" id="<?php echo $id++;?>"/>
				  <?php echo $id;?>
				  Name<input type="text" name="4" id="<?php echo $id++;?>" value=0>
				  <?php echo $id;?>
	  <p>
	
				  CT/ST<input type="text" name="5" id="<?php echo $id++;?>" value=0>
				  <?php echo $id;?>  	  
				  Objective<input type="text" name="6" id="<?php echo $id++;?>" value=0>	  
				  <?php echo $id;?>
				  Subjective<input type="text" name="7" id="<?php echo $id++;?>" value=0>  	  
				  <?php echo $id;?>
				  <button id="<?php echo $bt_id;?>">submit</button>				  
				  <?php echo $bt_id;?>
	  -->	  
				<div id="<?php echo "load".$load_id;?>"></div>		
	  
	   <?php
				   $id++;
				   $bt_id++;
				   $load_id++;
				   echo "</div>";
	   }		
	   ?>
    </div>
    <!-- /content -->