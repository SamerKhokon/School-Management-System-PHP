<?php
include("db.php"); 
$page = $_GET['page']; 
$limit = $_GET['rows']; 
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 


 $searchOn = ($_REQUEST['_search']);
 $search= ($_REQUEST['search']);
 
if(!$sidx) $sidx =1; 






   
   
   if($searchOn=='true' or $search=='true') 
	{
	$date_from=$_REQUEST['date_from'].'000000';  
	$date_to=$_REQUEST['date_to'].'115959'; 
	$req_status=$_REQUEST['req_status'];
    
	$where="where 1=1";		
	$where.=" and request_date>$date_from and request_date<$date_to ";
	
	if ($req_status!='All')
	$where.= " and status='$req_status'";
	else
	$where.=" and 1=1";  
	  
	
	   $mobile_no=$_REQUEST['mobile_no']; 	   
	   if ($mobile_no!="")
	   $where.=" and mobile_no like '%$mobile_no%'";
	   else
	   $where.=" and 1=1";
	
	   $login_id=$_REQUEST['login_id']; 
	   if ($login_id!="")
	   $where.=" and login_id ='$login_id'";
	   else 
	   $where.=" and 1=1";
	   
/*	   
    $filenale='test.txt';
	$fh=fopen($filenale,'a');
	fwrite($fh,$where."\n");
	fclose($fh);
	 
	*/ 
	
	 
    }
	else
	{
	
	//$date=date('m/d/Y');
	//$where="where 1=1 and request_from='$user_name'";
    $where="where 1=1 ";
	}
		









$result = mysql_query("SELECT COUNT(*) as count FROM withdraw_request $where"); 
$row = mysql_fetch_array($result,MYSQL_ASSOC); 

$count = $row['count'];

 $searchOn = ($_REQUEST['_search']);
 $search= ($_REQUEST['search']);


if( $count > 0 ) 

{ 

 $total_pages = ($count/$limit); 
 
 } 
 
 else { 
 
 $total_pages = 0; 
 
 } 
 
 if ($page > $total_pages) 
 
  $page=$total_pages;
  
  $start = $limit*$page - $limit;
  
  if($start <0)
  
   $start = 0;  
   
   $SQL = "SELECT  * from withdraw_request $where ORDER BY $sidx $sord LIMIT $start , $limit";
   
   $result = mysql_query( $SQL ) 
   
   or die("Couldn't execute query.".mysql_error());
   
   if (  stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") )
   
     { 
	 header("Content-type: application/xhtml+xml;charset=utf-8");	 
	 }
	 else 	 
	 {	 
	   header("Content-type: text/xml;charset=utf-8");
	 
	  }
	  
	   echo "<?xml version='1.0' encoding='utf-8'?>";
	  
	   echo "<rows>"; echo "<page>".$page."</page>"; 
	   
	   echo "<total>".$total_pages."</total>";
	   
	    echo "<records>".$count."</records>";
		
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)) 
		{ 
		echo "<row id='". $row['id']."'>"; 
		echo "<cell>". $row['mobile_no']."</cell>";
		echo "<cell>". $row['login_id']."</cell>";
		 
		 
		 echo "<cell>". $row['amount']."</cell>"; 
		 
		 echo "<cell>". $row['creation_time']."</cell>"; 
		 
		 
		 // echo "<cell><![CDATA[". $row['note']."]]></cell>"; 
		  
		  echo "</row>"; 
		  
		  } 
		  
		  echo "</rows>";
 ?>
 
