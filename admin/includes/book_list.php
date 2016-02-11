<html>
<head>
<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>		
</head>
<body>
<?php
	include('db.php'); session_start();
	$branch_id =  $_SESSION['LOGIN_BRANCH'];
	$str = "select * from `std_book_list` where branch_id=$branch_id";		 
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <th>Class</th>
							   <th>Title</th>
							   <th>Author</th>
							   <th>ISBN</th>
							   <th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
						  $qr = mysql_query($str);		
							while ($res = mysql_fetch_array($qr)){
							    $id 		  = $res[0];
								$class_id   = $res[1];
								$title	      = $res[2];
								$author   = $res[3];
								$isbn = $res[4];
								$branch = $res[5];
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>Class-$class_id</td>";
							   echo  "<td>$title </td>";
							   echo  "<td>$author </td>";
							   echo  "<td>$isbn</td>";
	?>						   
			<td>
				<a href="includes/action/book_setting_change.php?sub_action=delete&id=<?php echo $id;?>&class_id=<?php echo $class_id;?>&title=<?php echo $title;?>&author=<?php echo $author;?>&isbn=<?php echo $isbn;?>&branch_id=<?php echo $branch_id;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)">
				<img src="custom_css/delete_image.png" width="16" />
				</a>

				<a href="includes/action/book_setting_change.php?sub_action=detail&id=<?php echo $id;?>&class_id=<?php echo $class_id;?>&title=<?php echo $title;?>&author=<?php echo $author;?>&isbn=<?php echo $isbn;?>&branch_id=<?php echo $branch_id;?>" id="img2\"  onclick="return GB_showCenter('Detail Data', this.href,250,550)">
				<img src="custom_css/process_info.png" width="18" /> 
				</a>
		
				<a href="includes/action/book_setting_change.php?sub_action=edit&id=<?php echo $id;?>&class_id=<?php echo $class_id;?>&title=<?php echo $title;?>&author=<?php echo $author;?>&isbn=<?php echo $isbn;?>&branch_id=<?php echo $branch_id;?>" id="img1"  	onclick="return GB_showCenter('Edit Data', this.href,250,450)">
				<img src="custom_css/001_45.png" width="18" /> 
				</a>
			
			</td>
							   
							
									   
							   </tr>
<?php							   
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
								<th>&nbsp;</th>
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</body>
</html>