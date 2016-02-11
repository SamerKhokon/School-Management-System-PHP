<?php include("../db.php");  
$emp_id = $_POST["emp_id"];
$str = "SELECT `basic`,`medical`,`house_rent`,`others`,`festival_bonus` FROM `tbl_emp_salary_sturcture` WHERE empid=$emp_id";
$sql = mysql_query($str);
$res = mysql_fetch_row($sql);
echo $res[0]."#".$res[1]."#".$res[2]."#".$res[3]."#".$res[4];
?>