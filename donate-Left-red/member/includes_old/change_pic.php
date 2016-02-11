<link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css" /> 
<link rel="stylesheet" type="text/css" media="screen" href="css/form.css" />
<script type="text/javascript" src="JS/form.js"></script>

<div id="content" class="box">

<div class="title" >Image Upload</div> 

<br >
<!--
/*<fieldset class="login">*/
<legend>Image Upload</legend>-->

<form action="" method="post"enctype="multipart/form-data">
<dl>
	
	<dt>
		<label for="password">Picture:</label>
	</dt>
	<dd>
		<input
			name="file"
			id="subname"
			type="file" />
		<span class="hint">Picture Upload.<span class="hint-pointer">&nbsp;</span></span>
	</dd>
	
	<dd >
		<input
			type="submit"
			class="button_sub"
			id ="submit"
			value="Submit" />
	</dd>
</dl>

<!--<table border="0" cellpadding="0"  cellspacing="0"  id="id-form">

<tr>
			<th valign="top">File Name :</th>
			<td><input type="file" name="file" id="file" />    </td>
	
            <td>
		<!--	<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>


</table>



</fieldset>

<input type="submit" name="submit" value="Submit" />-->

</form>

         <?php


	if (isset($_POST['submit']))
		{ 
		
		
		$file_type=$_FILES["file"]["type"] ;
		$file_error=$_FILES["file"]["error"];
		$file_size=$_FILES["file"]["size"];
		
		if($file_size<100000)
		   {
		    $new_file_size=$file_size/1024;
		   }
		
		  
		$file_size=$new_file_size;
		$file_name=$_FILES["file"]["name"];		  
		$file_name=$login_id;
				
		$file_temp_name=$_FILES["file"]["tmp_name"];
		 picUpload($file_type,$file_error,$file_size,$file_name,$file_temp_name);
		
		$ddr="upload/".$file_name;	
		
				
		$result=mysql_query("UPDATE user_info SET picture='$ddr' where login_id='$login_id'");
        }  
        function picUpload($file_type,$file_error,$file_size,$file_name,$file_temp_name)
        {
          if ((($file_type == "image/gif")
              || ($file_type == "image/jpeg")
              || ($file_type == "image/pjpeg"))
              && ($file_size < 100000))
                 {
                 if ($file_error > 0)
                    {
                    $rtr= "Return Code: " . $file_error . "<br />";
                    }
                	 else
                    	{
                     	    /*if (file_exists("upload/qqq"))// . $file_name))
       						{
      						$rtr=$file_name . " already exists. ";
      						}
				  		  	else
      						{*/
								
					      		move_uploaded_file($file_temp_name,
    					  		"upload/" . $file_name);								
							
	  							$image_name = "upload/". $file_name;
      							 $rtr= "<img src=\"$image_name\" alt=\"$image_name\" />";
								
								

      							
    					}
  				}
			else
  				{
  				$rtr= "Invalid file";
 				 }
  
  				return $rtr;
	  
  	}
?>



</div>