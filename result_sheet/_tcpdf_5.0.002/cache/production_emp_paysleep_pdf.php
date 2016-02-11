<?php
//session_start();
include_once("../../../includes/opSessionCheck.inc");
include_once("../../../includes/function.php");
ob_start();
$dateid	=$_GET['dateid'];
$dateidT=$_GET['dateidT'];
$month_year1=substr($_GET['dateid'],0,3).''.substr($_GET['dateid'],6,10);
$month_year2=substr($_GET['dateidT'],0,3).''.substr($_GET['dateidT'],6,10);
include('db.php');
$company_id	=$_SESSION['company_id'];
$section_id	=$_GET['section_id'];
$str	='Production Emp Paysleep';


function productionEmp_paysleep($card_id,$name,$grade,$designation,$basic_view,$h_rent_view,$medical_veiw,$actual_salary_view,$total_w_day,$atten,$leave,$late_pre,$lunch_out,$ap_days,$basic_gain,$atn_bon_view,$holiday,$holi_amnt_view,$ot,$ot_rate,$ot_amount,$total_amnt_view,$fest_v_view,$advance_view,$produc_amntT,$produc_bonus,$total_v,$net_pay_view,$dateid,$dateidT,$str,$section_id,$net_pay)
{
	return	'<table width="100%" style="width:100%;"><tr><td style="width:270px;">&nbsp;</td><td>'.tbl_header_fun1($dateid,$dateidT,$str).'</td><td align="right">'.date('m/d/Y').'</td></tr></table>
<table border="0" cellpadding="0" cellspacing="0" align="center"  class="details"> 
	<tbody><tr>
        	<td colspan="8" align="left" class="colh" style="border-left:1px solid #000000; border-top:1px solid #000000;">Card ID	:'. $card_id.'<br />Name/নাম	:'.$name.'</td>
           	<td colspan="8" class="colh" style="border-top:1px solid #000000;">Section	:'.$section_id.'</td>
           	<td colspan="9" align="left" class="colh" style="border-top:1px solid #000000; border-right:1px solid #000000;">Grade	:'.$grade.'<br />Designation:'.$designation.'</td>
        </tr>
        
        <tr>
            <td rowspan="2">Basic</td>
            <td rowspan="2">House<br />Rent</td>
            <td rowspan="2">Medical</td>
            <td rowspan="2">Actual<br />Salary</td>
            <td colspan="6">Attendence Information</td>
            <td rowspan="2">Basic<br />Gain</td>
            <td rowspan="2">Atten<br />Bonus</td>
            <td rowspan="2">Holi<br />Day</td>
            <td rowspan="2">Holi<br />Amnt</td>
            <td rowspan="2">OT</td>
            <td rowspan="2">OT<br />Rate</td>
            <td rowspan="2">OT<br />Amount</td>
            <td rowspan="2">Total<br />Amount</td>
            <td rowspan="2">Fest</td>
            <td rowspan="2">Advance</td>
            <td rowspan="2">Produc<br />Amount</td>
            <td rowspan="2">Produc<br />Bonus</td>
            <td rowspan="2">Gross<br />Amount</td>
            <td rowspan="2">Net<br />Payable<br />Amount</td>
            <td rowspan="2">Signature</td>
            
        </tr>
        <tr>
            <td>T.W.D</td>
            <td>Atten</td>
            <td>Leave</td>
            <td>L.Pre</td>
            <td>L.Out</td>
            <td>A.P<br />Days</td>
            
        </tr>
        <tr>
              <td>'.$basic_view.'</td>
              <td>'.$h_rent_view.'</td>
              <td>'.$medical_veiw.'</td>
              <td>'.$actual_salary_view.'</td>
              <td>'.$total_w_day.'</td>
              <td>'.$atten.'</td>
              <td>'.$leave.'</td>
              <td>'.$late_pre.'</td>
              <td>'.$lunch_out.'</td>
              <td>'.$ap_days.'</td>
              <td>'.$basic_gain.'</td>
              <td>'.$atn_bon_view.'</td>
              <td>'.$holiday.'</td>
              <td>'.$holi_amnt_view.'</td>
              <td>'.$ot.'</td>
              <td>'.$ot_rate.'</td>
              <td>'.$ot_amount.'</td>
              <td>'.$total_amnt_view.'</td>
              <td>'.$fest_v_view.'</td>
              <td>'.$advance_view.'</td>
              <td>'.$produc_amntT.'</td>
              <td>'.$produc_bonus.'</td>
              <td>'.$total_v.'</td>
              <td>'.$net_pay_view.'</td>
              <td></td>    
		</tr><tr style="font-weight:bold;">
 	<td colspan="3"></td><td>'.$actual_salary_view.'</td><td colspan="6"></td><td></td><td>'.make_comma($atn_bon_view).'</td><td></td><td>'.$holi_amnt_view.'</td><td></td><td></td><td>'.make_comma($ot_amount).'</td><td>'.$total_amnt_view.'</td><td></td><td>'.$advance_view.'</td><td></td><td></td><td></td><td>'.$net_pay_view.'</td><td></td>
 </tr><tr><td colspan="25" align="left" class="colf"><b>Total Net	: '.call_cnvrt_n2w($net_pay).'</b></td></tr>
 </tbody></table><br>............................................................................................................................................................................................................................................................................................................................................................';
}
?>

