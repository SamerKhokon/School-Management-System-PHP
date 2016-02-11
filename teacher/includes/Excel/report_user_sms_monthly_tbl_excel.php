<?php session_start();//report_sms_alocationU_tbl_excel.php
require 'db.php';
include("excelwriter.inc.php");

//reading data from url//
$reseller_id = 0;
$reseller_cndtn = "";
if(isset($_REQUEST['reseller_id']))
	$reseller_id = $_REQUEST['reseller_id'];

$user_id = $_SESSION['usr_id'];
$user_cndtn = "";
if(isset($_REQUEST['user_id']))
	$user_id = $_REQUEST['user_id'];

$mobile_no_cndtn = "";
$msisdn = "";
if(isset($_REQUEST['msisdn']))
{
	if(trim($_REQUEST['msisdn'])!='')
	{
		$msisdn = trim($_REQUEST['msisdn']);
		$mobile_no_cndtn = " and t1.MSISDN like '%".$msisdn."%'";
	}	
}
$msg_body_cndtn = "";
$msg_body_srch = "";
if(isset($_REQUEST['msg_body_srch']))
{
	if(trim($_REQUEST['msg_body_srch'])!='')
	{
		$msg_body_srch = strtolower(trim($_REQUEST['msg_body_srch']));
		$msg_body_cndtn = " and lower(t1.MSG_BODY) like '%".$msg_body_srch."%'";
	}	
}

$msg_option_cndtn = "";
$msg_option = "ALL";
if(isset($_REQUEST['msg_option']))
{
	if(trim($_REQUEST['msg_option'])!='ALL')
	{
		$msg_option = trim($_REQUEST['msg_option']);
		$msg_option_cndtn = " and t1.MSG_OPTION='".$msg_option."'";
	}	
}

$isbrand_cndtn = "";
$isbrand = 'all';
$brand_srch_txt = '';
if(isset($_REQUEST['isbrand']))
{
	$isbrand = trim($_REQUEST['isbrand']);
	if($isbrand=='with')
		$isbrand_cndtn = " and t1.BRAND_NAME IS NOT NULL";
	if($isbrand=='without')
		$isbrand_cndtn = " and t1.BRAND_NAME IS NULL";
	if($isbrand=='srch')
	{
		$brand_srch_txt = strtolower(trim($_REQUEST['brand_srch_txt']));
		if($brand_srch_txt!='')
			$isbrand_cndtn = " and lower(t1.BRAND_NAME) like '%".$brand_srch_txt."%'";		
	}	
}
$dateCndtn = "";
$from_dt = $to_dt = date('d/m/Y');
if(isset($_REQUEST['from_dt']) && isset($_REQUEST['to_dt']))
{
	$from_dt = trim($_REQUEST['from_dt']);
	$to_dt = trim($_REQUEST['to_dt']);
	
}

//echo $fromDate.' - '.$toDate; 	
$fd = "to_date('$from_dt 00:00','dd/mm/yyyy hh24:mi')";
$td = "to_date('$to_dt 23:59','dd/mm/yyyy hh24:mi')";
//$dateCndtn = " and a.ALOCATION_DATE >= ".$fd." and a.ALOCATION_DATE <=".$td."";
$dateCndtn = " and (t1.CREATION_TIME between ".$fd." and ".$td.")";

///creating excel//
$file_name="1234566x.xls";
	
unlink($file_name);


$excel=new ExcelWriter($file_name);		
$my_new_line=array("","","","","","","","");	
$my_data=array("<b>User</b>","<b>Reseller</b>","<b>Mobile No</b>","<b>Message</b>","<b>MSG Option</b>","<b>Brand Name</b>","<b>SMS Count</b>","<b>Date-Time</b>");
$excel->writeLine($my_data);

$sql = 
"select 
    t1.INBOX_ID as INBOX_ID,
    t1.U_ID as USER_ID,
    t1.MSISDN as MSISDN,
    t1.MSG_BODY as MSG_BODY,
    t1.MSG_OPTION as MSG_OPTION,
	t1.SMS_COUNT as SMS_COUNT,
	t1.BRAND_NAME as BRAND_NAME,
	TO_CHAR(t1.CREATION_TIME, 'DD-MON-YYYY HH:MI:SS AM') as DATE_TIME,
    t2.USER_FULL_NAME as USER_NAME,
	t3.RESELLER_UID as RESELLER_ID,
    t4.USER_FULL_NAME as RESELLER_NAME
from TBL_INBOX t1
left join TBL_USER_INFO t2
	on t1.U_ID=t2.ID
left join TBL_USER_CTRL t3
	on t3.USER_UID=t1.U_ID
left join TBL_USER_INFO t4
	on t3.RESELLER_UID=t4.ID
where t2.ACTIVE_FLAG='Y'
	and t1.U_ID=$user_id
	and t2.COMPANY_ID=".$_SESSION['compny_id']."
	$reseller_cndtn
	$user_cndtn
	$mobile_no_cndtn
	$msg_body_cndtn 
	$msg_option_cndtn
	$isbrand_cndtn
	$dateCndtn
order by t1.INBOX_ID	
";
$res = oci_parse($conn, $sql);
oci_execute($res);
while(($row = oci_fetch_array($res, OCI_BOTH+OCI_RETURN_NULLS))) 
{
	$inbox_id = $row['INBOX_ID'];
	$u_id = $row['USER_ID'];
	$user_name = $row['USER_NAME'];
	$r_id = $row['RESELLER_ID'];
	$reseller_name = $row['RESELLER_NAME'];
	$mobile_no = $row['MSISDN'];
	$msg_body = $row['MSG_BODY'];
	$msg_option = $row['MSG_OPTION'];
	$brand_name = $row['BRAND_NAME'];
	$sms_count = $row['SMS_COUNT'];
	$date_time = $row['DATE_TIME'];	

	$my_data=array($user_name, $reseller_name, $mobile_no, $msg_body, $msg_option, $brand_name, $sms_count, $date_time);
	$excel->writeLine($my_data);		
}
$excel->close();
	
header("Expires: 0");  
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
header("Cache-Control: no-store, no-cache, must-revalidate");  
header("Cache-Control: post-check=0, pre-check=0", false);  
header("Pragma: no-cache");  
//header("Content-type: application/pdf");  
header("Content-type: application/vnd.ms-excel;charset:UTF-8");
header('Content-length: '.filesize($file_name));  
header('Content-disposition: attachment; filename='.basename($file_name));  
readfile($file_name);

?>