<div id="content" class="box">
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php  $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Student Notice </legend>
			
			
			<!-- <img src="../notices/picture010.jpg"/> -->
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				             
					<tr><td>		 
						<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
								<tr>	
									 <th>Title</th> 
									 <td> <input type="text" class="inp-form"  id="notice_title" name="notice_title" /> </td>
								</tr>						
								<tr>	
									 <th>Date</th> 
									 <td> <input type="text" onclick='scwShow(this,event);'  class="inp-form"  
									id="notice_date" name="notice_date" value="<?php echo date('d-m-Y') ?>" readonly="readonly" /> </td>
								</tr>						
								<tr>
									 <th>Upload Notice</th>
									 <td>									 
										<form>	
											<input type="file" size="30" id="ur_notice"  name="ur_notice"   class="inp-form" 
											onchange="fileUpload(this.form,'?SM_id=59&menu_id=31&nev=new_notice_add','upload'); return false;"/>
										</form>									 
									 </td>
								</tr>
								
									
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="notice_add">Submit</button> </td>
								</tr>										
							</table>	 
						</td>		 
						<td>		 
					</td>
                </tr>
             </table>
      <!--
 			<img src="../notices/purer2_5418_01_en13-126686.gif"/>			  -->
			<input type="hidden" id="temp_product_name" value="" />			 
				<br/>		
				
			<br/>		
			<br/>		
				
			<div id="notice_list"></div>
	
	</fieldset>
    </div>
</div>
<?php   
	    if(isset($_FILES['ur_notice']['name'])) 
		{
		   $file_name = basename($_FILES['ur_notice']['name']);
		   move_uploaded_file($_FILES['ur_notice']['tmp_name']  ,  "../notices/".$file_name );			
     	}
?>  
<!-- /content -->
<script type="text/javascript">
function fileUpload(form, action_url, div_id) 
{
    var iframe = document.createElement("iframe");
    iframe.setAttribute("id"    , "upload_iframe");
    iframe.setAttribute("name"  , "upload_iframe");
    iframe.setAttribute("width" , "0");
    iframe.setAttribute("height", "0");
    iframe.setAttribute("border", "0");
    iframe.setAttribute("style" , "width: 0; height: 0; border: none;");
 
    form.parentNode.appendChild(iframe);
    window.frames['upload_iframe'].name = "upload_iframe";
 
    iframeId = document.getElementById("upload_iframe");
 
    var eventHandler = function () 
	{ 
		if (iframeId.detachEvent) iframeId.detachEvent("onload", eventHandler);
		else iframeId.removeEventListener("load", eventHandler, false);

		if (iframeId.contentDocument) 
		{
			content = iframeId.contentDocument.body.innerHTML;
		} 
		else if (iframeId.contentWindow) 
		{
			content = iframeId.contentWindow.document.body.innerHTML;
		}
		else if (iframeId.document) 
		{
			content = iframeId.document.body.innerHTML;
		} 
		document.getElementById(div_id).innerHTML = content; 
		setTimeout('iframeId.parentNode.removeChild(iframeId)', 4050);
    }
 
    if (iframeId.addEventListener) iframeId.addEventListener("load", eventHandler, true);
    if (iframeId.attachEvent) iframeId.attachEvent("onload", eventHandler);
 
    form.setAttribute("target", "upload_iframe");
    form.setAttribute("action", action_url);
    form.setAttribute("method", "post");
    form.setAttribute("enctype", "multipart/form-data");
    form.setAttribute("encoding", "multipart/form-data"); 
    form.submit(); 
    document.getElementById(div_id).innerHTML = "Uploading product picture...";
}
</script>
<script type="text/javascript">
   $(document).ready(function() {
        $("#ur_notice").change(function(){
			 var v= $('#ur_notice').val()
			 //alert(v);
			 $("#temp_product_name").val('');
			 $("#temp_product_name").val(v);
	    });
		$("#notice_list").load('includes/notice_list.php',function(){});		
        $("#notice_add").click(function()
	    {
		     var notice_title     = $("#notice_title").val();
			 var notice_file_name = $("#temp_product_name").val();
			 var notice_date 	  = $("#notice_date").val();
			 var branch_id        = $("#branchid").val();
			 var dataStr 		  = "notice_title="+notice_title+"&notice_file_name="+notice_file_name+"&notice_date="+notice_date+"&branch_id="+branch_id;
			 
			 $.ajax({
				type:"post" ,
				url:"includes/new_notice_add_by_ajax.php" ,
				data:dataStr ,
				success:function(st)
				{
					alert(st);	
                    $("#notice_list").load('includes/notice_list.php',function(){});					
				}
			 });
	    });
   });
</script>