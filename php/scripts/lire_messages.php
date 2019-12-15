<?php 
	include '../connexion.php';

	$expediteur_id = $_POST["expediteur"];
	$recepteur_id = $_POST["recepteur"];
	
	$result = $mysqli->query("UPDATE MESSAGE SET lu=1 WHERE expediteur in ('" .$expediteur_id. "', '" .$recepteur_id. "') AND recepteur in ('" .$expediteur_id. "', '" .$recepteur_id. "')");
	
	echo "good";

	include '../deconnexion.php';
?>