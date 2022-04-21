<?php
    /* Boucles de comparaison pour les articles et les offres */

    $args_articles = new WP_Query();
    $args_articles->query(array(
        'post_type' => 'articles',
        )
    );

    $args_rejoindre = new WP_Query();
    $args_rejoindre->query(array(
        'post_type' => 'rejoindre',
        )
    );
?>