
<!--<link rel="stylesheet" href="custom_css/reset.css" type="text/css">-->


<script type="text/javascript" src="custom_css/jquery_002.js"></script>
<script type="text/javascript" src="custom_css/jquery_010.js"></script>
<script type="text/javascript" src="custom_css/jquery_005.js"></script>
<script type="text/javascript" src="custom_css/jquery_008.js"></script>
<script type="text/javascript" src="custom_css/jquery_003.js"></script>
<script type="text/javascript" src="custom_css/jquery_006.js"></script>
<script type="text/javascript" src="custom_css/jquery_007.js"></script>
<script type="text/javascript" src="custom_css/jquery_009.js"></script>
<script type="text/javascript" src="custom_css/jquery_004.js"></script>
<!--<script type="text/javascript" src="custom_css/jquery.js"></script>-->
<script type="text/javascript" src="custom_css/jquery_011.js"></script>
<script type="text/javascript" src="custom_css/excanvas.js"></script>
<script type="text/javascript" src="custom_css/cufon.js"></script>
<script type="text/javascript" src="custom_css/Zurich_Condensed_Lt_Bd.js"></script>
<script type="text/javascript" src="custom_css/script.js"></script>

					
						
<!-- Content (Right Column) -->
    <div id="content" class="box">

						
<!--
<div class="main pagesize"> 
	<div class="main-wrap">
		<div class="page clear">

-->

	
	
	                <div class="columns clear bt-space15">
 
					<div class="col2-3 online-user">
						
						<?php
						//$login_id='081118361';
						 $sel_qury="select * from user_info where login_id='$login_id' limit 1";
						$result=mysql_query($sel_qury);
						$row=mysql_fetch_array($result);
						
						$picture=$row['picture'];
						
						//echo 
						?>
							<!--<h2><cufon style="width: 51px; height: 18px;" alt="Online " class="cufon cufon-canvas"><canvas style="width: 72px; height: 22px; top: -3px; left: -3px;" height="22" width="72"></canvas><cufontext>Online </cufontext></cufon><cufon style="width: 43px; height: 18px;" alt="Users" class="cufon cufon-canvas"><canvas style="width: 60px; height: 22px; top: -3px; left: -3px;" height="22" width="60"></canvas><cufontext>Users</cufontext></cufon></h2>-->
							<div class="mark clear">
								<div class="avatar">
								
								 
								     <?php
									 
									 if(empty($picture))
									 {
									 
									 ?>
								     	 <img src="custom_css/avatar.jpg" alt="">
								
								<!--	<img src="custom_css/avatar.jpg" alt="">-->
								   
									 
									 <?php
									 }
									 else
									 {
									 ?>
								          <img src="<?php echo $picture ?>" alt="" />
									 <?php
									 }
									 ?>
									
								
									<!--<p class="status admin">member</p>-->
								</div>
								<div class="desc">
								<!--
									<ul class="links">
										<li><a href="#" class="graph" title="view stats">stats </a></li>
										<li><a href="#" class="cart" title="view shopping cart">shopping cart</a></li>
										<li><a href="#" class="hist" title="view user history">history</a></li>
										<li><a href="#" class="mesg" title="send message">send message</a></li>
										<li><span class="male" title="male">male</span></li>
									</ul>
									-->
									<h4><strong><cufon style="width: 62px; height: 14px;" alt="<?php echo $row['m_name'];?>" class="cufon cufon-canvas"><canvas style="width: 76px; height: 17px; top: -2px; left: -2px;" height="17" width="76"></canvas><cufontext>terminator</cufontext></cufon></strong></h4>
									<p ><small><?php echo $row['address'];?></small></p>
									<p ><small><?php echo $row['email'];?></small></p>
									<p class="info"><small>Mobile NO: <?php echo $row['mobile_no'];?></small></p>
									<p class="clear">
						<a href="<?php echo "?SM_id=".$_GET['SM_id']."&menu_id=".$_GET['menu_id']."&nev=basic_user_info";?>" class="button green fl-space">My Profile</a>
						<a href="<?php echo "?SM_id=".$_GET['SM_id']."&menu_id=".$_GET['menu_id']."&nev=update_user_info";?>" class="button red fl-space">Update Profile</a>
						<a href="<?php echo "?SM_id=".$_GET['SM_id']."&menu_id=".$_GET['menu_id']."&nev=password_change";?>" class="button blue fl-space">Change Password</a>
						<a href="<?php echo "?SM_id=".$_GET['SM_id']."&menu_id=".$_GET['menu_id']."&nev=change_pic";?>" class="button grey fl-space">Upload Image</a>
						<a href="#" class="button fr">Black Button </a>
					</p>
					
								</div>
							</div>
							</div>
							
							
							
						</div>
						

