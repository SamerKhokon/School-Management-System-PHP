<script>
function get_clos()
{		
 Window.close();		  
}
</script>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 

<?php  require'../db.php'; $sub_action = trim($_GET['sub_action']);
      $branch_id  = trim($_GET['branch_id']);
	if($sub_action!="" && $sub_action=="add") 
    {
	   add_grade($branch_id);
	}
	function add_grade($branch_id)
	{
?>
	<form name="frm_d" id="frm_d" action="" method="post">
		<fieldset>
			<legend>Add New Grade</legend>
			<table>
				<td> Grade:      </td><td><input type="text" name="grade"/></td></tr><tr>
				<td> Mark Start:  </td><td> <input type="text" name="mark_start"/> </td></tr><tr>
				<td> Mark End:     </td><td> <input type="text" name="mark_end"/> </td></tr><tr>
				<td> Point:</td>   <td> <input type="text" name="point"/> </td></tr>		
				<input type="hidden" name="branch_id" value="<?php echo $branch_id;?>"/>
				<td> &nbsp;</td>   <td> <input type="submit" name="grade_btn" value="Submit"/> </td></tr>						
			</table>
		</fieldset>
	</form>
		
<?php 
       if(isset($_POST['grade_btn'])) {
	      $grade 	  = trim($_POST['grade']);
		  $mark_start = trim($_POST['mark_start']);
		  $mark_end   = trim($_POST['mark_end']);
		  $point      = trim($_POST['point']);
		  $branch_id = trim($_POST['branch_id']);
		  
		  $chk_str = "select count(*) from tbl_grade_setting where `grade`='$grade'";
		  $chk_sql = mysql_query($chk_str);
		  $chk_res = mysql_fetch_row($chk_sql);
		  if($chk_res[0]=="" || $chk_res[0]==0)
		  {
			  $insert = "insert into tbl_grade_setting(`grade`,`mark_start`,`mark_end`,`point`,`branchid`)  
			  values('$grade',$mark_start,$mark_end,$point,$branch_id)";
			  mysql_query($insert);
			  
			  echo 'Data saved successfully!';
		  }else{
				echo 'Data is already exists!';
		  }
	   }

	}	 ?>