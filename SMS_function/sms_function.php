<?php
function sms_webrequest($u_name,$password,$msisdn,$msg_body,$msg_in_id,$msg_option,$brand_name)
{
	$url = "http://127.0.0.1/bulksms/webrequest/index.php?";
	$parameter = "u_name=".$u_name."&pass=".$password."&msisdn=".$msisdn."&msg_body=".urlencode($msg_body)."&msg_in_id=".$msg_in_id."&msg_option=".$msg_option."&brand_name=".$brand_name;
	
	$url = $url.$parameter;
	$fp = fopen($url."?".$parameter,"r");
	$responses = fread( $fp , 1024);
	fclose($fp);
	$responses = trim($responses); 				  
	return  $responses;
}
$my_array = array('8801711223344','8801711334455','8801711445566');
$u_name='admin';
$password='admin';
$msisdn = '';
$msg_body='test';
$msg_in_id='123';
$msg_option='TEXT';
$brand_name = 'test';
for($i=0; $i<count($my_array); $i++)
{
	$msisdn = $my_array[$i];
	sms_webrequest($u_name,$password,$msisdn,$msg_body,$msg_in_id,$msg_option,$brand_name)
}
?>