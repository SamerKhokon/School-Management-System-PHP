<?php	include("db.php");	
	function class_dropdown() {
	   $str = mysql_query("SELECT DISTINCT class_id,class_name FROM std_fee_details");
	   $option = "<option></option>";
	   while($res = mysql_fetch_array($str)) {
	      $option .= "<option value='".$res[0]."'>".$res[1]."</option>";
	   }
	   return $option;
	}	
	function month_dropdown() {
	   $str = mysql_query("SELECT DISTINCT MONTH FROM std_fee_details");
	   $option = "<option></option>";
	   while($res = mysql_fetch_array($str)) {
	        $option .= "<option value='".$res[0]."'>".$res[0]."</option>";
	   }
	   return $option;
	}
?>
<div id="content" class="box">
<fieldset>
	<legend>Student Fee Details</legend>
		<table>
				<tr>
				  <th valign="top">Class</th>
				  <td><select id="st_class" class="inp-form">
					 <?php echo class_dropdown();?>
				  </select>
				  </td>
				 </tr> 
				 <tr>
				  <th valign="top">Roll</th>
				  <td><input type="text" id="st_roll" class="inp-form"/></td>
				 </tr> 
				 <tr>
				  <th valign="top">Month</th>
				  <td><select id="months" class="inp-form">
					 <?php echo month_dropdown();?>
				  </select>
				  </td>
				 </tr> 
				 <tr>
				  <td>&nbsp;</td>
				  <td><input type="button" id="search" class="form-submit" value="search"/></td>
				 </tr>  
		</table>
</fieldset>

<script type="text/javascript">
function data_loading() {
   $('#fee_detail_show').load('includes/fee_details_list_display.php',function(){});
}
 $(document).ready(function(){
    //$('#st_roll').focus();
    $('#st_roll').keyup(function(ex){
	    if(ex.which==13) {
		    $('#st_class').focus();
		}
	 });     
	 data_loading(); 
	 $('#search').click(function(){
	   var st_class = $('#st_class').val();
	   var st_roll  = $('#st_roll').val();	   
	   var st_month = $('#months').val();
	   var dataStr = 'class='+st_class+'&roll='+st_roll+'&month='+st_month;
	   
	   $.ajax({
	       type:'post' ,
		   url: 'fee_details_search.php' ,
		   data: dataStr ,
		   cache:false ,
		   success:function(st) {
			   data_loading();      
		   }
	   });	   
	 });
 });
</script>

<!-- fee_details_list_display.php -->

<div id="fee_detail_show"></div>
</div>