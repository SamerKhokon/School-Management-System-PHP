<div id="menu" class="box">

<ul class="menu2" id="menu2">
	<li><a href="#" class="menulink">Dropdown One</a>
		<ul>
			<li><a href="#">Navigation Item 1</a></li>
			<li>
				<a href="#" class="sub">Navigation Item 2</a>
				<ul>
					<li class="topline"><a href="#">Navigation Item 1</a></li>
					<li><a href="#">Navigation Item 2</a></li>
					<li><a href="#">Navigation Item 3</a></li>
					<li><a href="#">Navigation Item 4</a></li>
					<li><a href="#">Navigation Item 5</a></li>
				</ul>
			</li>
			<li>
				<a href="#" class="sub">Navigation Item 3</a>
				<ul>
					<li class="topline"><a href="#">Navigation Item 1</a></li>
					<li><a href="#">Navigation Item 2</a></li>
					<li>
						<a href="#" class="sub">Navigation Item 3</a>
						<ul>
							<li class="topline"><a href="#">Navigation Item 1</a></li>
							<li><a href="#">Navigation Item 2</a></li>
							<li><a href="#">Navigation Item 3</a></li>
							<li><a href="#">Navigation Item 4</a></li>
							<li><a href="#">Navigation Item 5</a></li>
							<li><a href="#">Navigation Item 6</a></li>
						</ul>
					</li>
					<li><a href="#">Navigation Item 4</a></li>
				</ul>
			</li>
			<li><a href="#">Navigation Item 4</a></li>
			<li><a href="#">Navigation Item 5</a></li>
		</ul>
	</li>
	<li><a href="#" class="menulink">Non-Dropdown</a></li>
	<li>
		<a href="#" class="menulink">Dropdown Two</a>
		<ul>
			<li><a href="#">Navigation Item 1</a></li>
			<li>
				<a href="#" class="sub">Navigation Item 2</a>
				<ul>
					<li class="topline"><a href="#">Navigation Item 1</a></li>
					<li><a href="#">Navigation Item 2</a></li>
					<li><a href="#">Navigation Item 3</a></li>
				</ul>
			</li>
		</ul>
	</li>
	<li>
		<a href="#" class="menulink">Dropdown Three</a>
		<ul>
			<li><a href="#">Navigation Item 1</a></li>
			<li><a href="#">Navigation Item 2</a></li>
			<li><a href="#">Navigation Item 3</a></li>
			<li><a href="#">Navigation Item 4</a></li>
			<li><a href="#">Navigation Item 5</a></li>
			<li>
				<a href="#" class="sub">Navigation Item 6</a>
				<ul>
					<li class="topline"><a href="#">Navigation Item 1</a></li>
					<li><a href="#">Navigation Item 2</a></li>
				</ul>
			</li>
			<li><a href="#">Navigation Item 7</a></li>
			<li><a href="#">Navigation Item 8</a></li>
			<li><a href="#">Navigation Item 9</a></li>
			<li><a href="#">Navigation Item 10</a></li>
		</ul>
	</li>
</ul>
<!--
<div id="text" style="float:left; clear:left; width:650px; margin-top:10px">
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque sollicitudin. Fusce varius pellentesque ligula. Proin condimentum purus a nunc tempor pellentesque. Proin ac pede in leo tincidunt varius. Ut sed nibh. Praesent adipiscing, sapien sit amet sagittis convallis, dolor neque venenatis diam, at feugiat lacus quam vel pede. Mauris vel enim. Nunc nunc nibh, bibendum ornare, mattis ac, elementum at, mi. Mauris orci massa, vehicula ut, elementum nec, bibendum pretium, elit. 
</div>-->
<script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu2","menuhover");
</script>
</div>