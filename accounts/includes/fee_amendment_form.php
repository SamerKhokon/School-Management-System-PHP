<script type="text/javascript">
$(document).ready(function(){  
    $("#fee_amendment_btn").click(function() {
			var class_id  = $("#class_id").val();			
			var month     = $("#month_id").val();
			var year      = $("#year_id").val();						
			var month_year = month+"-"+year;
			var branch_id = "<?php echo $branchid; ?>";			
			if(class_id=="") {
			 alert("Select Class");
			 return false;
			}else{
				$("#fee_amendment_table").load("includes/fee_amendment_list.php"
				,{"class_id":class_id , "month_year":month_year,
				"branch_id":branch_id},function(){}); 	 					
			}	
	});
	$("#ament_fee_check").live('click' , function(){
	       var f_id = $(this).attr('id');
			var class_id    = $("#class_id").val();			
			var month       = $("#month_id").val();
			var year        = $("#year_id").val();						
			var month_year  = month+"-"+year;
			var branch_id   = "<?php echo $branchid; ?>";					
			var parse 		= st.split('|');
			var std_id      = parse[0];
			var month_dates = parse[1];
			
			$.ajax({
			   type:"post",
			   url:"includes/amendment_for_re_check.php",			   
			   data:"std_id="+std_id+"&month_date="+month_dates ,
			   success:function(stx){
			      alert(stx);
			      $("#fee_amendment_table").load("includes/fee_amendment_list.php"
				 ,{"class_id":class_id , "month_year":month_year,
				 "branch_id":branch_id},function(){}); 	 
			   }
			});		   
	});
});
</script>
<?php require_once("../db.php"); session_start(); $branchid = $_SESSION["LOGIN_BRANCH"]; ?>
<div id="content" class="box">
       <fieldset>
		   <legend>Student Fee Amendment</legend>
			  <table  border="0" cellpadding="0" cellspacing="0">
               
			    <tr>
                   <th valign="top">Pyament for :</th>
                     <td>
                 	 <select id="month_id" name="month_name" class="styledselect-year">
				 	 <option value="<?php  echo date('M'); ?>"><?php  echo date('M') ?> </option>
				 	 <option value="Jan">Jan</option>
				 	 <option value="Feb">Feb</option>
				 	 <option value="Mar">Mar</option>
				 	 <option value="Apr">Apr</option>
				 	 <option value="May">May</option>
				  	 <option value="Jun">Jun</option>
                 	 <option value="Jul">Jul</option>
				 	 <option value="Aug">Aug</option>
				  	 <option value="Sep">Sep</option>
				  	 <option value="Oct">Oct</option>
				  	 <option value="Nov">Nov</option>
				  	 <option value="Dec">Dec</option>
		    	  	 </select>
                     <?php
			   			 $year = date("Y");
						 $pre = $year - 10;
						 $next = $year + 10;
					 ?>
                     <select id="year_id" name="year_name" class="styledselect-year">
				     <option><?php  echo $year;  ?></option>
				     <?php
				     for($i=$pre;$i<=$next;$i++)
					    {
						 echo "<option value=\"$i\">$i</option>";
						}
				 	 ?>
		   			 </select>
               		 </td>
            		 <td>
                     <div class="bubble-left"></div>
					 <div class="bubble-inner">select class</div>
					 <div class="bubble-right"></div>
                     </td>	
               </tr>        
                <tr>	
                     <th>
                     Class Name:
                     </th> 
	                 <td>   
    		         <select id="class_id" name="class_id"  class="styledselect-normal" >
                   	 <option value="">select</option>
					 <?php 
						$qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
					    while ($row=mysql_fetch_array($qry)){
							echo "<option value=\"$row[0]\">$row[1] </option>";
                        }
					 ?>
					 </select>*
                     </td> 
					 <td>
					 <div class="error-left"></div>
					 <div class="error-inner"><p id="err_rep">This field is required.</p></div>
					 </td>	
                </tr>
               
				<tr>	
                     <td>
					<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>">
					</td>
				</tr>
				
				<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
				
				<tr>	
				<td></td>
                     <td>
					<input type="button" id="fee_amendment_btn" class="form-submit"  value="Submit">
					</td>
				</tr>
				
				
		</table>	
	</fieldset>	
	
	
      <div id="fee_amendment_table"> </div>
    </div>
    <!-- /content -->