<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $soapclient = new nusoap_client('https://swadrianruiz.000webhostapp.com/sw/php/VerifyPassWS.php?wsdl', true);
    if(isset($_REQUEST['pass'])){
        echo $soapclient->call('validatePass', array('x'=> $_REQUEST['pass'], 'y'=>(1010)));
    }
?>