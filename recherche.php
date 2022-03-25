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
    
    $sqlQuery = "SELECT guid, post_title, post_name FROM wp_posts WHERE post_name LIKE ('%$search%') AND post_type != 'wpcf7_contact_form' AND post_type != 'attachment' AND post_type != 'acf-field' AND post_type != 'acf-field-group' AND post_type != 'customize_changeset' AND post_type != 'ml-slide' AND post_type != 'ml-slider' AND post_type != 'revision' AND post_type != 'wp_global_styles' AND post_type != 'wp_navigation'";

    $data = $mysqlQuery->prepare($sqlQuery);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);

    /* var_dump($result); */

?>

<main class="recherche">
    <h1>Résultats pour "<?php echo $search; ?>":</h1>
    <div class="resultats-recherche">
        <?php 
            foreach ($result as $res) {
            ?>
                <a href="<?php print_r($res['guid']); ?>" title="<?php print_r($res['post_title']); ?>" id="<?php print_r($res['post_name']) ?>"><?php print_r($res['post_title']); ?></a>
            <?php
            }
        ?>
    </div>
</main>

<?php 
    /* Appel du footer */
    get_footer();
?>