<?php 
echo "<html>";
echo "<head>";
echo "	 <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
echo "</head>";
echo "<body>";
	//I just grab the post here, not so safe so think what you want to do with it
	$afm=$_REQUEST["afm"];
	/* if afm not defined except it */
	if (isset($afm) &&  ($afm!="")){
		$client = new SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");
		$result = $client->checkVat(array('countryCode'=>'EL','vatNumber'=>$afm));
		//print_r($result);
		//return $result->valid;
	}
	echo "Αποτελέσματα αναζήτησης Α.Φ.Μ. # ".$afm;
	echo "<ul>";
	
	foreach ($result as $key => $val) {
		echo "<li>".$key.': '.$val.'</li>';	
	}
	echo "</ul>";
?>
<br><a href='index.html'>Επιστροφή</a>
</body>
</html>
