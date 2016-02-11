<!-- Content (Right Column) -->
    
	
	<script type="text/javascript">
i=0;
$(document).ready(function(){
  
  
  $("#1").keydown(function(key)
  {
    if(key.which==13)
    {
    $("#2").focus();	
	}
  });
  
  
  $("#2").keydown(function(key)
  {
  if(key.which==13) 
  
    $("button").focus();
  });
  
  
  $("button").click(function(){
    $("#load").load('includes/add.php');
	$("#1").focus();
  });
  
});
</script>



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
      
	  
	  <h3 class="tit">System Messages</h3>
      <p class="msg warning">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg info">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg done">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p class="msg error">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

	  
	  <input type="text" id="1"/>
      <input type="text" name="2" id="2" value=0>
      <p>Keypresses:<span>0</span></p>
      <button>Change Content</button>
      <div id=load>Let AJAX change this text</div>
	  
      <!-- Tabs -->
      
	  
	  <!--
	  <h3 class="tit">Tabs</h3>
	  -->
	  
	  
	  
      
      <!-- /tabs -->
      <!-- Tab01 -->
      
	  
	  
      <!-- /tab01 -->
      <!-- Tab02 -->
      
      <!-- /tab02 -->
      <!-- Tab03 -->
      
      
      
      
      
      
     
      
      
     
    </div>
    <!-- /content -->
	