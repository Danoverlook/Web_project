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
            <form action="">
                <input type="text" name="rech_rapide" value="recherche par titre" id="recherche_rapide" onfocus="if (this.value == 'recherche par titre')
                            this.value = '';">
                <input type="image" src="../admin/images/look.png" name="image" id="button_rech_rap">
            </form>
            <br/>
            <a href="" id="recherche_avancee">> recherche avancée</a>
            <form action="" id="form_rech_avancee">
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
                <input type="image" src="../admin/images/look.png" name="image" id="button_rech_av">
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
        </header>
        <section id="page">
            <a href="" target="_blank"><input type="button" id="button_ajout" value="Ajouter un film"></a>
            <section id="colGauche">
                <nav>
                    <span id="select_genre">sélection d'un genre</span>
                    <?php
                    if (file_exists('./lib/php/menu.php')) {
                        include ('./lib/php/menu.php');
                    }
                    ?>
                </nav>
            </section>
            <a href="" id="sup_selection">supprimer la sélection</a>
            <section id="contenu">
                salut poupée!
                <div id="main">
                    <?php
                    //quand on arrive sur le site 
                    if (!isset($_SESSION['page'])) {
                        $_SESSION['page'] = "accueil";
                    }  //si on a cliqué sur un lien du menu
                    if (isset($_GET['page'])) {
                        $_SESSION['page'] = $_GET['page'];
                    }
                    $_SESSION['page'] = './pages/' . $_SESSION['page'] . '.php';
                    if (file_exists($_SESSION['page'])) {
                        include ($_SESSION['page']);
                    }
                    ?>
                </div>
            </section>
            <a href="" id="activer_modif">activer la suppression</a>
            <aside>
                <table>
                    <caption>Top 10</caption>
                    <tr><td></td><td></td></tr>
                    <tr>
                        <td>Shawshank redemption</td>
                        <td></td>
                        <td></td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>Evil dead</td>
                        <td></td>
                        <td></td>
                        <td>17</td>
                    </tr>
                    <tr>
                        <td>Troll 2</td>
                        <td></td>
                        <td></td>
                        <td>6</td>
                    </tr>
                </table>
                &nbsp&nbsp&nbsp;
                <a href="" id="voir_stat">> accéder aux statistiques</a>
            </aside>
        </section>
        <footer>
            Have a lot of fun!
        </footer>
    </body>
</html>