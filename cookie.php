<?php

    $servname = 'localhost';
    $dbname = 'juliot_db';
    $username = 'root';
    $password = '';

    try
    {
        // On se connecte à MySQL
        $mysqlQuery = new PDO( 
            "mysql:host=$servname;dbname=$dbname",
            $username,
            $password
        );
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message d'erreur et on arrête tout
            die('Erreur : '.$e->getMessage('Connexion Impossible !'));
    }

    if (is_user_logged_in() ) :
        $id = get_current_user_id();
        $sqlQuery = "SELECT user_login from wp_users where id = $id";
    endif;

    $cookieStatement = $mysqlQuery->prepare($sqlQuery);
    $cookieStatement->execute();
    $donnee = $cookieStatement->fetch(PDO::FETCH_COLUMN);

    setcookie( 'user_id', $donnee, /* time()+3600*24 */ );

?>