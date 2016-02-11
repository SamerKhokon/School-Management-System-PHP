<script type="text/javascript">
$(document).ready(function(){
	$("#period").focus();
	var branchid=$("#branchid").val();
										
	$("#jq_tbl").load('includes/table/class_period_tbl.php?branchid='+branchid);						  
	$("#period").keydown(function(event){
		if(event.keyCode == 13 ){											
			if($("#period").val()==""){
				$("#err_sml_1").fadeOut(200);												
				$("#err_sml_1").fadeIn(1200);
			}
			else{  											
				$("#start_hour").focus();
			}											
		}									
	});
	$("#start_hour").keydown(function(event){
		if(event.keyCode == 13 ){											 
			$("#start_min").focus();
		}									
	});
	$("#start_min").keydown(function(event){
		if(event.keyCode == 13 ){											 
			$("#end_hour").focus();
		}									
	});
	$("#end_hour").keydown(function(event){
		if(event.keyCode == 13 ){											 
			$("#end_min").focus();
		}									
	});
	$("#end_min").keydown(function(event){
		if(event.keyCode == 13 ){											 
			$("#break_flag").focus();
		}									
	});
	$("#break_flag").keydown(function(event){
		if(event.keyCode == 13 ){											 
			$("#class_btn").focus();
		}									
	});
	$("#class_btn").click(function(event){
		var period=$("#period").val();
		var start_hour=$("#start_hour").val();
		var start_min= $("#start_min").val();
		var end_hour= $("#end_hour").val();
		var end_min=$("#end_min").val();
		var break_flag=$("#break_flag").val();												
		var branchid=$("#branchid").val();
					
					
		if(period==""){
		   alert('Enter Period name');
		   $('#period').focus();
		   return false;
		}
		else
		{
			//alert(branchid);
			var dataA = '&period='+period+'&start_hour='+start_hour+'&start_min='+start_min+'&end_hour='+end_hour+'&end_min='+end_min+'&break_flag='+break_flag+'&branchid='+branchid;
			//alert(dataA);
			$.ajax({
				url:'includes/table/class_period_tbl_insert.php',
				type:'post',
				data:dataA,
				success:function(htmData){
					alert(htmData);															  
					$('#period').val('');
					$('#start_hour').val(0);
					$('#start_min').val(0);
					$('#end_hour').val(0);
					$('#end_min').val(0);
					$('#break_flag').val(0);
					$("#jq_tbl").load('includes/table/class_period_tbl.php?branchid='+branchid);														   					$("#period").focus();
				},
				error:function(FData){
					alert(FData);
				} 
			});
		}	   
			 
	});
});	
</script>
	<?php  
	 require_once("../db.php"); 
  session_start();
	$branchid = $_SESSION['LOGIN_BRANCH']; ?>
	<input type="hidden" id="branchid" value="<?php echo $branchid;?>"/> 
