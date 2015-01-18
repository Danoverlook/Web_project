<h4>5 films récemment consultés ou ajoutés</h4>
<?php
//page_accueil.php est contenu dans l'index, qui contient une
//instance de db
$filmManager = new FilmManager($db);
$arrayfilm = $filmManager->getListeFilm();
$nbrfilm = count($arrayfilm);

$genreManager = new GenreManager($db);
$arraygenre = $genreManager->getListeGenre();
$nbrgenre = count($arraygenre);

$film_genreManager = new Film_genreManager($db);
$arrayfilm_genre = $film_genreManager->getListeFilm_genre();
$nbrfilm_genre = count($arrayfilm_genre);

$personneManager = new PersonneManager($db);
$arraypersonne = $personneManager->getListePersonne();
$nbrpersonne = count($arraypersonne);

$film_realisateurManager = new Film_realisateurManager($db);
$arrayfilm_realisateur = $film_realisateurManager->getListeFilm_realisateur();
$nbrfilm_realisateur = count($arrayfilm_realisateur);

$film_acteurManager = new Film_acteurManager($db);
$arrayfilm_acteur = $film_acteurManager->getListeFilm_acteur();
$nbrfilm_acteur = count($arrayfilm_acteur);

for ($i = 0; $i < $nbrfilm; $i++) {
    ?>
    <article class="element_liste">    
        <a class="link_fiche" href="<?php echo 'index.php?page=page_fiche&idfilm=' . $arrayfilm[$i]->idfilm ?>"><img src="<?php echo '../admin/images/' . $arrayfilm[$i]->image . '.jpg' ?>" class="img_liste"/></a>

        <table class="table_contenu">
            <tr><td colspan="2"><a  href="<?php echo 'index.php?page=page_fiche&idfilm=' . $arrayfilm[$i]->idfilm ?>"><strong><?php echo $arrayfilm[$i]->titrefilm . ' (' . $arrayfilm[$i]->annee . ')' ?></strong></a></td></tr>
            <tr><td colspan="2">
                    <?php
                    $trouve = 0;
                    for ($j = 0; $j < $nbrfilm_genre; $j++) {
                        if ($arrayfilm[$i]->idfilm == $arrayfilm_genre[$j]->idfilm) {
                            for ($k = 0; $k < $nbrgenre; $k++) {
                                if ($arrayfilm_genre[$j]->idgenre == $arraygenre[$k]->idgenre) {
                                    if ($trouve == 0) {
                                        $trouve = 1;
                                        echo $arraygenre[$k]->nomgenre;
                                    } else {
                                        echo ' | ' . $arraygenre[$k]->nomgenre;
                                    }
                                }
                            }
                        }
                    }
                    if ($trouve == 0) {
                        echo 'genre(s) non précisé(s)';
                    }
                    ?>             
                </td></tr>
            <tr><td class="td_bold">Durée&nbsp&nbsp</td><td><?php echo $arrayfilm[$i]->duree . ' min' ?></td></tr>
            <tr><td class="td_bold">Réalisateur(s)&nbsp&nbsp</td><td>
                    <?php
                    for ($j = 0; $j < $nbrfilm_realisateur; $j++) {
                        if ($arrayfilm[$i]->idfilm == $arrayfilm_realisateur[$j]->idfilm) {
                            for ($k = 0; $k < $nbrpersonne; $k++) {
                                if ($arrayfilm_realisateur[$j]->idpersonne == $arraypersonne[$k]->idpersonne) {
                                    if ($j < $nbrfilm_realisateur - 1) {
                                        echo $arraypersonne[$k]->prenompersonne . ' ' . $arraypersonne[$k]->nompersonne . ', ';
                                    } else {
                                        echo $arraypersonne[$k]->prenompersonne . ' ' . $arraypersonne[$k]->nompersonne;
                                    }
                                }
                            }
                        }
                    }
                    ?>           
                </td></tr>
            <tr><td class="td_bold">Acteur(s)&nbsp&nbsp</td><td>
                    <?php
                    for ($j = 0; $j < $nbrfilm_acteur; $j++) {
                        if ($arrayfilm[$i]->idfilm == $arrayfilm_acteur[$j]->idfilm) {
                            for ($k = 0; $k < $nbrpersonne; $k++) {
                                if ($arrayfilm_acteur[$j]->idpersonne == $arraypersonne[$k]->idpersonne) {
                                    if ($j < $nbrfilm_acteur - 1) {
                                        echo $arraypersonne[$k]->prenompersonne . ' ' . $arraypersonne[$k]->nompersonne . ', ';
                                    } else {
                                        echo $arraypersonne[$k]->prenompersonne . ' ' . $arraypersonne[$k]->nompersonne;
                                    }
                                }
                            }
                        }
                    }
                    ?> 
                </td></tr>
            <tr><td class="td_bold">Note perso&nbsp&nbsp</td><td><?php echo $arrayfilm[$i]->note ?>/20</td></tr>
            <!--<tr><td colspan="2" class="td_bold"><input type = "checkbox" value = ""/>suppression</td></tr>-->
        </table>
    </article>
    <span class="clear"></span>
    <?php
}

