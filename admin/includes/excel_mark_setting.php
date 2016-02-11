<?php session_start(); include('db.php');
$academic_year = date('Y');
?>
<script type="text/javascript">
  $(document).ready(function()  {  
        $("#class_id").change(function(){
		   var class_id = $("#class_id").val();
		   //alert(branchid);
		   if(class_id!="") {
		        $.ajax({
				  type:"post" ,
				  url:"includes/section_fetch.php" ,
				  data:"class_id="+class_id+"&branch_id=1",
				  success:function(st){
				   //alert(st);
				    $("#section_id").html(st);
				  }
				});
		   }else
		   {
		     $("#section_id").html(' ');
		   }
		});
            $("#my_submit").submit(function(){
			
			    var term_id = $("#terms").val();
				var section_id = $("#section_id").val();
				var class_id = $("#class_id").val();
				if(section_id !="" ) {
				var dataStr = "term_id="+term_id+"&section_id="+section_id+"&class_id="+class_id;
				alert(dataStr);
				return true;
				}else{
				  return false;
				}
			});
  });
</script>
<div id="content" class="box">
<input type="hidden" id="branchid" name="branchid" value="1"/>
<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	<fieldset>
		<legend>Exam Marks Entry(Upload Excel file)</legend>
		<form method="post" action="?menu_id=11&nev=exam_mark_setting_file_upload" enctype="multipart/form-data">				   		<table width="100%"  border="0" cellpadding="0" cellspacing="0">
            <tr>	
                <th valign="top">Class: </th>	
                <td><select id="class_id" name="class_id" class="styledselect-normal">
                <option value="">select class</option>																																		
                <?php 
                $qry = mysql_query("select  id,class_name from std_class_config where branch_id='$branchid' "); 				
                while ($row=mysql_fetch_array($qry)){
                echo "<option value='" .$row[0]. "'>$row[1]</option>";
                }
                ?>				            												
                </select></td>	 
                <th valign="top">Section: </th>	
                <td><select id="section_id" name="section_id" class="styledselect-normal">                                                
                </select>
                </td>										 
            </tr>				   					
            <tr>		
                <th valign="top">Term : </th>							
                <td><select id="term_id" name="term_id" class="styledselect-normal">
                <?php
                $sql_exam = "select `id`, `exam_name` from `std_exam_config_new` where `flag`=1 and `academic_year`=$academic_year";
                $res_exam = mysql_query($sql_exam);
                while($row_exam = mysql_fetch_array($res_exam))
                {
                echo '<option value="'.$row_exam[0].'">'.$row_exam[1].'</option>';
                }
                ?>
                </select></td>
                <th>Uload your file: &nbsp; &nbsp;</th>
                <td><input type="file" name="excel_file"/></td>
                <td><div class="bubble-left"></div>
                <div class="bubble-inner"><a href="../exam/includes/modify_mark_result.xls">Sample File</a></div>
                <div class="bubble-right"></div>
                </td>								 
                <td>&nbsp;</td>							
                <td>&nbsp;</td>							
                <td>&nbsp;</td>							
            </tr>
            <tr>
                <td>&nbsp;</td>		
                <td ><input type="submit" id="my_submit" value="upload" class="form-submit"/></td>
                
                <td>&nbsp;</td>							
                <td>&nbsp;</td>	
                <td>&nbsp;</td>							
                <td>&nbsp;</td>							
            </tr>				   
        </table>
        </form>
	</fieldset>			
    </div>
</div>
<!-- /content -->

<!-- exam_mark_setting.php -->
<!-- excel_mark_setting.php   -->