<h1 class="page-header">Gebruikersbeheer</h1>
<?php 
if ($_GET['pagina'] = "instellingen" && isset($_GET['status']) && $_GET['status'] == "aanmaken")
{
	gebruikersbeheer_aanmaken(); 
} 
else if ($_GET['pagina'] = "instellingen" && isset($_GET['status']) && $_GET['status'] == "bewerken" && isset($_GET['id']) && $_GET['id'])
{
	gebruikersbeheer_wijzigen();
}
else if ($_GET['pagina'] = "instellingen" && isset($_GET['status']) && $_GET['status'] == "verwijderen" && isset($_GET['id']) && $_GET['id'])
{
	$id = $_GET['id'];
	gebruikersbeheer_verwijderen_query($id);
}
else
{
	?>
	<div class="btn-group btn-group-lg" role="group" aria-label="Nieuwe gebruiker">
      <a href="?pagina=instellingen&status=aanmaken">
		  <button type="button" class="btn btn-default">
			  <span class="glyphicon glyphicon-plus"></span> Nieuwe gebruiker
			  </button>
	  </a>
    </div>
	<?php
	gebruikersbeheer_tabel(); 
}

?>
</div>