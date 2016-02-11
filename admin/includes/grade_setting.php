<div id="content" class="box">

 <fieldset class="login">
<legend>Grade Details</legend>
<br/>
		<a href="includes/new_grade_add.php?sub_action=add&branch_id=<?php echo $branchid;?>" id="img1" 
 		onclick="return GB_showCenter('Add Data', this.href,300,300)">
		New Grade </a>
	
<br/><br/><br/>

<table id="list"  width="100%">
</table>  

<div id="pager" class="scroll" style="text-align:center;"></div>  

</fieldset> 
</div>
<script  type="text/javascript">
      $(document).ready(function(){
	        $('#list').load('includes/table/grade_setting_tbl.php',function(){});
	  });
</script>