<?php
include '../php/DbConfig.php'; 
include '../php/LoadUserTable.php';
$email = $_REQUEST['email'];
if($_REQUEST['estado'] == 0){
    $estado = 1;
}elseif($_REQUEST['estado'] == 1){
    $estado = 0;
}

$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
if (!$mysqli) {
    die("Fallo al conectar a MySQL: " . mysqli_connect_error());
}
$sql="UPDATE usuarios SET estado=$estado WHERE email ='$email';";
if(!mysqli_query($mysqli, $sql)) {
    die("Fallo al actualizar la BD: " . mysqli_error($mysqli));
  } 

  $sql2 = "SELECT * FROM usuarios;";
  $resul = mysqli_query($mysqli, $sql2);
  
  loadTable($resul);
  
  
mysqli_close($mysqli);

?>