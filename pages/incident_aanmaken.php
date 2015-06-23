<?php 
  if (isset($_GET['actie']) && $_GET['actie'] == "opslaan" && !empty($_POST['medewerker_id']) && !empty($_POST['aanmelden_via']) && !empty($_POST['prioriteit']) && !empty($_POST['object_id']) && !empty($_POST['korte_omschrijving']) && !empty($_POST['omschrijving']) && !empty($_POST['status']) && !empty($_POST['behandelaar']))
  {
      // Database connectie met localhost inclusief inloggegevens
  	$dbhost = "localhost"; 
  	$dbuser = "lt3"; 
  	$dbpass = "supermanisgay!"; 
  	$dbname = "superdesk"; 
  	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  	
  	// Test of de verbinding werkt! 
  	if (mysqli_connect_errno()) {
  		die("De verbinding met de database is mislukt: " .
  			mysqli_connect_error() .
  			" (" . mysqli_connect_errno() . ")"
  		);
  	} 
    $query = "INSERT INTO incidenten (`CMDB_ID`, `CATEGORIE`, `DATUM`, `TIJDSTIP_AANGENOMEN`, `AANMELDER_ID`, `AANMELDEN_VIA`, `KORTE_OMSCHRIJVING`, `OMSCHRIJVING`, `STATUS`, `COMPONENT_ID`, `PRIORITEIT`, `BEHANDELAAR`) VALUES ('".cmdb_tag(1)."', '1', CURDATE(), CURTIME(), '".$_POST['medewerker_id']."', '".$_POST['aanmelden_via']."', '".$_POST['korte_omschrijving']."', '".$_POST['omschrijving']."', ".$_POST['status'].", '".$_POST['object_id']."', '".$_POST['prioriteit']."', '".$_POST['behandelaar']."');";
    mysqli_query($db, $query);
    ?><div class="alert alert-success" role="alert"><strong>Aangemaakt!</strong> Incident is aangemaakt. </div><?php
  }
  else if (isset($_GET['actie']) && $_GET['actie'] == "opslaan" && !empty($_POST['medewerker_id'])) 
  {
    ?><div class="alert alert-danger" role="alert"><strong>Controleer!</strong> Niet alle velden zijn volledig ingevuld! </div><?php
  }
  
?>

<form action="?pagina=incident_aanmaken&actie=opslaan" method="post" role="form" style="display: block;"> 
<h1 class="page-header"><?php if (!isset($_GET['tag'])){ echo "Incident aanmaken "; }  ?><small><span class="label label-primary"><?php if (isset($_GET['tag'])) { echo haal_cmdb_op($_GET['tag'], "CMDB_ID"); } else { echo cmdb_tag(1); } ?></span></small></h1>
<div class="btn-group btn-group-lg" role="group" aria-label="Incident aanmaken-beheer">
  <input type="submit" name="opslaan" tabindex="4" class="btn btn-<?php if (!isset($_GET['tag'])){ echo "default"; } else { echo "success"; } ?>" value="Opslaan">
  <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></button>
</div>
<br><br>
<form action="?pagina=incident_aanmaken&actie=ophalen" method="post" role="form" style="display: block;"> 
<div class="row incident_field">  
<!-- Aanmelder incident -->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Aanmelder</h3>
    </div>
    <div class="panel-body">
        <!-- Medewerkers nummer --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Medewerkers nr</div>
            <input type="text" class="form-control" name="medewerker_id" value="<?php if (isset($_GET['actie']) && isset($_POST['ophalen']) || isset($_POST['medewerker_id'])) { echo $_POST['medewerker_id']; } else if (isset($_GET['tag'])){ echo haal_cmdb_op($_GET['tag'], "AANMELDER_ID"); } ?>" <?php if (isset($_GET['tag'])){echo "disabled"; } ?>>
          </div>
        </div>
        <!-- Voornaam --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Voornaam</div>
            <input type="text" class="form-control" value="<?php if (isset($_GET['actie']) && isset($_POST['ophalen']) || isset($_POST['medewerker_id'])) { haal_user_op($_POST['medewerker_id'], "Voornaam"); } else if (isset($_GET['tag'])){ haal_user_op((haal_cmdb_op($_GET['tag'], "AANMELDER_ID")), "Voornaam"); } ?>" disabled>
          </div>
        </div>
        <!-- Achternaam --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Achternaam</div>
            <input type="text" class="form-control" value="<?php if (isset($_GET['actie']) && isset($_POST['ophalen']) || isset($_POST['medewerker_id'])) { haal_user_op($_POST['medewerker_id'], "Achternaam"); } else if (isset($_GET['tag'])){ haal_user_op((haal_cmdb_op($_GET['tag'], "AANMELDER_ID")), "Achternaam"); } ?>" disabled>
          </div>
        </div>
        <!-- Telefoon --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Telefoon</div>
            <input type="tel" class="form-control" value="<?php if (isset($_GET['actie']) && isset($_POST['ophalen']) || isset($_POST['medewerker_id'])) { haal_user_op($_POST['medewerker_id'], "Telefoon"); } else if (isset($_GET['tag'])){ haal_user_op((haal_cmdb_op($_GET['tag'], "AANMELDER_ID")), "Telefoon"); } ?>" disabled>
          </div>
        </div>
        <!-- Email --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">E-Mail</div>
            <input type="email" class="form-control" value="<?php if (isset($_GET['actie']) && isset($_POST['ophalen']) || isset($_POST['medewerker_id'])) { haal_user_op($_POST['medewerker_id'], "Email"); } else if (isset($_GET['tag'])){ haal_user_op((haal_cmdb_op($_GET['tag'], "AANMELDER_ID")), "Email"); } ?>" disabled>
          </div>
        </div> 
        <!-- Locatie aanmelder --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Locatie</div>
            <input type="text" class="form-control" value="<?php if (isset($_GET['actie']) && isset($_POST['ophalen']) || isset($_POST['medewerker_id'])) { haal_user_op($_POST['medewerker_id'], "Plaats"); } else if (isset($_GET['tag'])){ haal_user_op((haal_cmdb_op($_GET['tag'], "AANMELDER_ID")), "Plaats"); } ?>" disabled>
          </div>
        </div>   
        <?php if (!isset($_GET['tag'])){ ?>
        <!-- Verzenden -->      
        <div class="form-group">
        <div class="input-group">
        	<input type="submit" name="ophalen" tabindex="4" class="btn btn-success" value="Ophalen">
        </div>
        </div> 
        <?php } ?>
    </div>
  </div>