<div id="content" class="box">
<fieldset class="login">
<legend>Add New Class Period</legend>
    <table border="0" cellpadding="0"  cellspacing="0"  >
        <tr>
            <th valign="top">Period Name:</th>
            <td><input type="text" class="inp-form-error" name="period" id="period"/></td>
            <td>
                <div class="error-left"></div>
                <div class="error-inner"><p id="err_sml_1">This field is required.</p></div>
            </td>
        </tr>		
        <tr>
            <th valign="top">Start Time:</th>
            <td><select id="start_hour" class="styledselect-day" name="start_hour">					
            <?php
            for($i=0;$i<=23;$i++ )	{
                if($i<10)
					echo "<option value=\"0$i\">$i</option>";
				else
					echo "<option value=\"$i\">$i</option>";
            }
            ?>
            </select>
            <select id="start_min" class="styledselect-month" name="start_min">
            <?php		
            for($i=0;$i<60;$i=$i+5 )	{
                if($i<10)
					echo "<option value=\"0$i\">$i</option>";
				else
					echo "<option value=\"$i\">$i</option>";
            }
            ?>					
            </select>
            </td>
            <td>
                <div class="bubble-left"></div>
                <div class="bubble-inner"><p id="err_sml_3">Set Start Time</p> </div>
                <div class="bubble-right"></div>
            </td>
        </tr>
        <tr>
            <th valign="top">End Time:</th>
            <td><select id="end_hour" class="styledselect-day" name="end_hour">					
            <?php
            for($i=0;$i<=23;$i++ ){
                if($i<10)
					echo "<option value=\"0$i\">$i</option>";
				else
					echo "<option value=\"$i\">$i</option>";
            }
            ?>
            </select>
            <select id="end_min" class="styledselect-month" name="end_min">
            <?php		
            for($i=0;$i<60;$i=$i+5 ){
                if($i<10)
					echo "<option value=\"0$i\">$i</option>";
				else
					echo "<option value=\"$i\">$i</option>";
            }
            ?>					
            </select>
            </td>
            <td>
                <div class="bubble-left"></div>
                <div class="bubble-inner"><p id="err_sml_3">Set End Time</p> </div>
                <div class="bubble-right"></div>
            </td>
        </tr>
        <tr>
            <th valign="top">Break:</th>
            <td><select class="styledselect-month" id="break_flag" name="break_flag">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            </td>
            <td>&nbsp;</td>
        </tr>			
        <tr><td height="6"></td></tr>
        <tr>
            <th>&nbsp;</th>
            <td valign="top">
                <input type="button" value="" name="submit" class="form-submit" id="class_btn" />
                <input type="button" value="" name="reset" class="form-reset"  />
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<?php
/*

if (isset($_POST['submit']))
		{
		
		$class_name=$_POST['class_name'];
		$student_capacity=$_POST['student_capacity'];
		$daily_class=$_POST['daily_class'];
		$start_time=$_POST['hour'].":".$_POST['minute'];
		
		if ($class_name!=="" and $student_capacity!="" and $daily_class!="" and $start_time!="") 
		{
		$sel_sql="select count(*) as chk_count from std_class_config where class_name='$class_name' and branch_id=$branchid";
		$res_sql=mysql_query($sel_sql);
		$row=mysql_fetch_array($res_sql);
		if($row['chk_count']<1)
		{
		$ins_sql="insert into std_class_config set class_name='$class_name',no_of_student='$student_capacity',daily_class=$daily_class,class_start_time='$start_time',branch_id=$branchid";
		mysql_query($ins_sql);
		echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
		}
		else
		{
		echo "<p class=\"msg warning\">Please enter another data.This data already entered.</p>";
		}
		}
		else
		{
		echo "<p class=\"msg error\">Please enter valid information.</p>";
		}
		
		}
else
{

}
		
*/		
?>
<table  width=100% id="jq_tbl">
	<tr>
    </tr>
	<?php 
	/*
	
	$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=action_pos_deposit';
	//$url_par=$_SERVER['PHP_SELF'];
	//$url_par=$_SERVER['QUERY_STRING'];
	$where ="where 1=1 and branch_id=$branchid";
	
	$qry = mysql_query("SELECT  * from std_class_config $where  $pages->limit"); 		
	$count=1;
	while ($row=mysql_fetch_array($qry))
	{
		$mod=$count%2;
		
		if ($mod==0)
		{
			//$chk_class='odd';
			echo "<tr>";
		}
		else
		{
			//$chk_class='even';
			echo "<tr class=\"bg\">";
		}
			
		$deposit_id=$row['id'];
		
		$class_id=$row['id'];
		$class_name=$row['class_name'];
		$no_of_student=$row['no_of_student'];
		$account_number=$row['account_number'];
		$daily_class=$row['daily_class'];
		$class_start_time=$row['class_start_time'];
		
		
		echo  "<td>$class_name</td>";
		echo  "<td>$no_of_student</td>";
		
		echo  "<td>$daily_class</td>";
		echo  "<td>$class_start_time</td>";
		echo  "<td><a href=\"$url_par&deposit_id=$deposit_id\">Details</a> Edit Delete</td>";
		
		echo "</tr>";
		
		$count++;
	}
	*/
	?>
	</table>
</div>