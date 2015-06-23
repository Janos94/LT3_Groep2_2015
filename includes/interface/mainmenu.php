<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SuperDesk - <?php echo str_replace('_', ' ', ucfirst($_GET['pagina'])); ?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php menuItem("Incident aanmaken"); ?>
            <?php menuItem("Component aanmaken"); ?>
            <?php menuItem("Wijziging software"); ?>
            <?php menuItem("Wijziging component"); ?>
          </ul>
        </li>    
        <?php menuItem("Overzicht"); ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">CMDB<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php menuItem("Incidenten"); ?>
          </ul>
        </li>     
         
        
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['naam']; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="?pagina=help"><span class="glyphicon glyphicon-user"></span>Help</a></li>
            <li><a href="?pagina=instellingen"><span class="glyphicon glyphicon-cog"></span>Instellingen</a></li>
            <li class="divider"></li>
            <li><a href="../../pages/uitloggen.php"><span class="glyphicon glyphicon-off"></span>Uitloggen</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>