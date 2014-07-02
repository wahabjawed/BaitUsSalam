<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');		
		include 'headers/connect_database.php';      // Connection to Mysql Database.
		//require_once('PHP/recaptchalib.php');   // Captcha Library.
		
		$type = $_GET['type'];
		
		if($type=='ramdhan'){
			
					$query = "select * from bayans WHERE (sectionofbayan like '%ramdhan%' or sectionofbayan like '%malfoozat%' or sectionofbayan like '%quran%' or sectionofbayan like '%hadith%' or sectionofbayan like '%eitikaf%') and bayanname != '' order by time desc LIMIT 30";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");

			
			}
			
					$data="";
			while($row=mysqli_fetch_array($result))
			{
			$data = $data.",".$row['bayanname']."%".$row['sectionofbayan']."/".str_replace(".ram",".mp3",$row['linkofbayan']);
			}
			
			echo "$data";
?>