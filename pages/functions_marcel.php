<?php 

		##### Haal 	merk ID op
		### Param: 	Naam van het merk
		### Return:	ID van het merk
		##### Marcel Oostebring
	function get_merkID($naam){
			
	include 'functions_db.php';
			
		$query = "Select ID from merken WHERE Naam = '{$naam}'";
			$get_query = mysqli_query($db, $query);
			while($temp = mysqli_fetch_assoc($get_query)){
				$id = $temp['ID'];		
		}
	return $id;
	}				
			
		
		##### Haal 	besturingssysteem ID op
		### Param: 	Naam van het besturingssysteem
		### Return:	ID van het besturingssysteem
		##### Marcel Oostebring	
	function get_besturingssysteemID($naam){
	
	include 'functions_db.php';
			
		$query = "Select ID from besturingssysteem WHERE Besturingssysteem = '{$naam}'";
			$get_query = mysqli_query($db, $query);
			while($temp = mysqli_fetch_assoc($get_query)){
				$id = $temp['ID'];		
		}
	return $id;
	}

		##### Haal 	leverancier ID op
		### Param: 	Naam van de leverancier
		### Return:	ID van de leverancier
		##### Marcel Oostebring	
	function get_leverancierID($naam){
	
	include 'functions_db.php';
			
		$query = "Select ID from leveranciers WHERE Naam = '{$naam}'";
			$get_query = mysqli_query($db, $query);
			while($temp = mysqli_fetch_assoc($get_query)){
				$id = $temp['ID'];		
		}
	return $id;
	}

		##### Haal 	soort ID op
		### Param: 	Naam van het soort
		### Return:	ID van het soort
		##### Marcel Oostebring	
	function get_soortID($naam){
	
	include 'functions_db.php';
			
		$query = "Select ID from soorten WHERE Categorie = '{$naam}'";
			$get_query = mysqli_query($db, $query);
			while($temp = mysqli_fetch_assoc($get_query)){
				$id = $temp['ID'];		
		}
	return $id;
	}

		##### Haal 	locatie ID op
		### Param: 	Naam van de locatie
		### Return:	ID van de locatie
		##### Marcel Oostebring		
	function get_locatieID($naam){
	
	include 'functions_db.php';
			
		$query = "Select ID from locaties WHERE Plaats = '{$naam}'";
			$get_query = mysqli_query($db, $query);
			while($temp = mysqli_fetch_assoc($get_query)){
				$id = $temp['ID'];		
		}
	return $id;
	}	
	
	
	
		##### wijzigd component in database
		### Param: 	Alle benodigde velden van een component
		### Return:	N/A
		##### Marcel Oostebring	
	function edit_component($Comp_ID, $Jaar, $Merk, $Besturingssystemen, $Leverancier, $Soort, $Locatie){
	
		include 'functions_db.php';
		$Merk_ID = get_merkID($Merk);
		$Besturingssystemen_ID = get_besturingssysteemID($Besturingssystemen);
		$Leverancier_ID = get_leverancierID($Leverancier);
		$Soort_ID = get_soortID($Soort);
		$Locatie_ID = get_locatieID($Locatie);	

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$query = "UPDATE componenten SET 
				COMPONENT_ID = '{$Comp_ID}',
				JAAR_VAN_AANSCHAF =  '{$Jaar}',
				merken_ID =  '{$Merk_ID}',
				Besturingssysteem_ID = '{$Besturingssystemen_ID}',
				leveranciers_ID =  '{$Leverancier_ID}',
				soorten_ID =  '{$Soort_ID}',
				locaties_id =  '{$Locatie_ID}'
				
				WHERE COMPONENT_ID = '{$Comp_ID}'
		";

		//////voer query uit///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		mysqli_query($db, $query);
	}
	
		##### Voeg	component toe aan database
		### Param: 	Alle benodigde velden van een component
		### Return:	N/A
		##### Marcel Oostebring		
	function add_component($Comp_ID, $Jaar, $Merk, $Besturingssystemen, $Leverancier, $Soort, $Locatie){
	
		include 'functions_db.php';
		$Merk_ID = get_merkID($Merk);
		$Besturingssystemen_ID = get_besturingssysteemID($Besturingssystemen);
		$Leverancier_ID = get_leverancierID($Leverancier);
		$Soort_ID = get_soortID($Soort);
		$Locatie_ID = get_locatieID($Locatie);
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$query = "insert into componenten (
				COMPONENT_ID, 
				JAAR_VAN_AANSCHAF, 
				merken_ID, 
				Besturingssysteem_ID, 
				leveranciers_ID, 
				soorten_ID, 
				locaties_id) 
				values (
				'{$Comp_ID}',
				'{$Jaar}',
				'{$Merk_ID}',
				'{$Besturingssystemen_ID}',
				'{$Leverancier_ID}',
				'{$Soort_ID}',
				'{$Locatie_ID}'
		)";
		
		//////voer query uit///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		mysqli_query($db, $query);
	}
	
	
		##### Show	Aanschafjaren
		### Param: 	minimum jaar, maximum jaar
		### Return:	N/A
		##### Marcel Oostebring			
	function aanschaf_jaar($min, $max){
	
		for($i = $min; $i < $max; $i ++){ 
			echo "<option value = '{$i}'> {$i} </option>";
		} 
	}
		
		
		##### Show	Merken
		### Param: 	N/A
		### Return:	N/A
		##### Marcel Oostebring					
	function show_merken(){	
	
	include 'functions_db.php';
		$query = "Select Naam from merken";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){
			echo "<option value = '{$row['Naam']}'> {$row['Naam']} </option>";
		}
	}
		
		##### Show	Besturingssystemen
		### Param: 	N/A
		### Return:	N/A
		##### Marcel Oostebring			
	function show_besturingssystemen(){
	
	include 'functions_db.php';
		$query = "Select Besturingssysteem from besturingssysteem";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){
			echo "<option value = '{$row['Besturingssysteem']}'> {$row['Besturingssysteem']} </option>";
		}
	}
	
		##### Show	Leveranciers
		### Param: 	N/A
		### Return:	N/A
		##### Marcel Oostebring	
	function show_leveranciers(){
	
	include 'functions_db.php';
		$query = "Select Naam from leveranciers";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){		
			echo "<option value = '{$row['Naam']}'>{$row['Naam']}</option>";
		}
	}

		##### Show	Soorten
		### Param: 	N/A
		### Return:	N/A
		##### Marcel Oostebring		
	function show_soorten(){
	
	include 'functions_db.php';	
		$query = "Select Categorie from soorten";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){	
			echo "<option value = '{$row['Categorie']}'>{$row['Categorie']}</option>";
		}
	}
	
		##### Show	Locaties
		### Param: 	N/A
		### Return:	N/A
		##### Marcel Oostebring		
	function show_locaties(){
	
	include 'functions_db.php';			 
		$query = "Select Plaats from locaties";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){	
			echo "<option value = '{$row['Plaats']}'>{$row['Plaats']}</option>";
		}
	}
	
	#### functies om gegevens van component op te halen. ####
		#### return jaar ####
	function component_jaar($Comp_ID){
		
		include 'functions_db.php';	
		$query = "Select JAAR_VAN_AANSCHAF as x FROM componenten WHERE COMPONENT_ID = '{$Comp_ID}';";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}	
	return $x;
	}
		
		#### return merk ####
	function component_merk($Comp_ID){
	
		include 'functions_db.php';	
		$query = "Select merken_ID as x FROM componenten WHERE COMPONENT_ID = '{$Comp_ID}';";
		$get_query = mysqli_query($db, $query);
		
		while($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}	
		
		$query = "Select Naam as x FROM merken WHERE ID = {$x};";
		$get_query = mysqli_query($db, $query);
		
		while ($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}
	return $x;
	}
	
	
		#### return besturingssysteem ####
	function component_besturingssysteem($Comp_ID){
	
		include 'functions_db.php';	
		$query = "Select Besturingssysteem_ID as x FROM componenten WHERE COMPONENT_ID = '{$Comp_ID}';";
		$get_query = mysqli_query($db, $query);
		
		while($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}

		$query = "Select Besturingssysteem as x FROM besturingssysteem WHERE ID = {$x};";
		$get_query = mysqli_query($db, $query);
		
		while ($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}		
	return $x;
	}
		
		
		#### return leverancier ####
	function component_leverancier($Comp_ID){
	
		include 'functions_db.php';	
		$query = "Select leveranciers_ID as x FROM componenten WHERE COMPONENT_ID = '{$Comp_ID}';";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}

		$query = "Select Naam as x FROM leveranciers WHERE ID = {$x};";
		$get_query = mysqli_query($db, $query);
		
		while ($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}	
	return $x;
	}
	
		#### return soort ####
	function component_soort($Comp_ID){
	
		include 'functions_db.php';	
		$query = "Select soorten_ID as x FROM componenten WHERE COMPONENT_ID = '{$Comp_ID}';";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}

		$query = "Select Categorie as x FROM soorten WHERE ID = {$x};";
		$get_query = mysqli_query($db, $query);
		
		while ($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}	
	return $x;
	}
	
		#### return locatie ####
	function component_locatie($Comp_ID){
	
		include 'functions_db.php';	
		$query = "Select locaties_ID as x FROM componenten WHERE COMPONENT_ID = '{$Comp_ID}';";
		$get_query = mysqli_query($db, $query);
		while($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}

		$query = "Select Plaats as x FROM locaties WHERE ID = {$x};";
		$get_query = mysqli_query($db, $query);
		
		while ($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}	
	return $x;
	}
	
	
	############## software functies #####################
	#### Deze functie echoed een <option> met als naam & value het ID van de software. Daarbij laat hij in de dropdown zien welke naam het softwarepakket heeft.
	function show_software($Comp_ID) {
	
		include 'functions_db.php';	
		
		$query = "SELECT * FROM software";
		$get_query = mysqli_query($db, $query);
		while ($row = mysqli_fetch_assoc($get_query)){
			echo "<option class = 'form-control' name = '{$row['SOFTWARE_ID']}' value = '{$row['SOFTWARE_ID']}'> {$row['NAAM']} </option>";	
		}
	}
	
	#### Deze functie echoed een <option> van bestaande softwarepakketten die geinstalleerd staan op het component die als parameter meegegeven wordt.
	function show_installed_software($Comp_ID) {
	
		include 'functions_db.php';
		
		$query = "SELECT * FROM componenten_has_software WHERE COMPONENT_ID = '{$Comp_ID}'";
		$get_query = mysqli_query($db, $query);
		while ($row = mysqli_fetch_assoc($get_query)){
			echo "<option class = 'form-control' name = '{$row['software_SOFTWARE_ID']}' value = '{$row['software_SOFTWARE_ID']}'>".get_software_name($row['software_SOFTWARE_ID'])."</option>";
		}
	}
	
	#### Haal software naam op op basis van het software ID.
	function get_software_name($id) {
	
		include 'functions_db.php';
		
		$query = "SELECT NAAM as x FROM software WHERE SOFTWARE_ID = '{$id}';";
		$get_query = mysqli_query($db, $query);
		while ($row = mysqli_fetch_assoc($get_query)){
			$x = $row['x'];
		}
	return $x;
	}
	
	#### Deze functie linked software met componenten. Parameters zijn software, component id en 'do'.
	#### do is een variabele om te kijken wat je precies wil doen. 
		#Wil je de link verwijderen, geef dan 'delete' als parameter. 
		#Wil je de link toevoegen, geef dan 'insert' mee als parameter.
		
	function link_software_component($Soft, $Comp, $do){
		include 'functions_db.php';
		$query = "SELECT * FROM componenten_has_software WHERE COMPONENT_ID = '{$Comp}' AND software_SOFTWARE_ID = '{$Soft}';";
		$get_query = mysqli_query($db, $query);
		$result = mysqli_num_rows($get_query);
		if($result == 0){	
			if($do == "insert"){
				$query = "INSERT INTO componenten_has_software (COMPONENT_ID, software_SOFTWARE_ID) VALUES ('{$Comp}', '{$Soft}');";
				echo $query;
				mysqli_query($db, $query);
			}
		}else{
			echo "Software pakket ".get_software_name($Soft)." is al geinstalleerd op component {$Comp} !";
		}
		if($result > 0){	
			if($do == "delete"){
				$query = "DELETE FROM componenten_has_software WHERE software_SOFTWARE_ID = '{$Soft}' AND COMPONENT_ID = '{$Comp}'";
				echo $query;
				mysqli_query($db, $query);
			}
		}else{
			echo "Software pakket ".get_software_name($Soft)." is niet geinstalleerd op component {$Comp} !";
		}
	}
?>