<?php
    $mysqli = new mysqli('localhost', 'root', 'admin', 'chat');

    /*
     * Ceci est le style POO "officiel"
     * MAIS $connect_error était erroné jusqu'en PHP 5.2.9 et 5.3.0.
     */
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }
    
    /*
     * Utilisez cette syntaxe de $connect_error si vous devez assurer
     * la compatibilité avec les versions de PHP avant 5.2.9 et 5.3.0.
     */
    if (mysqli_connect_error()) {
        die('Erreur de connexion (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    
?> 