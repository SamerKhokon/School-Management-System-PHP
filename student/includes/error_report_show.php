<?php
 //error_reporting(0); 
require 'oracle_db.php';

 $shortcode=$_POST["shortcode"]; 
 $operator=$_POST["operator"]; 
 $date_from=$_POST["date_from"]; 
 $date_to=$_POST["date_to"]; 
 ?>
 <html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="stylesheet/SyntaxHighlighter.css" rel="stylesheet" type="text/css" />
        
        <link rel='stylesheet' href='./css/princeStyle.css' type='text/css'>
		
		<title>Wrong Format Report</title>
		<style type="text/css" title="currentStyle">
			@import "./media2/css/demo_page.css";
			@import "./media2/css/demo_table.css";
			@import "./TableTools/media/css/TableTools.css";
		</style>
        
        <link href="stylesheet/SyntaxHighlighter.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="jquery/popup.js"></script>
		
		
		<script type="text/javascript" charset="utf-8" src="./media2/js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" src="./media2/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="./TableTools/media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="./TableTools/media/js/TableTools.js"></script>
		
		<!--
		<script type="text/javascript" language="javascript" src="./media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="./media/js/jquery.dataTables.js"></script>
		-->
		
		<script type="text/javascript" src="jquery/popup.js"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready( function (){
				$('table.display').dataTable({
					"sDom": 'T<"clear">lfrtip' ,
					"oTableTools": 
					{
						"aButtons": 
						[							
							"csv",
							"xls",
							{
								 "sExtends"       : "pdf",
								 "sButtonText"    : "Save to Pdf",
								 "sPdfOrientation": "landscape",								 
								 "sPdfMessage"    : "Your custom message would go here."
							},
							"print"
						]
					}					
				});
			});							
		</script>
	</head>
<div id="print_button" align="left"> 
	<body id="dt_example" class="example_alt_pagination">
		<div id="container">
			<div class="full_width big" style="padding-left:350px;">
            </div>
           <div class="table">
				
			
                    </div>
                    
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" align="center">
	<thead>
		<tr>
			<th align="center" width="50">HOTKEY</th>
						<th align="center">SHORTCODE</th>
                        <th align="center">OPERATOR</th>
                        <th align="center">MSISDN</th>
                        <th align="center">REPLY</th>
				
          
		</tr>
	</thead>
	<tbody>
 <?php

/*if($operator=="All")

 $sql_mobile_no="select SHORTCODE,OPERATOR,MSISDN,HOTKEY,IN_MSG from TBL_MSG_LOG where to_date(receive_time,'dd/mm/rrrr') between  to_date('$date_from','Month dd,rrrr') and to_date('$date_to','Month dd,rrrr') and HOTKEY NOT IN(select HOTKEY from tbl_operation_list)";
 
  else  
   
$sql_mobile_no="select SHORTCODE,OPERATOR,MSISDN,HOTKEY,IN_MSG from TBL_MSG_LOG where OPERATOR='$operator' and to_date(receive_time,'dd/mm/rrrr') between  to_date('$date_from','Month dd,rrrr') and to_date('$date_to','Month dd,rrrr') and HOTKEY NOT IN(select HOTKEY from tbl_operation_list)";*/
	  
   if($shortcode=="All" && $operator!="All")
  
	$sql_mobile_no="select HOTKEY,SHORTCODE,OPERATOR,MSISDN,IN_MSG from TBL_MSG_LOG where OPERATOR='$operator' and to_date(receive_time,'dd/mm/rrrr') between  to_date('$date_from','Month dd,rrrr') and to_date('$date_to','Month dd,rrrr')";
   
 else if($shortcode!="All" && $operator!="All")
  
   $sql_mobile_no="select HOTKEY,SHORTCODE,OPERATOR,MSISDN,IN_MSG from TBL_MSG_LOG where SHORTCODE='$shortcode' and OPERATOR='$operator' and to_date(receive_time,'dd/mm/rrrr') between  to_date('$date_from','Month dd,rrrr') and to_date('$date_to','Month dd,rrrr')";
   
   else if($shortcode!="All" && $operator=="All")
  
  $sql_mobile_no="select HOTKEY,SHORTCODE,OPERATOR,MSISDN,IN_MSG from TBL_MSG_LOG where SHORTCODE='$shortcode' and to_date(receive_time,'dd/mm/rrrr') between  to_date('$date_from','Month dd,rrrr') and to_date('$date_to','Month dd,rrrr')";
   
    
  else  
   
   $sql_mobile_no="select HOTKEY,SHORTCODE,OPERATOR,MSISDN,IN_MSG from TBL_MSG_LOG where to_date(receive_time,'dd/mm/rrrr') between  to_date('$date_from','Month dd,rrrr') and to_date('$date_to','Month dd,rrrr')";
       
    $sql_statement_mobile_no= OCIParse($connection,$sql_mobile_no);
	
	
	OCIExecute($sql_statement_mobile_no);
	
    // $count=0;
	 
	// $total_no_hit=0;
	     
	 ?>
      
      <?php

	 
	   while (OCIFetch($sql_statement_mobile_no)){
	
	    $hotkey= OCIResult($sql_statement_mobile_no,HOTKEY);
		
		$shortcode= OCIResult($sql_statement_mobile_no,SHORTCODE);
			
		$operator= OCIResult($sql_statement_mobile_no,OPERATOR);
		
		$msisdn= OCIResult($sql_statement_mobile_no,MSISDN);
		
		$in_msg= OCIResult($sql_statement_mobile_no,IN_MSG);
	 
		//$no_of_hit=OCIResult($sql_statement_mobile_no,3);
		  
		  
		//$total_no_hit=$total_no_hit+$no_of_hit;?>
      
  <tr class="gradeA">
  <td align="center"><?php echo $hotkey;?></td>
   <td align="center"><?php echo $shortcode;?></td>
   <td align="center"><?php echo $operator;?></td>
   <td align="center"><?php echo $msisdn;?></td>
    <td align="center"><?php echo $in_msg;?></td>

   </tr>
      
	<?php  
	}
  
	//echo "</table>";
	
	  
	?>
    
    </tbody>
	<tfoot>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
            <th>&nbsp;</th>
              <th>&nbsp;</th>
			
            	
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
				
			</div>
	</body>
</div>    
</html>

 <?php
 ocilogoff($connection);
?>

</div>

</div>

</body>

</html>

