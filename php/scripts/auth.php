<?php
    include '../connexion.php';

    session_start();

    $result = $mysqli->query("SELECT * FROM USER WHERE login='".$_POST["login"]."' AND password='".$_POST["password"]."'");
    
	if ($result->num_rows == 1){

		$row = $result->fetch_assoc();
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['username'] = $row['login'];
		$_SESSION['password'] = $row['password'];
	}
	echo $result->num_rows;
		


    include '../deconnexion.php';
?>