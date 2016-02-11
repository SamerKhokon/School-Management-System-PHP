<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script>
 <script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"
				} );
			} );
		</script>


<!-- Content (Right Column) -->
    <div id="content" class="box">  
      
	  <?php 
	  require_once("db.php");
	  session_start();
$pos_id = $_SESSION["pos_id"];
$user_type=$_SESSION["user_type"];	
	   ?>
	
	      <div class="title" >Account Information</div> 
		   <div class="form_tab">	
		  
		  
		  <form method="POST" action="">

	  
	  <dl>
	
	<dt>
		<label for="password">Login Id :</label>
	</dt>
	<dd>
		 <?php /*if ($user_type=="member")	  
	  {
	  ?>
	  <input type="text" name="login_id" id="login_id" class="form_inputs" value="<?php echo $login_id;?>" readonly="readonly">
	  <?php
	  }
	  else
	  {
	  ?>
	  <input type="text" name="login_id" id="login_id" class="form_inputs" value="<?php echo $login_id;?>">
	  <?php
	  }*/
      ?>	
		<span class="hint">Login Id.<span class="hint-pointer">&nbsp;</span></span>
	</dd>

	  
	  

	  
	<!--<div class="form_row">
    
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
		<label for="password">Date from :</label>
	</dt>
	<dd>
		<input type="text" name="date_from" id="date_from" value="<?php echo date('Ymd');?>" class="form_inputs" />
       
     
       
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
		<span class="hint">Date from.<span class="hint-pointer">&nbsp;</span></span>
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
		<label for="password">Date To :</label>
	</dt>
	<dd>
		 <input type="text" name="date_to" id="date_to" value="<?php echo  date('Ymd');?>" class="form_inputs" />
       
     
       
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
		<span class="hint">Date To.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	
	 <!--<div class="form_row">
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
$where.= "and pos_id='$pos_id' ";//and transection_date>'$date_from' and transection_date<'$date_to'"; 
}
else
{
 $date_from=date('Ymd')."000000";
 $date_to=date('Ymd')."235959";
 $where.= "and pos_id='$pos_id' ";//and transection_date>'$date_from' and transection_date<'$date_to'"; 
}

 
?> 
 
  
    
	
	
	
	
	
	
	<div id="container">
		
	<h1 >Hadding</h1>
	
	<hr/><br/>
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Date</th>
			<th>Receive Amount</th>
			<th>Withdraw Amount</th>
			<th>Current balance</th>
			<th>Total Sale</th>
            
		</tr>
	</thead>
	<tbody>
	
	
	

		
	
<?php


//$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=member_account';
		//$url_par=$_SERVER['PHP_SELF'];
		//$url_par=$_SERVER['QUERY_STRING'];$pages->limit
		 $st =  "SELECT  * from pos_account ".$where;
		$qry = mysql_query($st); 		
		$count=1;
		while ($row=mysql_fetch_assoc($qry))
		{
		
		
				  $deposit_id=$row['id'];
		  
		  $transection_date=$row['transection_date'];
		  //$login_id=$row['login_id'];
		  $receive_amount=$row['receive_amount'];
		  $withdraw_amount=$row['withdraw_amount'];
		  $current_balance=$row['current_balance'];
		  echo "<tr class=\"gradeA\">";
        echo  "<td>$transection_date</td>";
		
		echo  "<td>$receive_amount</td>";
		echo  "<td>$withdraw_amount</td>";
		echo  "<td>$current_balance</td>";
		echo  "<td></td>";
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
	