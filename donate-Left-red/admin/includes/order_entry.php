   <div id="content" class="box">
	   
	  <?php
	  if (isset($_POST['submit']))
	  {
	  $net_id=$_POST['netid'];
	  $quantity=$_POST['qnty'];
	  $payment=$_POST['payment'];
	  $payment_mode=$_POST['agent'];
	  
	  $sel_pin_chk="select count(*) from user_info where login_id='$net_id'";
	  $result_pin_chk=mysql_query($sel_pin_chk);
	  $row_pin_chk=mysql_fetch_array($result_pin_chk);
		  if($row_pin_chk[0]=1)
		  {
		  
		  $sql_ins="insert into order_list (login_id,product_qunt,amount,payment_mode) values('$net_id',$quantity,'$payment','$payment_mode')";
		  mysql_query($sql_ins);
		  
				  $sel_pin="select * from pin_no where status='Available' limit 3";
				  $result_pin=mysql_query($sel_pin);
				  
				  while($row_pin=mysql_fetch_array($result_pin))
				  {
				  $login_id.=$row_pin['login_id'].",";
				  
				  echo "<br/>";
				  
				  }
				  echo "The ".$login_id ." has delivered to  $net_id";
		  }
		  else
		  {
		  echo "Your Login Id not yet registered";
		  }
		  
	  
	  
	  }
	  else
	  {
	  ?>	  
	   <form method="POST" action="">
	   <table>
	   <tr>
	   <td style="font-size:12px;color:#000;">
	   Net Id:
	   </td>
	   <td><input type="text" id="netid" name="netid"/>
	   </td
	   </tr>
	   <tr>
	   <td style="font-size:12px;color:#000;">
	   Id quentity
	   </td >
	   <td><input type="text" id="qnty" name="qnty"/>
	   </td
	   </tr>
	   
	   <tr>
	   <td style="font-size:12px;color:#000;">
	   Payment
	   </td>
	   <td><input type="text" id="payment" name="payment"/>
	   </td
	   </tr>
	   
	   
	   <tr>
	   <td style="font-size:12px;color:#000;">
	    Payment Mode
	   </td>
	   <td>
	   <select name="agent">

		<?php
		$sel_agent="select * from collection_agent";
		$result_agent=mysql_query($sel_agent);

		while($row_agent=mysql_fetch_array($result_agent))
		{
		echo "<option value=".$row_agent['id'].">";
		echo $row_agent['agent'];
		echo "</option>";
		}

		?>	  

	  </select>
	   
	   </td
	   </tr>
	   
	   
	   <tr>
	   <td>&nbsp;</td>
	   <td>
	   <input type="submit" value="submit" name='submit'>
	   </td>
	   </tr>
	   
	   
	   
	   </table>
	  </form>	   
	  
	  <?php
	  }
	  ?>
		  
	</div>	   