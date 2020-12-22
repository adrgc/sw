<?PHP
session_start ();
?>
<html>

<head>
  <?php include '../html/Head.html'?>
  <style>
		.table_flogin {
			margin: auto;
      text-align: center;
		}
		sup {
			color: red;
		}
    h2 {
        color: darkblue;
    }
    .error {
        color: darkred;
    }
    .success {
        color: darkgreen;
    }
    
  </style>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
      <form id="flogin" name="flogin" method="POST" enctype="multipart/form-data" action="RecuperarContraseña.php">
        <table class="table_flogin">
          <tr><th><h2>Formulario de Recuperacion</h2><br/></th></tr>
          <tr><td>Introduzca correo <input type="email" size="65" id="dirCorreo" name="dirCorreo" required></td></tr>
          
          <tr><td><div id="buttons"><input type="submit" id="submit" value="Enviar"> </div></td></tr>
        </table>
      </form>
    </div>

    <div>
      <?php
        
      
         
          if(isset($_REQUEST['dirCorreo'])){
            $email = $_REQUEST['dirCorreo'];
          $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
          if(!$mysqli){
              die("Fallo al conectar con Mysql: ".mysqli_connect_error());
             // echo "<span><a href='javascript:history.back()'>Volver</a></span>";
          }
          $sql = "SELECT * FROM usuarios WHERE email=\"".$email."\";";
          $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
          if(!$resultado){
            die("Error: ".mysqli_error($mysqli));
           // echo "<span><a href='javascript:history.back()'>Volver</a></span>";
          }
          $row = mysqli_fetch_array($resultado);
          if(!empty($row) && $row['email']==$email ){
            
            $asunto= "Recuperacion de contraseña";
            $cod = rand(10000,99999); 
            $_SESSION['mail'] = $email;
            $_SESSION['cod'] = $cod;
            $body= "
            <html>
            <head>
            <title> Recuperacion de contraseña</title>
            </head>
            <body>
            <h3> Que hacer para recuperar mi contraseña</h3>
            <p>
            Para restablecer su contraseña tiene que poner el codigo que tiene abajo en la pestaña que se ha abierto en su navegador.
            </p>
            <h3> Codigo de recuperacion:</h3>
            <h2>".$cod."</h2>
            </body>
            </html>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
            mail($email, $asunto, $body, $headers);

            echo"<script> alert(\"Se ha enviado el correo con el codigo correctamente\"); document.location.href='FormularioContraseña.php'; </script>";
            } else {
            echo "El correo introducido no existe";
          }
        }
        
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>