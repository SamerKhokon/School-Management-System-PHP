<script type="text/javascript">
 $(document).ready(function(){
	$("#emp_id").change(function(ex)
	{
	   var emp_id = $('#emp_id').val();
	   if(emp_id!="")
	   {
	    $.ajax({
			type:"post",
			url:"includes/emp_salary_form_by_ajax.php",
			data:"emp_id="+emp_id,
			cache:false ,
			success:function(st){
				//alert(st);			
                var parse = st.split('#');		
                 				
				$('#basic_salary').val(parse[0]);
				$('#house_rent').val(parse[2]);
				$('#medical').val(parse[1]);
				$('#others').val(parse[3]);
				$("#festival_bonus").val(parse[4]);
			}
	    });
		}else{
		  alert("Select employee");
		}
	});
});	
</script>
<?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"); 
      include("../db.php");
?>
<div id="content" class="box">
    <fieldset>
        <legend>Salary Setting</legend>
        <table width="30%" border="0" cellpadding="0" cellspacing="0" >
		<tr>
            <th width="5%" valign="top">For Month:</th>
			<td width="5%">
			<select name="class" id="for_month" class="inp-form">
			  <option value="">select month</option>
			  <?php for($i=0;$i<count($months);$i++) {
			    $month= date('Y-m-01',strtotime($months[$i]));
			  ?>
			  <option value="<?php echo $month;?>"><?php echo $months[$i]."-".date('Y');?></option>
			 <?php } ?>
			</select>
			</td>
			
			<th width="5%" valign="top">Basic:</th>
			<td width="5%">
			<input type="text" id="basic_salary" class="inp-form"/>
			</td>			
		</tr>
		<tr>	
            <th width="5%" valign="top">Employee:</th>
			<td width="5%">
			<select name="class" id="emp_id" class="inp-form">
			  <option value="">select employee</option>
			  <?php $str = "SELECT empid,name FROM `tbl_emp_salary_sturcture`";
			        $sql = mysql_query($str);
					while($rs = mysql_fetch_array($sql)){
			  ?>
			  <option value="<?php echo $rs[0];?>"><?php echo $rs[1];?></option>
			 <?php } ?>
			</select>
			</td>
			<th width="5%" valign="top">House Rent:</th>
			<td width="5%">
			<input type="text" id="house_rent" readonly="readonly" class="inp-form"/>
			</td>
        </tr>	
		<tr>	
            <th width="5%" valign="top">Medical:</th>
			<td width="5%">
			<input type="text" id="medical" readonly="readonly" class="inp-form"/>
			</td>
			<th width="5%" valign="top">Festival Bonus:</th>
			<td width="5%">
			<input type="text" id="festival_bonus" readonly="readonly" class="inp-form"/>
			</td>
        </tr>	
		<tr>	
            <th width="5%" valign="top">Others:</th>
			<td width="5%">
			<input type="text" id="others" readonly="readonly" class="inp-form"/>
			</td>
				
            <th width="5%" valign="top">Date:</th>
			<td width="5%">
			 <input type="text" onclick='scwShow(this,event);'  class="inp-form"  
			id="notice_date_from" name="notice_date_from" value="<?php echo date('d-m-Y');?>" 
			readonly="readonly" />
			</td>
			<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
        </tr>				
		<tr>
		 <th width="5%" valign="top"></th>
		 <td>
		 <input type="button" id="search_btn" name="sub_btn" class="form-submit" />
		 </td>
		</tr>
		</table>
		
</fieldset>    
    
	<div id="data_loading_div"></div>
	
</div>