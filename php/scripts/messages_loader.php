<?php
	include '../connexion.php';

	$expediteur_id = $_GET["expediteur"];
	$recepteur_id = $_GET["recepteur"];

	$result = $mysqli->query("SELECT * FROM MESSAGE WHERE expediteur in ('" .$expediteur_id. "', '" .$recepteur_id. "') AND recepteur in ('" .$_GET["expediteur"]. "', '" .$_GET["recepteur"]. "')");
	
	// $non_lus = $mysqli->query("SELECT * FROM MESSAGE WHERE expediteur in ('" .$expediteur_id. "', '" .$recepteur_id. "') AND recepteur in ('" .$_GET["expediteur"]. "', '" .$_GET["recepteur"]. "')");

	$messages = array();

	$compteur = 0;
	$non_lus = 0;
	while ($row = $result->fetch_assoc()) {

			$ligne = array();
			$ligne["expediteur"] = $row['expediteur'];
			$ligne["recepteur"] = $row['recepteur'];
			$ligne["message"] = $row['message'];
			$ligne["date_message"] = $row['date_message'];
			$ligne["lu"] = $row['lu'];

			$messages[$compteur++] = $ligne;
	}

	echo json_encode($messages);
	// var_dump($messages);

	include '../deconnexion.php';
?>