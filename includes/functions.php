<?php 
	
	/*
		@author Jan Osinga
 		@version 13-6-2015
		@param $pagina_naam: Voer hier de naam van het nieuwe Sidemenu item
		@description: De functie kijkt of de invoer hetzelfde is als de pagina dit is aangeklikt, als dit true is dan voegt deze functie class="active" toe om de link actief te maken. 
	*/
	
	function sideBarItem($pagina_naam) {
		$pagina = strtolower($_GET['pagina']);
			if ($pagina_naam == $pagina)
			{
				?><li class="active"><a href="?pagina=<?php echo str_replace(' ', '_', strtolower($pagina_naam)); ?>"><?php echo ucfirst($pagina_naam); ?></a></li><?php
			}
			else 
			{
				?><li><a href="?pagina=<?php echo str_replace(' ', '_', strtolower($pagina_naam)); ?>"><?php echo ucfirst($pagina_naam); ?></a></li><?php
			}
		
	}
	
	/*
		@author Jan Osinga
 		@version 13-6-2015
		@param $pagina_naam: Voer hier de naam van het nieuwe hoofdmenu item
		@description: Functie voor het aanmaken van nieuwe hoofdmenu items. 
	*/
	function menuItem($pagina_naam) {
		$pagina = strtolower($_GET['pagina']);
		?>
		<li><a href="?pagina=<?php echo str_replace(' ', '_', strtolower($pagina_naam)); ?>"><?php echo ucfirst($pagina_naam); ?></a></li>
		<?php		
	}
	/*
		@author Jan Osinga
 		@version 15-6-2015
		@param $pagina_naam: $pagina vul hier de systemvariabele $_GET['p'] in. 
		@description: Functie voor het scrollen binnen pagina's. bijv. Incident 1-10 > 11-20 etc. '
	*/
	function pagination($pagina) {
		?>
		<nav>
  			<ul class="pager">
				<li <?php if ($pagina < 1){echo "class='disabled'";} ?>><a href="?pagina=<?php echo $_GET['pagina']; ?><?php if (isset($_GET['sortBy'])) { echo "&sortBy=".$_GET['sortBy']; } ?>&p=<?php if (isset($_GET["p"]) && $pagina > 0){ $paginanr = $pagina - 1; echo $paginanr;} ?>">Vorige</a></li>
				<li><a href="?pagina=<?php echo $_GET['pagina']; ?><?php if (isset($_GET['sortBy'])) { echo "&sortBy=".$_GET['sortBy']; } ?>&p=<?php if (isset($_GET["p"]) && $pagina > 0){ $paginanr = $pagina + 1; echo $paginanr;} else {echo "1";} ?>">Volgende</a></li>
			</ul>
		</nav>
		<?php
	}
	
	/*
		@author Jan Osinga
 		@version 15-6-2015
		@param $groepen: $grpepen Vul hier een array in me elementen waarop gesorteerd kan worden
		@description: Functie voor het aanmaken van button waarop gesorteerd kan worden binnen een pagina, bijv sorteren op openstaande incidenten of in wacht.
	*/
	function sortByGroup($groepen) {
		?>
		<div class="btn-group" role="group" aria-label="Sortering">
			<?php 
				$max = sizeof($groepen);
				for($i = 0; $i != $max; $i++){ ?>
					<a href="?pagina=<?php echo $_GET['pagina']; ?>&sortBy=<?php echo str_replace(' ', '_', strtolower($groepen[$i])); ?><?php if (isset($_GET['p'])) { echo "&p=".$_GET['p']; } ?>">
					<button type="button" class="btn btn-default <?php if (str_replace(' ', '_', strtolower($groepen[$i])) == $_GET['sortBy']) { echo "active"; } ?>"><?php echo $groepen[$i]; ?></button>
					</a>
			<?php } ?>
		</div>
		<?php
	}
	
	function rollen($id){
		include 'db.php'; 
		$query = "SELECT * FROM gebruikers WHERE Medewerker_ID=".$id.";";
		$get_query = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($get_query);
		echo $user[$kolom];
	}
	
	// Functie voor het ophalen van gegevens van een bepaaalde user, verder aangeven welke kolom gereturned moet worden. 
	function haal_user_op($id, $kolom){
		include 'db.php'; 
		$query = "SELECT * FROM gebruikers WHERE Medewerker_ID=".$id.";";
		$get_query = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($get_query);
		echo $user[$kolom];
	}
	
	function haal_rol_op($id)
	{
		include 'db.php'; 
		$query = "SELECT * FROM `gebruikers_has_rechten` WHERE gebruikers_Medewerker_ID=".$id;
		$rol = mysqli_fetch_assoc(mysqli_query($db, $query));
		return $rol['rechten_Rechten_ID'];
	}
	
	function haal_locatie_op($id)
	{
		include 'db.php';
		$query = "SELECT * FROM gebruikers";
		$locatie = mysqli_fetch_assoc(mysqli_query($db, $query));
		return $locatie['locaties_id'];
	}
	
	// FUNCTIE voor de weergave van de tabel. haalt gegevens uit tabel gebruikers. 
	function gebruikersbeheer_tabel(){
		?>
		<div class="table-responsive">
		<table class="table table-striped">
		<thead>
			<tr>
			  <th>Medewerker ID</th>
			  <th>Voornaam</th>
			  <th>Achternaam</th>
			  <th>Telefoon</th>
			  <th>Email</th>
			  <th>Functie</th>
			  <th>Locatie</th>
			  <th>Rol/Recht</th>
			  <th>Opties</th>
			</tr>
		</thead>
		<tbody>
		<?php
		include ('db.php');
		$query = "SELECT * FROM gebruikers JOIN locaties ON gebruikers.locaties_id=locaties.id JOIN gebruikers_has_rechten ON gebruikers.Medewerker_ID=gebruikers_has_rechten.gebruikers_Medewerker_ID JOIN rechten ON gebruikers_has_rechten.rechten_Rechten_ID=rechten.Rechten_ID ORDER BY Medewerker_ID ASC;";
		$get_query = mysqli_query($db, $query);
		$rows = mysqli_num_rows($get_query);
		if ($rows == 0){
			echo "Mogelijk is de verkeerde tabelnaam opgegeven of is de tabel leeg. Controleer tabelnaam.";
			exit();
		}
		while($tabel = mysqli_fetch_assoc($get_query))
		{
		?>
	      <tr>
	        <td><?php echo $tabel['Medewerker_ID']; ?></td>
	        <td><?php echo $tabel['Voornaam']; ?></td>
	        <td><?php echo $tabel['Achternaam']; ?></td>
	        <td><?php echo $tabel['Telefoon']; ?></td>
	        <td><?php echo $tabel['Email']; ?></td>
	        <td><?php echo $tabel['Functie']; ?></td>
			<td><?php echo $tabel['Plaats']; ?></td>
			<td><?php echo $tabel['Naam']; ?></td>
	        <td><a href="?pagina=instellingen&status=bewerken&id=<?php echo $tabel['Medewerker_ID']; ?>">Bewerken</a> | <a href="?pagina=instellingen&status=verwijderen&confirm=false&id=<?php echo $tabel['Medewerker_ID']; ?>">Verwijderen</a></td>
	      </tr>
	    <?php
		}
		?>
		</tbody>
		</table>
		</div>
		<?php
	}
	
	// Query functie die de nieuwe user aanmaakt
	function gebruikersbeheer_aanmaken_query()
	{
		include 'db.php';
		// Versleutel het wachtwoord
		$password = crypt($_POST['wachtwoord'], '$2a$10$1qAz2wSx3eDc4rFv5tGb5t');
		$query = "INSERT INTO `superdesk`.`gebruikers` (`Medewerker_ID`, `Voornaam`, `Achternaam`, `Functie`, `Telefoon`, `Email`, `locaties_id`, `Password`) VALUES ('".$_POST['medewerker_id']."', '".$_POST['voornaam']."', '".$_POST['achternaam']."', '".$_POST['functie']."', '".$_POST['telefoon']."', '".$_POST['email']."', '".$_POST['locatie']."', '".$password."');";
		mysqli_query($db, $query);
		$query_rechten = "INSERT INTO `superdesk`.`gebruikers_has_rechten` (`gebruikers_Medewerker_ID`, `rechten_Rechten_ID`) VALUES ('".$_POST['medewerker_id']."', '".$_POST['rechten']."');";
		mysqli_query($db, $query_rechten);
		?>
		<div class="alert alert-success" role="alert"><strong>Gelukt!</strong> Het account met ID: <?php echo $_POST['medewerker_id']; ?> is aangemaakt. <a href="?pagina=instellingen">Klik om terug te gaan!</a></div>
		<?php
	}
	
	function gebruikersbeheer_wijzigen_query()
	{	
		include 'db.php';
		// Versleutel het wachtwoord
		$password = crypt($_POST['wachtwoord'], '$2a$10$1qAz2wSx3eDc4rFv5tGb5t');
		$query = "UPDATE gebruikers SET Voornaam='".$_POST['voornaam']."', Achternaam='".$_POST['achternaam']."', Functie='".$_POST['functie']."', Telefoon=".$_POST['telefoon'].", Email='".$_POST['email']."', locaties_id=".$_POST['locatie'].", Password='".$password."' WHERE Medewerker_ID=".$_GET['id'].";";
		mysqli_query($db, $query);
		$query_rechten = "UPDATE gebruikers_has_rechten SET rechten_Rechten_ID=".$_POST['rechten']." WHERE gebruikers_Medewerker_ID= ".$_GET['id'].";";
		mysqli_query($db, $query_rechten);
		?>
		<div class="alert alert-success" role="alert"><strong>Gelukt!</strong> Het account met ID: <?php echo $_POST['medewerker_id']; ?> is bijgewerkt. <a href="?pagina=instellingen">Klik om terug te gaan!</a></div>
		<?php
	}
	
	function gebruikersbeheer_verwijderen_query($id)
	{
		if (isset($id) && isset($_GET['confirm']) && $_GET['confirm'] == "false")
		{
		?>
		<div class="alert alert-info">
			<center>
			<h3>Weet je het zeker dat je ID: <?php echo $id; ?> wilt verwijderen?</h3>
			<a href="?pagina=instellingen&status=verwijderen&id=<?php echo $id; ?>&confirm=true"><button type="button" class="btn btn-success">Ja ik weet het zeker</button>
			<a href="?pagina=instellingen"><button type="button" class="btn btn-danger">Nee ga terug</button></a>
			</center>
		</div>
		<?php
		}
		else if (isset($id) && isset($_GET['confirm']) && $_GET['confirm'] == 'true')
		{
			include 'db.php';
			$query = "DELETE FROM `superdesk`.`gebruikers` WHERE `gebruikers`.`Medewerker_ID` = ".$id.";";
			mysqli_query($db, $query);
			?>
			<div class="alert alert-success" role="alert"><strong>Gelukt!</strong> Het account met ID: <?php echo $id; ?> is verwijderd. <a href="?pagina=instellingen">Klik om terug te gaan!</a></div>
			<?php
		}		
	}
	
	// Functie die bekijkt of er geen velden leeg zijn, als dit wel het geval is dan moet dit gemarkeerd worden als een error. 
	function input($submit, $type, $field, $input)
	{
		$field_html = str_replace(' ', '_', strtolower($field));
		
		if (isset($submit) && empty($input))
		{
			?>
			<div class="form-group has-error">
			<div class="input-group">
				<div class="input-group-addon"><?php echo ucfirst($field); ?></div>
					<input type="<?php echo $type; ?>" class="form-control" name="<?php echo $field_html; ?>" value="">
				</div>
			</div> 
			<?php
		}
		else if (isset($submit) && !empty($input))
		{
			?>
			<div class="form-group has-success">
			<div class="input-group">
				<div class="input-group-addon"><?php echo ucfirst($field); ?></div>
					<input type="<?php echo $type; ?>" class="form-control" name="<?php echo $field_html; ?>" value="<?php echo $input; ?>">
				</div>
			</div> 
			<?php
		}
		else if (!isset($submit))
		{
			?>
			<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><?php echo ucfirst($field); ?></div>
					<input type="<?php echo $type; ?>" class="form-control" name="<?php echo $field_html; ?>" value="">
				</div>
			</div> 
			<?php
		}
	}
	
	// Functie voor het aanmaken van een nieuwe gebruiker. 
	function gebruikersbeheer_aanmaken()
	{
		if (isset($_POST['submit']) && !empty($_POST['medewerker_id']) && !empty($_POST['achternaam']) && !empty($_POST['functie']) && !empty($_POST['rechten']) && !empty($_POST['telefoon']) && !empty($_POST['email']) && !empty($_POST['locatie']) && !empty($_POST['wachtwoord']))
		{
			gebruikersbeheer_aanmaken_query();
		}
	?>
		<form id="login-form" action="?pagina=instellingen&status=aanmaken" method="post" role="form" style="display: block;">
		<div class="row new_user">
			<div class="col-xs-12 col-md-12 col-lg-5 new_user">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nieuwe gebruiker toevoegen</h3>
				</div>
				<div class="panel-body">
					<!-- Medewerkers nummer --> 
					<?php input($_POST['submit'], "input", "Medewerker ID", $_POST['medewerker_id']); ?>
					<!-- Voornaam --> 
					<?php input($_POST['submit'], "input", "Voornaam", $_POST['voornaam']); ?>
					<!-- Achternaam --> 
					<?php input($_POST['submit'], "input", "Achternaam", $_POST['achternaam']); ?>
					<!-- Functie --> 
					<?php input($_POST['submit'], "input", "Functie", $_POST['functie']); ?>
					<!-- Telefoon --> 
					<?php input($_POST['submit'], "tel", "Telefoon", $_POST['telefoon']); ?>
					<!-- Voornaam --> 
					<?php input($_POST['submit'], "email", "Email", $_POST['email']); ?>
					<!-- Locatie --> 
					<div class="form-group <?php if (isset($_POST['submit']) && !empty($_POST['locatie'])){ echo "has-success"; } ?>">
					<div class="input-group">
					<div class="input-group-addon">Locatie</div>
					<select class="form-control" name="locatie">
						<?php 
						include 'db.php';
						$query = "SELECT * FROM locaties;";
						$get = mysqli_query($db, $query);
						while ($locaties = mysqli_fetch_assoc($get)){
						?>
							<option <?php if ($locaties['id'] == $_POST['locatie']) { echo "selected='selected'"; } ?> value="<?php echo $locaties['id']; ?>"><?php echo $locaties['Plaats']; ?></option>
						<?php
						}               		
						?>
					</select>
					</div>
					</div>    
					<!-- Rechten --> 
					<div class="form-group <?php if (isset($_POST['submit']) && !empty($_POST['rechten'])){ echo "has-success"; } ?>">
					<div class="input-group">
					<div class="input-group-addon">Recht/Rollen</div>
					<select class="form-control" name="rechten">
						<?php 
						$query_rechten = "SELECT * FROM rechten;";
						$get_rechten = mysqli_query($db, $query_rechten);
						while ($rechten = mysqli_fetch_assoc($get_rechten)){
						?>
							<option <?php if ($rechten['Rechten_ID'] == $_POST['rechten']) { echo "selected='selected'"; } ?> value="<?php echo $rechten['Rechten_ID']; ?>"><?php echo $rechten['Rechten_ID']; ?>. <?php echo $rechten['Naam']; ?></option>
						<?php
						}               		
						?>
					</select>
					</div>
					</div>  
					<!-- Wachtwoord --> 
					<?php input($_POST['submit'], "password", "Wachtwoord", $_POST['wachtwoord']); ?>
					<!-- Verzenden -->      
					<div class="form-group">
					<div class="input-group">
					<input type="submit" name="submit" tabindex="4" class="btn btn-success" value="Aanmaken">&nbsp;&nbsp;
					<input type="reset" tabindex="4" class="btn btn-default" value="Herstel">
					</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	<?php
	}
	
	// Functie voor het WIJZIGEN van een gebruiker. 
	function gebruikersbeheer_wijzigen()
	{
		$id = $_GET['id'];
		if (isset($_POST['submit']) && !empty($_POST['voornaam']) && !empty($_POST['achternaam']) && !empty($_POST['functie']) && !empty($_POST['telefoon']) && !empty($_POST['email']) && !empty($_POST['locatie']) && !empty($_POST['wachtwoord']))
		{
			gebruikersbeheer_wijzigen_query();
		} 
		else if (isset($_POST['submit']))
		{
			?>
			<div class="alert alert-error" role="alert"><strong>Mislukt!</strong> Niet alle velden ingevoerd.</a></div>
			<?php
		}
	?>
		<form id="login-form" action="?pagina=instellingen&status=bewerken&id=<?php echo $id; ?>" method="post" role="form" style="display: block;">
		<div class="row new_user">
			<div class="col-xs-12 col-md-12 col-lg-5 new_user">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Wijzigen ID: <?php echo $id; ?></h3>
				</div>
				<div class="panel-body">
				<!-- Medewerkers nummer --> 
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">Medewerkers nr</div>
				<input type="text" class="form-control" name="medewerker_id" value="<?php echo $id; //if (isset($_GET['id'])){ echo $_GET['id']; } else { echo $_POST['medewerker_id']; } ?>" disabled>
				</div>
				</div>
				<!-- Voornaam --> 
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">Voornaam</div>
				<input type="text" class="form-control" name="voornaam" value="<?php haal_user_op($_GET['id'], "Voornaam"); ?>">
				</div>
				</div>
				<!-- Achternaam --> 
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">Achternaam</div>
				<input type="text" class="form-control" name="achternaam" value="<?php haal_user_op($_GET['id'], "Achternaam"); ?>">
				</div>
				</div>
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">Functie</div>
				<input type="text" class="form-control" name="functie" value="<?php haal_user_op($_GET['id'], "Functie"); ?>">
				</div>
				</div>
				<!-- Telefoon --> 
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">Telefoon</div>
				<input type="tel" class="form-control" name="telefoon" value="<?php haal_user_op($_GET['id'], "Telefoon"); ?>">
				</div>
				</div>
				<!-- Email --> 
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">E-Mail</div>
				<input type="email" class="form-control" name="email" value="<?php haal_user_op($_GET['id'], "Email"); ?>">
				</div>
				</div> 
				<!-- Locatie --> 
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">Locatie</div>
				<select class="form-control" name="locatie">
				<?php 
					include 'db.php';
					$query = "SELECT * FROM locaties;";
					$get_query = mysqli_query($db, $query);
					while ($locaties = mysqli_fetch_assoc($get_query)){
					  ?><option <?php if ($locaties['id'] == haal_locatie_op($id)) { echo "selected='selected'"; } ?> value="<?php echo $locaties['id']; ?>"><?php echo $locaties['Plaats']; ?></option><?php
					}               		
				?>
				</select>
				</div>
				</div>  
				<!-- Rechten --> 
				<div class="form-group <?php if (isset($_POST['submit']) && !empty($_POST['rechten'])){ echo "has-success"; } ?>">
				<div class="input-group">
				<div class="input-group-addon">Recht/Rollen</div>
				<select class="form-control" name="rechten">
					<?php 
					$query_rechten = "SELECT * FROM rechten;";
					$get_rechten = mysqli_query($db, $query_rechten);
					while ($rechten = mysqli_fetch_assoc($get_rechten)){
					?>
						<option <?php if ($rechten['Rechten_ID'] == haal_rol_op($id)) { echo "selected='selected'"; } ?> value="<?php echo $rechten['Rechten_ID']; ?>"><?php echo $rechten['Rechten_ID']; ?>. <?php echo $rechten['Naam']; ?></option>
					<?php
					}               		
					?>
				</select>
				</div>
				</div>   
				<!-- Wachtwoord --> 
				<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">Wachtwoord</div>
				<input type="password" class="form-control" name="wachtwoord" value="">
				</div>
				</div>     
				<div class="form-group">
					<div class="input-group">
							<input type="submit" name="submit" tabindex="4" class="btn btn-success" value="Wijzigen">
					</div>
				</div>
	        </div>
		</div>
		</form>
	<?php
	}
?>