</div>
<!-- Type incident -->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Soort melding/incident</h3>
    </div>
    <div class="panel-body">
        <!-- Categorie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Aangemeld via</div>
            <select class="form-control" name="aanmelden_via">
              <option <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "AANMELDEN_VIA")) == "Telefoon" || $_POST['aanmelden_via'] == "Telefoon") { echo "selected = 'selected'"; } ?>>Telefoon</option>
              <option <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "AANMELDEN_VIA")) == "E-mail" || $_POST['aanmelden_via'] == "E-mail") { echo "selected = 'selected'"; } ?>>E-mail</option>
              <option <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "AANMELDEN_VIA")) == "Mondeling" || $_POST['aanmelden_via'] == "Mondeling") { echo "selected = 'selected'"; } ?>>Mondeling</option>
              <option <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "AANMELDEN_VIA")) == "SelfServiceDesk" || $_POST['aanmelden_via'] == "SelfServiceDesk") { echo "selected = 'selected'"; } ?>>SelfServiceDesk</option>
            </select>
          </div>
        </div>
        <!-- Categorie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Impact/urgentie</div>
            <select class="form-control" name="prioriteit">
              <option value="1" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "PRIORITEIT")) == 1 || $_POST['prioriteit'] == 1) { echo "selected = 'selected'"; } ?>>1 - Gering</option>
              <option value="2" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "PRIORITEIT")) == 2 || $_POST['prioriteit'] == 2) { echo "selected = 'selected'"; } ?>>2 - Laag</option>
              <option value="3" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "PRIORITEIT")) == 3 || $_POST['prioriteit'] == 3) { echo "selected = 'selected'"; } ?>>3 - Middel</option>
              <option value="4" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "PRIORITEIT")) == 4 || $_POST['prioriteit'] == 4) { echo "selected = 'selected'"; } ?>>4 - Hoog</option>
              <option value="5" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "PRIORITEIT")) == 5 || $_POST['prioriteit'] == 5) { echo "selected = 'selected'"; } ?>>5 - Blokkerend</option>
            </select>
          </div>
        </div>       
        
    </div>
  </div>
</div>

<!-- Object type --> 
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Object</h3>
    </div>
    <div class="panel-body">
        <!-- Object ID --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Object-ID</div>
            <input type="text" class="form-control" name="object_id" value="<?php if (isset($_POST['object_id'])){ echo $_POST['object_id']; } else if (isset($_GET['tag'])){ echo haal_cmdb_op($_GET['tag'], "COMPONENT_ID"); } ?>"<?php if(isset($_GET['tag'])){echo "disabled";} ?>>
          </div>
        </div> 
        <!-- Categorie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Object categorie</div>
            <input type="text" class="form-control" name="categorie" value="<?php if (isset($_POST['object_id'])) { echo ucfirst(haal_component_op($_POST['object_id'], "Categorie")); } else if (isset($_GET['tag'])){ echo haal_component_op(haal_cmdb_op($_GET['tag'], "COMPONENT_ID"), "Categorie"); } ?>" disabled>
          </div>
        </div>  
        <!-- Locatie --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Locatie</div>
            <input type="text" class="form-control" name="locatie" value="<?php if (isset($_POST['object_id'])) { echo haal_component_op($_POST['object_id'], "Plaats"); } ?>" disabled>
          </div>
        </div>   
        <?php if (!isset($_GET['tag'])){ ?>
        <!-- Verzenden -->      
        <div class="form-group">
        <div class="input-group">
        	<input type="submit" name="ophalen" tabindex="4" class="btn btn-success" value="Ophalen">
        </div>
        </div> 
        <?php } ?>      
    </div>
  </div>
