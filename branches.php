<?php  require_once('db.php');
        session_start();
        if($_SESSION['USER_STATUS'] ==1) 
		{ 		
				 $username         = $_SESSION['USER_NAME'];
				 $user_type        = $_SESSION['USER_TYPE'];
				 $main_menus       = $_SESSION['MAIN_MENUS'];
				 $sub_menu_1       = $_SESSION['SUB_MENU_1'];
				 $sub_menu_2       = $_SESSION['SUB_MENU_2'];
				 $branches         = $_SESSION['PERMIT_BRANCH'];
				 $user_class_id    = $_SESSION['CLASS_ID'];
				 $user_subject_id  = $_SESSION['SUBJECT_ID'];		
	   
				function branch_dropdownlist(){
				  $str = "SELECT `id`,`branch_name` FROM `school`.`std_branch`";
				  $result =  mysql_query($str);
				  $option = "<option selected value='0'>select any branch</option>";
				  while($res = mysql_fetch_array($result)) {
						$option .= "<option value='".$res[0]."'>".$res[1]."</option>";
				  }
				  return $option;
				}
?>
						<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html xmlns="http://www.w3.org/1999/xhtml">
						<head><title>:: School Management System :::</title> 
						 <script type="text/javascript" src="js/jquery.js"></script>
						 <link rel="stylesheet" type="text/css" href="styles_2.css"/>
							 <style type="text/css">
								
								body{background:#c4c4c4;}
							</style>
							</head>
						<body>
					 							
										<!--    <div style="margin-left:250px;margin-top:100px;">  -->
								
										<div style="margin:0 auto;">
										       <br/><br/><br/>
											   <table align="center">
													<tr><td> 
													<h2 style="font-family:Arial;">
													
													Choose Branch</h2>
													
													</td></tr>
													<tr><td style="font-family:Arial;font-weight:bold;">
													            Welcome <?php  echo $_SESSION['USER_NAME']; ?>&nbsp;|&nbsp; 
																<a href="logout.php" style="text-decoration:none;font-family:Arial;">Logout</a></td>
																<td>&nbsp;</td>
													</tr>
													<tr><td style="font-family:Arial;font-weight:bold;"><?php echo 'Your are using : '.$_SERVER['REMOTE_ADDR']; ?></td><td>&nbsp;</td></tr>											
													<tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td></tr>											     												 																		
													<tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td></tr>											     											
												<tr><td style="font-family:Arial;font-weight:bold;">Select Branch:&nbsp;</td>
													<td >
													
													<select id="branch_names" style="border:1px solid #000;font-family:Verdana;font-size:13px;"><?php echo branch_dropdownlist(); ?></select></td>									    
													
												</tr>	
													<tr><td>&nbsp;</td>
													<td><input type="button" style="width:60px;background:#123456;color:#fff;height:30px;font-weight:bold;" id="go" value="Submit"/></td>
													</tr>
												</table>	
										</div>	
							</body>
							</html>
<script type="text/javascript">
	$(document).ready(function(){		
        $('#branch_names').change(function(){
	    $('#branch_names option:selected').each(function(){
		    $('#branch_name').val($(this).val());			
		});
	 });
	$('#go').click(function(){
	    var branch = $('#branch_names').val();
        if( branch != 0 ) {
		   $.ajax({
		     type: 'post' ,
			 url: 'brach_checker.php' ,
			 data:'branch='+branch ,
			 cache:false ,
			 success:function(st) {
			   // alert(st);
			    if( st == 1 )  {
				   //location.href = 'member/';
				   //location.href = 'all_modules.php';
				   location.href = 'dashboard.php';
				}else{
				   alert('you have no permission to access this branch!');
				   location.href='branches.php';
				} 
			 }			 
		   });
		}else{
		  alert('select any branch!');
		}		
	}); 	 
	});//doc 
</script>
<?php   }else{
        header("location:logout.php");
}
?>