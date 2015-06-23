<?php 
	/*$today = getdate();
	$tijd = $tijd['mday']."-".$tijd['mon']."-".$tijd['year']."-".
	dagen-maand-jaar hour:min*/
?>

<?php 
	$newTime = date("d-m-Y H:i",strtotime(date("d-m-Y H:i")." +2 days"));
	echo $newTime;
?>