</div>
<!-- Behandelaar -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Verwerking / Behandelaar</h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-6 incident_field">
        <!-- Behandelaar --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Behandelaar</div>
            <select class="form-control" name="behandelaar">
              <?php
                //include 'db.php';
            		$query_behandelaar = "SELECT * FROM gebruikers JOIN gebruikers_has_rechten ON gebruikers.Medewerker_ID=gebruikers_has_rechten.gebruikers_Medewerker_ID WHERE rechten_Rechten_ID=2;";
            		$query_behandelaar_ophalen = mysqli_query($db, $query_behandelaar);
                while ($behandelaar = mysqli_fetch_assoc($query_behandelaar_ophalen))
                {
                  ?><option value="<?php echo $behandelaar['Medewerker_ID']; ?>" <?php if (isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "BEHANDELAAR") == $behandelaar['Medewerker_ID']) || (isset($_POST['behandelaar']) && $_POST['behandelaar'] == $behandelaar['Medewerker_ID'])){ echo "selected = 'selected'"; }  ?>><?php echo $behandelaar['Achternaam'].", ".$behandelaar['Voornaam']; ?></option><?php
                }
              ?>
            </select>
          </div>
        </div>
        
        <!-- Locatie aanmelder --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Oplostijd</div>
            <?php bepaal_oplostijd($_POST['prioriteit']); ?>
          </div>
        </div>
        </div> 
        
        <div class="col-xs-12 col-sm-6 incident_field">
        <!-- Object type --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Status</div>
            <select class="form-control" name="status">
              <option value="1" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "STATUS")) == 1 || $_POST['status'] == 1) { echo "selected = 'selected'"; } ?>>1 - Open</option>
              <option value="2" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "STATUS")) == 2 || $_POST['status'] == 2) { echo "selected = 'selected'"; } ?>>2 - In wacht</option>
              <option value="3" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "STATUS")) == 3 || $_POST['status'] == 3) { echo "selected = 'selected'"; } ?>>3 - In behandeling</option>
              <option value="4" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "STATUS")) == 4 || $_POST['status'] == 4) { echo "selected = 'selected'"; } ?>>4 - Gesloten</option>
              <option value="5" <?php if(isset($_GET['tag']) && (haal_cmdb_op($_GET['tag'], "STATUS")) == 5 || $_POST['status'] == 5) { echo "selected = 'selected'"; } ?>>5 - Opgelost</option>
            </select>
          </div>
        </div> <!---
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 2%;">
          2%
        </div>
        </div>  --> 
        </div> 
    </div>
  </div>
 </div>
</div>

<!----------->
<div class="row incident_field">
<!-- Beschrijving -->
<div class="col-xs-12 col-sm-6 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Beschrijving</h3>
    </div>
    <div class="panel-body">
          
    <!-- Korte omschrijving --> 
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-addon">Korte omschrijving</div>
        <input type="text" class="form-control" name="korte_omschrijving" value="<?php if (isset($_POST['korte_omschrijving'])){ echo $_POST['korte_omschrijving']; } else if (isset($_GET['tag'])){ echo haal_cmdb_op($_GET['tag'], "KORTE_OMSCHRIJVING"); } ?>"<?php if(isset($_GET['tag'])){echo "disabled";} ?>>
      </div>
    </div>
    <div class="form-group">
      <div class="input-group"> 
        <div class="input-group-addon">Probleem</div>
        <textarea class="form-control" rows="5" name="omschrijving" <?php if(isset($_GET['tag'])){echo "disabled";} ?>><?php if (isset($_POST['omschrijving'])){ echo $_POST['omschrijving']; } else if (isset($_GET['tag'])){ echo haal_cmdb_op($_GET['tag'], "OMSCHRIJVING"); } ?></textarea>
      </div>    
    </div>     
  </div>
</div>
</div>
  
<!-- Tijdlijn 
<div class="col-xs-12 col-sm-6 timeline">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Acties</h3>
    </div>
    <div class="panel-body">
      <div class="qa-message-list" id="wallmessages">					
					<div class="message-item" id="m1">
						<div class="message-inner">
							<div class="message-head clearfix">
								<div class="avatar pull-left"><img src="../images/profielfotos/janosinga.png"></div>
								<div class="user-detail">
									<h5 class="handle">Jan Osinga</h5>
									<div class="post-meta">
										<div class="asker-meta">
											<span class="qa-message-what"></span>
											<span class="qa-message-when">
												<span class="qa-message-when-data">16-06-2015 14:49</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="qa-message-content">
								Dit incident kan snel worden opgelost met een handleiding...
							</div>
					</div></div>					
				</div>    
  </div>
</div>
</div> -->
<div class="row aanmaakdatum">
	<div class="col-xs-12 col-sm-12 aanmaakdatum">
	<div class="well well-sm"><center>Aangemaakt op: <?php $newTime = date("d-m-Y H:i",strtotime(date("d-m-Y H:i")." +1 seconds")); echo $newTime; ?></center></div>
	</div>
</div>
</form>
</form>