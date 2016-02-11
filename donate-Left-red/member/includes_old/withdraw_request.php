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
			
            var url='includes/withdraw_request_GridShow.php?search=true';
		  var datastring='&mobile_no='+mobile_no+'&login_id='+login_id+'&date_from='+date_from+'&date_to='+date_to+'&req_status='+req_status+'&search=true';
		  
		  var url_data=url+encodeURIComponent(datastring);
		  
		  //alert(url_data);
           $("#list").setGridParam({datatype:'xml',url:url+datastring,page:1}).trigger('reloadGrid'); 


	  
				
         });
		 
	 
	 
	 
	 
	 
	 
 jQuery("#list").jqGrid(
		     { 
			  url:'includes/withdraw_request_GridShow.php', 
			  datatype: 'xml', 
			  method: 'GET',
			  colNames:['Mobile','Login Id','Amount','Request Date'],			  
			  
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
						 {name:'amount', index:'amount', width:160,formoptions:{level:'amount'},editable:true},			            					
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
				   editurl:'includes/withdraw_request_GridEdit.php',
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
	  
	  
	  
	  
  <div class="form_row">
  
     <label class="left"> Request status: </label>	  	  
	  
	  <select  id="req_status" name="req_status" class="form_input">
	  <option value="new">All</option>
	  <option value="new">New</option>
	  <option value="reject">Reject</option>
	  <option value="Paid">Paid</option>
	  <option value="Process">Process</option>
	  </select>
	  </div>
	  
	<div class="form_row">
    
      <label class="left"> Login Id: </label>	  
	  
	  <input type="text" id="login_id" class="form_input">
	  
	  
	  </div>
	  
	  <div class="form_row">
      <label class="left">Mobile no: </label>	  
	  
	  <input type="text" id="mobile" class="form_input">
	  </div>
	
	  
	   <div class="form_row">
      <label class="left">Amount: </label>	  
	  
	  <input type="text" id="Amount" class="form_input">
	  </div>
	  
	  
	 
	   <div class="form_row">
      <label class="left">Agent&nbsp;pin:</label>	  
	  
	  <input type="text" id="agent_pin" class="form_input">
	  </div>
	  
	   
	   
	  
	  	<div class="form_row">
      <label class="left">   Date from: </label>	  
	  
	 
	    <input type="text" name="date_from" id="date_from" value="<?php echo date('Ymd');?>" class="form_input" />
       
     
       
        <script type="text/javascript">
                  new Calendar({
                          inputField: "date_from",
                          dateFormat: "%Y%m%d",
                          trigger: "date_from",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                 
                </script>
	  
	  
	  </div>
	  
	
	 <div class="form_row">
      <label class="left">   Date To:</label>	  
	  
	 
	    <input type="text" id="date_to" value="<?php echo  date('Ymd');?>" class="form_input" />
       
     
       
        <script type="text/javascript">
                  new Calendar({
                          inputField: "date_to",
                          dateFormat: "%Y%m%d",
                          trigger: "date_to",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                 
                </script>
	  
	  
	  </div></b>
<input type="submit" id="submit" value="submit"/>
	  </div>
	  </div>  
      
      <table id="list" class="scroll"></table> 
    
    <div id="pager" class="scroll" style="text-align:center;"> </div> 
	
    
     
    </div>
    <!-- /content -->
	