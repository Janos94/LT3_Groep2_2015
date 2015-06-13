<!-- Voeg de header van de website toe aan index.php -->
<?php include 'includes/interface/header.php'; ?>  

  <body>
  <!-- Voeg het hoofdmenu van de website toe aan index.php -->
  <?php include 'includes/interface/mainmenu.php'; ?>

    <div class="container-fluid">
      <div class="row">
        
        <!-- Sidebarmenu -->
        <div class="col-sm-3 col-md-2 sidebar">
        <!-- Voeg het sidebarmenu van de website toe aan index.php -->
        <?php include 'includes/interface/sidemenu.php'; ?>
        </div>
        
        <!-- Pagina inhoud -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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