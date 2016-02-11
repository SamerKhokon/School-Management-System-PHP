<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script> 
 
<!-- Content (Right Column) -->
    <div id="content" class="box">  
      
	  
	
	      <div class="title" >Account Information</div> 
		   <div class="form_tab">	
		  
		  
		  <form method="POST" action="">
	  <div class="form">
	 
	  
	  
	  <dl>
	<dt> 
		<label for="firstname">Login Id:</label>
	</dt>
	<dd>
		 <?php if ($user_type=="member")	  
	  {
	  ?>
	  <input type="text" name="login_id" id="login_id" class="form_input" value="<?php echo $login_id;?>" readonly="readonly">
	  <?php
	  }
	  else
	  {
	  ?>
	  <input type="text" name="login_id" id="login_id" class="form_input" value="<?php echo $login_id;?>">
	  <?php
	  }
      ?>
		<span class="hint">To Login.<span class="hint-pointer">&nbsp;</span></span>
	</dd>

	  
<!--	<div class="form_row">
    
      <label class="left"> Login Id: </label>	  
	  
	  <?php if ($user_type=="member")	  
	  {
	  ?>
	  <input type="text" name="login_id" id="login_id" class="form_input" value="<?php echo $login_id;?>" readonly="readonly">
	  <?php
	  }
	  else
	  {
	  ?>
	  <input type="text" name="login_id" id="login_id" class="form_input" value="<?php echo $login_id;?>">
	  <?php
	  }
      ?>		
	  
	  </div>-->
	  
	 
	<dt> 
		<label for="firstname">Date from:</label>
	</dt>
	<dd>
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
		<span class="hint">Date From.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	  
	 
	  
	  
	
	  
	   
	   
	  
	  	<!--<div class="form_row">
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
	  
	  
	  </div>-->
	  
	<dt> 
		<label for="firstname">Date To:</label>
	</dt>
	<dd>
		 <input type="text" name="date_to" id="date_to" value="<?php echo  date('Ymd');?>" class="form_input" />
       
     
       
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
		<span class="hint">Date To .<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	<!-- <div class="form_row">
      <label class="left">   Date To:</label>	  
	  
	 
	    <input type="text" name="date_to" id="date_to" value="<?php echo  date('Ymd');?>" class="form_input" />
       
     
       
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
<input type="submit" name="submit" id="submit" value="submit"/>-->
<dd class="button_setting">
		<input
			type="submit"
			class="button2"
			id ="submit"
			value="Submit" />
	</dd>
	</dl>
	  </div>
	  </form>
	  </div>  
      
     
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
<div class="title" >Account Details</div> 
<br/>
		 
<?php

$where="where 1=1 ";
if(isset($_POST['submit']))
{
$date_from=$_POST['date_from']."000000";
$date_to=$_POST['date_to']."235959";
$login_id=$_POST['login_id'];
$where.= "and transection_date>=$date_from and transection_date<=$date_to and login_id='$login_id' ";//and transection_date>'$date_from' and transection_date<'$date_to'"; 
}
else
{
 $date_from=date('Ymd')."000000";
 $date_to=date('Ymd')."235959";
 $where.= "and login_id='$login_id' ";//and transection_date>'$date_from' and transection_date<'$date_to'"; 
}

 
?> 
 
  
    
	
	
	
	
	
	
	<div id="container">
		
	<h1 >Account Transection</h1>
	
	<hr/><br/>
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Date</th>
			<th>Sender ID</th>
			<th>Receive amount</th>
			<th>Withdraw Amount</th>
			<th>Current Balance</th>
            
		</tr>
	</thead>
	<tbody>
	
	
	

		
	
<?php


$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=member_account';
		//$url_par=$_SERVER['PHP_SELF'];
		//$url_par=$_SERVER['QUERY_STRING'];
		
		$qry = mysql_query("SELECT  * from user_account $where  $pages->limit"); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
		{
		
		
				  $deposit_id=$row['id'];
		  
		  $transection_date=$row['transection_date'];
		  $login_id=$row['sender_id'];
		  $receive_amount=$row['receive_amount'];
		  $withdraw_amount=$row['withdraw_amount'];
		  $current_balance=$row['current_balance'];
		  echo "<tr class=\"gradeA\">";
        echo  "<td>$transection_date</td>";
		echo  "<td>$login_id</td>";
		echo  "<td>$receive_amount</td>";
		echo  "<td>$withdraw_amount</td>";
		echo  "<td>$current_balance</td>";
		//echo  "<td><a href=\"$url_par&deposit_id=$deposit_id\">Details</a> Confirm Reject</td>";		
        echo "</tr>";

		
	

?>	
 
 
<?php
}
?>

	</tbody>
	<tfoot>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			
		
			</div>
		
	
	
	  
	  
	  
	  
	  <!--
	  
      
      <table id="list" class="scroll"></table> 
    
    <div id="pager" class="scroll" style="text-align:center;"> </div> 
	-->
    
     
    </div>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		 
		
     
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    
     
    </div>
    <!-- /content -->
	