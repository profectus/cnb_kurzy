<?php
$kurz_url = "http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.txt";
$data =  file_get_contents($kurz_url);
$output = explode("\n", $data);

unset($output[0]); // odstranění prvního řádku - datum
unset($output[count($output)]); // odstranění posledního řádku - nic neobsahuje
unset($output[1]); // odstranění druhého řádku - legenda pro CSV  

$kurz = array("CZK" => 1); 
foreach($output as $radek){
	$mena = explode("|", $radek);	
	$kurz[trim($mena[3])] = str_replace(",",".",trim($mena[4]));			
}  

echo $kurz["EUR"];
