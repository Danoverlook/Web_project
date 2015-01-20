<!doctype html>
<?php
//INDEX ADMIN
include ('./lib/php/liste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();
$scripts = array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i = 0;
foreach (glob('./lib/js/jquery/*.js') as $js) {
    $fichierJs[$i] = $js;
    $i++;
}
?>

<html>
    <head>
        <title>Cinematheque - Bienvenue</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" type="text/css" href="./lib/css/style_pc.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/style_jquery.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/mediaqueries.css"/>
        <?php
        foreach ($fichierJs as $js) {
            ?><script type="text/javascript" src="<?php print $js; ?>"></script>
            <?php
        }
        ?>
        <script type="text/javascript" src="./lib/js/fonctionsJqueryAdmin.js"></script> 
    </head>

    <body>    

        <?php
        //var_dump($_SESSION);
//session_destroy();
        ?>

        <header>
            <img src="../admin/images/logo.png" alt="JumBox" id="logo" />
            <section id="deconnexion">
                <?php
                if (isset($_SESSION['admin'])) {
                    ?>
                    <form method="POST" action="index.php?page=page_fiche">
                        <input type="text" name="rech_titre" value="recherche par titre" id="recherche_rapide" onfocus="if (this.value == 'recherche par titre')
                                        this.value = '';">
                        <button type="submit" id="button_rech_rap" name="rech_rap">rechercher</button>
                    </form>
                    <br/>
                    <?php
                }
                ?>
            </section>

        </header>

        <?php if (!isset($_SESSION['admin'])) {
            ?>
            <section id="login_form">
                <?php
                require './pages/authentification.php';
                ?> </section><?php
        } else {

            //print "session : ".$_SESSION['admin'];
            ?>

            <!------PAGE------------------------------------------------------------------------------------------>
            <section id="page">

                <!--COLONNE DE GAUCHE------------------------------------------------------------------------------------------>

                <section id="colGauche">
                    <!--LIEN AJOUT FILM----------------------------------------------------------------------------->
                    <a href="index.php?page=page_ajout" id="button_ajout">Ajouter un film</a>
                    <br/><br/>
                    <nav>
                        <a href="index.php?page=page_accueil" id="alphabetique">Films par ordre alphabétique</a>
                        <br/><br/>
                        <span id="select_genre">Genres</span>
                        <?php
                        if (file_exists('./lib/php/menu.php')) {
                            include ('./lib/php/menu.php');
                        }
                        ?>
                    </nav>
                </section>

                <!--COLONNE DE DROITE------------------------------------------------------------------------------------------>

                <aside>
                    <!--<a href="" id="activ_sup">activer la suppression</a>-->
                    <?php
                    $filmManager = new FilmManager($db);
                    $arrayfilm = $filmManager->getListeFilmbynote();
                    $nbrfilm = count($arrayfilm);
                    ?>
                    <table id="table_top">
                        <caption>Top 10</caption>
                        <tr><td></td><td></td></tr>
                        <?php for ($i = 0; $i < $nbrfilm; $i++) {
                            ?>
                            <tr>
                                <td><?php echo '<a href="index.php?page=page_fiche&idfilm=' . $arrayfilm[$i]->idfilm . '">' . $arrayfilm[$i]->titrefilm . '</a>' ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $arrayfilm[$i]->note ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    &nbsp&nbsp&nbsp;
                    <!--<form method="POST">
                        <button type="submit" class="button_lien" name="bouton_stat_clic"><a href="" id="voir_stat"></a>> accéder aux statistiques</button>
                    </form>-->

                    <?php
                    if (isset($_POST['bouton_stat_clic'])) {
                        $_SESSION['page'] = "page_statistiques";
                    }
                    ?>
                    <br/>
                    <a href="./lib/php/disconnect.php" id="connexion">Déconnexion</a>
                </aside>

                <!--CONTENU------------------------------------------------------------------------------------------>
                <!--<a href="" id="sup_selection">supprimer la sélection</a>-->

                <section id="contenu">
                    <?php
                    //quand on arrive sur le site 
                    if (!isset($_SESSION['page'])) {
                        $_SESSION['page'] = "page_accueil";
                    }

                    if (isset($_GET['page'])) {
                        $_SESSION['page'] = $_GET['page'];
                    }

                    /* if (isset($_POST['bouton_film_clic'])) {
                      $_SESSION['page'] = './pages/page_fiche.php';
                      echo '3';
                      }
                      if (isset($_POST['bouton_modifier_film'])) {
                      $_SESSION['page'] = './pages/page_modification.php';
                      echo '4';
                      } */

                    if (file_exists('./pages/' . $_SESSION['page'] . '.php')) {
                        include ('./pages/' . $_SESSION['page'] . '.php');
                    }
                    ?>
                </section>

            </section>

            <footer>
                Have a lot of fun!
            </footer>

            <?php
        }
        ?>
    </body>
</html>