<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {	"sPaginationType": "full_numbers"	 });
	});	
</script>		
<?php
		require_once("../db.php"); 
		session_start();
       
		$str = "SELECT 	* FROM tbl_notices order by notice_date desc";
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
							while( $res = mysql_fetch_array($wuery) )
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
			