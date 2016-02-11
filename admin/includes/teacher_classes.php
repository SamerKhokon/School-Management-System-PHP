
<script type="text/javascript">

               $(document).ready(function(){
			   
			              $('#example').dataTable( {
							"sPaginationType": "full_numbers"	
			
				   			    } );
			   
						  $("#class_name").focus();
										  
						           	$("#class_name").keydown(function(event)
								     {
									     if(event.keyCode == 13 )
									   
								   			{
											
											
										 		$("#sub_btn").focus();
											}
									
									});
								
									
									$("#sub_btn").click(function(event)
								    {
									
									//var class_name=$("#class_name").val();
								//	var sec_name  =$("#sec_name").val();
									
								    
									});
														
							    });	

</script>

<div id="content" class="box">

<?php
 require_once("../db.php"); 
  session_start();
  $branchid = $_SESSION["LOGIN_BRANCH"];  
?>
<fieldset class="login">
<legend>Teacher Class History</legend>
<form name="frm1" id="frm1" method="post" action="">

<table border="0" cellpadding="0"  cellspacing="0">
			<tr>
				<th valign="top">Teacher Name: &nbsp;&nbsp;</th>
				<td>
				
				<select id="class_name" name="class_id" class="styledselect-normal">
                    <option>Select</option>
				<?php 
        		$qry = mysql_query("select * from std_teacher_info"); 				
		        while ($row=mysql_fetch_array($qry))		{
					echo "<option value=\"$row[1]\">$row[1]</option>";
		         }
		          ?>
				</select>
				</td>
	            <td>
				<div class="error-left"></div>
				<div class="error-inner"><p id="err_rep">This field is required.</p></div>
				</td>	
			</tr>
			<tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>		
	</table>
	</form>
</fieldset>
<table width=100% id="jq_tbl">	
<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>	
		  <th>Class Name</th>
		  <th>Section </th>
		  <th>Time</th>
		  <th>Sat</th>		
		  <th>Sun</th>		
		  <th>Mon</th>		
		  <th>Tue</th>		
		  <th>Wed</th>		
		  <th>Thu</th>				  
		</tr>
	</thead>
	<tbody>
 <?php 
	// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
	$teacher_name=$_POST['class_id'];
 
if (isset($_POST['submit']))
{





	$class_time_str = "SELECT class_time FROM std_class_routine WHERE SUBSTRING(day_sat,LOCATE('<br/>',day_sat)+5,LENGTH(day_sat))='$teacher_name' OR
	SUBSTRING(day_sun,LOCATE('<br/>',day_sun)+5,LENGTH(day_sun))='$teacher_name' OR SUBSTRING(day_mon,LOCATE('<br/>',day_mon)+5,LENGTH(day_mon))='$teacher_name' OR
	SUBSTRING(day_tue,LOCATE('<br/>',day_tue)+5,LENGTH(day_tue))='$teacher_name' OR SUBSTRING(day_wed,LOCATE('<br/>',day_wed)+5,LENGTH(day_wed))='$teacher_name' OR
	SUBSTRING(day_thus,LOCATE('<br/>',day_thus)+5,LENGTH(day_thus))='$teacher_name'";
	
	$class_time_query = mysql_query($class_time_str);
	
	while($class_time_res = mysql_fetch_array($class_time_query) ){
	    $class_times[] = $class_time_res[0]; 
	}

    print_r($class_times);


	
	$class_name_str = "SELECT distinct Class_name FROM std_class_routine WHERE SUBSTRING(day_sat,LOCATE('<br/>',day_sat)+5,LENGTH(day_sat))='$teacher_name' OR
	SUBSTRING(day_sun,LOCATE('<br/>',day_sun)+5,LENGTH(day_sun))='$teacher_name' OR SUBSTRING(day_mon,LOCATE('<br/>',day_mon)+5,LENGTH(day_mon))='$teacher_name' OR
	SUBSTRING(day_tue,LOCATE('<br/>',day_tue)+5,LENGTH(day_tue))='$teacher_name' OR SUBSTRING(day_wed,LOCATE('<br/>',day_wed)+5,LENGTH(day_wed))='$teacher_name' OR
	SUBSTRING(day_thus,LOCATE('<br/>',day_thus)+5,LENGTH(day_thus))='$teacher_name'";	
	
	$class_name_query = mysql_query($class_name_str);
	
	while($class_name_res = mysql_fetch_array($class_name_query) ){
	    $class_names[] = $class_name_res[0]; 
	}

    print_r($class_names);



	
	echo "<table>";
	echo "<tr>";
	for($i=0;$i<count($class_times);$i++){
	   echo "<td>".$class_times[$i]."</td>";
	}
     echo "</tr>";
	echo "</table>";
	


	$query = "SELECT id,Class_name,class_time,sec_name,day_sat,day_sun,day_mon,day_tue,day_wed,day_thus FROM std_class_routine WHERE SUBSTRING(day_sat,LOCATE('<br/>',day_sat)+5,LENGTH(day_sat))='$teacher_name' OR
	SUBSTRING(day_sun,LOCATE('<br/>',day_sun)+5,LENGTH(day_sun))='$teacher_name' OR SUBSTRING(day_mon,LOCATE('<br/>',day_mon)+5,LENGTH(day_mon))='$teacher_name' OR
	SUBSTRING(day_tue,LOCATE('<br/>',day_tue)+5,LENGTH(day_tue))='$teacher_name' OR SUBSTRING(day_wed,LOCATE('<br/>',day_wed)+5,LENGTH(day_wed))='$teacher_name' OR
	SUBSTRING(day_thus,LOCATE('<br/>',day_thus)+5,LENGTH(day_thus))='$teacher_name'";

	
	
	
	
	
	
	$qry = mysql_query($query);
	$count=1;
	while ($row=mysql_fetch_array($qry))
	{
		$mod=$count%2;
		if ($mod==0){
			echo "<tr>";
		}else{
			echo "<tr class=\"bg\">";
		}
		$slno       = $row[0]; 
		$Class_name = $row[1];
		$Class_time = $row[2];
		$sec_name   = $row[3];
		$day_sat    = $row[4];
		$day_sun    = $row[5];
		$day_mon    = $row[6];
		$day_tue    = $row[7];
		$day_wed    = $row[8];
		$day_thus   = $row[9];
		
		echo  "<td> $Class_name </td>";
		echo  "<td>$sec_name</td>";				
		echo  "<td> $Class_time </td>";
		echo  "<td>$day_sat</td>";		
		echo  "<td>$day_sun</td>";		
		echo  "<td>$day_mon</td>";		
		echo  "<td>$day_tue</td>";		
		echo  "<td>$day_wed</td>";		
		echo  "<td>$day_thus</td>";				
		echo "</tr>";		
		$count++;
	}			
}			
?> 
	</tbody>
	<tfoot>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>		
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>					
			<th>&nbsp;</th>								
			
		</tr>
	</tfoot>
</table>
</div>
</table>
</div>