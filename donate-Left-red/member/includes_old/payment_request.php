<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script>  

 
 
 <script type="text/javascript">   
    
   $(document).ready(function()
     { 	 
	 
	 
	 $("#submit").click(function()
		 {			
			var mobile_no= $("#mobile").val();
			var login_id= $("#login_id").val();
            var date_from= $("#date_from").val();
		    var date_to= $("#date_to").val();
			var req_status=$("#req_status").val();			
            var url='includes/payment_request_GridShow.php?search=true';
		    var datastring='&mobile_no='+mobile_no+'&login_id='+login_id+'&date_from='+date_from+'&date_to='+date_to+'&req_status='+req_status+'&search=true';		  
		    var url_data=url+encodeURIComponent(datastring);		  
		    //alert(url_data);
            $("#list").setGridParam({datatype:'xml',url:url+datastring,page:1}).trigger('reloadGrid'); 

	  
				
         });
		 
	 
	 
	 
	 
	 
	 
 jQuery("#list").jqGrid(
		     { 
			  url:'includes/payment_request_GridShow.php', 
			  datatype: 'xml', 
			  method: 'GET',
			  colNames:['Mobile','Login Id','Pin','Amount','Agent','Date'],			  
			  
			  /*postData: {
						MobileNo:mobile_no,
						MsgBody:message_body,
				        DateFrom:date_from,
						DateTo:date_to		
						},
				*/		
          
			  colModel:[ 
			             {name:'mobile_no', index:'mobile_no', width:50,formoptions:{level:'mobile_no'},editable:true}, 
						 {name:'login_id', index:'login_id', width:50,formoptions:{level:'login_id'},editable:true}, 
			             {name:'agent_pin', index:'agent_pin', width:160,formoptions:{level:'agent_pin'},editable:true},
						 {name:'amount', index:'amount', width:160,formoptions:{level:'amount'},editable:true},
			             {name:'agent_name', index:'agent_name', width:70,formoptions:{level:'agent_name'},editable:true},
					
						{name:'Date', index:'Date', width:70} 
						],	   
				   rowNum:10, 
				   pager: jQuery('#pager'), 
				   rowNum:10, 
				   
				   rowList:[10,20,30,50,80,100], 
				   sortname: 'ID',
				   sortorder: "asc", 
				   width:'960',
				   height:'Auto',
				   multiselect:true,
				   viewrecords: true, 
				   imgpath: 'themes/basic/images', 
				   caption: 'Outbox Report',
				   editurl:'includes/payment_request_GridEdit.php',
				   editoption: true,
				   rownumbers: true, 
				   excel:true,
				   //loadonce:true,
				   toppager: true,

				   
				

           

				   
				}).navGrid("#pager",{edit:false,search:true,add:false,del:false});

				  
		    
	
		 
				  
				  
			
	});
</script>