<style type="text/css">
<!--
.details table
{
    width:  100%;
    border: solid 0px #000;
}

.details th
{
    text-align: center;
    border: solid 1px #000;
	height:20px;
	
}

.details td
{
    text-align: center;
    border: solid 1px #000;
	height:20px;
}
.details td.colh
{
    border: solid 0px #000;
}
.details td.colf
{
    border: solid 0px #000;
}

.details td.col1
{
    border: solid 1px #000;
    text-align: right;
}

.head table
{
    width:  100%;
    border: solid 0px #000;
}

-->
</style>
<br />
<div style="width:1240px;">

</div>


<?php

//to_char(b.MONTH_YEAR,'mm/yyyy')='$month_year'	
$basic_total		=0;
$house_rent_total	=0;
$medical_total		=0;
$atn_bon_total		=0;
$holyD_total		=0;
$actual_salary_total=0;
$holi_amnt_total	=0;
$ot_total			=0;
$ot_amnt_total		=0;
$total_amnt_total	=0;
$total_amnt_festival=0;
$advance_total		=0;
$net_pay_total		=0;
$atn_bon			=0;
$production_amnt	=0;
$total_v			=0;
$basic_gain			=0;

$where	=" where 1=1 and 
a.CARD_ID=b.CARD_ID and  
a.SECTION_ID='$section_id' and to_char(b.MONTH_YEAR,'mm/yyyy') between '$month_year1' and '$month_year2'  
order by a.CARD_ID";


$sql	="select 

a.CARD_ID,a.NAME,a.BASIC,a.GRADE,a.DESIGNATION,
b.WORKS_DAY,b.TOTAL_ATTEND,b.LEAVE,b.LATE_PRESENT,b.LUNCH_OUT,b.OT,b.HOLY_DAY,b.ADVANCE 

from
 
TBL_PAY_EMP_PROFILE a ,TBL_PAY_EMP_ATTEN_INFO b  ".$where." ";
$qstr  = oci_parse($conn,$sql);
oci_execute($qstr);
while($row = oci_fetch_array($qstr, OCI_BOTH))

