<?php
    include '../connexion.php';

    $result = $mysqli->query("SELECT * FROM USER WHERE login='".$_POST["login"]."' AND password='".$_POST["password"]."'");
    // var_dump($result);
    echo $result->num_rows;
?>