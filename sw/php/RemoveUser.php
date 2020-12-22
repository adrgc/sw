<?php
include '../php/DbConfig.php'; 
include '../php/LoadUserTable.php';
$email = $_REQUEST['email'];

$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
if (!$mysqli) {
    die("Fallo al conectar a MySQL: " . mysqli_connect_error());
}
$sql="DELETE FROM usuarios WHERE email ='$email';";
if(!mysqli_query($mysqli, $sql)) {
    die("Fallo al borrar en la BD: " . mysqli_error($mysqli));
  } 

  $sql2 = "SELECT * FROM usuarios;";
  $resul = mysqli_query($mysqli, $sql2);
  
  loadTable($resul);
  
  
mysqli_close($mysqli);

?>