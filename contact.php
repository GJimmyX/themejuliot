<?php
/* Template name: Contact */
?>

<?php
/* Appel du header */
    get_header();
?>

<!-- Section de contact -->

<main class="contact">
    <div class="adresses-formulaire">
        <!-- Cartes sites des 2 agences Juliot Électricité -->

        <div class="adresses">
            <div class="agence85">
                <a href="https://goo.gl/maps/qRQbKatBLNXW2Q8NA" target="_blank" title="Agence 85" class="carte-agence85"></a>
                <p>8 rue de l'arée - Vendéopôle La Mongie, 85140 Sainte Florence</p>
            </div>
            <div class="agence44">
                <a href="https://goo.gl/maps/JUjYFJWjoKQufqsbA" target="_blank" title="Agence 44" class="carte-agence44"></a>
                <p>2 Rue Georges Leclanché, 44980 Sainte Luce sur Loire</p>
            </div>
        </div>

        <!-- Formulaire permettant de contacter Juliot Électricité -->

        <div class="formulaire">
            <h1>N'hésitez pas à nous contacter via notre formulaire ! Nous vous apporterons une réponse dans les plus brefs délais.</h1>
            <?php echo do_shortcode('[contact-form-7 id="118" title="Contactez-nous !" html_name="formulaire"]'); ?>
        </div>
    </div>

    <!-- Horaires de Juliot Électricité et téléphone -->

    <div class="horaires">

        <?php
            $date = date_create('l');
            $dateInt = date_format($date, 'N');

            $jours = ['1', '2', '3', '4', '5', '6', '7'];

            $horaires = ['1' => '<p class="horaires-title">Lundi:</p><p class="horaires-text">7<sup>h</sup>30 - 12<sup>h</sup>30 et 13<sup>h</sup>30 - 17<sup>h</sup>30</p>',
                            '2' => '<p class="horaires-title">Mardi:</p><p class="horaires-text">7<sup>h</sup>30 - 12<sup>h</sup>30 et 13<sup>h</sup>30 - 17<sup>h</sup>30</p>',
                            '3' => '<p class="horaires-title">Mercredi:</p><p class="horaires-text">7<sup>h</sup>30 - 12<sup>h</sup>30 et 13<sup>h</sup>30 - 17<sup>h</sup>30</p>',
                            '4' => '<p class="horaires-title">Jeudi:</p><p class="horaires-text">7<sup>h</sup>30 - 12<sup>h</sup>30 et 13<sup>h</sup>30 - 17<sup>h</sup>30</p>',
                            '5' => '<p class="horaires-title">Vendredi:</p><p class="horaires-text">7<sup>h</sup>30 - 12<sup>h</sup>30 et 13<sup>h</sup>30 - 17<sup>h</sup>30</p>',
                            '6' => '<p class="horaires-title">Samedi:</p><p class="horaires-text">Fermé</p>',
                            '7' => '<p class="horaires-title">Dimanche:</p><p class="horaires-text">Fermé</p>',
                        ];
            ?>

            <h2 id="horaires-title-section">Horaires Accueil</h2>
            
            <!-- Horaires Agence Vendée(85) -->

            <div class="toggle-horaires">
       
                <?php

                foreach ($jours as $jour) {
                    if ($jour == $dateInt) {
                        ?>
                        
                            <div class="horaires-jour">
                                
                                <?php if (($jour < 6) ) : ?>
                                    <style>
                                        .contact .horaires .toggle-horaires .horaires-jour #toggle-horaires-jour .horaires-text{
                                            color: green;
                                        }
                                    </style>
                                <?php else : ?>
                                    <style>
                                        .contact .horaires .toggle-horaires .horaires-jour #toggle-horaires-jour .horaires-text{
                                            color: red;
                                        }
                                    </style>
                                <?php endif; ?>

                                <div id="toggle-horaires-jour"><?php echo $horaires[$jour]; ?></div>

                                <!-- Téléphone -->

                                <div class="horaires-tel"><i class="horaires-title">Téléphone:</i><p class="fas fa-phone-alt"></p><a href="tel:+0251094000" title="Téléphone Juliot Électricité"><p>02 51 09 40 00</p></a></div>
                            </div>

                            <i class="horaires-btn-text" id="textBtn">Plus d'horaires ?</i>
                            <button type="submit" id="horaires-btn"><p class="fas"></p></button>

                            <div class="horaires-semaine" id="horaires-table">
                                <div class="toggle-horaires-semaine">
                        <?php
                                foreach ($horaires as $horaire) {
                                    ?>
                                    
                                        <div class="horaires-content"><?php echo $horaire; ?></div>
                                    
                                    <?php
                                }
                                ?>
                                </div>
                            </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php
        ?>
    </div>
</main>

<?php
/* Appel du footer */
    get_footer();
?>