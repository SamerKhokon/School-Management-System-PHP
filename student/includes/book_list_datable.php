<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<?php
			 require_once("../db.php"); 
             session_start();
             $branchid = $_SESSION['LOGIN_BRANCH'];			 			 
			$class_id = trim($_POST['class_id']);
			
			 if($class_id != 0) { 
				$book_str = "select * from std_book_list where branch_id=$branchid and class_id=$class_id";
			 }else if($class_id == 0 ){
				$book_str = "select * from std_book_list where branch_id=$branchid";			
			 }	
			 
				//echo $book_str;			 
		     $book_sql  =mysql_query($book_str);		
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <th>Class</th>
							   <th>Book Title </th>
							   <th>Author</th>
							   <th>ISBN</th>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
							while ($res = mysql_fetch_array($book_sql)){
									$id 		  = $res[0];
									$classid   = $res[1];
									$book_title	      = $res[2];
									$book_author   = $res[3];
									$book_isbn = $res[4];
									$mod=$count%2;
									if ($mod==0){
										echo "<tr>";
									}else{
										echo "<tr class=\"bg\">";
									}	   
								   echo  "<td>Class-$classid </td>";
							   echo  "<td>$book_title</td>";
							   echo  "<td>$book_author </td>";
							   echo  "<td>$book_isbn </td>";
							   echo "</tr>";		
							 $count++;
							}	
						?>
						</tbody>
						<tfoot>
							<tr>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
