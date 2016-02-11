<script type="text/javascript">
  $(document).ready(function()  {
        $('#stu_id').focus(); 
		$("#fee_collection_btn").click(function() 
		{
		        var month_id     = $('#month_id').val();
				var year_id        = $('#year_id').val();
				var month_year = month_id+'-'+year_id;
                var stu_id   = $("#stu_id").val();
				var branchid    = $('#branchid').val();
				
				var dataStr = 'month_year='+month_year+
							'&stu_id='+stu_id+'branch_id='+branchid;
				
				if(month_id=="") {
				   alert("select month");
				   return false;
				}else if(year_id==""){
				  alert("select year");
				  return false;
				}else if(stu_id==""){
				   alert("Enter Student ID");
				   $("#stu_id").focus();
				   return false;
				}
				else
				{						
				    //alert(dataStr);
					
					$("#fee_collection_table").load(
					"includes/fee_collection_table_by_ajax.php",
					{
						"month_year":month_year ,
						"stu_id":stu_id  ,								
						"branchid":branchid
					}
					,function(){ });
						
					$('#stu_id').focus();		
				}									
		});
		
		$("#fee_paid_btn").live("click" , function(){
		   
			var month_id     = $('#month_id').val();
			var year_id        = $('#year_id').val();
			var month_year = month_id+'-'+year_id;
            var stu_id   = $("#stu_id").val();
			var branchid    = $('#branchid').val();	
			var dataStr = 'month_year='+month_year+
					'&stu_id='+stu_id+'&branchid='+branchid;			

			$.ajax({
			   type:"post" ,
			   url:"includes/fee_collect_pay_by_ajax.php" ,
			   data: dataStr ,
			   success:function(st) {
			        alert(st);
				    $("#fee_collection_table").load(
					"includes/fee_collection_table_by_ajax.php",
					{
						"month_year":month_year ,
						"stu_id":stu_id  ,								
						"branchid":branchid
					}
					,function(){ });	
                $("#fee_paid_btn").fadeIn().fadeOut('slow');					
			   }
			});
			
	
		});
  });
</script>
<div id="content" class="box">
<?php require_once("../db.php"); session_start(); $branchid = $_SESSION["LOGIN_BRANCH"]; ?>
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
	  <fieldset><legend>Student Fee Collection</legend>
		<table width="50%"  border="0" cellpadding="0" cellspacing="0">	 
			<tr>								
			   <th>Month : </th>
			   <td>
				   <select id="month_id" class="styledselect-month">
					<option value="<?php echo date('M');?>"> <?php echo date('M');?></option>			             
					<?php  $months  = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"); 
						   for($i=0;$i<count($months);$i++) {
					?>
					<option value="<?php echo $months[$i];?>"> <?php echo $months[$i];?></option>
					<?php } ?>  				 
				   </select>
			   
					<select id="year_id" class="styledselect-month">
					   <option value="<?php echo date('Y');?>"> <?php echo date('Y');?></option>
					  <?php for($i=1980;$i<=2030;$i++){ ?>
					   <option value="<?php echo $i;?>"><?php echo $i;?></option>
					  <?php  } ?>
					</select>			   
			   </td>			   
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			<tr>
				<td>ID</td>
				<td><input type="text" class="inp-form" id="stu_id"/></td>
			</tr>
			<tr><td colspan="4">&nbsp;</td></tr>
			<tr>	
				 <td>&nbsp;</td>
				 <td> <button type="button"  class="form-submit" id="fee_collection_btn">Fee Collection</button> </td>
				 <th colspan="2">&nbsp;</th> 
			</tr>										
          </table>		
		  
		  <br/><br/><br/>
         				<div  id="fee_collection_table"></div>
            </fieldset>	
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->