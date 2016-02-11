<?php   require_once('db.php');
  
        $class_id    = trim($_POST['class_id']);
		$book_title  = trim($_POST['book_title']);
		$book_author = trim($_POST['book_author']);
		$isbn        = trim($_POST['isbn']);
		$branch_id   = trim($_POST['branch_id']);
		
		
		$dupli_str = "select count(*) from `std_book_list` where book_title='$book_title' and class_id=$class_id";
		$dupli_stm = mysql_query($dupli_str);
		$dupli_res = mysql_fetch_row($dupli_stm);
		
		if($dupli_res[0]==0 || $dupli_res[0]=="")
		{		
			$add_book = "INSERT INTO `school`.`std_book_list`(`class_id`,`book_title`,`book_author`,`isbn`,`branch_id`)	
			VALUES($class_id,'$book_title','$book_author','$isbn',$branch_id)";
			mysql_query($add_book);
			
			echo 'Data save successfully!';
		}else{
			echo 'Data already exist!';
		}
?>