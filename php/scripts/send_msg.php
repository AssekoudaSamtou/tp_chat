<?php
	include '../connexion.php';

	$expediteur_id = $_POST["expediteur"];
	$recepteur_id = $_POST["recepteur"];
	$message = $_POST["message"];
	$date_message = date("Y-m-d H:i:s");

	$result = $mysqli->query("INSERT INTO MESSAGE (message, lu, supprime, date_message, expediteur, recepteur) VALUES ('". $message ."', 0, 'N', '".$date_message."', ".$expediteur_id. ", ".$recepteur_id. ")");

	echo "
		<div class=\"media w-50 ml-auto mb-3\">
			<div class=\"media-body\">
				<div class=\"bg-primary rounded py-2 px-3 mb-2\">
					<p class=\"text-small mb-0 text-white\">
					".$message."
					</p>
				</div>
				<p class=\"small text-muted\">".$date_message."</p>
			</div>
		</div>
	";

	include '../deconnexion.php';
?>