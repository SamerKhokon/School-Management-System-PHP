<?php
ob_start();
//$dateid	=$_GET['dateid'];
//include('db.php');
?>
<style type="text/css">
<!--
table{    width:  100%;    border: solid 1px #111;}
th{    text-align: center;    border: solid 1px #111;    background: #EEFFEE;}
td{    text-align: left;    border: solid 1px #111;}
td.col1{    border: solid 1px #111;    text-align: right;}
-->
</style>

<table  border="0" cellpadding="0" cellspacing="0" width="100%" align="center"  >
<tr>
<td style="border-top:#fff;border-bottom:#fff;border-left:#fff;border-right:#fff;"><br/><br/><br/> 
<table border="0" cellpadding="0" cellspacing="0" width="50%" align="center">
  	<!--<col style="width: 5%" class="col1">
    <col style="width: 25%">
    <col style="width: 30%">
    <col style="width: 20%">
    <col style="width: 20%">-->
    <thead>
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-right:#fff;border-bottom:#fff;font-weight:bold;text-align:center;">Semicon Private Ltd. </td>
        </tr>
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;text-align:center;">DOHS Mohakhali</td>
        </tr>		
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;text-align:center;">Road#21,House#21,Dhaka-1212.</td>
        </tr>				
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;text-align:center;">Mobile:0176354875</td>
        </tr>						
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;text-align:center;">&nbsp;</td>
        </tr>
        <tr>
		    <th style="border-bottom:#fff;border-top:#000;background-color:#fff;">Card ID</th>
            <th style="border-bottom:#fff;border-top:#000;background-color:#fff;">Name</th>
            <th style="border-bottom:#fff;border-top:#000;background-color:#fff;">Style</th>
            <th style="border-bottom:#fff;border-top:#000;background-color:#fff;">Size</th>
            <th style="border-bottom:#fff;border-top:#000;background-color:#fff;">Quantity</th>
            <th style="border-bottom:#fff;border-top:#000;background-color:#fff;">Rate</th>
            <th style="border-bottom:#fff;border-top:#000;background-color:#fff;">Total</th>
            <th  style="border-bottom:#fff;border-top:#000;background-color:#fff;">Production Date</th>   
        </tr>          
    </thead>
	<tbody>
<?php 
		$i=1;
		while($i<=8) 
		{	
?>
			<tr>
				<td style="border-top:1px solid #111;border-left:1px solid #111;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>
				<td style="border-top:1px solid #111;;border-left:#fff;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>			   
				<td style="border-top:1px solid #111;;border-left:#fff;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>
				<td style="border-top:1px solid #111;;border-left:#fff;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>
				<td style="border-top:1px solid #111;;border-left:#fff;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>
				<td style="border-top:1px solid #111;;border-left:#fff;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>
				<td style="border-top:1px solid #111;;border-left:#fff;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>
				<td style="border-top:1px solid #111;;border-left:#fff;border-bottom:#fff;border-right:1px solid #111;text-align:center;"><?php echo $i;?></td>
		    </tr>
<?php		$i++;   }    ?>
  
			<tr>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>			   
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
			</tr>
			<tr>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>			   
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
			</tr>		 
		<tr>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:1px solid #000;border-right: #fff;text-align:center;" colspan="2">&nbsp;</td>			   
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:1px solid #000;border-right: #fff;text-align:center;" colspan="2">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
		 </tr>		 
		<tr>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;" colspan="2">Admin Signature</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;" colspan="2">Signature</td>				
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;">&nbsp;</td>
		 </tr>  
		<tr>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>			   
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
		 </tr>
		<tr>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>			   
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;text-align:center;"></td>
		 </tr>
		 </tbody>
  </table>
  <br/><br/><br/>
  </td></tr>
  <tr>
  <td  style="border-top:#fff;border-bottom:#fff;border-left:#fff;border-right:#fff;">
  <br/><br/><br/>
  
  <table border="0" cellpadding="0" cellspacing="0" width="50%" align="center">
  	<!--		<col style="width: 5%" class="col1"><col style="width: 25%"><col style="width: 30%">
				<col style="width: 20%"><col style="width: 20%">	-->
				
    <thead>
    	<tr>		  
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-right:#fff;border-bottom:#fff;font-weight:bold;text-align:center;">Semicon Private Ltd. </td>
        </tr>
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;padding-left:6px;">DOHS Mohakhali</td>
        </tr>		
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;text-align:center;">Road#21,House#21,Dhaka-1212.</td>
        </tr>				
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;text-align:center;">Mobile:0176354875</td>
        </tr>						
    	<tr>
        	<td colspan="8"   style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right:#fff;text-align:center;">&nbsp;</td>
        </tr>
		<tr>
				 <td colspan="2" style="border-top:#fff;border-bottom:#fff;border-left:#fff;border-left:#fff;border-right:#fff;">Date:01/04/2013</td>
				<td colspan="6" style="border-top:#fff;border-bottom:#fff;border-left:#fff;border-left:#fff;border-right:#fff;">&nbsp;</td>
		</tr>		
		<tr>
				 <td colspan="2" style="border-top:#fff;border-bottom:#fff;border-left:#fff;border-left:#fff;border-right:#fff;">&nbsp;</td>
				<td colspan="6" style="border-top:#fff;border-bottom:#fff;border-left:#fff;border-left:#fff;border-right:#fff;">&nbsp;</td>
		</tr>
		
        <tr>
		    <td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
			<td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
            <td style="border-bottom:#fff;border-top:#000;background-color:#fff;border-right:1px solid #000;"  >#Slno</td>
            <td style="border-bottom:#fff;border-top:#000;background-color:#fff;width:100px;"  >Name</td>
            <td style="border-bottom:#fff;border-top:#000;background-color:#fff;border-right:#000;"  >Amount</td>
			<td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
			<td  style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
			<td  style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>			
        </tr>          
    </thead>
	<tbody>
<?php 		$i=1;		while($i <= 8 ) {?>
		<tr>
		         <td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
			     <td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
				 <td style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;text-align:center;"  ><?php echo $i;?></td>
				 <td style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right: #000;text-align:center;" >Abul Hossain<?php echo $i;?></td>
				 <td style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right: #000;text-align:center;" ><?php echo 3050+$i;?></td>
				 <td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
				 <td  style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
				 <td  style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
		</tr>
<?php	 	$i++;  }    ?>  


		<tr>
		       <td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;"  >&nbsp;</td>				
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;" >&nbsp;</td>
				<td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
				<td  style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;" >&nbsp;</td>
				<td  style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;" >&nbsp;</td>
		</tr>

		<tr>
		       <td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
				<td style="border-top:#000;border-left:#fff;border-bottom:#fff;border-right: #fff;"  colspan="2">&nbsp;</td>				
				<td style="border-top:#fff;border-left:#fff;border-bottom:#fff;border-right: #fff;" ></td>
				<td style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
				<td  style="border-left:#fff;border-top:#000;border-right:#fff;border-bottom:#fff;" colspan="2">&nbsp;</td>
				<td  style="border-left:#fff;border-top:#fff;border-right:#fff;border-bottom:#fff;">&nbsp;</td>
		</tr>


		 </tbody>
  </table>
  <br/><br/><br/>
  </td>
  </tr>
  </table>
  
  <?php 
				$content = ob_get_clean();
				// convert to PDF

				include('html2pdf.class.php');
				try
				{
					$html2pdf = new HTML2PDF('L', 'A4', 'fr');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
					$html2pdf->Output('test.pdf');
				}
				catch(HTML2PDF_exception $e)
				{
					echo $e;
					exit;
				}
?>