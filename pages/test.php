<?php 
$query = "INSERT INTO `superdesk`.`gebruikers` (`Medewerker_ID`, `Voornaam`, `Achternaam`, `Functie`, `Telefoon`, `Email`, `locaties_id`, `Password`) VALUES ('".$_POST['medewerker_id']."', '".$_POST['voornaam']."', '".$_POST['achternaam']."', '".$_POST['functie']."', '".$_POST['telefoon']."', '".$_POST['email']."', '".$_POST['locatie']."', '".$_POST['wachtwoord']."');";
    echo $query;	
?>