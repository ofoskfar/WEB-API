<?php

//Autenticacion QA
add_action('init', function() {
    if (!isset($_COOKIE['cod_token'])) {
	$arr_var = [
    		'client' => 'canonacademy',
    		'password' => '%6&FE3D#fiTR&@96'
    	];
    	$arr_json = json_encode($arr_var);

    	$ini = curl_init();
    	$url = 'https://miportalcanon.com.mx/cliente-unico-api/login';
    	curl_setopt($ini, CURLOPT_URL, $url);
    	curl_setopt($ini, CURLOPT_POST, TRUE);
    	curl_setopt($ini, CURLOPT_POSTFIELDS, $arr_json); 
    	curl_setopt($ini, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($ini, CURLOPT_RETURNTRANSFER, TRUE);
    	curl_setopt($ini, CURLOPT_HEADER, TRUE);
    	curl_setopt($ini, CURLINFO_HEADER_OUT, TRUE);
    	$hdrs = ['Content-type: application/json'];
    	curl_setopt($ini, CURLOPT_HTTPHEADER, $hdrs);
    
    	$regre = curl_exec($ini);
    	$resp = curl_getinfo($ini);
	curl_close($ini);

	$token = explode("X-Frame-Options: DENY", $regre);
	$token = explode("Expect-CT:", $token[1]);
	$tok_ok = substr($token[0], 2, strlen($token[0]) -4);

	setcookie("cod_token", $tok_ok, time()+3600, COOKIEPATH, COOKIE_DOMAIN);
    }
});

?>
