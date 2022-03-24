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
    $sqlQuery = "SELECT post_title from wp_posts where post_title IN('$search')";

    $data = $mysqlQuery->prepare($sqlQuery);
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);

?>

<h1>Résultats pour "<?php echo $search; ?>":</h1>

<?php print_r($result); ?>

<?php 
    /* Appel du footer */
    get_footer();
?>