<?php
	
	// INLOGFUNCTIE
	include '../includes/db.php';	
	if (isset($_POST['login-submit'])){
		// Encrypt het ingevoerde wachtwoord zodat dit vergeleken kan worden met de DB
		$username = $_POST['username'];
		$password = crypt($_POST['password'], '$2a$10$1qAz2wSx3eDc4rFv5tGb5t');
		// Zet query in een variabele
		$query = "SELECT * FROM `gebruikers` ";
		$query .= "JOIN gebruikers_has_rechten ON gebruikers.Medewerker_ID=gebruikers_has_rechten.gebruikers_Medewerker_ID ";
		$query .= "WHERE gebruikers.Medewerker_ID=".$username." AND Password='".$password."';";
		// Voer de query uit op de database en zet het in de variabele $query
		$get = mysqli_query($db, $query);
		// Haal op hoeveel resultaten opgehaald zijn. 
		$result = mysqli_num_rows($get);
		// Haal overige gegevens op
		$data = mysqli_fetch_assoc($get);
		// Zet de rechten klasse in een variabele
		$rights = $data['rechten_Rechten_ID'];
		
		if ($result == 1){
			// Als het aantal resultaten van de query niet meer of minder dan 1 is dan de sessie met gegevens starten
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['rights'] = $rights;
			
			// Maak een nametag
			$_SESSION['naam'] = $data['Achternaam'].", ".$data['Voornaam'];
			
			// Doorsturen naar beheerpagina
			if ($_SESSION['rights'] == 1){
				header('location: ../selfservicedesk/index.php');
				exit();
			}
			else if($_SESSION['rights'] >= 2)
			{
				header('location: ../?pagina=overzicht');
				exit();
			}			
		} else { header('location: ?status=mislukt'); }
		
	}	
?>

<html>
	<head>
		<title>SuperDesk - Inloggen</title>
		<style>
			body {
			    padding-top: 90px;
			}
			.panel-login {
				border-color: #ccc;
				-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
				-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
				box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			}
			.panel-login>.panel-heading {
				color: #00415d;
				background-color: #fff;
				border-color: #fff;
				text-align:center;
			}
			.panel-login>.panel-heading a{
				text-decoration: none;
				color: #666;
				font-weight: bold;
				font-size: 15px;
				-webkit-transition: all 0.1s linear;
				-moz-transition: all 0.1s linear;
				transition: all 0.1s linear;
			}
			.panel-login>.panel-heading a.active{
				color: #029f5b;
				font-size: 18px;
			}
			.panel-login>.panel-heading hr{
				margin-top: 10px;
				margin-bottom: 0px;
				clear: both;
				border: 0;
				height: 1px;
				background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
				background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
				background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
				background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			}
			.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
				height: 45px;
				border: 1px solid #ddd;
				font-size: 16px;
				-webkit-transition: all 0.1s linear;
				-moz-transition: all 0.1s linear;
				transition: all 0.1s linear;
			}
			.panel-login input:hover,
			.panel-login input:focus {
				outline:none;
				-webkit-box-shadow: none;
				-moz-box-shadow: none;
				box-shadow: none;
				border-color: #ccc;
			}
			.btn-login {
				background-color: #59B2E0;
				outline: none;
				color: #fff;
				font-size: 14px;
				height: auto;
				font-weight: normal;
				padding: 14px 0;
				text-transform: uppercase;
				border-color: #59B2E6;
			}
			.btn-login:hover,
			.btn-login:focus {
				color: #fff;
				background-color: #53A3CD;
				border-color: #53A3CD;
			}
			.forgot-password {
				text-decoration: underline;
				color: #888;
			}
			.forgot-password:hover,
			.forgot-password:focus {
				text-decoration: underline;
				color: #666;
			}
			
			.btn-register {
				background-color: #1CB94E;
				outline: none;
				color: #fff;
				font-size: 14px;
				height: auto;
				font-weight: normal;
				padding: 14px 0;
				text-transform: uppercase;
				border-color: #1CB94A;
			}
			.btn-register:hover,
			.btn-register:focus {
				color: #fff;
				background-color: #1CA347;
				border-color: #1CA347;
			}
		</style>
		<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.css" rel="stylesheet">
	
	    <!-- Custom styles for this template -->
	    <link href="../css/dashboard.css" rel="stylesheet">
	</head>	
<body>
<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-12">
						<img src="logo.jpg" width="100%">
					</div>
				</div>
				<hr>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<?php if (isset($_GET['status']) && ($_GET['status'] == "mislukt")){
							?><div class="alert alert-danger" role="alert"><strong>Er is iets mis gegaan!</strong> De ingevoerde gegevens kloppen niet.</div><?php
						}?>
						<?php if (isset($_GET['status']) && ($_GET['status'] == "rights")){
							?><div class="alert alert-warning" role="alert"><strong>Je hebt onvoldoende rechten!</strong> Je account is niet geauthoriseerd hier op in te loggen.</div><?php
						}?>
						<form id="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" style="display: block;">
							<div class="form-group">
								<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Medewerkers ID">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Wachtwoord">
							</div>
							<div class="form-group text-center">
								<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
								<label for="remember"> Inloggegevens onthouden</label>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Inloggen">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<div class="text-center">
											<a href="vergeten.php" tabindex="5" class="forgot-password">Wachtwoord vergeten</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>

</html>

