<?php
include ('db.php');
$oper=$_POST['oper'];
$id=$_POST['id'];
$class_id=$_POST['class_id'];
$teacher_id=$_POST['teacher_id'];
$sub_id=$_POST['sub_id'];
$total_student=$_POST['total_student'];
$section_name=$_POST['section_name'];
$branchid=$_POST['branchid'];


if($oper=='add')
$sql="insert into std_class_section_config (section_name,class_id,class_teacher_id,subject_id,no_of_student,branch_id) 
values('$section_name',$class_id,$teacher_id,$sub_id,$total_student,$branchid)";

elseif($oper=='edit')
$sql="update std_section_config set section_name='$section_name',no_of_student=$total_student where id=$id";
elseif($oper=='del')
$sql="delete from std_section_config where id in ($id)";



mysql_query($sql);






?>