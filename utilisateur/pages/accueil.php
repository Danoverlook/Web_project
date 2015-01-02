<h2>Bienvenue à la pension Pets-Sitting</h2>
<?php
//accueil.php est contenu dans l'index, qui contient une
//instance de db
$accueilManager = new AccueilManager($db);
$texte = $accueilManager->getTexteAccueil();
?>
<img src="../admin/images/chenil.jpg" alt="Pets-Sitting" />
&nbsp;
<section id="texte_accueil" class="up txtBlue">
    <?php print $texte[0]->texte_accueil;?>
</section>
