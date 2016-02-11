<?php
			include 'db.php';
			$oper     = $_POST['oper'];
			$id         = $_POST['id'];
			$amount = $_POST['amount'];
			$tax        = $_POST['tax'];
			mysql_query("insert into clients (name) values('$oper')");
			mysql_query("update invheader set amount='$amount',tax='$tax' where invid=$id");
?>