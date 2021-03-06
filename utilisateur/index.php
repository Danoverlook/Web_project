<!doctype html>
<?php
include ('./lib/php/liste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <title>Cinematheque - Bienvenue</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/style_pc.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css" />
    </head>

    <body>
        <header>
            <img src="../admin/images/logo.png" alt="JumBox" id="logo" />
            <form method="POST" action="index.php?page=page_fiche">
                <input type="text" name="rech_titre" value="recherche par titre" id="recherche_rapide" onfocus="if (this.value == 'recherche par titre')
                            this.value = '';">
                <button type="submit" id="button_rech_rap" name="rech_rap">rechercher</button>
            </form>
            <br/>
            <!--<a href="" id="recherche_avancee">> recherche avancée</a>

            <form method="POST" id="form_rech_avancee">
                <label>genre 1&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input list="genre1" type="text" id="choix_genre1">
                <datalist id="genre1">	
                    <option value="Action">
                    <option value="Aventure">
                    <option value="Comédie">
                    <option value="Drame">
                </datalist>
                <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspgenre 2</label>
                <input list="genre2" type="text" id="choix_genre2">
                <datalist id="genre2">	
                    <option value="Action">
                    <option value="Aventure">
                    <option value="Comédie">
                    <option value="Drame">
                </datalist>
                <br/>
                <label>réalisateur&nbsp&nbsp</label>
                <input list="realisateur" type="text" id="choix_realisateur">
                <datalist id="realisateur">
                    <option value="Almodovar Pedro">
                    <option value="Nolan Christopher">
                </datalist>
                <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspnote</label>
                <input list="note" type="text" id="choix_note">
                <datalist id="note">	
            <?php
            for ($i = 1; $i <= 20; $i++) {
                echo '<option value="' . $i . '">';
            }
            ?>
                </datalist>
                <label>/20</label>
                <br/>
                <label>acteur&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input list="acteur" type="text" id="choix_acteur">
                <datalist id="acteur">	
                    <option value="Dicaprio Leonardo">
                    <option value="Logan Lerman">
                </datalist>
                <button type="submit" id="button_rech_av" name="rech_av">|></button>
                <br/>
                <label>durée entre&nbsp</label>
                <input list="duree1" type="text" id="choix_duree1">
                <datalist id="duree1">
            <?php
            for ($i = 0; $i <= 24; $i++) {
                echo '<option value="' . ($i * 10) . '">';
            }
            ?>
                </datalist>
                <label>min et&nbsp</label>
                <input list="duree2" type="text" id="choix_duree2">
                <datalist id="duree2">	
            <?php
            for ($i = 1; $i <= 30; $i++) {
                echo '<option value="' . ($i * 10) . '">';
            }
            ?>
                </datalist>
                <label>min</label>
                <br/>
                <label>année entre&nbsp</label>
                <input list="annee1" type="text" id="choix_annee1">
                <datalist id="annee1">
            <?php
            for ($i = 1895; $i <= 2015; $i++) {
                echo '<option value="' . $i . '">';
            }
            ?>
                </datalist>
                <label>&nbspet&nbsp</label>
                <input list="annee2" type="text" id="choix_annee2">
                <datalist id="annee2">	
            <?php
            for ($i = 1895; $i <= 2015; $i++) {
                echo '<option value="' . $i . '">';
            }
            ?>
                </datalist>
            </form>
            <?php
            if (isset($_POST['rech_av'])) {
                $_SESSION['page'] = "page_accueil";
            }
            ?>-->
        </header>

        <!------PAGE------------------------------------------------------------------------------------------>
        <section id="page">

            <!--COLONNE DE GAUCHE------------------------------------------------------------------------------------------>

            <section id="colGauche">
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
                <a href="../admin/index.php" id="connexion">Connexion</a>
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
    </body>
</html>