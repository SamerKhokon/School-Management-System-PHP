 <div id="content" class="box"> 
 <?php
 /*
if($user_type!="member")
{
$sel_tree="select tree_root_id from tree_info";
$result=mysql_query($sel_tree);
echo "<form method=\"POST\" action=\"\">Select Tree<Select name=\"tree_id\"> ";
while ($row=mysql_fetch_array($result))
   {
   echo "<option value=\"$row[0]\">$row[0]</option>";
   }
   echo "</Select><input type=\"submit\" name=\"submit\" value=\"Show Tree\"/> </form>";
 }
*/ 
   
   
echo "<form method=\"POST\" action=\"\"><input type=\"text\" name=\"search_id\">" ;

echo "</Select><input type=\"submit\" name=\"submit\" value=\"Search\"/> </form>";
   
   
 ?>
 <style type="text/css">
.mainTable{
	border:#666666 0px solid;	
}

.mainTable td{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:.9em;
	text-align:center;
	cursor:default;
}

.internalTable td{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:.9em;
	border:#666666 0px dotted;
	text-align:center;
	cursor:default;
}
.toolHeader 
{
	background-color: #D3E4A6;
	font-family:Arial,Tahoma;
	font-weight: bold;
	font-size:12px;
	color: Black;
	padding: 5px;
	border: solid 2px #9CC525;
}

.toolBody{
	background:#FFFFFF;
    font-family:Arial,Tahoma;
    font-size:12px;
    padding:5px;
    border: solid 2px #9CC525;
    border-top:none;
    color: Blue;
     color: #F4921B; 
}
</style>

<?php
if(isset($_REQUEST["submit"]))
{
	
	
	  $search_id=$_REQUEST['search_id'];
	  $result= getSearchId($search_id,$login_id);
	  if ($result=="Yes")
	  {
	  GenerateTree($search_id);	
	  }
	  else
	  {
	  echo "Sorry This search member id not under your tree";
	  }
	  

/*	 
	 $id_query = "SELECT woner_login_id FROM tree_info where tree_root_id='$tree_id'";
	 //echo $query;
	 $id_result = mysql_query($id_query);
	 $id_row=mysql_fetch_array($id_result);
	 $root_woner= $id_row[0];    
	 GenerateTree($root_woner);
	
	*/
} 
else
{
    if(isset($_REQUEST['sno']))
    {
    $id_query  = "SELECT login_id FROM pin_no where sno='".$_GET["sno"]."'";	
	$id_result = mysql_query($id_query);
	$id_row=mysql_fetch_array($id_result);
	$login_id=$id_row["login_id"];
	}	
	
	GenerateTree($login_id);	 
}






?>



</div>

<?php

function GenerateTree($memberid)
{
	$l1="<br/><img src='icon.gif' width='33' height='45' alt='No Record' longdesc='#' />";
	$l2="<br/><img src='icon.gif' width='33' height='45' alt='No Record' longdesc='#' />";
	$l3="<br/><img src='icon.gif' width='33' height='45' alt='No Record' longdesc='#' />";
	$query = "SELECT * FROM user_info where s_id='".$memberid."' and status='Active' order by form_type";
	//echo $query;
	$result = mysql_query($query);
	//var_dump($result);	
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
	{
   	    if($row["form_type"]=="A")
		{$l1=getDownline($row["login_id"]);}
		if($row["form_type"]=="B")
		{$l2=getDownline($row["login_id"]);}
		if($row["form_type"]=="C")
		{$l3=getDownline($row["login_id"]);}
	}
	
	mysql_free_result($result);		
	
	echo "<table border='0' class='mainTable' cellspacing='0' cellpadding='10' style='width:100%'>\n";
	
	echo "<tr><td colspan='3' style='text-align:center;color:#000000;'><img  width='90' height='70' src=\"img/member.jpg\"/><br/>Login ID: ".$memberid.getInfo($memberid)."<br />"."</td></tr>";
    echo "</table>"	;
	echo "<table border='0' class='mainTable' style='width:100%'><tr><td><img width='730' src=\"img/tree.jpg\"/></td></tr></table>";
	
	
	echo "<table border='0' class='mainTable' cellspacing='0' cellpadding='10' style='width:100%'>\n";	
	echo "<tr><td colspan='3' style='color:#000000;'>".getDownline($memberid)."</td></tr>";
	echo "</table>";
	
	
	echo "<table border='0' class='mainTable' cellspacing='0' cellpadding='10' style='width:100%'>\n";	
	echo "<tr><td style='width:33%;color:#000000;'><br/><img width='230' src=\"img/line2.jpg\"/>".$l1."</td><td style='width:33%;color:#000000;'><br/><img width='230' src=\"img/line2.jpg\"/>".$l2."</td><td style='width:34%;color:#000000;'><br/><img width='230' src=\"img/line2.jpg\"/>".$l3."</td></tr>";
	echo "</table>\n";
	
	
}