{
			
			$card_id    	= $row[0];
			$name       	= $row[1];
			$basic      	= $row[2];
			$grade       	= $row[3];
			$designation    = $row[4];
			$basic_view		=make_comma($basic);
			
			$basic_total	+=$basic;
			
			$h_rent       	= fn_house_rent($section_id,$basic);
			$house_rent_total +=$h_rent;
			
			$h_rent_view	=make_comma($h_rent);
			
			$medical       	= fn_medical($section_id,$basic);
			$medical_total	+=$medical;
			$medical_veiw	=make_comma($medical);
			
			$actual_salary	=$basic+$h_rent+$medical;
			$actual_salary_total +=$actual_salary;
			
			
			$atten       	= $row[6];
			$leave      	= $row[7];
			$late_pre       = $row[8];
			$lunch_out      = $row[9];
			
			
			$total_w_day    = $row[5];

			$holiday=$row[11];
			$holyD_total	+=$holiday;
			
			
			
			$ap_days       	= $atten + $leave +$holiday;
			
			if($total_w_day<=$ap_days)
			{
				$atn_bon=fn_atnbon($section_id,$basic);
				
			}
			else
				$atn_bon	=0;
				
			$atn_bon_total	+=$atn_bon;
			$atn_bon_view	=make_comma($atn_bon);
				
			
			$holi_amnt		=fn_holiamnt($holiday,$basic);
			$holi_amnt_total	+=$holi_amnt;
			
			
			$holi_amnt_view	=make_comma($holi_amnt);
			
			
			$gross			=$actual_salary;
			
			
			
			$ot				=$row[10];
			$ot_total	+=$ot;
			$ot_rate=make_comma(fn_ot($section_id,$basic));
			
			$ot_amount=$ot*$ot_rate;
			
			$ot_amnt_total +=$ot_amount;
			
			//$festiv=fn_fb();
			$advance		=$row[12];
			$advance_total	+=$advance;
			$advance_view	=make_comma($advance);
			
			$total_amnt		=$gross+$ot_amount+$atn_bon;
			$total_amnt_view=make_comma($total_amnt);
			
			$total_amnt_total	+=$total_amnt;
			
			
			$actual_salary_view	=make_comma($actual_salary);
			$gross_view			=make_comma($gross);
			
			
			$fest_v				=fn_fest_v($section_id,$basic);
			$total_amnt_festival	+=$fest_v;
			$fest_v_view		=make_comma($fest_v);
			
			
			
			$produc_amnt		=fn_product_amnt($card_id,$section_id,$dateid,$dateidT);
			
		
			$produc_bonus		=fn_production_bonus($produc_amnt['production_amnt'],$section_id);
			
			//$produc_chk	=($produc_amnt);
			$produc_chk			=($produc_amnt['production_amnt']+$produc_bonus+$fest_v+$ot_amount+$holi_amnt+$atn_bon);
			
			$basic_gain	=round((($basic/$total_w_day)*$ap_days),2);
			
			if($produc_chk<$gross)
				$total_v	=$basic_gain;
			else
				$total_v	=$produc_chk;
				
			$produc_amntT=$produc_amnt['production_amnt'];
			
			
			
			//$net_pay		=($total_amnt+$fest_v)-$advance;
			$net_pay		=$total_v - $advance;
			$net_pay_view 	=make_comma($net_pay);
			$net_pay_total	+=$net_pay;
			
			
			echo productionEmp_paysleep($card_id,$name,$grade,$designation,$basic_view,$h_rent_view,$medical_veiw,$actual_salary_view,$total_w_day,$atten,$leave,$late_pre,$lunch_out,$ap_days,$basic_gain,$atn_bon_view,$holiday,$holi_amnt_view,$ot,$ot_rate,$ot_amount,$total_amnt_view,$fest_v_view,$advance_view,$produc_amntT,$produc_bonus,$total_v,$net_pay_view,$dateidT,$dateidT,$str,$section_id,$net_pay);
			
}
/*				
$content = ob_get_clean();
include('html2pdf.class.php');
try
{
	$html2pdf = new HTML2PDF('L', 'Legal', 'fr');
	$html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output('mojid.pdf');
}
catch(HTML2PDF_exception $e) {
	echo $e;
	exit;
}
*/
?>