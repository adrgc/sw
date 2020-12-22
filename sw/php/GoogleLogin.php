<?PHP
session_start ();
?>
<?php
$data= explode("...", $_REQUEST['data']);
$_SESSION['email'] = $data[0];
$_SESSION['tipo'] = 4;
$_SESSION['img'] = $data[1];

?>