function getDownline($memberid){

$sub_menu_id=$_GET['SM_id'];
$menu_id=$_GET['menu_id'];
$pagetitle=$_GET['nev'];
$paremeter="?nev=".$pagetitle."&menu_id=".$menu_id."&SM_id=".$sub_menu_id;

	$query = "SELECT * FROM user_info where s_id='".$memberid."' and status='Active' order by form_type";
	//echo $query;
	$result = mysql_query($query);
	//var_dump($result);
	
	$final = "<table border='0' style='width:100%;' class='internalTable' cellspacing='0' cellpadding='3'>\n";
	$final .= "<tr>";
	$nothing=true; 
	$x=0; 
	$pre;
	//$link="$memberid";
	
	$linkA="<br/><a href=\"includes/add_form.php?mother_id=$memberid&line=A\" onclick=\"return GB_showCenter('Add New Member', this.href,400,600)\">Add New</a>";
	$linkB="<br/><a href=\"includes/add_form.php?mother_id=$memberid&line=B\" onclick=\"return GB_showCenter('Add New Member', this.href,400,600)\">Add New</a>";
	$linkC="<br/><a href=\"includes/add_form.php?mother_id=$memberid&line=C\" onclick=\"return GB_showCenter('Add New Member', this.href,400,600)\">Add New</a>";
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
	{
		$x++; 
		$_SESSION['s']=0;
		
	$sno_query = "SELECT sno FROM pin_no where login_id='".$row["login_id"]."' and status='Used'";
	//echo $query;
	$sno_result = mysql_query($sno_query);
	$sno_row=mysql_fetch_array($sno_result);
	
		
		
		
		if($row["form_type"]=="A" && $x==1)
		{
		$final .= "<td style='width:33%; /*background-color:#FFFFEC;*/' title='".getToolTip($row["login_id"])."'>
		<img  width='70' height='60' src=\"img/member.jpg\"/><br/>
		<a href='$paremeter&sno=".$sno_row["sno"]."'>".$row["login_id"]."</a><br />".$row["m_name"]."
		<br />Position: ".$row["form_type"]."<br />
		Downline - ".getCount($row["login_id"]).$_SESSION['s']."
		</td>";
		}
		
		if($row["form_type"]=="B" && $x==2)
		{
		$final .= "<td style='width:33%; /*background-color:#E1F0FF;*/' title='".getToolTip($row["login_id"])."'>
		<img  width='70' height='60' src=\"img/member.jpg\"/><br/>
		<a href='$paremeter&sno=".$sno_row["sno"]."'>".$row["login_id"]."</a><br />".$row["m_name"]."<br />
		Position: ".$row["form_type"]."<br />Downline - ".getCount($row["login_id"]).$_SESSION['s']."
		</td>";
		}
		
		if($row["form_type"]=="C" && $x==3)
		{
		$final .= "<td style='width:34%; /*background-color:#FFF2F9;*/' title='".getToolTip($row["login_id"])."'>
		<img  width='70' height='60' src=\"img/member.jpg\"/><br/>
		<a href='$paremeter&sno=".$sno_row["sno"]."'>".$row["login_id"]."</a><br />".$row["m_name"]."<br />
		Position: ".$row["form_type"]."<br />Downline - ".getCount($row["login_id"]).$_SESSION['s']."
		</td>";
		}
		
		
		
		if($row["form_type"]=="C" && $x==1)
		{
		$final .= "<td style='width:33%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkA</td>
		<td style='width:33%'>
		<img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkB</td>
		
		
		<td style='width:34%; /*background-color:#FFF2F9;*/' title='".getToolTip($row["login_id"])."'>
		<img  width='70' height='60' src=\"img/member.jpg\"/><br/>
		<a href='$paremeter&sno=".$sno_row["sno"]."'>".$row["login_id"]."</a>
		<br />".$row["m_name"]."<br />Position: ".$row["form_type"]."<br />
		Downline - ".getCount($row["login_id"]).$_SESSION['s']."
		</td>";
		}
		
		if($row["form_type"]=="B" && $x==1)
		{
		$final .= "<td style='width:33%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkA</td>		
		<td style='width:33%; /*background-color:#E1F0FF;*/' title='".getToolTip($row["login_id"])."'>
		<img  width='70' height='60' src=\"img/member.jpg\"/><br/>
		<a href='$paremeter&sno=".$sno_row["sno"]."'>".$row["login_id"]."</a>
		<br />".$row["m_name"]."<br />Position: ".$row["form_type"]."<br />
		Downline - ".getCount($row["login_id"]).$_SESSION['s']."<br/></td>
		<td style='width:33%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkC</td>		
		";		
		}
		
		if($row["form_type"]=="C" && $x==2)
		{
		$final .= "<td style='width:33%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkB</td>
		<td style='width:34%; /*background-color:#FFF2F9;*/' title='".getToolTip($row["login_id"])."'>
		<img  width='70' height='60' src=\"img/member.jpg\"/><br/>
		<a href='$paremeter&sno=".$sno_row["sno"]."'>".$row["login_id"]."</a>
		<br />".$row["m_name"]."<br />Position: ".$row["form_type"]."<br />
		Downline - ".getCount($row["login_id"]).$_SESSION['s']."</td>";
		}
		
		$pre = $row["form_type"];
		$nothing=false;
	}
	
      	
      
	if($nothing)
	{
	//$pp="w";
	
	$final .= "<td style='width:33%;'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkA</td>
               <td style='width:33%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkB</td>
			   <td style='width:34%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkC</td>"; 
    }
	if($x==2 && $pre=="B")
	{
		
	$final .= "<td style='width:34%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkC</td>";
	}
	if($x==1 && $pre=="A")
	{
	$final .= "<td style='width:33%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkB</td>
	<td style='width:34%'><img src='img/memberadd.jpg' width='50' height='50' alt='No Record' longdesc='#' />$linkC</td>";
	}
	
	mysql_free_result($result);
	
	$final .= "</tr>";
	$final .= "</table>\n";
	
	return $final;
}
		
