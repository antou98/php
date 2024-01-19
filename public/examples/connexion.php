<?php

$url = "http://localhost/php/slim_api/public/index.php/api/connexion/";

$curl = curl_init($url);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HTTPGET,true);

$reponse = curl_exec($curl);

//si plus que un erreur
if (curl_errno($curl) > 0){

}