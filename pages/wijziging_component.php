<h1 class="page-header">Component Wijzigen</h1>
<div class="btn-group btn-group-lg" role="group" aria-label="Incident aanmaken-beheer">

</div>
<br><br>

<?php 
	include 'includes/functions_marcel.php';

	if(ISSET($_POST['save'])){

	$Component_ID = $_POST['Component_ID'];
	$Jaar = $_POST['Jaar'];
	$Merk = $_POST['Merk'];
	$Besturingssystemen = $_POST['Besturingssysteem'];
	$Leverancier = $_POST['Leverancier'];
	$Soort = $_POST['Soort'];
	$Locatie = $_POST['Locatie'];
	$Error = "";
	
			edit_component($Component_ID, $Jaar, $Merk, $Besturingssystemen, $Leverancier, $Soort, $Locatie); 
		?>
			<div class="panel-heading">
				<center><h2>Gegevens succesvol verwerkt!</h2></center> <div class="input-group-addon">
			</div>
		<?php
		 
	
	}else{
	
	if(ISSET($_POST['submit'])){ 
		$Error = "";
		############### ERROR CHECK ############################## ERROR CHECK ############################## ERROR CHECK ############################## ERROR CHECK ###############
				include 'includes/db.php';
				$controle_query = "select * from componenten WHERE COMPONENT_ID = '{$_POST['Component_ID']}';";
				$get_controle_query = mysqli_query($db, $controle_query);
				$result = mysqli_num_rows($get_controle_query);
				## hierboven wordt ingevoerde component ID opgehaald uit de database om te kijken of hij bestaat of niet.
				## hieronder wordt gekeken of het resultaat leeg is. Als het leeg is dan wordt component toegevoegd. Als het niet leeg is wordt het formulier laten zien.
				if ($result == 0){
					$Error .= "Dit component_ID bestaat niet, gelieve opnieuw proberen. </br>";
				}
				## Kijkt of er errors aanwezig zijn, zoja laat deze zien. Zoniet: verwerk gegevens in database.
		############### ERROR CHECK ############################## ERROR CHECK ############################## ERROR CHECK ############################## ERROR CHECK ###############
		
		$Component_ID = $_POST['Component_ID']; 
	}else{ 
		$Component_ID = ""; 
	}
	
 ?>

<form action = '' method = 'POST'> 
<div class="row incident_field">  
<!-- Aanmelder wijziging -->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
<?php if(!ISSET($_POST['submit'])){ ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <center><h3 class="panel-title">Zoekmachine</h3></center> <div class="input-group-addon"> <Input type = "submit" value = "Gegevens ophalen" name = "submit"> </div>
    </div>
    <div class="panel-body">
	<?php } ?>
	
        <!-- Component_ID --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Component_ID</div>
            <input type="text" class="form-control" name="Component_ID" value = '<?php echo $Component_ID; ?>' placeholder="4958245" <?php if(ISSET($_POST['submit'])){ echo 'disabled'; } ?> >
          </div>
        </div>
		
		<?php 
		
		if (!empty($Error)) { echo $Error; }
		
		}if(ISSET($_POST['submit']) && $Error == ''){
				
		?>
		
        <!-- Jaar --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Jaar</div>
            <select class="form-control" name = "Jaar">
				<option value = '<?php echo component_jaar($_POST['Component_ID']); ?>' selected> <?php echo component_jaar($_POST['Component_ID']); ?> </option>
				<?php aanschaf_jaar(1970, 2016); ?>
			</select>
          </div>
        </div>
		
		
        <!-- Merk --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Merk</div>
            <select class="form-control" name="Merk">
				<option value = '<?php echo component_merk($_POST['Component_ID']); ?>' selected> <?php echo component_merk($_POST['Component_ID']); ?> </option>
				<?php show_merken(); ?>
			</select>
          </div>
        </div>
		
		
        <!-- Besturingssysteem --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Besturingssysteem</div>
            <select class="form-control" name="Besturingssysteem">
				<option value = '<?php echo component_besturingssysteem($_POST['Component_ID']); ?>' selected> <?php echo component_besturingssysteem($_POST['Component_ID']); ?> </option>
				<?php show_besturingssystemen(); ?>
			</select>
          </div>
        </div>
		
		
        <!-- Leverancier --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Leverancier</div>
            <select class="form-control" name="Leverancier">
				<option value = '<?php echo component_leverancier($_POST['Component_ID']); ?>' selected> <?php echo component_leverancier($_POST['Component_ID']); ?> </option>
				<?php show_leveranciers(); ?>
			</select>
          </div>
        </div> 
		
		
        <!-- Soort  --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Soort</div>
            <select class="form-control" name="Soort">
				<option value = '<?php echo component_soort($_POST['Component_ID']); ?>' selected> <?php echo component_soort($_POST['Component_ID']); ?> </option>
				<?php show_soorten(); ?>
			</select>
          </div>
        </div>  
		
		
		<!-- Locatie  --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Locatie</div>
            <select class="form-control" name="Locatie" >
				<option value = '<?php echo component_locatie($_POST['Component_ID']); ?>' selected> <?php echo component_locatie($_POST['Component_ID']); ?> </option>
				<?php show_locaties(); ?>
			</select>
          </div>
        </div>  		
      
	<input type = 'submit' value = 'Gegevens opslaan' name = 'save'>	  
    </div>
  </div>
</div>
</form>

<?php

} // end check form
?>

