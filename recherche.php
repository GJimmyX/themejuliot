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
    $sqlQuery = "SELECT * from wp_posts";

    $data = $mysqlQuery->prepare($sqlQuery);
    $data->execute();
    $result = $data->fetchAll();

?>

<h1>Résultats:</h1>
<?php echo $search; ?>

<?php 
    /* Appel du footer */
    get_footer();
?>