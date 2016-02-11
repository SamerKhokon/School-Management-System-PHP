<?php
include 'db.php';
$oper=$_POST['oper'];
$subname=$_REQUEST['subname'];
$id=$_POST['id'];
 $sub_mark=$_POST['sub_mark'];
 $ct_mark=$_POST['ct_mark'];
 $st_mark=$_POST['st_mark'];
 $branchid=$_POST['branchid'];
 $final_mark=$sub_mark+$ct_mark+$st_mark;





if($oper=='add')
$sql="insert into std_subject_config (subject_name,sub_mark,ct_mark,st_mark,final_mark,branch_id) values ('$subname',$sub_mark,$ct_mark,$st_mark,$final_mark,$branchid)";

elseif($oper=='edit')
$sql="update std_subject_config set subject_name='$subname',sub_mark=$sub_mark,ct_mark=$ct_mark,st_mark=$st_mark,final_mark=$final_mark where id=$id";
elseif($oper=='del')
$sql="delete from std_subject_config where id in ($id)";



mysql_query($sql);

?>