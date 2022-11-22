<?php
    try{
        $db = new PDO('mysql:host=localhost;dbname=php_alcya1', 'root', '');

    } catch (PDOException $ex) {
        echo 'Erreur:' . $ex;
        die();
    }

?>