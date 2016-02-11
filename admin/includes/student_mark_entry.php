<script type="text/javascript">
 $(document).ready(function(){
    $('#class_name').focus();
	$('#class_name').keypress(function(ex){
	    if(ex.which==13) {
		   $('#section').focus();
		}
	});
	$('#section').keypress(function(ex){
	    if(ex.which==13) {
		   $('#subject').focus();
		}
	});	
	$('#subject').keypress(function(ex){
	    if(ex.which==13) {
		   $('#roll').focus();
		}
	});	
	$('#roll').keypress(function(ex){
	    if(ex.which==13) {
		   $('#subjective_mark').focus();
		}
	});		
	$('#subjective_mark').keypress(function(ex){
	    if(ex.which==13) {
		   $('#objective_mark').focus();
		}
	});	
	$('#objective_mark').keypress(function(ex){
	    if(ex.which==13) {
		   $('#class_test').focus();
		}
	});			
	$('#class_test').keypress(function(ex){
	    if(ex.which==13) {
		   $('#term').focus();
		}
	});	
	$('#term').keypress(function(ex){
	    if(ex.which==13) {
		   $('#sub_btn').focus();
		}
	});		
	$("#sub_btn").click(function(event){	    		
		//start here		
		var class_name		= $('#class_name').val();
		var section			= $('#section').val();
		var subject 		= $('#subject').val();
		var roll			= $('#roll').val();
		var subjective_mark = $('#subjective_mark').val();
		var objective_mark  = $('#objective_mark').val();
		var class_test      = $('#class_test').val();
		var term            = $('#term').val();
		
		var dataStr = 'class_name='+class_name+'&section='+section+
		'&subject='+subject+'&roll='+roll+'&subjective_mark='+subjective_mark+
		'&objective_mark='+objective_mark+'&class_test='+class_test+'&term='+term;
	    alert(dataStr);	
	});
});	
</script>

<div id="content" class="box">

    <fieldset>
        <legend>Student Mark Entry</legend>
        <table width="81%" border="0" cellpadding="0" cellspacing="0" >
		<tr>
            <th width="24%" valign="top">Class:</th>
			<td width="18%"><input size="30%" type="text" name="class_name" id="class_name" class="inp-form"/></td><td></td>
            <th width="20%" valign="top">Subjective Mark:</th>
			<td width="21%"><input size="30%" type="text" name="subjective_mark" id="subjective_mark" class="inp-form"/></td>
        </tr>
        <tr>
            <th valign="top">Section:</th>
            <td><input type="text" name="section" id="section" class="inp-form"/></td><td width="17%"></td>
            <th valign="top">Objective Mark:</th>
            <td><input type="text" name="objective_mark" id="objective_mark" class="inp-form"/></td>
        </tr>
        <tr>
            <th valign="top">Subject:</th>
            <td><input type="text" name="subject" id="subject" class="inp-form"/></td><td width="17%"></td>
            <th valign="top">Class Test:</th>
            <td><input type="text" id="class_test" name="class_test" class="inp-form"/></td>
        </tr>
        <tr>
            <th valign="top">Roll:</th>
            <td><input type="text" name="roll" id="roll" class="inp-form"/></td><td width="17%"></td>
      <th valign="top">Term:</th>
            <td><input type="text" id="term" name="term" class="inp-form"/></td>			
        </tr>
    </table>
  </fieldset>

    <input type="button" id="sub_btn" name="sub_btn" class="form-submit" />
</div>