<?php
	
		header('Access-Control-Allow-Origin: *');
		include 'connect_to_mysql.php';      // Connection to Mysql Database.
		//require_once('PHP/recaptchalib.php');   // Captcha Library.
		
	
	
	
	function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}



    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename=list.csv");
    header("Content-Transfer-Encoding: binary");
		
		//checking if username exists.
		
		
		$query = "SELECT emailID from emailList";
		$sth = $dbh->prepare($query);
		$sth->execute();
		$rows = $sth->fetchAll();
		
echo array2csv($rows);
		
	
		
		
?>