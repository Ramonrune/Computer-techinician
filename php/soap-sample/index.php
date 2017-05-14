<?php

ini_set("soap.wsdl_cache_enabled","0");

$wsdl = "http://www.webservicex.net/geoipservice.asmx?WSDL";
$cliente = new SoapClient($wsdl);

$vem = $cliente->GetGeoIP(array('IPAddress'=>'189.126.99.27'));


echo "Endereço IP:".$vem->GetGeoIPResult->IP."<br>";
echo "Pais de origem:".$vem->GetGeoIPResult->CountryName;



?>