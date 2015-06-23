<h1 class="page-header">Software op component wijzigen.</h1>
<div class="btn-group btn-group-lg" role="group" aria-label="Incident aanmaken-beheer">

</div>
<br><br>

<?php 
	include 'includes/functions_marcel.php';
	
	$Error = '';
	
	/*if(ISSET($_POST['add']) || ISSET($_POST['delete'])){
		$Component_ID = $_POST['Component_ID'];
		$Error = "";
		if(!ISSET($_POST['Component_ID_Twee'])){
			$Error .= "Er is geen Component ID ingevuld! </br>";
		}
	} elseif(!ISSET($_POST['add_software']) && !ISSET($_POST['delete_software'])) {
	*/
	

	if(ISSET($_POST['add_software'])){
		
		link_software_component($_POST['Software_false'], $_POST['Component_ID_Twee'], insert);
	}elseif(ISSET($_POST['delete_software'])){
	
		link_software_component($_POST['Software_true'], $_POST['Component_ID_Twee'], delete);
	}elseif(!ISSET($_POST['delete']) && !ISSET($_POST['add']) && !ISSET($_POST['add_software']) && !ISSET($_POST['delete_software'])){ 
	
?>

<form action = '' method = 'POST'> 

<div class="row incident_field">  
<!-- Aanmelder wijziging software -->

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
  <div class="panel panel-default">
    <div class="panel-heading">
      <center><h3 class="panel-title">Zoekmachine</h3></center> <div class="input-group-addon"> 
					<Input type = "submit" value = "Software toevoegen" name = "add">
					<Input type = "submit" value = "Software verwijderen" name = "delete"> 
			</div>
    </div>
	

    <div class="panel-body">

	
        <!-- Component_ID --> 
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Component_ID</div>
            <input type="text" class="form-control" name="Component_ID" value = '' ">
			
          </div>
        </div>

</form>
		
		<?php 
		// einde if statement voor controle submit knoppen.
			}else{
			$Error = '';
			$Component_ID = $_POST['Component_ID'];
			if(empty($Component_ID) || $Component_ID == ''){
				$Error .= "Er is geen component ID ingevuld!";
			}
			
			if(ISSET($_POST['add']) || ISSET($_POST['delete'])) {
	
				$controle_query = "select * from componenten WHERE COMPONENT_ID = '{$_POST['Component_ID']}';";
				$get_controle_query = mysqli_query($db, $controle_query);
				$result = mysqli_num_rows($get_controle_query);
				## hierboven wordt ingevoerde component ID opgehaald uit de database om te kijken of hij bestaat of niet.
				## hieronder wordt gekeken of het resultaat leeg is. Als het leeg is dan wordt component toegevoegd. Als het niet leeg is wordt het formulier laten zien.
				if ($result == 0){
					$Error .= "Dit component_ID bestaat niet, gelieve opnieuw proberen. </br>";
				}
			}
			if(ISSET($Error)) { echo $Error; } 
			
			?>
		<!-- Geinstalleerde software pakketten --> 
	
		<?php if(ISSET($_POST['delete']) && Empty($Error)){ ?>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Geinstalleerde software</div>
								<form action = '' method = 'POST'>
									<select class="form-control" name = "Software_true">
										<?php show_installed_software($Component_ID); ?>
									</select>
						</div>
									<br><br><input type = 'submit' value = 'pakket verwijderen' name = 'delete_software'>
									<input type="hidden" class="form-control" name="Component_ID_Twee" value = '<?php echo $Component_ID; ?>' ">
									
								</form>
					</div>
					
		<?php 
		}elseif(ISSET($_POST['add']) && Empty($Error)){ ?>
			
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 incident_field">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Software toevoegen</div>
								<form action = '' method = 'POST'>
									<select class="form-control" name = "Software_false">
										<?php show_software($Component_ID); ?>
									</select>									
						</div>
									<input type = 'hidden' value = '<?php echo $Component_ID; ?>' name = 'Component_ID_Twee'>
									<br><br><input type = 'submit' value = 'pakket toevoegen' name = 'add_software'>
									<input type="hidden" class="form-control" name="Component_ID_Twee" value = '<?php echo $Component_ID; ?>' ">
								</form>
					</div>

<?php 
		} } // end check for add/delete
?>
		
        
        
    </div>
  </div>
</div>



