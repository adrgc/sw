<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ShowAndHide.js"></script>
<?php include '../php/DbConfig.php' ?>
<style>
  p {
    color: maroon;
  }
</style>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span id="registro"><a href="SignUp.php">Registro</a></span>
  <span id="login" ><a href="LogIn.php">Login</a></span>
  <span id="logout" ><a href="LogOut.php">Logout</a></span>
  


  <!--<span id="logout" class="right" style="display:none;"><a href="/logout">Logout</a></span>-->
</header>
<nav class='main' id='n1' role='navigation'>
  <!--
  <span id="inicio"><a id="ini" href='Layout.php'>Inicio</a></span>
  <span id="insertar"><a id="ins" href='QuestionFormWithImage.php'>Insertar pregunta</a></span>
  <span id="creditos"><a id="cre" href='Credits.php'>Creditos</a></span>
  <span id="verBD"><a id="ver" href='ShowQuestionsWithImage.php'>Ver preguntas BD</a></span>
  <!--<span><a href='ShowQuestions.php'>Ver preguntas BD</a></span>-->
  <!--<span><a href='prueba.php'>DebugPHP</a></span>-->
  <?php
    if(isset($_SESSION['email'])) {
      $logInMail = $_SESSION['email'];
      echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
      if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 4 ){
      echo "<span id='insertar'><a id='ins' href='HandlingQuizesAjax.php'>Insertar pregunta</a></span>";
      echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php'> Ver preguntas BD </a> </span>";
      echo "<span id='verXML'> <a id='ver' href='ShowXmlQuestions.php'> Ver preguntas XML </a> </span>";
      }elseif($_SESSION['tipo'] == 3){
        echo "<span id='gestionarUsuarios'> <a id='gestionar' href='HandlingAccounts.php'>Gestionar Usuarios</a> </span>";
      }
      echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";
      echo "<script> $(\"#h1\").append(\"<p>$logInMail</p>\"); </script>";
      if($_SESSION['tipo']==4){
        echo "<script> $(\"#h1\").append(\"<img width='50' height='50' src='".$_SESSION['img']."'/>\"); </script>";
      }else{
      echo "<script> $(\"#h1\").append(\"<img width='50' height='50' src='data:image/*;base64,".$_SESSION['img']."'/>\"); </script>";
      }
      echo "<script> showOnLogIn(".$_SESSION['tipo']."); </script>";
    } else {
      echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
      echo "<span id='insertar'><a id='ins' href='HandlingQuizesAjax.php'>Insertar pregunta</a></span>";
      echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";
      echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php'> Ver preguntas BD </a> </span>";
      echo "<span id='verXML'> <a id='ver' href='ShowXmlQuestions.php'> Ver preguntas XML </a> </span>";
      echo "<script> showOnNotLogIn(); </script>";
    }

   
  ?>
</nav>
