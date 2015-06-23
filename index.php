<?php 
  session_start();
  if(!isset($_SESSION['username']) || (1 >= $_SESSION['rights'])){
    header('location: ../../inloggen/?status=rights');
    exit();
  }
?>
<!-- Voeg de header van de website toe aan index.php -->
<?php include 'includes/interface/header.php'; ?>  

<!-- Voeg het functies.php bestand toe -->
<?php include 'includes/functions.php'; ?>
<?php include 'includes/db.php'; ?>

  <body>
  <!-- Voeg het hoofdmenu van de website toe aan index.php -->
  <?php include 'includes/interface/mainmenu.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php 
        if ($_GET['pagina'] != "overzicht"){
        ?>
        <!-- Sidebarmenu -->
        <div class="col-sm-3 col-md-2 sidebar">
        <!-- Voeg het sidebarmenu van de website toe aan index.php -->
        <?php include 'includes/interface/sidemenu.php'; ?>
        </div>
        <?php
        }
        ?>   
        <!-- Pagina inhoud -->
        <div class="<?php if ($_GET['pagina'] == "overzicht"){ echo "col-xs-12 main"; } else { echo "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"; } ?>">
        <!-- Controlleer wat de 'pagina' variabele is en open vervolgens de pagina --> 
          <?php 
            $pagina = "pages/".strtolower($_GET['pagina']).".php";
            include $pagina;
          ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
