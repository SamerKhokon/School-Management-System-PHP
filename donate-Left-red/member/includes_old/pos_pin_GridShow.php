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
	
	$req_status=$_REQUEST['req_stat'];
	$alo_for=$_REQUEST['alo_for'];
    
	$where="where 1=1";		
	
	
	$where.= " and status='$req_status' and alo_for='$alo_for'";
	
	
	  
	  
	
	   
	   
	 
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
    $where="where 1=1 and alo_for='Member' and status='Panding'";
	}
		









$result = mysql_query("SELECT COUNT(*) as count FROM alocation_id_to_pos $where"); 
$row = mysql_fetch_array($result,MYSQL_ASSOC); 

$count = $row['count'];

 $searchOn = ($_REQUEST['_search']);
 $search= ($_REQUEST['search']);


if( $count > 0 ) 

{ 

 $total_pages = ceil($count/$limit); 
 
 } 
 
 else { 
 
 $total_pages = 0; 
 
 } 
 
 if ($page > $total_pages) 
 
  $page=$total_pages;
  
  $start = $limit*$page - $limit;
  
  if($start <0)
  
   $start = 0;
   
   
   
   
   
   

   
   
   
   
   
   
   
   
   
   
   
   
   
   $SQL = "SELECT  * from alocation_id_to_pos $where ORDER BY $sidx $sord LIMIT $start , $limit";
   
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
		echo "<cell>". $row['member_login_id']."</cell>";
		echo "<cell>". $row['member_mobile_no']."</cell>";
		
		 echo "<cell>". $row['alo_login_id_set']."</cell>"; 
		 
		 echo "<cell>". $row['alo_date']."</cell>"; 
		 
		 
		 // echo "<cell><![CDATA[". $row['note']."]]></cell>"; 
		  
		  echo "</row>"; 
		  
		  } 
		  
		  echo "</rows>";
 ?>
 
