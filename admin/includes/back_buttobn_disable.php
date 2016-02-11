<HTML>
<HEAD>
<TITLE>Disable Back Button in Browser - Online Demo</TITLE>
<STYLE>
body, input{
	font-family: Calibri, Arial;
}

</STYLE>
<script type="text/javascript">
	window.history.forward();
	function noBack(){ window.history.forward(); }
</script>
</HEAD>
<BODY onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
<H2>Demo</H2>

<p>This page contains the code to avoid Back button.
</p>
<p>Click here to Goto <a href="noback.html">NoBack Page</a>
</p>
</BODY>

</HTML>