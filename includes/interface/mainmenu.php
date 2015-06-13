<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SuperDesk - <?php echo $_GET['pagina']; ?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?pagina=Dashboard">Overzicht</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">CMDB<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Incidenten</a></li>
            <li><a href="#">Problemen</a></li>
            <li><a href="#">Configuratie</a></li>
          </ul>
        </li>            
        <li><a href="#">Instellingen</a></li>            
        <li><a href="#">Help</a></li>
        <li><a href="#">Uitloggen</a></li>
      </ul>
      <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Zoeken naar...">
      </form>
    </div>
  </div>
</nav>