<?php 
  include '../includes/functions.php'; 
  include 'includes/db.php';
?>

<h1 class="page-header">Gebruikersbeheer</h1>
<?php
  if ($_GET['optie'] == "toegevoegd" && isset($_POST['nieuwe_user']) && !empty($_POST['medewerker_id']) && !empty($_POST['voornaam']) && !empty($_POST['achternaam']) && !empty($_POST['telefoon']) && !empty($_POST['email']) && !empty($_POST['locatie'])){
    // Versleutel het wachtwoord
    $password = crypt($_POST['wachtwoord'], '$2a$10$1qAz2wSx3eDc4rFv5tGb5t');
    $query = "INSERT INTO `superdesk`.`gebruikers` (`Medewerker_ID`, `Voornaam`, `Achternaam`, `Functie`, `Telefoon`, `Email`, `locaties_id`, `Password`) VALUES ('".$_POST['medewerker_id']."', '".$_POST['voornaam']."', '".$_POST['achternaam']."', '".$_POST['functie']."', '".$_POST['telefoon']."', '".$_POST['email']."', '".$_POST['locatie']."', '".$password."');";
    mysqli_query($db, $query);
    ?>
    <div class="alert alert-success" role="alert"><strong>Gelukt!</strong> Het account met ID: <?php echo $_POST['medewerker_id']; ?> is aangemaakt.</div>
    <?php
  }
  if (isset($_GET['optie']) && $_GET['optie'] == "toevoegen"){
    ?>
    <form id="login-form" action="?pagina=instellingen&optie=toegevoegd" method="post" role="form" style="display: block;">
    <div class="row new_user">
    <div class="col-xs-12 col-md-12 col-lg-5 new_user">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Nieuwe gebruiker toevoegen</h3>
        </div>
        <div class="panel-body">
            <!-- Medewerkers nummer --> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Medewerkers nr</div>
                <input type="text" class="form-control" name="medewerker_id" placeholder="4958245">
              </div>
            </div>
            <!-- Voornaam --> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Voornaam</div>
                <input type="text" class="form-control" name="voornaam" placeholder="Vb. Peter">
              </div>
            </div>
            <!-- Achternaam --> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Achternaam</div>
                <input type="text" class="form-control" name="achternaam" placeholder="Vb. de Vries">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Functie</div>
                <input type="text" class="form-control" name="functie" placeholder="Vb. Servicedeskmedewerker">
              </div>
            </div>
            <!-- Telefoon --> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Telefoon</div>
                <input type="tel" class="form-control" name="telefoon" placeholder="Vb. 0505491433">
              </div>
            </div>
            <!-- Email --> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">E-Mail</div>
                <input type="email" class="form-control" name="email" placeholder="p.devries@hondsrug.nl" >
              </div>
            </div> 
            <!-- Locatie --> 
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Aangemeld via</div>
                <select class="form-control" name="locatie">
                  <?php 
                    $query = "SELECT * FROM locaties;";
                		$get = mysqli_query($db, $query);
                    while ($locaties = mysqli_fetch_assoc($get)){
                      ?><option value="<?php echo $locaties['id']; ?>"><?php echo $locaties['Plaats']; ?></option><?php
                    }               		
                  ?>
                </select>
              </div>
            </div>   
            <!-- Wachtwoord --> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Wachtwoord</div>
                <input type="password" class="form-control" name="wachtwoord">
              </div>
            </div>     
            <div class="form-group">
  						<div class="input-group">
								<input type="submit" name="nieuwe_user" id="nieuwe_user" tabindex="4" class="btn btn-success" value="Aanmaken">&nbsp;&nbsp;
                <input type="reset" tabindex="4" class="btn btn-default" value="Herstel">
  						</div>
  					</div>
        </div>
      </div>
    </div>
    </form>
    <?php
  }
  
?>
<?php
  if (!isset($_GET['optie'])){
    ?>
    <div class="btn-group btn-group-lg" role="group" aria-label="Nieuwe gebruiker">
      <a href="?pagina=instellingen&optie=toevoegen"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Nieuwe gebruiker</button></a>
    </div>
    <br><br>
    <?php
  }  
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
      <th>Rechten</th>
      <th>Opties</th>
    </tr>
  </thead>
  <tbody>
  <?php    
    $query = "SELECT * FROM gebruikers; ";
		//$query .= "JOIN gebruikers_has_rechten ON gebruikers.Medewerker_ID=gebruikers_has_rechten.gebruikers_Medewerker_ID ";
		$get_query = mysqli_query($db, $query);
    $rows = mysqli_num_rows($get_query);
		if ($rows == 0){
			echo "Mogelijk is de verkeerde tabelnaam opgegeven of is de tabel leeg. Controleer tabelnaam.";
			exit();
		}
    while($tabel = mysqli_fetch_assoc($get_query)){
      ?>
      <tr>
        <td><?php echo $tabel['Medewerker_ID']; ?></td>
        <td><?php echo $tabel['Voornaam']; ?></td>
        <td><?php echo $tabel['Achternaam']; ?></td>
        <td><?php echo $tabel['Telefoon']; ?></td>
        <td><?php echo $tabel['Email']; ?></td>
        <td><?php echo $tabel['Functie']; ?></td>
        <td><?php //rollen($tabel['rechten_Rechten_ID']); ?></td>
        <td>Bewerken | Verwijderen</td>
      </tr>
      <?php
    }
    
    /* free result set */
    mysqli_free_result($tabel);
    /* close connection */
    mysqli_close($db);
    ?>
  </tbody>
</table>
</div>