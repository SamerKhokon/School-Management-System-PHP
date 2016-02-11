<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<?php 
if (	isset($_POST['old']) &&
	  	isset($_POST['new1']) && 
		isset($_POST['new2']) ) {
		?><div id="status" <?php
	if (empty($_POST['old']) ||
			empty($_POST['new1']) ||
			empty($_POST['new2']) ) {
		echo('class="error">Please fill in all three fields');
	  }
	  elseif (	sha1($_POST['new1']) != sha1($_POST['new2'])) {
		echo('class="error">password verification error');
	  }
	  else {
		echo('class="ok">OK, password changed from ' . $_POST['old'] . " to " . $_POST['new1']);
	  }
	  ?></div><?php
}
?>
<hr>

<form method="POST"  action="demo.php">

Old password: <input name="old"><br />
New password: <input name="new1"><br />
Retype new password: <input name="new2"><br />

<input type="submit" value="Change Password" />



</form>