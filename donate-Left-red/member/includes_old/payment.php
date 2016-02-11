<?php

$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('system_db') or die('Could not select database');
$memberid='081131447';

$loop=true;
$x=0;
while($loop)
{
$x++;
//$memberid='';
$query = "SELECT * FROM user_info where login_id='".$memberid."' and status='Active' order by form_type";
//echo $query;

$result = mysql_query($query);
$row=mysql_fetch_array($result);
$payment=$row['s_id'];
$memberid=$payment;

if($x==2 or $x==4 or $x==6 or $x==8 or $x==10) 
echo "$memberid<br/>";
if($x==10)
exit;
}
	

?>