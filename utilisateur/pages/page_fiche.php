<?php
if (isset($_GET['idfilm'])) {

    $filmManager = new FilmManager($db);
    $arrayfilm = $filmManager->getFilm($_GET['idfilm']);

    $genreManager = new GenreManager($db);
    $arraygenre = $genreManager->getListeGenre();
    $nbrgenre = count($arraygenre);

    $film_genreManager = new Film_genreManager($db);
    $arrayfilm_genre = $film_genreManager->getFilm_genres($_GET['idfilm']);
    $nbrfilm_genre = count($arrayfilm_genre);

    $personneManager = new PersonneManager($db);
    $arraypersonne = $personneManager->getListePersonne();
    $nbrpersonne = count($arraypersonne);

    $film_realisateurManager = new Film_realisateurManager($db);
    $arrayfilm_realisateur = $film_realisateurManager->getFilm_realisateurs($_GET['idfilm']);
    $nbrfilm_realisateur = count($arrayfilm_realisateur);

    $film_acteurManager = new Film_acteurManager($db);
    $arrayfilm_acteur = $film_acteurManager->getFilm_acteurs($_GET['idfilm']);
    $nbrfilm_acteur = count($arrayfilm_acteur);
    ?>
    <form method="POST"> 
        <table  id="table_fiche">
            <caption id="caption_fiche"><?php echo $arrayfilm[0]->titrefilm ?><span id="caption_span_annee">&nbsp(<?php echo $arrayfilm[0]->annee ?>)</span></caption>
            <tr><td id="td_image"><img src="<?php echo '../admin/images/' . $arrayfilm[0]->image . '.jpg' ?>"></td><td id="td_droite_img"><?php echo $arrayfilm[0]->duree ?> minutes
                    <br/><br/><?php
                    if ($arrayfilm_genre != 0) {
                        for ($i = 0; $i < $nbrfilm_genre; $i++) {
                            if ($arrayfilm_genre[$i]->idfilm == $_GET['idfilm']) {
                                for ($j = 0; $j < $nbrgenre; $j++) {
                                    if ($arraygenre[$j]->idgenre == $arrayfilm_genre[$i]->idgenre) {
                                        if ($i < $nbrfilm_genre - 1) {
                                            echo $arraygenre[$j]->nomgenre . ' | ';
                                        } else {
                                            echo $arraygenre[$j]->nomgenre;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    else {
                        echo 'genre(s) non précisé(s)';
                    }
                    ?>
                    <br/><br/>
                    <span class="span_bold">Réalisateur(s)</span>&nbsp&nbspChristopher Nolan<br/><br/>
                    <span class="span_bold">Acteur(s)</span>&nbsp&nbsp&nbspMatthew McConaughey, Anne Hathaway, Matt Damon<br/><br/>
                    <span class="span_bold">Note personnelle</span>&nbsp&nbsp&nbsp<span id="span_note"><?php echo $arrayfilm[0]->note ?>/20</span><br/><br/></td></tr>
            <tr><td colspan="2" id="td_resume"><span class="span_bold">Résumé</span><br/><br/><?php echo $arrayfilm[0]->synopsis ?><br/><br/></td></tr>
            <tr><td><span class="span_bold">&nbspPays</td><td>USA | UK</td></tr>
            <tr><td><span class="span_bold">&nbspLangue(s) disponible(s)</td><td>anglais, français</td></tr>
            <tr><td><span class="span_bold">&nbspSous-titre(s) disponible(s)</td><td>anglais, français</td></tr>
            <tr><td><span class="span_bold">&nbspDéfinition</td><td><?php echo $arrayfilm[0]->definition ?></td></tr>
            <tr><td><span class="span_bold">&nbspurl imdb</td><td><a href="http://www.imdb.com/title/<?php echo $arrayfilm[0]->urlimdb ?>/" target="_blank">www.imdb.com/title/<?php echo $arrayfilm[0]->urlimdb ?>/</a></td></tr>
            <tr><td><br/></td></tr>
            <!--<tr><td id="td_bouton_modif"><button type="submit" id="button_modifier" name="bouton_modifier_film">modifier</button></td><td><a href="" id="fiche_sup_film">&nbspsupprimer</a></td></tr>-->
        </table>
    </form>
    <?php
} else
    echo "erreur";



    