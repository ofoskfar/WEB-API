<?php

$arr_dts = [
	'nombre' => $nom,
	'apellido' => $ape,
	'correo' => $cor,
	'telefono' => $tel,
	'curso' => $nombcur,
	'fechaCurso' => $curfe,
	'link' => $cur,
	'fechaRegistro' => date('Y-m-d'),
	'camp' => $cp,
];
$json_dts = json_encode($arr_dts);

    $ini = curl_init();
    $url = 'https://miportalcanon.com.mx/cliente-unico-api/canonAcademy/curso';
    curl_setopt($ini, CURLOPT_URL, $url);
    curl_setopt($ini, CURLOPT_POST, TRUE);
    curl_setopt($ini, CURLOPT_POSTFIELDS, $json_dts); 
    curl_setopt($ini, CURLOPT_SSL_VERIFYPEER, TRUE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, TRUE);
    curl_setopt($ini, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ini, CURLOPT_HEADER, TRUE);
    curl_setopt($ini, CURLINFO_HEADER_OUT, TRUE);
    $hdrs = [
	    'Content-type: application/json',
	    $token,
    ];
    curl_setopt($ini, CURLOPT_HTTPHEADER, $hdrs);
    
    $regre = curl_exec($ini); 
    $resp = curl_getinfo($ini);
    curl_close($ini);

?>
