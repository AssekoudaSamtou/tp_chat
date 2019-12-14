<?php 
	include 'php/connexion.php';
	$result = $mysqli->query("SELECT * FROM USER WHERE login!='".$_SESSION['username']."'");
	
	// echo $result->num_rows;

	$result->data_seek(0);
	while ($row = $result->fetch_assoc()) {
		echo "
			<a id=".$row['user_id']." class=\"list-group-item list-group-item-action text-black rounded-0 discussion-item\">
				<div class=\"media\"><img src=\"ressources/img/avatar_user.svg\" alt=\"user\" width=\"50\" class=\"rounded-circle\" />
					<div class=\"media-body ml-4\">
						<div class=\"d-flex align-items-center justify-content-between mb-1\">
							<h6 class=\"mb-0\">".$row['login']."</h6>
							<small class=\"small font-weight-bold\">25 Dec</small>
						</div>
						<p class=\"font-italic mb-0 text-small\">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
						</p>
					</div>
				</div>
			</a>
		";
	}

	include 'php/deconnexion.php';
?>