function getToolTip($id){
	$query = "SELECT * FROM user_info where login_id='".$id."' and status='Active'";
	$result = mysql_query($query);
	$res;
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
    	$res = "fade=[off] cssheader=[toolHeader] cssbody=[toolBody] header=[Detail For ID  - ".$id."] body=[".$row["m_name"]."<br />Address:<br />".$row["address"]."]";
	}
	mysql_free_result($result);
	return $res;
}

function getInfo($id){
	$query = "SELECT * FROM user_info where login_id='".$id."' and status='Active'";
	$result = mysql_query($query);
	$res;
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
    	$res = "<br />Name: ".$row["m_name"]."<br />Application No: ".$row["app_no"]."<br />";
	}
	mysql_free_result($result);
	return $res;
}

function getCount($id){
	$query = "SELECT * FROM user_info where s_id='".$id."' and status='Active'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);	
	$_SESSION['s'] = $_SESSION['s']+$count;
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
	{
    getCount($row["login_id"]);
	}
	
	mysql_free_result($result);
	//echo $count."<br />";
	return "";	
}



function getSearchId($search_id,$id){
	$query = "SELECT * FROM user_info where s_id='".$id."' and status='Active'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);	
	//$_SESSION['s'] = $_SESSION['s']+$count;
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
	{
	
			
			$result="No";
			getSearchId($search_id,$row["login_id"]);			
			
			if ($row["login_id"]==$search_id)
			{
			
			$result="Yes";	
			break;
			}
			
			
	}
	
	mysql_free_result($result);
	//echo $count."<br />";
	return $result;	
}




?>



