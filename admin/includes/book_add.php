	<?php  
	 require_once("../db.php"); 
  session_start();
	$branchid = $_SESSION['LOGIN_BRANCH']; ?>
<div id="content" class="box">
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>


    <fieldset>
		    <legend>Add New Book </legend>
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				             
					<tr><td>		 
						<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
								<tr>
									 <th>Class</th>
									 <td>
									 <select id="class_id"  class="styledselect-normal">
									 <option></option>
									 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
										while ($row=mysql_fetch_array($qry)){ ?>
											 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
										<?php }  ?>	 										
									 </select>						 
									 </td>
								</tr>
								<tr>	
								<td> &nbsp; </td>
									 <td> &nbsp; </td>
								</tr>																	
                                <tr>								
									 <th>Book Title</th> 
									 <td> <input type="text"   id="book_title" class="inp-form"/></td>
								</tr>	
                                <tr>								
									 <th>Book Author</th> 
									 <td> <input type="text"   id="book_author" class="inp-form"/></td>
								</tr>									
                                <tr>								
									 <th>Book ISBN</th> 
									 <td> <input type="text"   id="book_isbn" class="inp-form"/></td>
								</tr>									
								
								<tr>	
								<td> &nbsp; </td>
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="book_add_btn">Submit</button> </td>
								</tr>										
							</table>	 
						</td>		 
						<td>		 
					</td>
                </tr>
             </table>				
				<br/>		
				<br/>	
				 <div id="book_list"></div>
	</fieldset>	

	
	
    </div>
</div>
<!-- /content -->
<script type="text/javascript">
 $(document).ready(function(){
        		$('#book_list').load('includes/book_list.php',function(){});
				
				
		$('#book_title').keypress(function(ex){
		    if(ex.which == 13){
			   var book_title = $('#book_title').val();
			   if(book_title=="") {
			      alert('Enter book title');
			      $('#book_title').focus();
				  return false;
			   }else{
			     $('#book_author').focus();
			   }
			}
		});		
		
		$('#book_author').keypress(function(ex){
		    if(ex.which == 13){
			   var book_author = $('#book_author').val();
			   if(book_author=="") {
			      alert('Enter book author name');
			      $('#book_author').focus();
				  return false;
			   }else{
			     $('#book_isbn').focus();
			   }
			}
		});				
		
		$('#book_isbn').keypress(function(ex){
		    if(ex.which == 13){
			   var book_isbn = $('#book_isbn').val();
			   if(book_isbn=="") {
			      alert('Enter book ISBN');
			      $('#book_isbn').focus();
				  return false;
			   }else{
			     $('#book_add_btn').focus();
			   }
			}
		});						
		
		
				
		$("#class_id").change(function(){
			   var class_id = $("#class_id").val();		   
			   if(class_id == "" ) {
				  alert("Please select any class");
				  return false;
			   } else{
			       $("#book_title").focus();
				}	   
		});	
		
		var reset_fields = function(){
			 //$("#class_id").val();
			 $("#book_title").val(' ');
			 $("#book_author").val(' ');
			 $("#book_isbn").val(' ');
		}
		
		$("#book_add_btn").click(function(){	
		     var class_id = $("#class_id").val();
			 var title = $("#book_title").val();
			 var author = $("#book_author").val();
			 var isbn = $("#book_isbn").val();
			 var branch = $("#branchid").val();
			 var dataStr = 'class_id='+class_id+'&book_title='+title+'&book_author='+author+'&isbn='+isbn+'&branch_id='+branch;
			 
			 
			 if(class_id=='')
			 {
			   alert('Select class');
			   return false;
			 }
			 else if(title=='')
			 {
			   alert('Enter book title');
			   $('#book_title').focus();
			   return false;
			 }
			 else if(author=='')
			 {
			   alert('Enter book author');
			   $('#book_author').focus();
			   return false;
			 }			 
			else if(isbn=='')
			 {
			   alert('Enter book isbn');
			   $('#book_isbn').focus();
			   return false;
			}			 
			else
			{			 
			    
				 $.ajax({
				   type:'post',
				   url:'includes/book_list_insert.php',
				   data:dataStr ,
				   success:function(st){
					 alert(st);
					 reset_fields();
					 $('#book_list').load('includes/book_list.php',function(){});
					 $("#book_title").focus();
				   }
				 });
			 }
			 
		}); 
		

 });
</script>