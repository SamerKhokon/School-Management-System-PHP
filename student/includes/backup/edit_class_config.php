<?php
include ('db.php');
$oper=$_POST['oper'];
$id=$_POST['id'];
$class_name=$_POST['class_name'];
$total_student=$_POST['total_student'];
$total_st=$_POST['total_st'];
$total_ct=$_POST['total_ct'];
$daily_class=$_POST['daily_class'];
$class_time=$_POST['class_time'];
$branchid=$_POST['branchid'];


if($oper=='add')
$sql="insert into std_class_config (class_name,no_of_student,total_CT,total_st,daily_class,class_start_time,branch_id) values('$class_name',$total_student,$total_ct,$total_st,$daily_class,'$class_time',$branchid)";

elseif($oper=='edit')
$sql="update std_class_config set class_name='$class_name',no_of_student=$total_student,total_ct=$total_ct,total_st=$total_st,daily_class=$daily_class,class_start_time='$class_time' where id=$id";
elseif($oper=='del')
$sql="delete from std_class_config where id in ($id)";

mysql_query("insert into test (value) values('$sql')");

mysql_query($sql);






?>