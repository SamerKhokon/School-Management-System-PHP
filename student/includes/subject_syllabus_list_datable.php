<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<div id="content" class="box">
<?php
			 require_once("../db.php"); 
             session_start();
             $branchid = $_SESSION['LOGIN_BRANCH'];			 			 
			 
			 
			 
   		    $class_name = trim($_POST['class_id']);   
			$subject_id    =  trim($_POST['subject_id']);  
            $term_id         =  trim($_POST['term_id']);  
          			
			echo "Class ID: $class_name , Subject ID : $subject_id , Term : $term_id ";
?>
