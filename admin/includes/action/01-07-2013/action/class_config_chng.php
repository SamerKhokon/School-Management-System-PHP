<html><head>
<script>
function get_clos()
{		
 Window.close();		  
}
		function redirect_to_parent()
		{
			parent.parent.window.location= "";
			parent.parent.GB_hide();
		}												
</script>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
</head>
<body onunload="redirect_to_parent();">
<?php  include('../db.php') ;
   // echo  $sub_name=$_GET['sub_name'];
	$sub_action = trim($_GET['sub_action']);
	$class_name = trim($_GET['class_name']);
	$branch_id  = trim($_GET['branch_id']);
	$class_id   = trim($_GET['class_id']);
	 
	$qry = mysql_query("SELECT  * from std_class_config where id='$class_id' and branch_id='$branch_id'" ); 		
		
	while ($row=mysql_fetch_array($qry))
	{		  
		$class_name=$row['class_name'];					
		$no_of_student=$row['no_of_student'];	
		$daily_class=$row['daily_class'];	
		$class_start_time=$row['class_start_time'];	
        $section_system = $row['section_system'];		
	}	
	if($class_id!=="" && $sub_action=='delete')
	{	
		delete_record($class_id,$branch_id,$class_name);	     
	}	   
    function delete_record($class_id,$branch_id,$class_name)
	{
?>
	   <form name="frm_d" id="frm_d" action="" method="post">
	   	<fieldset>
		<legend>Delete Records</legend>
			<table>
				<tr><td > Click OK or Cancel </td></tr>
				<tr>
					<td><input type="submit" value="OK" name="ok_btn"  />
					<input type="button" value="Cancel" name="can_btn" id="can_btn" onclick="get_clos();"/></td>
				</tr>
			</table>
		</fieldset>
		</form>
<?php  	
		if (isset($_POST['ok_btn']))
		{	 

			$str_sec = "select count(*) from std_class_section_config where class_name='$class_name'";
			$sql_sec = mysql_query($str_sec);
			$sec_res = mysql_fetch_row($sql_sec);
			
			if($sec_res[0]==0) {
				$res="delete from std_class_config where id='$class_id' and branch_id='$branch_id'";
				mysql_query($res);	   
				if($res){
					echo "delete successfully";
				}else{
					echo "error";		   
				}
			}
			else{
			   echo "First all section delete of ".$class_name;
			}	
	    }
	}
    if($class_id!=="" && $sub_action=='detail')
    {	
	     detail_record($class_name,$no_of_student,$daily_class,$class_start_time,$section_system);	     
	}	   
    function  detail_record($class_name,$no_of_student,$daily_class,$class_start_time,$section_system)
	{
?>
	   	<fieldset>
			<legend>Detail About CLASS</legend>
			<table>        
				<tr>
				  <td> Class Name:      </td><td> <?php echo $class_name; ?> </td></tr><tr>
				  <td> NO of Students:  </td><td> <?php echo $no_of_student; ?> </td></tr><tr>
				  <td> Daily Class:     </td><td> <?php echo $daily_class; ?> </td></tr><tr>
				  <td> Class Start Time:</td><td> <?php echo $class_start_time; ?> </td></tr>
				  <td> Section System:</td>   <td> <?php echo $section_system;?> </td>
				</tr>					
			</table>
	  </fieldset>
<?php    
	     
    }
    if($class_id!=="" && $sub_action=='edit')
    {	
	    edit_record($class_name,$no_of_student,$daily_class,$class_start_time,$class_id,$branch_id,$section_system);	     
	}	   
	function edit_record($class_name,$no_of_student,$daily_class,$class_start_time,$class_id,$branch_id,$section_system)
	{
?>	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
			<fieldset> 
			   <legend>Edit Records</legend>	
			   <table>         
					<tr><td> Class Name:</td><td><input type="text" name="class_name" value="<?php echo $class_name; ?>" /></td></tr>
					<tr><td> NO of Student :</td><td><input type="text" name="no_of_student" value="<?php echo $no_of_student; ?>" /></td></tr>
					<tr><td> Daily Class :</td><td><input type="text" name="daily_class" value="<?php echo $daily_class;  ?>" /></td></tr>
					<tr><td> Class Start Time :</td><td><input type="text" name="class_start_time" value="<?php echo $class_start_time; ?>" /></td></tr>
					<tr><td> Section System :</td><td><input type="text" name="section_system" value="<?php echo $section_system; ?>" /></td></tr>					
					<input type="hidden" name="branch_id" value="<?php  echo $branch_id; ?>" />
					<input type="hidden" name="class_id" value="<?php  echo $class_id; ?>" />			
					<tr><td>&nbsp;</td><td><input type="submit" name="edit_btn" value="submit" />			
				</table>
			</fieldset>
		</form>
<?php  
		if (isset($_POST['edit_btn']))
		{  
		   $class_name      =trim($_POST["class_name"]);
		   $no_of_student   =trim($_POST["no_of_student"]);
		   $daily_class     =trim($_POST["daily_class"]);
		   $class_start_time=trim($_POST["class_start_time"]);
		   $branch_id		=trim($_POST["branch_id"]);
		   $class_id		=trim($_POST["class_id"]);
		   $branch_id		=trim($_POST["branch_id"]);	
		   $section_system	=trim($_POST["section_system"]);			   
		   $ress="UPDATE std_class_config SET class_name='$class_name',no_of_student='$no_of_student',daily_class='$daily_class',class_start_time='$class_start_time',section_system='$section_system' where id='$class_id' and branch_id='$branch_id'";		
		   $sqll=mysql_query($ress); 
			if($sqll)  {
				echo "Update Successfully";				   
			}else{
				echo "Error ";
			}  				 
		}		   
	}
?>
</body>
</html>