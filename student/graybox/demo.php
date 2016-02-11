<?php require_once('db.php');
      $str = "select distinct class_time from std_class_routine";  
	  $sql = mysql_query($str);
	  
	  $strs = "select distinct class_id from std_class_routine";
	  $sqls = mysql_query($strs);	  
?>

<table align="center">
	 <input type="hidden" id="sl_no" value="<?php echo $_GET['id'];?>"/>
	<tr>
		<td>Name</td>   
		<td>
			<select id="name">
				<?php while($res = mysql_fetch_array($sql) ) {       ?>
					 <option value="<?php echo $res[0]; ?>"><?php echo $res[0]; ?></option>
				<?php  } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Number</td>
		<td>	
			<select id="address">
				<?php while( $rs = mysql_fetch_array($sqls) ){ ?>
					 <option value="<?php echo $rs[0];?>"><?php echo $rs[0];?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="button" id="save" value="save" /></td>
	</tr>
</table>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
    $('#save').click(function(){ 
	    var i = $('#sl_no').val();
	    var t = $('#name').val();
		var n = $('#address').val();
		var dataStr = 'i='+i+'&t='+t+'&n='+n;
	    alert(dataStr);
	});
});
</script>