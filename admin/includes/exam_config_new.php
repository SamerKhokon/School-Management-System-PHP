<script type="text/javascript">

	$(document).ready(function(){
		$("#exam_name").focus();
										
		$("#list").load('includes/table/exam_config_new_tbl.php');
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
					$("#period").focus();
				}
			}
		});
		$("#exam_btn").click(function(event)
		{
			var period_ids = $("#h_period_ids").val();
			var exam_name = $("#exam_name").val();
			if(period_ids=='-1,')
			{
				$("#err_rep_2").fadeOut(200);
				$("#err_rep_2").fadeIn(1200);
				return;
			}
			else
			{
				period_ids +='-1';
				var result = window.confirm("Click OK or Cancel.");
				if(result)
				{
					$.ajax({
						url:'includes/table/exam_config_new_tbl_insert.php',
						type:'post',
						data:'&exam_name='+exam_name+'&period_ids='+period_ids,
	
						success:function(htmData)
						{
							alert(htmData);
							$('#exam_name').val('');
							$('.chk_period').attr('checked',false);
							$('#h_period_ids').val('-1,');
							$("#jq_tbl").load('includes/table/exam_config_new_tbl.php');	
						},
						error:function(FData)
						{
							alert(FData);
						} 
					});
				} 
			}	
		});
		$("#exam_btn").click(function(event){
			$('#exam_name').val('');
			$('.chk_period').attr('checked',false);
			$('#h_period_ids').val('-1,');
			$("#jq_tbl").load('includes/table/exam_config_new_tbl.php');
		});
	});	
	function selectExamPeriod(id)
	{
		var period_ids = $('#h_period_ids').val();
		var chk_period = '#chk_period'+id;
		if($(chk_period).is(':checked'))
		{
			period_ids +=id+',';
		}
		else
		{
			period_ids = period_ids.replace(','+id+',', ',');
		}
		$('#h_period_ids').val(period_ids);	
	}
</script>

<?php
 require_once("../db.php"); 
  session_start();
  $branchid = $_SESSION["LOGIN_BRANCH"];  

?>
<div id="content" class="box">
	<fieldset class="login">
		<legend>Exam Details</legend>
		<table border="0" cellpadding="0" cellspacing="0" >
			<tr>
				<th valign="top">Exam name:&nbsp;</th> 				
				<td><input  type="text" id="exam_name" name="exam_name" class="inp-form"></td>
				<td>
					<div class="error-left"></div>
					<div class="error-inner"><p id="err_rep_1">This field is required.</p></div>
				</td>
			</tr>
            <tr>
				<th valign="top">Academic Year:&nbsp;</th> 				
				<td><input  type="text" id="academic_year" name="academic_year" readonly="readonly" class="inp-form" value="<?php echo date('Y');?>"></td>
				<td>&nbsp;</td>
			</tr>
            <tr>
            	<td height="6"></td>
            </tr>
			<tr>
				<th valign="top" style="vertical-align:top;">Period:&nbsp;</th>
				<td style="vertical-align:top;">
				<?php
                	$sql_exm_prd = "select `id`, `period`,date_format(`start_time`,'%h:%i %p'),date_format(`end_time`,'%h:%i %p') from `std_exam_period` where `flag`=1";
					$res_exm_prd = mysql_query($sql_exm_prd);
					while($row_exm_prd=mysql_fetch_array($res_exm_prd))
					{
						$period_id = $row_exm_prd[0];
						$period = $row_exm_prd[1];
						$start_time = $row_exm_prd[2];
						$end_time = $row_exm_prd[3];
						echo '<input type="checkbox" class="chk_period" name="chk_period[]" id="chk_period'.$period_id.'" value="'.$period_id.'" onclick="selectExamPeriod('.$period_id.')" />&nbsp;'.$period.' ['.$start_time.'-'.$end_time.']<br />';
					}  
				?>
                <br /><input type="hidden" name="h_period_ids" id="h_period_ids" value="-1," />
                </td>
                <td>
					<div class="error-left"></div>
					<div class="error-inner"><p id="err_rep_2">Please Select Period</p></div>
				</td>
			</tr>		
			<tr>
				<td><button id="exam_btn" class="form-submit">Submit</button></td>
			    <td><button id="res_btn" class="form-reset">Reset</button></td>
			</tr>
		</table>		
			
	</fieldset>
	<table id="list" width="100%">
	</table>  
	<div id="pager" class="x3" width=100%"></div>  
</div>