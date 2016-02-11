<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<?php
		require_once("../db.php"); 
		session_start();
       
	    $notice_type = trim($_POST['notice_type']);
		$date_from	 = trim($_POST["date_from"]);
		$date_to	 = trim($_POST["date_to"]);

        if($notice_type=="all" || $notice_type=="") 
		{
		 $where = " WHERE 1=1 order by id desc";
	    }
		else
		{
			$date_from = year_month_date_format($date_from); 
			$date_to   = year_month_date_format($date_to); 
		
			 if($date_from>$date_to) 
			{
			$where = " WHERE 1=1 and notice_date between '$date_to' and '$date_from'  order by id desc";
			}
			else
			{
			$where = " WHERE 1=1 and notice_date between '$date_from' and '$date_to'  order by id desc";
			}
			 
		}		
		$str = "SELECT id,title,date_format(notice_date,'%d-%m-%Y') as notice_date,url FROM tbl_notices".$where;
		$wuery  = mysql_query($str);
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
					   <th>Title</th>
					   <th>Date</th>					   					   
					   <th>Detail</th>					   					   
					</tr>
				</thead>
				<tbody>
 					 <?php $i=0;
							while( $res = mysql_fetch_assoc($wuery) )
							{	
							     $id  = $res['id'];
								 $title   		  = $res['title'];								
								 $notice_date   	  = $res['notice_date'];
								 $url   = $res['url'];
							
								if ($i%2==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
								
								echo  "<td>".$title."</td>";
								echo  "<td>".$notice_date."</td>";									
								?>
								<td><a href="../notices/<?php echo $url;?>"  target="_blank">Details</a></td>								
								<?php
								$i++;
							}	
						?>
				</tbody>
				<tfoot>
					<tr>
						<th>&nbsp;</th>	
						<th>&nbsp;</th>							
						<th>&nbsp;</th>						
																
					</tr>
				</tfoot>
			</table>
		</div>
	</table>
	<br/>
<?php
        function year_month_date_format($your_date) 
		{
		   
		   $parse = explode("-" , $your_date);
		   $date  = $parse[0];
		   $month = $parse[1];
		   $year  = $parse[2];
		   return $year.'-'.$month.'-'.$date;
		}

?>			