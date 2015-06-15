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
			?><li class="active"><a href="?pagina=<?php echo str_replace(' ', '_', strtolower($pagina_naam)); ?>"><?php echo ucfirst($pagina_naam); ?></a></li><?php
		}
		else 
		{
			?><li><a href="?pagina=<?php echo str_replace(' ', '_', strtolower($pagina_naam)); ?>"><?php echo ucfirst($pagina_naam); ?></a></li><?php
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
		<li><a href="?pagina=<?php echo str_replace(' ', '_', strtolower($pagina_naam)); ?>"><?php echo ucfirst($pagina_naam); ?></a></li>
		<?php		
	}
	/*
		@author Jan Osinga
 		@version 15-6-2015
		@param $pagina_naam: $pagina vul hier de systemvariabele $_GET['p'] in. 
		@description: Functie voor het scrollen binnen pagina's. bijv. Incident 1-10 > 11-20 etc. '
	*/
	function pagination($pagina) {
		?>
		<nav>
  			<ul class="pager">
				<li <?php if ($pagina < 1){echo "class='disabled'";} ?>><a href="?pagina=incidenten&p=<?php if (isset($_GET["p"]) && $pagina > 0){ $paginanr = $pagina - 1; echo $paginanr;} ?>">Vorige</a></li>
				<li><a href="?pagina=incidenten&p=<?php if (isset($_GET["p"]) && $pagina > 0){ $paginanr = $pagina + 1; echo $paginanr;} else {echo "1";} ?>">Volgende</a></li>
			</ul>
		</nav>
		<?php
	}
	
	/*
		@author Jan Osinga
 		@version 15-6-2015
		@param $groepen: $grpepen Vul hier een array in me elementen waarop gesorteerd kan worden
		@description: Functie voor het aanmaken van button waarop gesorteerd kan worden binnen een pagina, bijv sorteren op openstaande incidenten of in wacht.
	*/
	function sortByGroup($groepen) {
		?>
		<div class="btn-group" role="group" aria-label="Sortering">
			<?php 
				$max = sizeof($groepen);
				for($i = 0; $i != $max; $i++){ ?>
					<a href="?pagina=<?php echo $_GET['pagina']; ?>&sortBy=<?php echo str_replace(' ', '_', strtolower($groepen[$i])); ?>">
					<button type="button" class="btn btn-default <?php if (str_replace(' ', '_', strtolower($groepen[$i])) == $_GET['sortBy']) { echo "active"; } ?>"><?php echo $groepen[$i]; ?></button>
					</a>
			<?php } ?>
		</div>
		<?php
	}
?>