<html>
<head>
<script>
function get_clos()	{		
 Window.close();		  
}
function redirect_to_parent()
{
    //parent.parent.window.location= "";
    parent.parent.GB_hide();
}
</script>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
</head>
<!--<body onUnload="redirect_to_parent();"> -->
<body>
<?php
include('../db.php') ;
$sl_id     = trim($_GET['id']);
$branch_id =trim($_GET['branch_id']);
$sub_id	=trim($_GET['sub_id']);
$sub_name	=trim($_GET['sub_name']);
$sub_action	=trim($_GET['sub_action']);

$sql_sub = "select * from std_subject_config where id=$sl_id and branch_id=$branch_id";
$res_sub = mysql_query($sql_sub);
if($row_sub = mysql_fetch_array($res_sub))
{
	$class_id = $row_sub['class_id'];
	$subject_code = $row_sub['subject_code'];
	$subject_name = $row_sub['subject_name'];
	$short_name = $row_sub['short_name'];
	$sub_mark = $row_sub['sub_mark'];
	$ct_mark = $row_sub['ct_mark'];
	$ob_mark = $row_sub['ob_mark'];
	$practical_mark = $row_sub['practical_mark'];
	$st_mark = $row_sub['st_mark'];
	$full_mark = $final_mark = $row_sub['final_mark'];
	//$full_mark = $row_sub['sub_mark']+$ct_mark+$ob_mark+$practical_mark;
}
	 
if($sub_name!=="" && $sub_action=='delete')  {	
	delete_record($sl_id,$sub_id,$branch_id);	     
}	   
function delete_record($sl_id,$sub_id,$branch_id)
{
    if (isset($_POST['ok_btn'])) {	    
        $res="delete from std_subject_config where id=$sl_id and branch_id='$branch_id'";
        mysql_query($res);	   
        if($res) {
            echo "delete successfully";
        } 
		else{
               echo "error";
        }
    }
?>
    <form name="frm_d" id="frm_d" action="" method="post">
        <fieldset>
            <legend>Delete Records</legend>
            <table>
                <tr>
	                <td > Click OK or Cancel </td>
                </tr>
                <tr>
    	            <td>
                        <input type="submit" value="OK" name="ok_btn"  />
                        <input type="button" value="Cancel" name="can_btn" id="can_btn" onClick="get_clos();"/>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
	<?php  	
}

if($sub_name!=="" && $sub_action=='detail'){	
	detail_record($sl_id,$sub_name,$subject_code,$sub_mark,$ct_mark,$ob_mark,$practical_mark,$full_mark);	     
}	   
function detail_record($sl_id,$sub_name,$subject_code,$sub_mark,$ct_mark,$ob_mark,$practical_mark,$full_mark)
{
?>
    <fieldset>
        <legend>Detail About Subject</legend>
        <table>        
        <tr>
        	<td> Subject Name: </td><td><?Php echo $sub_name; ?> </td>
        </tr>
        <tr>
        	<td> Subject Code:</td><td> <?Php echo $subject_code; ?> </td>
        </tr>
        <tr>
        	<td> Subject Mark: </td><td><?Php echo $sub_mark; ?> </td>
        </tr>
        <tr>
        	<td> Class Test:</td><td ><?Php echo $ct_mark; ?> </td>
        </tr>
        <tr>
        	<td> Objective Mark:</td><td ><?Php echo $ob_mark; ?> </td>
        </tr>
        <tr>
        	<td> Practical Mark:</td><td ><?Php echo $practical_mark; ?> </td>
        </tr>
        <tr>
            <td> Full Mark:</td><td ><?Php echo $full_mark; ?> </td>
        </tr>
        </table>
	</fieldset>
<?php    
}

if($sub_name!=="" && $sub_action=='edit'){	
	edit_record($sl_id,$sub_id,$sub_name,$subject_code,$sub_mark,$ct_mark,$ob_mark,$practical_mark,$branch_id);	     
}
	   
function edit_record($sl_id,$sub_id,$sub_name,$subject_code,$sub_mark,$ct_mark,$ob_mark,$practical_mark,$branch_id)  
{
	if (isset($_POST['edit_btn'])){ 
		$sl_id = trim($_POST["sl_id"]);		
		$sub_name = trim($_POST["sub_name"]);
		$subject_code = trim($_POST["subject_code"]);
		$sub_mark = trim($_POST["sub_mark"]);
		$ct_mark = trim($_POST["ct_mark"]);
		$ob_mark = trim($_POST["ob_mark"]);
		$practical_mark	= trim($_POST["practical_mark"]);
		$full_mark = $sub_mark+$ct_mark+$ob_mark+$practical_mark;
		$branch_id = trim($_POST["branch_id"]);		
		$ress = 
		"UPDATE std_subject_config 
		SET 
			subject_name='$sub_name',
			subject_code='$subject_code',
			sub_mark=$sub_mark,
			ct_mark=$ct_mark,
			ob_mark=$ob_mark,
			practical_mark=$practical_mark,
			final_mark=$full_mark 
		WHERE id=$sl_id and branch_id=$branch_id";		
		$sqll = mysql_query($ress); 		  
		if($sqll)  {
			echo "Update Successfully";				   
		}else {
			echo "Error ";
		}  				 
	}		   
?>	   
    <form name="frm_e" id="frm_e" action="" method="post">	  
        <fieldset> 
			<legend>Edit Records</legend>	
			<table>         
				<tr><td> Name        :</td><td><input type="text" name="sub_name" value="<?php echo $sub_name; ?>" /></td></tr>
			  	<tr><td> Subject Code:</td><td><input type="text" name="subject_code" value="<?php echo $subject_code;  ?>" /></td></tr>
              	<tr><td> Subject Mark:</td><td><input type="text" name="sub_mark" value="<?php echo $sub_mark; ?>" /></td></tr>
			  	<tr><td> Ct Mark     :</td><td><input type="text" name="ct_mark" value="<?php echo $ct_mark;  ?>" /></td></tr>
			  	<tr><td> OB Mark     :</td><td><input type="text" name="ob_mark" value="<?php echo $ob_mark;  ?>" /></td></tr>
              	<tr><td> PT Mark     :</td><td><input type="text" name="practical_mark" value="<?php echo $practical_mark;  ?>" /></td></tr>
			   	<tr><td><input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" /></td></tr>
			   	<input type="hidden" id="sl_id" name="sl_id" value="<?php echo $sl_id;?>"/>
			  	<tr><td><input type="submit" name="edit_btn" value="submit" />			
			</table>
		</fieldset>
	</form>	
	<?php  	
}
?>
</body>
</html>