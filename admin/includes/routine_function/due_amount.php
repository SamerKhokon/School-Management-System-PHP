 <link href="media/css/demo_page.css" rel="stylesheet" type="text/css" />
  <link href="media/css/demo_table.css" rel="stylesheet" type="text/css" />
        
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"
				} );
			} );
		</script>


   
    
<table  width="963" border="0" cellspacing="0" cellpadding="0" >
 	<tr>
        <td style="background-image:url(images/parents-login-top1.png); width:963px; height:31px;">
        	<span class="sub-heading">&nbsp;&nbsp;&nbsp;&nbsp;Due Amount</span>
            <a href="log_out.php" style="float:right; font-size:16px; color:#FFFFFF; text-decoration:none;">Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        
        </td>
      </tr>
	<!--<tr>
    	<td><span class="sub-heading">Principal's Message</span></td>
    </tr>-->

      
           <tr>

    <td rowspan="2" valign="top"  align="left" class="news">
    <br />
	
			
            <div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Voucher No</th>
			<th>Student ID</th>
			<th>Class</th>
			<th>Month</th>
			<th>Total Amount</th>
            <th>Status</th>
			<th>Payment Date</th>
		</tr>
	</thead>
	<tbody>
	<?php     $str = "SELECT * FROM `std_voucher_summery`";
	              $sql = mysql_query($str);
				  while($res = mysql_fetch_array($sql) ) {
				  
	?>
								 <tr class="gradeA">
								   <td><?php echo $res[1];?></td>
								   <td><?php echo $res[2];?></td>
								   <td><?php echo $res[3];?></td>
								   <td><?php echo $res[4];?></td>
								   <td><?php echo $res[6];?></td>
								   <td><?php echo $res[7];?></td>
								   <td><?php echo $res[8];?></td>
								 </tr>
 <?php } ?>
	</tbody>
	<tfoot>
		
        <tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
            <th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</tfoot>
</table>
			</div>
            
            
      </td>
  </tr>
  
 
  </table>
 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33005058-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Mirrored from www.ais.ae/about.php by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 12 Dec 2012 05:40:06 GMT -->
