<div id="content" class="box">
	<?php  
	 require_once("../db.php"); 
  session_start();
	$branchid = $_SESSION['LOGIN_BRANCH']; ?>
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>

    <fieldset>
		    <legend>Employee List </legend>
			<div id="employee_list"></div>			
	</fieldset>	
</div>
<script type="text/javascript">
$(document).ready(function(){
   $('#employee_list').load('includes/employee_list.php',function(){});
});
</script>