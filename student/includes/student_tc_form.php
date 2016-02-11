<?php session_start();?>
<script type="text/javascript">
	$(document).ready(function(){			   
		$('#view_tc_info_datatable').load('includes/student_tc_form_datatable.php',{'branch_id':$("#branch_id").val()},function() {});			   			
		$("#stu_roll").keypress(function(ex){
			if(ex.which == 13)
			{
				var std_roll        = $("#stu_roll").val();
				var class_name = $("#class_name").val();
				var section         = $("#section").val();
				var branch_id    = $("#branch_id").val();
				var dataStr = 'std_roll='+std_roll+'&class_name='+class_name+
				'&section='+section+'&std_id='+'&branch_id='+branch_id;
			
				if(class_name=="") 
				{
					alert("Select class");
				  	return false;
				}
				else if(section=="") 
				{
				   	alert("Select section");
				  	return false;
				}
				else if(std_roll=="") 
				{
				  	alert("Enter roll");
				  	return false;
				}					
				else{
					$.ajax({
						type:	"post" ,
						url: 	"includes/tc_info_get_by_ajax.php" ,
						data:	dataStr,
						success:function(st)
						{
							var p = st.split(',');
							$("#stu_id").val(p[0]);
							$("#prev_status").val(p[1]);											
						}								   
					});
				}
			}							
		});
			
		$("#stu_id").keypress(function(ex){
			if(ex.which == 13) 
			{
				var class_name = $("#class_name").val();
				var section         = $("#section").val();
				var std_id          = $("#stu_id").val();				       
				var branch_id    = $("#branch_id").val();
				var dataStr = 'std_roll='+'&class_name='+class_name+
				'&section='+section+'&std_id='+std_id+'&branch_id='+branch_id;

				if(class_name="" ) 
				{
					alert("select class");
					return false;
				}
				else if(section =="") 
				{
					alert("select section");
					return false;
				}
				else if(std_id=="")
				{
					alert("Enter student ID");
					$("#stu_id").focus();
					return false;
				}
				else
				{
					$.ajax({
						type: "post" ,
					   	url:    "includes/tc_info_get_by_ajax.php" ,
					   	data: dataStr,
					   	success : function(st)
						{
							var p=st.split(',');
						  	$("#stu_roll").val(p[0]);
						  	$("#prev_status").val(p[1]);											  
						}								   
					});	
								
																
				}
			}
		});
			
		var reset_fields = function() {
			$("#stu_id").val('');
			//$("#class_name").val(0);
			//$("#section").val(0);
			$("#stu_roll").val(' ');
			$("#reason").val(' ');
			$("#tc_date").val(' ');
			$("#remarks").val(' ');
			$("#prev_status").val(' ');			
		}
			
		$("#class_name").change(function(){
			var class_id = $("#class_name").val();
			var branch_id = $("#branch_id").val();
			var dataStr = "class_id="+class_id+"&branch_id="+branch_id;
			if(class_id!="") {
				$.ajax({
					type:"post" ,
					url:"includes/section_fetch.php" ,
					data:dataStr ,
					success:function(st){ 
						//alert(st);
						$("#section").html(st);
					}
				});			       
			}else{
				$("#section").html("");
			}
		});
			
		$("#sub_btn").click(function(event)	{															
			var std_id          = $("#stu_id").val();
			var class_name = $("#class_name").val();
			var section        = $("#section").val();
			var std_roll        = $("#stu_roll").val();
			
			var reason         = $("#reason").val();
			var tc_date        = $("#tc_date").val();
			var remarks       = $("#remarks").val();
			var prev_status = $("#prev_status").val();
			var branch_id    = $("#branch_id").val();
			
			var dataStr = "std_id="+std_id+"&class_id="+class_name+"&section="+section+
			"&class_roll="+std_roll+"&reason="+reason+"&tc_date="+tc_date+"&remarks="+remarks
			+"&prev_status="+prev_status+"&branch_id="+$("#branch_id").val();
			
			if(class_name=="") {
				alert("select class");
				return false;
			}else if(section=="") {
				alert("Select section");
				return false;
			}else if(std_roll=="") {
				alert("Enter roll");
				$("#stu_roll").focus();
				return false;
			}else if(reason=="") {
				alert("Enter reason");
				$("#reason").focus();
				return false;
			}else if(tc_date=="") {					 
				alert("Enter tc date");
				$("#tc_date").focus();
				return false;
			}else if(remarks=="") {
				alert("Enter remarks");
				$("#remarks").focus();
				return false;
			}else if(prev_status=="") {
				alert("Enter previuser status");
				return false;
			}else 
			{
				//alert(dataStr); 
			
				$.ajax({
					type:"post" ,
					url: "includes/student_tc_form_by_ajax.php" ,
					data:dataStr ,
					success:function(st){
						alert(st);
						reset_fields();
						$('#view_tc_info_datatable').load('includes/student_tc_form_datatable.php',{'branch_id':$("#branch_id").val()}, function() {});			   					   									
					}
				});
			}
		});														
	});	
</script>

<div id="content" class="box">
<?php require_once("../db.php"); 
$branchid=$_SESSION['LOGIN_BRANCH'];?>

<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
<fieldset class="login">
    <legend>Student TC</legend>
    <table width="100%" border="0" cellpadding="0"  cellspacing="0">
        <tr>
            <th valign="top">Class Name: &nbsp;&nbsp;</th>
            <td>				
            <select id="class_name" name="class_name" class="styledselect-normal">
            	<option value="">Select Class</option>
				<?php 
                echo $sql = "select id,class_name from std_class_config where branch_id=$branchid";
                $qry = mysql_query($sql); 				
                while ($row=mysql_fetch_array($qry))		
                {
	                echo "<option value=\"$row[0]\">$row[1]</option>";
                }
                ?>
            </select>
            </td>
            <th valign="top">Section: &nbsp;&nbsp;</th>
            <td>
            <select id="section" class="styledselect-normal" >
            </select>
            </td>									
            <th valign="top">Roll: &nbsp;&nbsp;</th>
            <td><input type="text" id="stu_roll" class="inp-form"/></td>	
        </tr>
        <tr>
            <th valign="top">Reason: &nbsp;&nbsp;</th>
            <td><textarea  id="reason" ></textarea></td>
            <th valign="top">TC Date: &nbsp;&nbsp;</th>
            <td><input type="text" onclick='scwShow(this,event);'  class="inp-form" id="tc_date" name="tc_date" value="<?php 	echo date('d-m-Y') ?>" readonly="readonly" />
            </td>	
            <th valign="top">ID: &nbsp;&nbsp;</th>
            <td> <input type="text" id="stu_id" class="inp-form"/></td>									
            <td>&nbsp;</td><td>&nbsp;</td>
        </tr>		
        <tr>
            <th valign="top">Remarks: &nbsp;&nbsp;</th>
            <td><textarea id="remarks" ></textarea>				</td>
            <th valign="top">Status: &nbsp;&nbsp;</th>
            <td>
            <input type="text" class="inp-form" id="prev_status"/>
            </td>	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        </tr>		
        <tr>
	        <td height="8"></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td valign="top">
            <input type="button" value="" name="submit" class="form-submit" id="sub_btn" />
            <!--	<input type="button" value="" name="reset" class="form-reset"  />
            -->
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        </tr>
    </table>
	<br/><br/><br/>
	<div id="view_tc_info_datatable"></div>
	</fieldset>
</div>