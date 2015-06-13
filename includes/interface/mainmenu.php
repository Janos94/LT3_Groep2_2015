<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SuperDesk - <?php echo ucfirst($_GET['pagina']); ?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php menuItem("Incident aanmaken"); ?>
            <?php menuItem("Component aanmaken"); ?>
          </ul>
        </li>    
        <?php menuItem("Overzicht"); ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">CMDB<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php menuItem("Incidenten"); ?>
            <?php menuItem("Problemen"); ?>
            <?php menuItem("Configuratie"); ?>
          </ul>
        </li>            
        <?php menuItem("Instellingen"); ?>           
        <?php menuItem("Help"); ?>
        <?php menuItem("Uitloggen"); ?>
      </ul>
      <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Zoeken naar...">
      </form>
    </div>
  </div>
</nav>