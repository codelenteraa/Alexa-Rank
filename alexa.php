<?php
system('clear');
sleep(1);
echo "Masukan url : ";
$url = trim(fgets(STDIN));
function alexaRank($url) {
	if(!empty($url)) {
		if($url) {		
		$ch = curl_init();	curl_setopt($ch, CURLOPT_URL, "http://data.alexa.com/data?cli=10&dat=snbamz&url=".$url);	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$exec = curl_exec($ch);
	$xml_object = simplexml_load_string($exec);
	$xml_toArray = json_decode(json_encode($xml_object), true);
system('clear');
echo "==> Details <==\n";
echo "HOSTNAME : ".$xml_toArray['SD'][0]['@attributes']['HOST'].PHP_EOL;	
echo "COUNTRY : ".$xml_toArray['SD'][1]['COUNTRY']['@attributes']['CODE'].PHP_EOL;
echo "RANK COUNTRY : ".$xml_toArray['SD'][1]['COUNTRY']['@attributes']['RANK'].PHP_EOL;
echo "RANK GLOBAL : ".$xml_toArray['SD'][1]['POPULARITY']['@attributes']['TEXT'].PHP_EOL;
	 }
	}
}
alexaRank($url);
?>