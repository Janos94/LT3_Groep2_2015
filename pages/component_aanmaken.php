<h1 class="page-header">Configuratie Management</h1>
<div class="btn-group btn-group-lg" role="group" aria-label="Incident aanmaken-beheer">
 <!-- 
	<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span></button>
	<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></button>
 -->
</div>
<br><br>
	<!---------------------------------------------------------------------------------------------------------------------------------->
	<!---------------------------------------------------------------------------------------------------------------------------------->
	<!---------------------------------------------------------------------------------------------------------------------------------->
	<!------------------------------------------ SOEP CODE, GEEN TIJD OM 'MOOI' TE MAKEN ----------------------------------------------->
	<!---------------------------------------------------------------------------------------------------------------------------------->
	<!---------------------------------------------------------------------------------------------------------------------------------->
	<!---------------------------------------------------------------------------------------------------------------------------------->
	
<?php
	
	include 'includes/functions_marcel.php';
	
	## Kijkt of er op de knop Opslaan gedrukt is.
	if(isset($_POST['invoeren_component'])){
	
	## Zet error op empty
	$Error = '';
	
	## Kijkt of er iets ingevuld is bij component_ID	
	if (empty($_POST['Component_ID'])){
		$Error .= "Er is niets ingevuld bij Component_ID! </br>";
	}
	$Component_ID = $_POST['Component_ID'];
	$Jaar = $_POST['jaar'];
	$Merk = $_POST['merk'];
	$Besturingssystemen = $_POST['besturingssystemen'];
	$Leverancier = $_POST['leverancier'];
	$Soort = $_POST['soort'];
	$Locatie = $_POST['locatie'];
	
	
	$controle_query = "select * from componenten WHERE COMPONENT_ID = '{$_POST['Component_ID']}';";
				$get_controle_query = mysqli_query($db, $controle_query);
				$result = mysqli_num_rows($get_controle_query);
				## hierboven wordt ingevoerde component ID opgehaald uit de database om te kijken of hij bestaat of niet.
				## hieronder wordt gekeken of het resultaat leeg is. Als het leeg is dan wordt component toegevoegd. Als het niet leeg is wordt het formulier laten zien.
				if ($result > 0){
		$Error .= "Dit component_ID bestaat al, gelieve opnieuw proberen. </br>";
	}
	## Kijkt of er errors aanwezig zijn, zoja laat deze zien. Zoniet: verwerk gegevens in database.
	
	if ($Error != '' || $Error == ' '){
		 
		echo "<H2> {$Error} </H2>";	
		?>
		<form action = '' method = 'POST'>
		<?php
		
		}else{
		?>
			<H2> Component succesvol toegevoegd aan de database.</H2>
			<?php
		
			
			add_component($Component_ID, $Jaar, $Merk, $Besturingssystemen, $Leverancier, $Soort, $Locatie);
			
			?>
			
			
		<?php			
		}
	}else{
	

?>	
	<!-- Welkom --->

	<H1> Nieuw hardware component toevoegen. </H1>	
	<div class="row incident_field"> 
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
			<div class="panel panel-default">
				<div class="panel-heading">
	<!-- Form type --->
	<form action = '' method = 'POST'>
	
	<!-- Component naam --->
	Component naam: <input type = 'text' name = 'Component_ID' placeholder = 'Bijvoorbeeld WS01'> 
	</div>
    </div>
				
	<!-- Jaar van aanschaf --->
	<div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Jaar van aanschaf: </div><select class="form-control" name = 'jaar'>
	<!-- For loop om jaren te kunnen kiezen --->
	<?php aanschaf_jaar(1970, 2016); ?>
	</select>
	</div>
	</div>
		
						
	<!-- merk --->
	<div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Merk: </div><select class="form-control" name = 'merk'>
	
	<?php 
	
	$query = "Select Naam from merken";
	$get_query = mysqli_query($db, $query);
	while($row = mysqli_fetch_assoc($get_query)){
	?>
		<option value = '<?php echo $row['Naam']; ?>'><?php echo $row['Naam']; ?></option>
	<?php
	}
	?>
	</select>	
	</div>
	</div>				
	
	<!-- Besturingssysteem --->
	<div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Besturingssysteem: </div><select class="form-control" name = 'besturingssystemen'>
	
	<?php 
	$query = "Select Besturingssysteem from besturingssysteem";
	$get_query = mysqli_query($db, $query);
	while($row = mysqli_fetch_assoc($get_query)){
	
	?>		
		<option value = '<?php echo $row['Besturingssysteem']; ?>'><?php echo $row['Besturingssysteem']; ?></option>
	<?php
	}
	?>
	</select>
	</div>
	</div>
	
	<!-- Leverancier --->
	<div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Leverancier: </div><select class="form-control" name = 'leverancier'>
	
	<?php 
	$query = "Select Naam from leveranciers";
	$get_query = mysqli_query($db, $query);
	while($row = mysqli_fetch_assoc($get_query)){
		
	?>		
		<option value = '<?php echo $row['Naam']; ?>'><?php echo $row['Naam']; ?></option>
	<?php
	}
	?>
	</select>
	</div>
	</div>
		
	<!-- Soort --->
	<div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Soort: </div><select class="form-control" name = 'soort'>
	
	<?php 
	$query = "Select Categorie from soorten";
	$get_query = mysqli_query($db, $query);
	while($row = mysqli_fetch_assoc($get_query)){
		
	?>		
		<option value = '<?php echo $row['Categorie']; ?>'><?php echo $row['Categorie']; ?></option>
	<?php
	}
	?>
	</select>
	</div>
	</div>
		
	<!-- Locatie --->
	<div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Locatie: </div><select class="form-control" name = 'locatie'>
	
	<?php 
	$query = "Select Plaats from locaties";
	$get_query = mysqli_query($db, $query);
	while($row = mysqli_fetch_assoc($get_query)){
		
	?>		
		<option value = '<?php echo $row['Plaats']; ?>'><?php echo $row['Plaats']; ?></option>
	<?php
	}
	?>
	</select>
	</div>
	</div>
		
	
	<input type = 'submit' value = 'Opslaan' name = 'invoeren_component'>
	</form>

<?php
} 
?>
 
</div>
</div>
