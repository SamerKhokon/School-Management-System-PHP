<script type="text/javascript">




	
	$(document).ready(function()
     {
		
	
		 $("#mobile_no").focus();
		 
		 $("#submit").click(function()
		 {
			var mobile_no= $("#mobile_no").val();
			var stakeholder_name= $("#stakeholder_name").val();
		    var date_from= $("#date_from").val();
		    var date_to= $("#date_to").val();alert(mobile_no);
		jQuery("#list").jqGrid('setGridParam',{url:"includes/inbox_search_pro.php?mobile_no=45353453",page:1}).trigger("reloadGrid");
   
			if(mobile_no=="") 
			{
			
				alert("Mobile NO is  empty");
				$("#mobile_no").focus();
				return;
			}
			
			
		 
		 

		  
		});  
					
	});
			
	
		
	</script>
				

<?php

$date=date('F d,Y');

 $sql_stakeholder_name="select  STAKEHOLDER_UID from  STAKEHOLDER_CTRL";  

    $sql_statement_stakeholder_name=OCIParse($connection,$sql_stakeholder_name);
	
	OCIExecute(  $sql_statement_stakeholder_name);
	
	$count=0;

    while(OCIFetch($sql_statement_stakeholder_name))
    {
	
	  $stakeholder_name[$count]=OCIResult( $sql_statement_stakeholder_name,STAKEHOLDER_UID);
	  
	  $count++;
	  
	}
  
	
?>

<br />
<form>

<fieldset>

 <legend>Search</legend>

 <table>
 
  <tr>
  
     <td>Mobile NO.:</td>
     
     <td>
     
       <input type="text" id="mobile_no"/>
    
    </td>
    
  </tr>
  
  <tr>
   
     <td>Request Form:</td>
     
     <td>
     
     <select id="stakeholder_name">
     
     <option></option>
     
     <?php
     
        for($i=0;$i<$count;$i++){
                 
                  echo "<option value='$stakeholder_name[$i]'>";
                     echo $stakeholder_name["$i"];
                  echo "</option>";
				  
		 }
				  
	  ?>
                  
      </select>
      
    
       
     </td>
     
   </tr>
   
    <tr>
   
     <td>Date From:</td>
     
     <td>
     
       <input type="text" id="date_from" value="<?php echo $date;?>" readonly="readonly"/>
       
     
       
        <script type="text/javascript">
                  new Calendar({
                          inputField: "date_from",
                          dateFormat: "%B %d, %Y",
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
       
     </td>
     
     <td>To:</td>
     
     <td>
     
      
       <input type="text" id="date_to" value="<?php echo $date;?>" readonly="readonly"/>
       
      
                <script type="text/javascript">
                  new Calendar({
                          inputField: "date_to",
                          dateFormat: "%B %d, %Y",
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
       
     </td>
     
   </tr>
   
    <tr>
   
     <td>
     
       <input type="button" value="Search" id="submit"/>
       
     </td>
     
    
     
   </tr>
  
 </table>
 
 </fieldset>
 
 </form>
 
 <br/><br/>
  
  <script type="text/javascript">   
  
  
  //var greed_width=$(".scroll").width();
//  greed_width=greed_width-70;
  
  jQuery(document).ready(function()
  {
  

  
  
  jQuery("#list").jqGrid({ 
  
  
  url:'includes/inbox_search_pro.php', 
  datatype: 'xml', 
  method: 'GET',
  colNames:['Request Form','Mobile NO','Creation Time','Status'],
  
  colModel :[{name:'request_form', index:'request_form', width:70, align:'right'},
  
   {name:'mobile_no', index:'mobile_no', width:70, align:'right'},
    
	 {name:'creation_time', index:'creation_time', width:70, align:'right'},
	 
	 {name:'status', index:'status', width:70, align:'right'} ],
	   
	  pager: jQuery('#pager'), rowNum:10, rowList:[10,20,30], 
	  sortname: 'INBOX_ID',
	   sortorder: "asc", 
	   //width:greed_width,
	   width:700,
	   viewrecords: true, 
	   imgpath: 'themes/basic/images', 
	   caption: 'My first grid'
	   
	 }) .navGrid("#pager",{edit:true,search:true});  
	 
	 
	
	 
	}); 
    
   
    </script> 
    

    
    
    
    <table id="list" class="scroll" width="100%" ></table> 
    
    <div id="pager" class="scroll" style="text-align:center;">
    
    </div> 
    
    