<!-- Content (Right Column) -->
    <div id="content" class="box">  
      
	  
	
	      <div class="title" >Payment request Information</div> 
		   <div class="form_tab">	
		  
	  <div class="form">
	  <b> 
	  
	  
	  
	   <form method="POST" action="">
  
    <dl>
	<dt> 
		<label for="firstname">Login Id:</label>
	</dt>
	<dd>
		  <input type="text" name="login_id" id="login_id" class="form_inputs" readonly="readonly" value="<?php echo $login_id;?>">
		<span class="hint">To Login.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	  
	<!--<div class="form_row">
    
      <label class="left"> Login Id: </label>	  
	  
	  <input type="text" name="login_id" id="login_id" class="form_input" readonly="readonly" value="<?php echo $login_id;?>">
	  
	  
	  </div>-->
	  <dt> 
		<label for="firstname">Number of Packeg:</label>
	</dt>
	<dd>
		  <select  id="no_of_pak" name="no_of_pak" class="form_inputs" >
	  <?php 
	  for($i=1;$i<=10;$i++)
	  {
	  echo '<option value="'.$i.'">'.$i.'</option>';
	  }
	  ?>
	  </select>
		<span class="hint">Per packeg 2000Tk.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	  
	  <!--<div class="form_row">
      <label class="left">Number of Packeg: </label>	  
	  
	  <select  id="no_of_pak" name="no_of_pak" class="form_input">
	  <?php 
	  //for($i=1;$i<=10;$i++)
	  {
	  //echo '<option value="'.$i.'">'.$i.'</option>';
	  }
	  ?>
	  </select>Per packeg 2000Tk.
	  </div>-->
	<dt> 
		<label for="firstname">Amount:</label>
	</dt>
	<dd>
		 <input type="text" id="Amount" name="amount" class="form_inputs">
		<span class="hint">Amount.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	  
	  <!-- <div class="form_row">
      <label class="left">Amount: </label>	  
	  
	  <input type="text" id="Amount" name="amount" class="form_input">
	  </div>-->
	  
	  <dt> 
		<label for="firstname">Agent Name:</label>
	</dt>
	<dd>
		  <select  id="agent_name" name="agent_name" class="form_inputs">
	  
	  <?php $sql ="select * from collection_agent";
	  $result=mysql_query($sql);
	  while($row=mysql_fetch_array($result))
	  {
	  echo '<option value="'.$row['agent'].'">'.$row['agent'].'</option>';
	  }
	  
	  ?>
	  
	  </select>
		<span class="hint">How to sent Money.<span class="hint-pointer">&nbsp;</span></span>
	</dd>

	  
	 <!-- <div class="form_row">
 
      <label class="left"> Agent Name: </label>	  	  
	  
	  <select  id="agent_name" name="agent_name" class="form_input">
	  
	  <?php// $sql ="select * from collection_agent";
	  $result=mysql_query($sql);
	  while($row=mysql_fetch_array($result))
	  {
	  echo '<option value="'.$row['agent'].'">'.$row['agent'].'</option>';
	  }
	  
	  ?>
	  
	  </select>How to sent Money
	  </div>-->
	  
	  <dt> 
		<label for="firstname">Transection Id:</label>
	</dt>
	<dd>
		  <input type="text" id="trans_id" name="trans_id" class="form_inputs">
		<span class="hint">Transection Id.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	<dd>
		<input
			type="submit"
			class="button_sub"
			id ="submit"
			value="Submit" />
	</dd>
	</dl>
	 
	   <!--<div class="form_row">
      <label class="left">Transection Id:</label>	  	  
	  <input type="text" id="trans_id" name="trans_id" class="form_input">*
	  </div>-->
	  
	   

	  
	
	
	  
	  </b>
</form>
	  </div>
	  </div>  
	  
	  
	  
	  
	  
	  <?php
	  
	  if (isset($_POST['submit']))
	  {
	  $no_of_pak=$_POST['no_of_pak'];
	  $amount=$_POST['amount'];
	  $agent_name=$_POST['agent_name'];
	  $trans_id=$_POST['trans_id'];
	   $pak_price=$no_of_pak*2000;
	  $quentity=$no_of_pak*3;
	  
	  
	  
	  if (($amount=$pak_price) and $amount!="" and  $trans_id!="")
	  {
	  
	     $payment_date=date('Ymdhis');
		 $creation_time=date('d/m/Y h:i:s');		 
		 $chk_pin="select count(*) as count_pin from payment_request where payment_receive_pin='$trans_id'";
		 $result_chk_pin=mysql_query($chk_pin);
		 $row_chk_pin=mysql_fetch_array($result_chk_pin);
		 
		  if ($row_chk_pin['count_pin']<1)
		 {		 
		 
		 $ins_pay_req="insert into payment_request (login_id,amount,product_quentity,payment_agent,payment_receive_pin,payment_date,creation_time,pos_id) 
		 values('$login_id','$amount','$quentity','$agent_name','$trans_id','$payment_date','$creation_time',(select pos_id from user_info where login_id='$login_id' limit 1))";
		 mysql_query($ins_pay_req);
		 echo "<h1>Data successfully entered.your request waiting for Approval.</h1>";
		 
		 }
		 else
		 {
		 
		 echo "<h1>Duplicate pin number entered</h1>";
		 }
	  
	  
	  }
	  
	  else
	  {
	   echo "<h1>you have given wrong information</h1>";
	  }
	  
	  
	  
	  
	  
	  }
	  
	  ?>

	

	
		
	  
	  
	  
	  
	  
     
    </div>
    <!-- /content -->
	
	
	