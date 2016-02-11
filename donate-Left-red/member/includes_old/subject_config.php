<link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css" /> 

<div id="content" class="box">





<fieldset class="login">
<legend>Setting Subject Infomation</legend>





<form method="POST" action="">

<table border="0" cellpadding="0"  cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Subject Name:</th>
			<td><input type="text" class="inp-form" id="subname" name="subname" /></td>
	
<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
		
		
		<tr>
		<th valign="top">Mark:</th>
		<td>
		<select id="d" class="styledselect-day" name="sub_mark" id="sub_mark">
					<option value="00">SUB</option>
					<?php
					for($i=10;$i<=100;$i=$i+10 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
				</select>
		
		<select id="d" class="styledselect-day" name="ct_mark" id="ct_mark">
					<option value="00">CT</option>
					<?php
					for($i=10;$i<=100;$i=$i+10 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
				</select>
					<select id="m" class="styledselect-month" name="st_mark" id="st_mark">
					<option value="00">ST</option>
					<?php
					for($i=10;$i<=100;$i=$i+10 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
					
					</select>
				</td>
				<td><div class="bubble-left"></div>
	<div class="bubble-inner">Select class time</div>
	<div class="bubble-right"></div></td>
	
				</tr>
				
	
		
		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" name="submit" class="form-submit" />
			<input type="submit" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	
		
	</table>
			 
	</form>		
</fieldset>

<?php

if (isset($_POST['submit']))
		{
		
		$sub_name=$_POST['subname'];
		$sub_mark=$_POST['sub_mark'];
		$ct_mark=$_POST['ct_mark'];
		$st_mark=$_POST['st_mark'];
		$full_mark=$sub_mark+$ct_mark+$st_mark;
		
		if ($sub_name!=="") 
		{
		$sel_sql="select count(*) as chk_count from std_subject_config where subject_name='$sub_name' and branch_id=$branchid";
		$res_sql=mysql_query($sel_sql);
		$row=mysql_fetch_array($res_sql);
		if($row['chk_count']<1)
		{
		$ins_sql="insert into std_subject_config set subject_name='$sub_name',sub_mark=$sub_mark,ct_mark=$ct_mark,st_mark=$st_mark,final_mark=$full_mark,branch_id=$branchid";
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
		
		
?>


<table class="x3" width=100%>
        <tr>
          
		  <th>Subject Name</th>          
          <th>Subjective Mark</th>
          <th>CT Mark</th>
		  <th>ST Mark</th>
		  <th>Full Mark</th>          
		  <th>Action</th>
		  
		 
		  
		  
        </tr>
        
		
		<?php 
		
		$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=action_pos_deposit';
		//$url_par=$_SERVER['PHP_SELF'];
		//$url_par=$_SERVER['QUERY_STRING'];
		$where ="where 1=1 and branch_id=$branchid";
		
		$qry = mysql_query("SELECT  * from std_subject_config $where  $pages->limit"); 		
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
		  
		  $sub_id=$row['id'];
		  $sub_name=$row['subject_name'];
		  $sub_mark=$row['sub_mark'];
		  $ct_mark=$row['ct_mark'];
		  $st_mark=$row['st_mark'];
		  $full_mark=$sub_mark+$ct_mark+$st_mark;
		  
        
		echo  "<td>$sub_name</td>";
		echo  "<td>$sub_mark</td>";	
		echo  "<td>$ct_mark</td>";
		echo  "<td>$st_mark</td>";
		echo  "<td>$full_mark</td>";
		echo  "<td><a href=\"$url_par&deposit_id=$deposit_id\">Details</a> Edit Delete</td>";
		
        echo "</tr>";
		
		$count++;
		}
	
	
		?>
		</table>
	





</div>