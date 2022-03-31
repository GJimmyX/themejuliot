<?php
    /* Template name: Recherche */
?>

<?php
    /* Appel du header */
    get_header();
?>

<?php 

    /* Connexion à la base de données */

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
            die('Erreur : '.$e->getMessage());
    }

    $search = $_POST['Recherche'];

    if (!$search) :
        header('Location: accueil');
        exit();
    endif;

    /* echo $search; */
    
    $sqlQuery = "SELECT guid, post_title, post_name, post_type FROM wp_posts WHERE post_name LIKE ('%$search%') AND post_type != 'wpcf7_contact_form' AND post_type != 'attachment' AND post_type != 'acf-field' AND post_type != 'acf-field-group' AND post_type != 'customize_changeset' AND post_type != 'ml-slide' AND post_type != 'ml-slider' AND post_type != 'revision' AND post_type != 'wp_global_styles' AND post_type != 'wp_navigation'";

    $data = $mysqlQuery->prepare($sqlQuery);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);

    /* var_dump($result); */

?>

<!-- Section des résultats de recherche -->

<main class="recherche">
    <div class="resultats-recherche">
        <?php 

            // Si on a au minimum 1  résultat

            if ($result){
                ?><h1>Résultats pour "<?php echo $search; ?>":</h1><?php
                foreach ($result as $res) {
                    $entete = '';
                    ?>
                    <?php if ($res['post_type'] == 'articles'){
                        $entete = 'Article :';
                    }
                    elseif ($res['post_type'] == 'navigation') {
                        $entete = 'Sous-menu :';
                    }
                    else {
                        $entete = 'Page :';
                    }
                    ?>
                    <div class="resultat">
                        <p><?php echo $entete ?></p>
                        <a href="<?php print_r($res['guid']); ?>" title="<?php print_r($res['post_title']); ?>" id="<?php print_r($res['post_name']) ?>"><?php print_r($res['post_title']); ?></a>
                    </div>
                    <?php
                }
            }

            // Si on a aucun résultat

            else{ ?>
                <h1>Aucun Résultat pour "<?php echo $search; ?>":</h1>
                <div class="resultatequalzero">
                    <?php _e('Votre recherche n\'a pas donnée de résultats. Veuillez changez de mot-clé(s) et réessayez.'); ?>
                </div>
                <?php
            }
        ?>
    </div>
</main>

<?php 
    /* Appel du footer */
    get_footer();
?>