<?php
$params=['name'=>'Ahmad', 'surname'=>'Altamimi', 'age'=>24];
$defaults = array(
CURLOPT_URL => 'http://myremoteservice/',
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch, ($options + $defaults));
?>