<div class="columns clear bt-space20">


				
<div class="col1-2">
						
							<!-- OVERVIEW - BASIC TABLE -->
							<h2><cufon style="width: 70px; height: 18px;" alt="Overview" class="cufon cufon-canvas"><canvas style="width: 81px; height: 22px; top: -3px; left: -3px;" height="22" width="81"></canvas><cufontext>Overview</cufontext></cufon></h2>
							<table class="basic" cellspacing="0">
							<tbody>
							
							<tr>
								<td><img src="custom_css/ball_yellow_16.png" class="block" alt=""></td>
								<th>
								Todays Income
									<?php
						$date=date('Ymd');
						$sel_qury="select sum(receive_amount) as today_income from user_account where login_id='$login_id' and transection_date like '$date%'";
						$result=mysql_query($sel_qury);
						$row=mysql_fetch_array($result);
						
						//echo 
						?>
								</th>
								<td class="value right"><?php echo $row['today_income'];?>Tk</td>
								<td><a href="#">more</a></td>
							</tr>
							<tr>
								<td><img src="custom_css/ball_yellow_16.png" class="block" alt=""></td>
								<th>
								
								<?php
						
						$sel_qury="select current_balance from user_account where login_id='$login_id' order by transection_date desc limit 1";
						$result=mysql_query($sel_qury);
						$row=mysql_fetch_array($result);
						
						//echo 
						?>
								Current Balance</th>
								<td class="value right"><?php echo $row['current_balance'];?>Tk</td>
								<td><a href="#">more</a></td>
							</tr>
							<tr>
								<td><img src="custom_css/ball_green_16.png" class="block" alt=""></td>
								<th class="full">Join Today</th>
								<td class="value right"></td>
								<td><a href="#">more</a></td>
							</tr>
							
							<tr>
								<td><img src="custom_css/ball_purple_16.png" class="block" alt=""></td>
								<th>Downline Member </th>
								<td class="value right"><?php $_SESSION['s']=0;echo getcount($login_id,'all').$_SESSION['s'];?></td>
								<td><a href="#">more</a></td>
							</tr>
							<tr>
								<td><img src="custom_css/ball_black_16.png" class="block" alt=""></td>
								<th>Line A</th>
								<td class="value right"><?php $_SESSION['s']=0;echo getcount($login_id,'A').$_SESSION['s'];?></td>
								<td><a href="#">more</a></td>
							</tr>
							<tr>
								<td><img src="custom_css/ball_blue_16.png" class="block" alt=""></td>
								<th>Line B</th>
								<td class="value right"><?php $_SESSION['s']=0;echo getcount($login_id,'B').$_SESSION['s'];?></td>
								<td><a href="#">more</a></td>
							</tr>
							<tr>
								<td><img src="custom_css/ball_red_16.png" class="block" alt=""></td>
								<th>Line C</th>
								<td class="value right"><?php $_SESSION['s']=0;echo getcount($login_id,'C').$_SESSION['s'];?></td>
								<td><a href="#">more</a></td>
							</tr>
							</tbody>
							</table>
						
						</div>
						
						
						
						<div class="col1-2 lastcol">
						<?php
						
						$sel_qury="select sum(receive_amount) as amount,(select m_name from user_info where login_id=user_account.login_id) as pp, (select creation_time from user_info where login_id=user_account.login_id) as date from user_account group by login_id order by amount desc limit 10";
						$result=mysql_query($sel_qury);
						//$row=mysql_fetch_array($result);
						
						?>
							<!-- MESSAGES - BASIC TABLE -->
							<h2><cufon style="width: 36px; height: 18px;" alt="Top Ten " class="cufon cufon-canvas"><canvas style="width: 56px; height: 22px; top: -3px; left: -3px;" height="22" width="56"></canvas><cufontext>Last </cufontext></cufon><cufon style="width: 76px; height: 18px;" alt="Earner" class="cufon cufon-canvas"><canvas style="width: 93px; height: 22px; top: -3px; left: -3px;" height="22" width="93"></canvas><cufontext>Messages</cufontext></cufon></h2>
							<table class="basic" cellspacing="0">
							<tbody>
							<?php while ($row=mysql_fetch_array($result)){?>
							<tr>
								<th><?php echo $row['date']?></th>
								<td class="full"><a href="#"><?php echo $row[1];?></a></td>
								<td><img src="custom_css/ball_green_16.png" class="block cr-help" alt="" title="Offline User"></td>
								<td><?php echo $row[0];?></td>
							</tr>
							<?php }?>
							
							<tr>
								<th>25/07/10</th>
								<td class="full"><a href="#">Consectetur adipiscing</a></td>
								<td><img src="custom_css/ball_green_16.png" class="block cr-help" alt="" title="Online User"></td>
								<td>Carla</td>
							</tr>
							
							<tr>
								<th>25/07/10</th>
								<td class="full"><a href="#">Sed in porta lectus maecenas</a></td>
								<td><img src="custom_css/ball_grey_16.png" class="block cr-help" alt="" title="Offline User"></td>
								<td>Bruce</td>
							</tr>
							<!--
							<tr>
								<th>19/07/10</th>
								<td class="full"><a href="#">Dignissim enim</a></td>
								<td><img src="custom_css/ball_grey_16.png" class="block cr-help" alt="" title="Offline User"></td>
								<td>Jane</td>
							</tr>
							<tr>
								<th>18/07/10</th>
								<td class="full"><a href="#">Maecenas id velit et elit</a></td>
								<td><img src="custom_css/ball_grey_16.png" class="block cr-help" alt="" title="Offline User"></td>
								<td>Killer</td>
							</tr>
							<tr>
								<th>09/07/10</th>
								<td class="full"><a href="#">Duis nec rutrum lorem</a></td>
								<td><img src="custom_css/ball_green_16.png" class="block cr-help" alt="" title="Online User"></td>
								<td>Asterix</td>
							</tr>
							<tr>
								<th>09/07/10</th>
								<td class="full"><a href="#">Duis nec rutrum lorem</a></td>
								<td><img src="custom_css/ball_green_16.png" class="block cr-help" alt="" title="Online User"></td>
								<td>Asterix</td>
							</tr>
							-->
							</tbody>
							</table>
							
						</div>
	



	</div>




	<!-- DASHBOARD CHART -->
					
	
	<div class="columns clear bt-space15">
	<div class="dashboard_chart">
	     <h2><cufon style="width: 52px; height: 18px;" alt="Account " class="cufon cufon-canvas"><canvas style="width: 73px; height: 22px; top: -3px; left: -3px;" height="22" width="73"></canvas><cufontext>Useful </cufontext></cufon><cufon style="width: 39px; height: 18px;" alt="Transection" class="cufon cufon-canvas"><canvas style="width: 56px; height: 22px; top: -3px; left: -3px;" height="22" width="56"></canvas><cufontext>Links</cufontext></cufon></h2>
	
	
						<div class="chart-wrap">
						
						
						<?php
						
						$sel_qury="select sum(receive_amount) as receive,sum(withdraw_amount) as withdraw,date_month as month from (select login_id,receive_amount,withdraw_amount,transection_date,substr(transection_date,5,2) as date_month from user_account where login_id='$login_id') as pp group by date_month";
						$result=mysql_query($sel_qury);
						//$row=mysql_fetch_array($result);
						
						?>
								<table style="" class="visualize_dashboard">
									<caption>
									<cufon style="width: 65px; height: 14px;" alt="Dashboard " class="cufon cufon-canvas"><canvas style="width: 81px; height: 17px; top: -2px; left: -2px;" height="17" width="81"></canvas><cufontext>My</cufontext></cufon><cufon style="width: 35px; height: 14px;" alt="Chart " class="cufon cufon-canvas"><canvas style="width: 51px; height: 17px; top: -2px; left: -2px;" height="17" width="51"></canvas><cufontext>Account </cufontext></cufon><cufon style="width: 49px; height: 14px;" alt="Example" class="cufon cufon-canvas"><canvas style="width: 62px; height: 17px; top: -2px; left: -2px;" height="17" width="62"></canvas><cufontext>Transection</cufontext></cufon></caption>
									
								
										<tr>	

                                         <?php	
										 include 'convert.php';
										 							
                                          while ($row=mysql_fetch_array($result))										 
										  {
										  echo "<th scope=\"col\">".int_to_month($row['month'])."</th>";
										  }
										  //echo "dsfdsfdsf";
										  //echo "dfsdf".$row['month'];
										  ?>
											<!-- <th scope="col">March</th>
											<th scope="col">April</th>
											<th scope="col">May</th>
											<th scope="col">June</th>
											<th scope="col">July</th>
											-->
										</tr>
										
									
									
								
										<tr>
											<th scope="row">Receive</th>
											
											 <?php	
										 $result=mysql_query($sel_qury);											 
                                          while ($row1=mysql_fetch_array($result))										 
										  {
										  echo "<td>".$row1['receive']."</td>";
										  }
										  ?>
											<!--<td>175</td>
											<td>145</td>
											<td>212</td>
											<td>175</td>
											<td>1820</td>
											-->
											
										</tr>
										<tr>
											<th scope="row">Withdraw</th>
											<?php	
											$result=mysql_query($sel_qury);											
                                          while ($row=mysql_fetch_array($result))										 
										  {
										  echo "<td>".$row['withdraw']."</td>";
										  }
										  ?>
										  <!--
											<td>94</td>
											<td>53</td>
											<td>124</td>
											<td>92</td>
											<td>105</td>-->
										</tr>
								
								</table>
								
					</div>
	           </div>
	
		</div>
		
			
		
		<div class="columns clear bt-space15">
	
	
						<!--<div class="col2-3 lastcol">
						
							<!-- USEFUL LINKS WITH ICONS 
							<h2><cufon style="width: 52px; height: 18px;" alt="Useful " class="cufon cufon-canvas"><canvas style="width: 73px; height: 22px; top: -3px; left: -3px;" height="22" width="73"></canvas><cufontext>Useful </cufontext></cufon><cufon style="width: 39px; height: 18px;" alt="Links" class="cufon cufon-canvas"><canvas style="width: 56px; height: 22px; top: -3px; left: -3px;" height="22" width="56"></canvas><cufontext>Links</cufontext></cufon></h2>
							<div class="mark icon-links">
								<ul>
								<li class="clear">
									<a href="#"><img src="login_data/ico_manage-users_48.png" class="icon" alt=""><span>Manage Users &amp; Rights</span></a>
									<p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus.</small></p>
								</li>
								<li class="clear">
									<a href="#"><img src="login_data/ico_book_48.png" class="icon" alt=""><span>View Visit Book</span></a>
									<p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus.</small></p>
								</li>
								<li class="lastlnk clear">
									<a href="#"><img src="login_data/ico_administration_48.png" class="icon" alt=""><span>Administration of Orders</span></a>
									<p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus.</small></p>
								</li>
								</ul>
							</div>
							<p><small><strong>Note:</strong> You can use your own icons because the gradient background is included separately of the icon.</small></p> 
						
						</div>
	</div>-->
	
	
		
	
<!--
</div>
</div>
</div>
-->




	
     
	 
      
     
    </div>
    
	
	



	<?php
	function getCount($id,$line){
	if($line=='all')
	{
	$query = "SELECT * FROM user_info where s_id='".$id."' and status='Active'";
	}
	else
	{
		$query = "SELECT * FROM user_info where form_type='$line' and s_id='".$id."' and status='Active'";

	}
	
	$result = mysql_query($query);
	$count = mysql_num_rows($result);	
	
	$_SESSION['s'] = $_SESSION['s']+$count;
	//$downline=$downline+$count;
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
	{
	
    getCount($row["login_id"],$line);
	}
	
	mysql_free_result($result);
	//echo $count."<br />";
	return "";	
}
	?>