   <div class="left">
     <div class="left_popup">More <br />
       Comments <br />
       About <br />
       <span class="left_head">Redish</span></div>
     <div class="news_area">
       <p class="news_head">Enim tempor nibh</p>
       <p>Quisque lacus sapien Nonummy vel iaculis vitae Laoreet ut</p>
       <p><a href="#" class="news_link">Maecenas tempus</a></p>
     </div>
     <div class="news_area">
       <p class="news_head">Enim tempor nibh</p>
       <p>Quisque lacus sapien Nonummy vel iaculis vitae Laoreet ut</p>
       <p><a href="#" class="news_link">Maecenas tempus</a></p>
     </div>
     <div class="news_area">
       <p class="news_head">Enim tempor nibh</p>
       <p>Quisque lacus sapien Nonummy vel iaculis vitae Laoreet ut</p>
       <p><a href="#" class="news_link">Maecenas tempus</a></p>
     </div>
     <div class="onlinejobs"></div>
   </div>
   
   
   
      <div class="body_area">
     <div class="head">About Redish </div>
     
	 <?php
	 
	 $qry_account="select sum(receive_amount) as receive ,sum(withdraw) as withdraw from user_account";
	 $result_account=mysql_query($qry_account);
	 $row_account=mysql_fetch_array($result_account);
	 s?>
	 
	 <div class="body_text"><a href="#" class="link">Total Receivable amount  <?php echo $row_account[0];?></a></div>
	 
     <div class="body_text"><a href="#" class="link">Total Withdraw amount  <?php echo $row_account[1];?></a></div>
	 
	 
	 
     <div class="body_banner_area">
       <div class="banner1_text">Express New Ideas Through</div>
       <div class="seemore_ideas_area">
         <div class="idea_background">
           <div class="see_ideas">
             <p class="see_ideas_head">See More Ideas</p>
             <p>nulla augue ultrices dolor,</p>
           </div>
           <div class="ideas_text">Morbi eu est ac augue ornare dictum. Donec ut diam. Nullam quis odio at ante</div>
         </div>
         <div class="idea_links">
           <div class="links1_area"><a href="#" class="link1">Quisque lacus sapien<span class="link_no1">02</span></a> <a href="#" class="link1">Nonummy vel iaculis vitae<span class="link_no2">04</span></a> <a href="#" class="link1">Laoreet ut<span class="link_no3">10</span></a><br />
             <a href="#" class="link1">Morbi libero nibh<span class="link_no4">12</span></a> <a href="#" class="link1">Condimentum utsuscipit<span class="link_no5">07</span></a> <a href="#" class="link1">Faucibus anulla<span class="link_no6">05</span></a></div>
           <div class="idea_divider"></div>
           <div class="links1_area"><a href="#" class="link1">Quisque lacus sapien<span class="link_no1">02</span></a> <a href="#" class="link1">Nonummy vel iaculis vitae<span class="link_no2">04</span></a> <a href="#" class="link1">Laoreet ut<span class="link_no3">10</span></a><br />
             <a href="#" class="link1">Morbi libero nibh<span class="link_no4">12</span></a> <a href="#" class="link1">Condimentum utsuscipit<span class="link_no5">07</span></a> <a href="#" class="link1">Faucibus anulla<span class="link_no6">05</span></a></div>
         </div>
       </div>
     </div>
   </div>