<?php 
	include 'php/connexion.php';
	$result = $mysqli->query("SELECT * FROM USER WHERE login!='".$_SESSION['username']."'");
	
	// echo $result->num_rows;

	$result->data_seek(0);
	while ($row = $result->fetch_assoc()) {
		echo "<div id=\"chat-box-". $row['user_id'] ."\" class=\"px-4 py-5 chat-box bg-white\"></div>";
	}

	include 'php/deconnexion.php';
?>