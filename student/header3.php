<div id="menu" class="box">
<ul class="menu2" id="menu2">

<?php 
$query="select * from main_menu";
$result=mysql_query($query);
while ($row=mysql_fetch_row($result))
{
			
			if($row[2]!=0)
			{
			echo "<li><a href=\"#\" class=\"menulink\">".$row[1]."</a>";
					$query1="select * from sub_menu1 where id in ($row[2])";
					$result1=mysql_query($query1);
					echo "<ul>";
					while ($row1=mysql_fetch_row($result1))
					{
					   if ($row1[2]!=0)
					    {
							echo "<li ><a href=\"#\" class=\"sub\">".$row1[1]."</a>";			
							$query2="select * from sub_menu2 where id in ($row1[2])";
						    $result2=mysql_query($query2);
						    echo "<ul>";
						    while ($row2=mysql_fetch_row($result2))
						    {
							echo "<li class=\"topline\"><a href=\"#\">".$row2[1]."</a></li>";
							} 
						   echo "</ul></li>";
						}
						else
						{
							echo "<li ><a href=\"#\">".$row1[1]."</a>";
			
							echo "</li>";
						}
					
					}
					echo "</ul></li>";
	
			}
			else
			{
			echo "<li><a href=\"#\" class=\"menulink\">".$row[1]."</a>";
			echo "</li>";
			}
}
?>
<!--
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
	-->
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