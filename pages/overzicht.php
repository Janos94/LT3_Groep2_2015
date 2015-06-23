<?php
$query_openstaande = "SELECT * FROM `incidenten` WHERE STATUS BETWEEN 0 AND 3;";
$openstaande_incidenten = mysqli_num_rows(mysqli_query($db, $query_openstaande));
?>

<?php
$query_openstaande_wacht = "SELECT * FROM `incidenten` WHERE STATUS=2;";
$openstaande_incidenten_wacht = mysqli_num_rows(mysqli_query($db, $query_openstaande_wacht));
?>

<?php
$query_openstaande_behandeling = "SELECT * FROM `incidenten` WHERE STATUS=3;";
$openstaande_incidenten_behandeling = mysqli_num_rows(mysqli_query($db, $query_openstaande_behandeling));
?>

<?php
$query_gesloten = "SELECT * FROM `incidenten` WHERE STATUS BETWEEN 4 AND 5;";
$gesloten_incidenten = mysqli_num_rows(mysqli_query($db, $query_gesloten));
?>



<h1 class="page-header">Dashboard</h1>

<div class="row placeholders">
<div class="col-xs-6 col-sm-3 placeholder">
  <h1><?php echo $openstaande_incidenten; ?></h1>
  <h4>Incidenten</h4>
  <span class="text-muted">Openstaande incidenten in CMDB</span>
</div>
<div class="col-xs-6 col-sm-3 placeholder">
  <h1><?php echo $openstaande_incidenten_wacht; ?></h1>
  <h4>In wacht</h4>
  <span class="text-muted">Incidenten in wacht</span>
</div>
<div class="col-xs-6 col-sm-3 placeholder">
  <h1><?php echo $openstaande_incidenten_behandeling; ?></h1>
  <h4>In behandeling</h4>
  <span class="text-muted">Incidenten in behandeling</span>
</div>
<div class="col-xs-6 col-sm-3 placeholder">
  <h1><?php echo $gesloten_incidenten; ?></h1>
  <h4>Gesloten</h4>
  <span class="text-muted">Gesloten of opgeloste incidenten</span>
</div>
</div>

<h2 class="sub-header">Meldingen op mijn naam</h2>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Status</th>
      <th>Korte omschrijving</th>
      <th>Aanmelder</th>
      <th>Behandelaar</th>
      <th>Datum en Tijd</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query_mijn_incidenten = "SELECT * FROM `incidenten` JOIN gebruikers ON incidenten.AANMELDER_ID=gebruikers.Medewerker_ID WHERE BEHANDELAAR=".$_SESSION['username']." AND STATUS BETWEEN 0 AND 3 ORDER BY ID DESC";
    $query_mijn_incidenten_get = mysqli_query($db, $query_mijn_incidenten);
    while ($incident = mysqli_fetch_assoc($query_mijn_incidenten_get))
    { ?>
      <tr>
        <td><?php echo $incident['CMDB_ID']; ?></td>
        <td><?php echo bepaal_status($incident['STATUS']); ?></td>
        <td><?php echo $incident['KORTE_OMSCHRIJVING']; ?></td>
        <td><?php echo $incident['Achternaam'].", ".$incident['Voornaam']; ?></td>
        <td><?php echo $_SESSION['naam']; ?></td>
        <td><?php echo $incident['DATUM']." ".$incident['TIJDSTIP_AANGENOMEN']; ?></td>
        <td><a href="?pagina=incident_aanmaken&tag=<?php echo $incident['ID']; ?>">Incident bekijken</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>

<h2 class="sub-header">Laatste 10 meldingen</h2>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Status</th>
      <th>Korte omschrijving</th>
      <th>Aanmelder</th>
      <th>Behandelaar</th>
      <th>Datum en Tijd</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query_openstaande_incidenten_tabel = "SELECT * FROM `incidenten` JOIN gebruikers ON incidenten.AANMELDER_ID=gebruikers.Medewerker_ID WHERE STATUS BETWEEN 0 AND 3 ORDER BY ID DESC LIMIT 10";
    $query_openstaande_incidenten_tabel_get = mysqli_query($db, $query_openstaande_incidenten_tabel);
    while ($incident = mysqli_fetch_assoc($query_openstaande_incidenten_tabel_get))
    { ?>
      <tr>
        <td><?php echo $incident['CMDB_ID']; ?></td>
        <td><?php echo bepaal_status($incident['STATUS']); ?></td>
        <td><?php echo $incident['KORTE_OMSCHRIJVING']; ?></td>
        <td><?php echo $incident['Achternaam'].", ".$incident['Voornaam']; ?></td>
        <td><?php echo $_SESSION['naam']; ?></td>
        <td><?php echo $incident['DATUM']." ".$incident['TIJDSTIP_AANGENOMEN']; ?></td>
        <td><a href="?pagina=incident_aanmaken&tag=<?php echo $incident['ID']; ?>">Incident bekijken</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>