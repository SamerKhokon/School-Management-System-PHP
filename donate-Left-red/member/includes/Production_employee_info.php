<!-- Content (Right Column) -->
    <div id="content" class="box">
	
      <!--<h1><?php //echo $_GET['nev'];?></h1>-->
      
	  
	  
	  <!-- Headings -->
      
	 <!--
	  <h2>Heading H2</h2>
      
	  <h3>Heading H3</h3>
      <h4>Heading H4</h4>
      <h5>Heading H5</h5>
	  -->
      <!-- System Messages -->
      
	  
	
	      <div class="title" >Add Production Employee Information</div> 
	  <div class="form">
	  <b> 
	  <div class="form_row">
	  
	  <label class="left">Section:</label>	  
	  
	  <select id="section" name="section" class="form_input" >
	  <?php 
	  
	  $sel_section="select eng_section_name from section_info where company_id=$company_id";
	  $result_sel_section=mysql_query($sel_section);
	  
	  
	  while($row_sel_section=mysql_fetch_array($result_sel_section))
	  {
	  
	  echo "<option>$row_sel_section[eng_section_name]</option>";
	  }
	  
	  ?>	  
	  </select>  
	  
	  
	  
	  </div>
	  
	  
	  
  <div class="form_row">
      <label class="left"> Card Id: </label>	  
	  
	  <input type="text" id="card_id" class="form_input">
	  
	  
	  </div>
	  
	  <div class="form_row">
      <label class="left">Name: </label>	  
	  
	  <input type="text" id="name" class="form_input">
	  </div>
	
	  
	   <div class="form_row">
      <label class="left">Actual&nbsp;Salary: </label>	  
	  
	  <input type="text" id="actual_salary" class="form_input">
	  </div>
	  
	  
	 
	   <div class="form_row">
      <label class="left">Basic:</label>	  
	  
	  <input type="text" id="Basic" class="form_input">
	  </div>
	  
	   <div class="form_row">
      <label class="left">Designation:</label>	  
	  
	  <input type="text" id="Designation" class="form_input">
	  </div>
	  
	   <div class="form_row">
      <label class="left">   Grade: </label>	  
	  
	  <input type="text" id="Grade" class="form_input">
	  </div>
	  
	  
	  	   <div class="form_row">
      <label class="left">   Date&nbsp;of&nbsp;birth: </label>	  
	  
	 
	    <input type="text" id="date_birth" value="<?php echo "1/11/2011";?>" class="form_input" />
       
     
       
        <script type="text/javascript">
                  new Calendar({
                          inputField: "date_birth",
                          dateFormat: "%m/%d/%Y",
                          trigger: "date_birth",
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
      <label class="left">   Joining&nbsp;Date:</label>	  
	  
	 
	    <input type="text" id="join_date" value="<?php echo "1/11/2011";?>" class="form_input" />
       
     
       
        <script type="text/javascript">
                  new Calendar({
                          inputField: "join_date",
                          dateFormat: "%m/%d/%Y",
                          trigger: "join_date",
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
	  




	  </b>
	

	  </div>
	
	  
      <!--<p class="msg warning">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg info">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg done">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg error">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	  -->
      
      
      
     
      
      
     
    </div>
    <!-- /content -->
	