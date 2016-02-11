<?php

/*
 * SimpleModal Contact Form
 * http://www.ericmmartin.com/projects/simplemodal/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2009 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: contact-dist.php 254 2010-07-23 05:14:44Z emartin24 $
 *
 */

// User settings

include('db.php') ;





$class_teacher_name=mysql_query("select * from std_teacher");
$select_teacher='<select id=\'contact-subject\' class=\'contact-input\' name=\'subject\ tabindex=\'1002\'>';
while ($class_teacher_result=mysql_fetch_array($class_teacher_name))
{

$select_teacher.="<option value=\"$class_teacher_result[1]\">$class_teacher_result[1]</option>";

}
$select_teacher.='</select>';

$class_subject_name=mysql_query("select * from std_subject_config");
$select_subject='<select id=\'contact-name\' class=\'contact-input\' name=\'name\' tabindex=\'1001\'>';
while ($class_subject_result=mysql_fetch_array($class_subject_name))
{

$select_subject.="<option value=\"$class_subject_result[1]\">$class_subject_result[1]</option>";

}
$select_subject.='</select>';






$to = "user@yourdomain.com";
$subject = "SimpleModal Contact Form";

// Include extra form fields and/or submitter data?
// false = do not include
$extra = array(
	"form_subject"	=> true,
	"form_cc"		=> true,
	"ip"			=> true,
	"user_agent"	=> true
);

// Process

$action = isset($_POST["action"]) ? $_POST["action"] : "";

$value = isset($_GET["value"]) ? $_GET["value"] : "";
/*
if (empty($action_bak)) {
	// Send back the contact form HTML
	

	$output = "<div style='display:none'>
	<div class='contact-top'></div>
	<div class='contact-content'>
$value
		<h1 class='contact-title'>Send us a message:</h1>
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		
		<form action='#' style='display:none'>
			<label for='contact-name'>*Name:</label>
			<input type='text' id='contact-name' class='contact-input' name='name' tabindex='1001' />
			<label for='contact-email'>*Email:</label>
			<input type='text' id='contact-email' class='contact-input' name='email' tabindex='1002' />";

	if ($extra["form_subject"]) {
		$output .= "
			<label for='contact-subject'>Subject:</label>
			<input type='text' id='contact-subject' class='contact-input' name='subject' value='' tabindex='1003' />";
	}

	$output .= "
			<label for='contact-message'>*Message:</label>
			<textarea id='contact-message' class='contact-input' name='message' cols='40' rows='4' tabindex='1004'></textarea>
			<br/>";

	if ($extra["form_cc"]) {
		$output .= "
			<label>&nbsp;</label>
			<input type='checkbox' id='contact-cc' name='cc' value='1' tabindex='1005' /> <span class='contact-cc'>Send me a copy</span>
			<br/>";
	}

	$output .= "
			<label>&nbsp;</label>
			<button type='submit' class='contact-send contact-button' tabindex='1006'>Send</button>
			<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>Cancel</button>
			<br/>
			<input type='hidden' name='token' value='" . smcf_token($to) . "'/>
		</form>
	</div>
	<div class='contact-bottom'><a href='#'>Powered by Leotechbd</a></div>
</div>";

	echo $output;
	//echo $_POST['action'];
	//echo $_POST['pp'];
	
}

*/


if (empty($action)) {
	// Send back the contact form HTML
	

	$output = "<div style='display:none'>
	<div class='contact-top'></div>
	<div class='contact-content'>

		<h1 class='contact-title'>Send us a message:</h1>
		
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		$value
		<form action='#' style='display:none'>";
			

		$output .= "
			<label for='contact-subject'>Subject:</label>
			$select_subject";
	
	
	
	

	$output .= "
			<label for='contact-name'>*Teacher:</label>
			$select_teacher
			
			<br/>";
			
	

	
	$output .= "<br/><br/><br/><br/><br/>
			<label>&nbsp;</label>
			<button type='submit' class='contact-send contact-button' tabindex='1006'>Send</button>
			<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>Cancel</button>
			<br/>
			
		</form>
	</div>
	<div class='contact-bottom'><a href='#'>Powered by Leotechbd</a></div>
</div>";

	echo $output;
	//echo $_POST['action'];
	//echo $_POST['pp'];
	
}

else if ($action == "send") {
	// Send the email
	$name = isset($_POST["name"]) ? $_POST["name"] : "";	
	
	
	$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
	
	//$message = isset($_POST["message"]) ? $_POST["message"] : "";
	//$cc = isset($_POST["cc"]) ? $_POST["cc"] : "";
	//$token = isset($_POST["token"]) ? $_POST["token"] : "";

	// make sure the token matches
	
		smcf_send($name, $subject);
		echo "Your message was successfully sent.";
	
	/*else {
		echo "Unfortunately, your message could not be verified.";
	}*/
}

function smcf_token($s) {
	return md5("smcf-" . $s . date("WY"));
}

// Validate and send email
function smcf_send($name,$subject) {
	//global $to, $extra;

	// Filter and validate fields
	$name = $name;
	$subject = $subject;
	
	
	// Set and wordwrap message body
	$body = "From: $name\n\n";	
	$body .= "Message: $subject";
	$body = wordwrap($body, 70);

	// Build header
	$headers = "From: Success\n";
	
	$headers .= "X-Mailer: PHP/SimpleModalContactForm";

	// UTF-8
	/*
	if (function_exists('mb_encode_mimeheader')) {
		$subject = mb_encode_mimeheader($subject, "UTF-8", "B", "\n");
	}
	else {
		// you need to enable mb_encode_mimeheader or risk 
		// getting emails that are not UTF-8 encoded
	}*/
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/plain; charset=utf-8\n";
	$headers .= "Content-Transfer-Encoding: quoted-printable\n";

	// Send email
	//@mail($to, $subject, $body, $headers) or 
		//die("Unfortunately, a server issue prevented delivery of your message.");
}

// Remove any un-safe values to prevent email injection
function smcf_filter($value) {
	$pattern = array("/\n/","/\r/","/content-type:/i","/to:/i", "/from:/i", "/cc:/i");
	$value = preg_replace($pattern, "", $value);
	return $value;
}

// Validate email address format in case client-side validation "fails"
function smcf_validate_email($email) {
	$at = strrpos($email, "@");

	// Make sure the at (@) sybmol exists and  
	// it is not the first or last character
	if ($at && ($at < 1 || ($at + 1) == strlen($email)))
		return false;

	// Make sure there aren't multiple periods together
	if (preg_match("/(\.{2,})/", $email))
		return false;

	// Break up the local and domain portions
	$local = substr($email, 0, $at);
	$domain = substr($email, $at + 1);


	// Check lengths
	$locLen = strlen($local);
	$domLen = strlen($domain);
	if ($locLen < 1 || $locLen > 64 || $domLen < 4 || $domLen > 255)
		return false;

	// Make sure local and domain don't start with or end with a period
	if (preg_match("/(^\.|\.$)/", $local) || preg_match("/(^\.|\.$)/", $domain))
		return false;

	// Check for quoted-string addresses
	// Since almost anything is allowed in a quoted-string address,
	// we're just going to let them go through
	if (!preg_match('/^"(.+)"$/', $local)) {
		// It's a dot-string address...check for valid characters
		if (!preg_match('/^[-a-zA-Z0-9!#$%*\/?|^{}`~&\'+=_\.]*$/', $local))
			return false;
	}

	// Make sure domain contains only valid characters and at least one period
	if (!preg_match("/^[-a-zA-Z0-9\.]*$/", $domain) || !strpos($domain, "."))
		return false;	

	return true;
}

exit;

?>