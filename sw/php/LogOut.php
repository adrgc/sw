<?PHP
session_start ();
?>
<html>
<head>
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <?php include '../html/Head.html'?>
  <style>
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
  <section class="main" id="s1">
    <div>
        <?php
        if($_SESSION['tipo']==4){
        echo"<script>
        
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut();
        
      </script>";
    }
          session_destroy ();
          echo "<script> alert(\"¡Hasta pronto!\"); document.location.href='Layout.php'; </script>";
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

