<?php 
  session_start();
  if(!isset($_SESSION['username']) /*|| (2 >= $_SESSION['rights'])*/){
    header('location: ../inloggen/?status=rights');
    exit();
  }
?>
<!-- Voeg de header van de website toe aan index.php -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SuperDesk - SelfServiceDesk</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<!-- Voeg het functies.php bestand toe -->
<?php include '../includes/functions.php'; ?>
<?php include '../includes/db.php'; ?>

  <body>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Superdesk - SelfServiceDesk</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION['naam']; ?></a></li>
        <li><a href="../index.php?pagina=uitloggen.php">Uitloggen</a></li>       
      </ul>
  </div><!-- /.container-fluid -->
</nav>
<br><br>
<div class="container">
<div class="jumbotron">
<h1>SuperDesk Self ServiceDesk</h1>
<p>IT Diensten makkelijker gemaakt.</p>
<p><a class="btn btn-primary btn-lg" href="#" role="button">Nieuw incident indienen</a></p>
</div>
<!---- CODE HIER -->

<div class="row">
<h1>Incident indienen</h1>
<div class="col-xs-6 formulier">
<?php input("true", "input", "Naam", "Test"); ?>
</div> 
<div class="col-xs-6 formulier">
<?php input("true", "input", "Naam", "Test"); ?>
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
