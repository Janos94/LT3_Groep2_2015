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
			?><li class="active"><a href="?pagina=<?php echo strtolower($pagina_naam); ?>"><?php echo ucfirst($pagina_naam); ?></a></li><?php
		}
		else 
		{
			?><li><a href="?pagina=<?php echo strtolower($pagina_naam); ?>"><?php echo ucfirst($pagina_naam); ?></a></li><?php
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
		<li><a href="?pagina=<?php echo strtolower($pagina_naam); ?>"><?php echo ucfirst($pagina_naam); ?></a></li>
		<?php		
	}
?>