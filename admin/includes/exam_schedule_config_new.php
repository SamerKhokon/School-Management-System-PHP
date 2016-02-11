<?php require_once("../db.php"); 
  session_start();
  $branchid = $_SESSION["LOGIN_BRANCH"]; 
$academic_year = date('Y');
//$msg = '';
//if(isset($_REQUEST['msg']))
	//$msg = $_REQUEST['msg'];
?>
<script type="text/javascript">
$(document).ready(function(){
	//setTimeout( function(){jQuery('#sp_action').hide();}, 5000 );
	$("#exam_name").focus();
									
	//$("#list").load('includes/table/exam_config_new_tbl.php');
	$("#exam_name").keydown(function(event)
	{
		if(event.keyCode == 13 )
		{
			if($("#exam_name").val()=="")
			{
				$("#err_rep_1").fadeOut(200);
				$("#err_rep_1").fadeIn(1200);
			}
			else
			{
				$("#exam_date").focus();
			}
		}
	});
	$("#exam_date").keydown(function(event)
	{
		if(event.keyCode == 13 )
		{
			if($("#exam_date").val()=="")
			{
				$("#err_rep_1").fadeOut(200);
				$("#err_rep_1").fadeIn(1200);
			}
			else
			{
				$("#go_btn").focus();
			}
		}
	});
	$("#go_btn").click(function(event)
	{
		var exam_id = $("#exam_name").val();
		var exam_date = $("#exam_date").val();
		var academic_year = $("#academic_year").val();
		if(exam_id=='')
		{
			$("#err_rep_1").fadeOut(200);
			$("#err_rep_1").fadeIn(1200);
			return;
		}
		else if(exam_date=='')
		{
			$("#err_rep_2").fadeOut(200);
			$("#err_rep_2").fadeIn(1200);
			return;
		}
		else
		{
			$.ajax({
				url:'includes/setting_exam_schedule_config_tbl.php',
				type:'post',
				data:'&exam_id='+exam_id+'&exam_date='+exam_date+'&academic_year='+academic_year,

				success:function(htmData)
				{
					//alert(htmData);
					$('#setting_tbl').html($.trim(htmData));
					//$('#exam_name').val('');
					//$('#exam_date').val('<?php echo date('d-m-Y');?>');	
				},
				error:function(FData)
				{
					alert(FData);
				} 
			});
		}	
	});
	$("#res_btn").click(function(event){
		$('#exam_name').val('');
		$('#exam_date').val('<?php echo date('d-m-Y');?>');
		$('#setting_tbl').html('');
	});
});	
</script>


<div id="content" class="box">
	<fieldset class="login">
		<legend>Exam Schedule Configaration</legend>
		<table border="0" cellpadding="0" cellspacing="0" >
            <!--<tr>
            	<th>&nbsp;</th>
                <th id="sp_action" style="color:#FF0000;"><?php //echo $msg;?></th>
            </tr> -->
            <tr>
				<th valign="top">Academic Year:&nbsp;</th> 				
				<td><input  type="text" id="academic_year" name="academic_year" readonly="readonly" class="inp-form" value="<?php echo $academic_year;?>"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th valign="top">Exam name:&nbsp;</th> 				
				<td><select name="exam_name" id="exam_name" class="styledselect-normal">
                <?php
                $sql_exam = "select `id`, `exam_name` from `std_exam_config_new` where `flag`=1 and `academic_year`=$academic_year";
				$res_exam = mysql_query($sql_exam);
				echo '<option value="">Select</option>';
				while($row_exam = mysql_fetch_array($res_exam))
				{
					echo '<option value="'.$row_exam[0].'">'.$row_exam[1].'</option>';
				}
				?>
                </select></td>
				<td>
					<div class="error-left"></div>
					<div class="error-inner"><p id="err_rep_1">Please Select Exam</p></div>
				</td>
			</tr>
            <tr>
            	<td height="6"></td>
            </tr>
			<tr>
				<th valign="top">Exam Date:&nbsp;</th>
				<td><input type="text" class="inp-form" id="exam_date" name="exam_date" value="<?php echo date('d-m-Y');?>" onclick="scwShow(this,event);" readonly="readonly" />
                </td>
                <td>
					<div class="error-left"></div>
					<div class="error-inner"><p id="err_rep_2">Please Select Date</p></div>
				</td>
			</tr>
            <tr>
            	<td height="6"></td>
            </tr>		
			<tr>
				<td><button id="go_btn" class="form-submit">GO</button></td> 
			    <td><button id="res_btn" class="form-reset">Reset</button></td>
			</tr>
            <!--<tr>
            	<td></td>
                <td><a href="./includes/routine_function/demo_exam_schedule.php?exam_id=1&exam_date=01-04-2013&academic_year=2013&class_id=1&period_id=1" onclick="return GB_showCenter('Add/Edit Data', this.href,250,550)">link</a></td>
            </tr> -->
		</table>		
			
	</fieldset>
	<!--<div id="setting_tbl" style="width:100%"></div> -->
    <table width=100% id="setting_tbl"></table>  
	<div id="pager" class="x3" width=100%"></div>  
</div>