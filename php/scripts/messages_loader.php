<?php
	include '../connexion.php';

	$expediteur_id = $_GET["expediteur"];
	$recepteur_id = $_GET["recepteur"];

	$result = $mysqli->query("SELECT * FROM MESSAGE WHERE expediteur in ('" .$expediteur_id. "', '" .$recepteur_id. "') AND recepteur in ('" .$_GET["expediteur"]. "', '" .$_GET["recepteur"]. "')");
	
	// echo $result->num_rows;

	while ($row = $result->fetch_assoc()) {

		if ($row['expediteur'] == $expediteur_id) {

			echo "
				<div class=\"media w-50 ml-auto mb-3\">
					<div class=\"media-body\">
						<div class=\"bg-primary rounded py-2 px-3 mb-2\">
							<p class=\"text-small mb-0 text-white\">".$row['message']."</p>
						</div>
						<p class=\"small text-muted\">".$row['date_message']."</p>
					</div>
				</div>
			";

		}else {

			echo "
				<div class=\"media w-50 mb-3\"><img src=\"ressources/img/avatar_user.svg\" alt=\"user\" width=\"50\" class=\"rounded-circle\" />
					<div class=\"media-body ml-3\">
						<div class=\"bg-light rounded py-2 px-3 mb-2\">
							<p class=\"text-small mb-0 text-muted\">".$row['message']."</p>
						</div>
						<p class=\"small text-muted\">".$row['date_message']."</p>
					</div>
				</div>
			";

		}
	}

	include '../deconnexion.php';
?>