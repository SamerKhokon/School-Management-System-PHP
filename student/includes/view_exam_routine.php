<?php session_start();
	$branchid = $_SESSION["LOGIN_BRANCH"];  
	$branch_id = $branchid;
	require'db.php';
	$academic_year = date('Y');
?>
<script type="text/javascript">

	$(document).ready(function(){
		$("#exam_name").focus();
										
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
					$("#class_name").focus();
				}
			}
		});
		$("#class_name").keydown(function(event)
		{
			if(event.keyCode == 13 )
			{
				if($("#class_name").val()=="")
				{
					$("#err_rep_2").fadeOut(200);
					$("#err_rep_2").fadeIn(1200);
				}
				else
				{
					$("#exam_btn").focus();
				}
			}
		});
		$("#exam_btn").click(function(event)
		{
			var academic_year = $("#academic_year").val();
			var exam_name = $("#exam_name").val();
			var class_name = $("#class_name").val();
			var branch_id = $("#branch_id").val();
			if(exam_name=='')
			{
				$("#err_rep_1").fadeOut(200);
				$("#err_rep_1").fadeIn(1200);
				$("#exam_name").focus();
				return;
			}
			if(class_name=='')
			{
				$("#err_rep_2").fadeOut(200);
				$("#err_rep_2").fadeIn(1200);
				$("#class_name").focus();
				return;
			}
			else
			{
				var result = window.confirm("Click OK or Cancel.");
				if(result)
				{
					var dataA = '&academic_year='+academic_year+'&exam_name='+exam_name+'&class_name='+class_name+'&branch_id='+branch_id;
					$.ajax({
						url:'includes/table/view_exam_routine_tbl.php',
						type:'post',
						data:dataA,
	
						success:function(htmData)
						{
							$('#view_exam_routine_tbl').html($.trim(htmData));
						},
						error:function(FData)
						{
							alert(FData);
						} 
					});
				} 
			}	
		});
		$("#res_btn").click(function(){
			$("#exam_name").val('');
			$("#class_name").val('');
			$('#view_exam_routine_tbl').html('');	
			$("#exam_name").focus();
			return;
		});
	});
	function MyPrint()
	{
		//var class_id = $('#class').val();
		//alert(document.getElementById('class').value());
		var id = 'er_tbl';
		//alert(id);
		var MyWin = window.open('','','left=0, top=0, height=1, width=1');
		window.focus();
		//alert(document.getElementById(id).innerHTML);
		var Data = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><body><br/><br/>'+document.getElementById(id).innerHTML.toString()+'</body></html>';
		var Css = '<style type="text/css" media="print">@page{size: auto;/* auto is the initial value */ margin: 0mm;  /* this affects the margin in the printer settings */}body{margin: 0px;/* this affects the margin on the content before sending to printer */font-size:17px;}</style>';
		MyWin.document.write(Css); 
		//alert(Data);
		//alert(Data.replace(/display:none/ig, ""));
		MyWin.document.write(Data.replace(/none/ig, ""));
		MyWin.document.close();
		MyWin.print();
		MyWin.close();
	}	
</script>
<div id="content" class="box">
	<fieldset class="login">
		<legend>Exam Routine Details</legend>
		<table border="0" cellpadding="0" cellspacing="0" >
            <tr>
				<th valign="top">Academic Year:&nbsp;</th> 				
				<td><input  type="text" id="academic_year" name="academic_year" readonly="readonly" class="inp-form" value="<?php echo $academic_year;?>"><input type="hidden" name="branch_id" id="branch_id" value="<?php echo $branch_id;?>" /></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th valign="top">Exam name:&nbsp;</th> 				
				<td><select name="exam_name" id="exam_name"  class="styledselect-normal" style="width:130px;">
                	<option value=""></option>
				<?php
                $sql_exam = "select `id`, `exam_name` from `std_exam_config_new` where `flag`=1 and `academic_year`=$academic_year";
				$res_exam = mysql_query($sql_exam);
				while($row_exam = mysql_fetch_array($res_exam))
				{
					echo '<option value="'.$row_exam[0].'">'.$row_exam[1].'</option>';
				}
				?>
                </select></td>
				<td>
					<div class="error-left"></div>
					<div class="error-inner"><p id="err_rep_1">This field is required.</p></div>
				</td>
			</tr>
            <tr>
				<th valign="top">Select Class:&nbsp;</th> 				
				<td><select name="class_name" id="class_name"  class="styledselect-normal" style="width:130px;">
                	<option value=""></option>
				<?php
                $sql_class = "select `id` as class_id, `class_name` as class_name from `std_class_config` where `branch_id`=$branch_id order by `class_order`";
				$res_class = mysql_query($sql_class);
				while($row_class = mysql_fetch_array($res_class))
				{	
					$class_id = $row_class['class_id'];
					$class_name = $row_class['class_name'];
					echo '<option value="'.$class_id.'">'.$class_name.'</option>';
				}
				?>
                </select></td>
				<td>
					<div class="error-left"></div>
					<div class="error-inner"><p id="err_rep_2">This field is required.</p></div>
				</td>
			</tr>
            <tr>
            	<td height="6"></td>
            </tr>
			<tr>
				<td><input type="button" class="form-submit" name="exam_btn" id="exam_btn" value="Submit" /></td>
			    <td><input type="button" class="form-reset" name="res_btn" id="res_btn" value="Reset" /></td>
			</tr>
		</table>		
			
	</fieldset>
	<table id="view_exam_routine_tbl" width="100%">
	</table>  
	<div id="pager" class="x3" width=100%"></div>  
</div>