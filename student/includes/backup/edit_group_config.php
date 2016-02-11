<?php
include 'db.php';
$oper=$_POST['oper'];
$groupname=$_POST['groupname'];
$classname=$_POST['classname'];
$secname=$_POST['secname'];
$id=$_POST['id'];





if($oper=='add')

$sql="insert into std_group_info (group_name,class_id,section_id,branch_id) 
values('$groupname',
(select id from std_class_config where class_name='$classname'),
(select id from std_class_section_config where class_name='$classname' and section_name='$secname'),
1)";
elseif($oper=='del')
$sql="delete from std_group_info where id in ($id)";

mysql_query($sql);



mysql_query("insert into test (value) values('$id')");


?>