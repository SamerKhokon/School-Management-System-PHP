
<?php
include("db.php");

$date=date('Ymdhis') ;
$sel_pos="select * from donate_pos where id =(select next_pos_id from member_under_pos order by id desc limit 1)";
$res_pos=mysql_query($sel_pos);
$row_pos=mysql_fetch_array($res_pos);
echo $pos_mobile=$row_pos['mobile_no'];
$pos_id=$row_pos['id'];
$sel_next_pos="select id from donate_pos where id>$pos_id limit 1";
$res_next_pos=mysql_query($sel_next_pos);
$row_next_pos=mysql_fetch_array($res_next_pos);
$next_pos=$row_next_pos['id'];
if ($next_pos!="")
{
$insert_pos="insert into member_under_pos (pos_id,last_request_time,next_pos_id) values($pos_id,'$date',$next_pos)" ;
mysql_query($insert_pos);
}
else
{
$insert_pos="insert into member_under_pos (pos_id,last_request_time,next_pos_id) values($pos_id,'$date',1)" ;
mysql_query($insert_pos);
}

?>