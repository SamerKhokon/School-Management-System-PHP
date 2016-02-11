
<div id="content" class="box">
<script type="text/javascript">
jQuery(document).ready(function(){  




$("button").click(function()
  {
  
  
    $("#list").trigger("reloadGrid");
	
    var class_name = $("input#class_name").val();  
    var total_student =$("input#total_student").val();      
    var total_ct = $("input#total_ct").val();  
	var total_st = $("input#total_st").val();  
	var daily_class = $("input#daily_class").val();  
    var class_time = $("input#class_time").val();  
	var branchid = $("input#branchid").val();  
    
	var dataString ='class_name='+ class_name + '&total_student=' + total_student + '&total_ct=' + total_ct + '&total_st='+ total_st +'&daily_class='+ daily_class +'&class_time='+ class_time +'&branchid='+ branchid +'&oper=add';  
	//alert(dataString);
   

   $.ajax({  
     type: "POST",  
     url: "includes/edit_class_config.php",  
     data: dataString,  
     success: function()
	 {  
	 $("#list").trigger("reloadGrid");					   
     }  
   });  
    return false;
  });





function myelem (value, options) {
  var el = document.createElement("input");
  el.type="text";
  el.value = value;
  return el;
}
 
function myvalue(elem, operation, value) {
    if(operation == 'get') {
       return $(elem).find("input").val();
    } else if(operation == 'set') {
       $('input',elem).val(value);
    }
}

var gridwidth = $('.scroll').width(); 
    gridwidth = gridwidth-50; 
var lastSel;
var branchid=<?php echo $branchid;?>;
  jQuery("#list").jqGrid(
  {
    url:'includes/grid_data_classinfo.php?branchid='+branchid, 
    datatype: 'xml', 
    mtype: 'GET', 
    colNames:['ID','Class name', 'Total Student','Total CT','Total ST','Daily Class','Class Start Time'], 
	//colNames:['ID','Class name'], 
    colModel :[  
      {name:'id', index:'id',editable : true,editype:'text',required : true,formoptions: { label: 'id' }},        
	  {name:'class_name', index:'class_name',editable : true,required : true,formoptions: { label: 'class_name' }},        
	  {name:'total_student', index:'total_student', editable : true,required : true,formoptions: { label: 'total_student' }},  
      {name:'total_ct', index:'total_ct',editable : true,required : true,formoptions: { label: 'total_ct'}},  
      {name:'total_st', index:'total_st',editable : true,required : true,formoptions: { label: 'total_st'}},  
      {name:'daily_class', index:'daily_class', sortable:false,editable : true,required : true,formoptions: { label: 'daily_class'}} , 
	  {name:'class_time', index:'class_time', sortable:false,editable : true,required : true,formoptions: { label: 'class_time'}} ], 
	  
	  
    pager: jQuery('#pager'), 
    rowNum:10, 
    rowList:[10,20,30], 
    sortname: 'id', 
    sortorder: "desc", 
	width: gridwidth,
	height:'Auto',
	multiselect: true, 
	editable: true,
    viewrecords: true, 
    imgpath: 'themes/steel/images', 
    caption: 'Details Information',     
	editurl: 'includes/edit_class_config.php',	
  }).navGrid("#pager",{edit:true,search:true });  
  
  
  

});  

</script> 

<fieldset class="login">
<legend>Add New Class Details</legend>
			<div>
				<label for="name">Class Name</label> 
				<input  type="text" id="class_name" name="class_name">
			</div>
			    <div>
				<label for="Name">Total Student</label> 				
				<input  type="text" id="total_student" name="total_student">
				</div>
			    <div>
				<label for="name">Total CT</label>
				<input  type="text" id="total_ct" name="total_ct">			
				</div>
				
			    <div>
				<label for="name">Total ST</label>
				<input  type="text" id="total_st" name="total_st">						
				</div>
				
				<div>
				<label for="name">Total No of daily class</label>
				<input  type="text" id="daily_class" name="daily_class">						
				</div>
				
				<div>
				<label for="name">Class Time</label>
				<input  type="text" id="class_time" name="class_time">						
				<input type="hidden" id="branchid" name="branchid" value="<?php echo $branchid;?>">

				</div>
				
				
				
				
				<div>
				
				 <button id="button">submit</button>
				
			</div>
</fieldset>


<table id="list" class="scroll" width="100%"></table>  
<div id="pager" class="scroll" style="text-align:center;"></div>  


</div>