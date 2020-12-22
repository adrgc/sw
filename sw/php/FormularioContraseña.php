<?PHP
session_start ();
if(!isset($_SESSION['cod'])){
    echo "<script>alert ('No puedes acceder aqui');</script>";
    echo "<script>window.location.href='Layout.php';</script>";
    exit(0);}
  
?>
<!DOCTYPE html>
<html>
<head>
    <?php include '../html/Head.html'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>
    <script src="../js/VerifyClientAjax.js"></script>
    <style>
		.table_fregister {
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
                <form id="fregister" name="fregister" method="POST" enctype="multipart/form-data" action="FormularioContraseña.php">
                    <table class="table_fregister">
                        <tr><th><h2>Registro de nuevo usuario</h2><br/></th></tr>
                        
                        <tr><td>Nueva contraseña <input type="password" size="75" id="pass1" name="pass1" required></td></tr> <!--onblur='verifyPass()'-->
                        <tr><td><span id='verifyPass'></span></td></tr>
                        <tr><td>Repite la contraseña <input type="password" size="75" id="pass2" name="pass2"required></td></tr>
                        <tr><td>Introduzca codigo <input type="text" size="75" id="cod" name="cod" required></td></tr>
                        <tr><td> <input type="submit" id="submit" value="Enviar"></td></tr>
                    </table>
                </form>
                <p> Hemos enviado un correo con el codigo a la direccion aportada, si no lo 
                    encuentra busque en la carpeta de spam, puede 
                    llegar a tardar unos minutos
            </div>  
            <div>
                <?php
                    if(isset($_REQUEST['pass1'])&&isset($_REQUEST['pass2'])&&isset($_REQUEST['cod'])) {
                       
                        $exprPass = "/^.{6,}$/";
                        $pass1 = $_REQUEST['pass1'];
                        $pass2 = $_REQUEST['pass2'];
                        $cod = $_REQUEST['cod'];
                        if($cod!= $_SESSION['cod']){
                            echo "<p class=\"error\">El codigo no coincide con el codigo mandado<p><br/>";
                        
                    }else if(!preg_match($exprPass, $pass1) || !preg_match($exprPass, $pass2)){
                           echo "<p class=\"error\">¡Longitud minima de la contraseña debe ser de 6 caracteres!<p><br/>";
                        } else if($pass1 != $pass2) {
                            echo "<p class=\"error\">¡Las contraseñas no coinciden!<p><br/>";
                        } else {
                            $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
                            if (!$mysqli) {
                                die("Fallo al conectar a MySQL: " . mysqli_connect_error());
                                echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                            }
                            $pass = crypt($pass1,'./0-9A-Za-z');
                            
                        
                            $sql = "UPDATE usuarios SET pass=\"".$pass."\" WHERE email=\"".$_SESSION['mail']."\";";
                            if(!mysqli_query($mysqli, $sql)) {
                                die("Fallo al insertar en la BD: " . mysqli_error($mysqli));
                                echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                            } else {
                                session_destroy ();
                                echo "<script> alert(\"Contraseña modificada correctamente\"); document.location.href='Layout.php'; </script>";
                            }
                            // Cerrar conexión
                            mysqli_close($mysqli);
                            // echo "Close OK.";
                        }
                    }
                
                ?>
            </div>
        </section>
        <?php include '../html/Footer.html' ?>
    </body>
</html>
