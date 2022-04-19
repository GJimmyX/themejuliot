<?php

    /* Détail du système de cookie */

    $servname = 'juliotfrcrroot.mysql.db';
    $dbname = 'juliotfrcrroot';
    $username = 'juliotfrcrroot';
    $password = 'Le741Sikp2';

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
            die('Erreur : '.$e->getMessage());
    }

    /* Création du cookie */

    if (!is_user_logged_in() ) :
        unset($_COOKIE['user_id']);
    endif;

    if (is_user_logged_in() ) :
        $id = get_current_user_id();
        $sqlQuery = "SELECT user_login from wp_users where id = $id";
    endif;

    $cookieStatement = $mysqlQuery->prepare($sqlQuery);
    $cookieStatement->execute();
    $donnee = $cookieStatement->fetch(PDO::FETCH_COLUMN);

    if (is_page( 'accueil' ) && (!isset($_COOKIE['user_id'])) ) :
        setcookie( 'user_id', $donnee, time()+(3600*24) );
    endif;
?>