<?php
$genreManager = new GenreManager($db);
$arraygenre = $genreManager->getListeGenre();
$nbrgenre = count($arraygenre);

$personneManager = new PersonneManager($db);
$arraypersonne = $personneManager->getListePersonne();
$nbrpersonne = count($arraypersonne);

$paysManager = new PaysManager($db);
$arraypays = $paysManager->getListePays();
$nbrpays = count($arraypays);

$langueManager = new LangueManager($db);
$arraylangue = $langueManager->getListeLangue();
$nbrlangue = count($arraylangue);


if (isset($_GET['idfilm'])) {
    $filmManager = new FilmManager($db);
    $arrayfilm = $filmManager->getFilm($_GET['idfilm']);

    $film_genreManager = new Film_genreManager($db);
    $arrayfilm_genre = $film_genreManager->getFilm_genres($_GET['idfilm']);
    $nbrfilm_genre = count($arrayfilm_genre);

    $film_realisateurManager = new Film_realisateurManager($db);
    $arrayfilm_realisateur = $film_realisateurManager->getFilm_realisateurs($_GET['idfilm']);
    $nbrfilm_realisateur = count($arrayfilm_realisateur);

    $film_acteurManager = new Film_acteurManager($db);
    $arrayfilm_acteur = $film_acteurManager->getFilm_acteurs($_GET['idfilm']);
    $nbrfilm_acteur = count($arrayfilm_acteur);

    $film_paysManager = new Film_paysManager($db);
    $arrayfilm_pays = $film_paysManager->getFilm_pays($_GET['idfilm']);
    $nbrfilm_pays = count($arrayfilm_pays);

    $film_langueManager = new Film_langueManager($db);
    $arrayfilm_langue = $film_langueManager->getFilm_langues($_GET['idfilm']);
    $nbrfilm_langue = count($arrayfilm_langue);

    $film_soustitreManager = new Film_soustitreManager($db);
    $arrayfilm_soustitre = $film_soustitreManager->getFilm_soustitres($_GET['idfilm']);
    $nbrfilm_soustitre = count($arrayfilm_soustitre);
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
                    } else {
                        echo 'genre(s) non précisé(s)';
                    }
                    ?>
                    <br/><br/>
                    <span class="span_bold">Réalisateur(s)</span>&nbsp&nbsp
                    <?php
                    if ($arrayfilm_realisateur != 0) {
                        for ($i = 0; $i < $nbrfilm_realisateur; $i++) {
                            if ($arrayfilm_realisateur[$i]->idfilm == $_GET['idfilm']) {
                                for ($j = 0; $j < $nbrpersonne; $j++) {
                                    if ($arraypersonne[$j]->idpersonne == $arrayfilm_realisateur[$i]->idpersonne) {
                                        if ($i < $nbrfilm_realisateur - 1) {
                                            echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->prenompersonne . ', ';
                                        } else {
                                            echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->nompersonne;
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo 'réalisateur(s) non précisé(s)';
                    }
                    ?>
                    <br/><br/>
                    <span class="span_bold">Acteur(s)</span>&nbsp&nbsp&nbsp
                    <?php
                    if ($arrayfilm_acteur != 0) {
                        for ($i = 0; $i < $nbrfilm_acteur; $i++) {
                            if ($arrayfilm_acteur[$i]->idfilm == $_GET['idfilm']) {
                                for ($j = 0; $j < $nbrpersonne; $j++) {
                                    if ($arraypersonne[$j]->idpersonne == $arrayfilm_acteur[$i]->idpersonne) {
                                        if ($i < $nbrfilm_acteur - 1) {
                                            echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->prenompersonne . ', ';
                                        } else {
                                            echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->nompersonne;
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo 'acteur(s) non précisé(s)';
                    }
                    ?>
                    <br/><br/>
                    <span class="span_bold">Note personnelle</span>&nbsp&nbsp&nbsp<span id="span_note"><?php echo $arrayfilm[0]->note ?>/20</span><br/><br/></td></tr>
            <tr><td colspan="2" id="td_resume"><span class="span_bold">Résumé</span><br/><br/><?php echo $arrayfilm[0]->synopsis ?><br/><br/></td></tr>
            <tr><td><span class="span_bold">&nbspPays</td><td>
                    <?php
                    if ($arrayfilm_pays != 0) {
                        for ($i = 0; $i < $nbrfilm_pays; $i++) {
                            if ($arrayfilm_pays[$i]->idfilm == $_GET['idfilm']) {
                                for ($j = 0; $j < $nbrpays; $j++) {
                                    if ($arraypays[$j]->idpays == $arrayfilm_pays[$i]->idpays) {
                                        if ($i < $nbrfilm_pays - 1) {
                                            echo $arraypays[$j]->nompays . ' | ';
                                        } else {
                                            echo $arraypays[$j]->nompays;
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo 'pays non précisé(s)';
                    }
                    ?>
                </td></tr>
            <tr><td><span class = "span_bold">&nbspLangue(s) disponible(s)</td><td>
                    <?php
                    if ($arrayfilm_langue != 0) {
                        for ($i = 0; $i < $nbrfilm_langue; $i++) {
                            if ($arrayfilm_langue[$i]->idfilm == $_GET['idfilm']) {
                                for ($j = 0; $j < $nbrlangue; $j++) {
                                    if ($arraylangue[$j]->idlangue == $arrayfilm_langue[$i]->idlangue) {
                                        if ($i < $nbrfilm_langue - 1) {
                                            echo $arraylangue[$j]->nomlangue . ' | ';
                                        } else {
                                            echo $arraylangue[$j]->nomlangue;
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo 'langue(s) non précisée(s)';
                    }
                    ?>
                </td></tr>
            <tr><td><span class = "span_bold">&nbspSous-titre(s) disponible(s)</td><td>
                    <?php
                    if ($arrayfilm_soustitre != 0) {
                        for ($i = 0; $i < $nbrfilm_soustitre; $i++) {
                            if ($arrayfilm_soustitre[$i]->idfilm == $_GET['idfilm']) {
                                for ($j = 0; $j < $nbrlangue; $j++) {
                                    if ($arraylangue[$j]->idlangue == $arrayfilm_soustitre[$i]->idlangue) {
                                        if ($i < $nbrfilm_soustitre - 1) {
                                            echo $arraylangue[$j]->nomlangue . ' | ';
                                        } else {
                                            echo $arraylangue[$j]->nomlangue;
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo 'sous-titre(s) non précisé(s)';
                    }
                    ?>
                </td></tr>
            <tr><td><span class = "span_bold">&nbspDéfinition</td><td><?php echo $arrayfilm[0]->definition
                    ?></td></tr>
            <tr><td><span class="span_bold">&nbspurl imdb</td><td><a href="<?php echo $arrayfilm[0]->urlimdb ?>" target="_blank"><?php echo $arrayfilm[0]->urlimdb ?></a></td></tr>
            <tr><td><br/></td></tr>
            <!--<tr><td id="td_bouton_modif"><button type="submit" id="button_modifier" name="bouton_modifier_film">modifier</button></td><td><a href="" id="fiche_sup_film">&nbspsupprimer</a></td></tr>-->
        </table>
    </form>
    <?php
} elseif (isset($_POST['rech_rap'])) {
    $filmManager = new FilmManager($db);
    $arrayfilm = $filmManager->getFilmbyword($_POST['rech_titre']);
    if ($arrayfilm != 0) {
        $film_genreManager = new Film_genreManager($db);
        $arrayfilm_genre = $film_genreManager->getFilm_genres($arrayfilm[0]->idfilm);
        $nbrfilm_genre = count($arrayfilm_genre);

        $film_realisateurManager = new Film_realisateurManager($db);
        $arrayfilm_realisateur = $film_realisateurManager->getFilm_realisateurs($arrayfilm[0]->idfilm);
        $nbrfilm_realisateur = count($arrayfilm_realisateur);

        $film_acteurManager = new Film_acteurManager($db);
        $arrayfilm_acteur = $film_acteurManager->getFilm_acteurs($arrayfilm[0]->idfilm);
        $nbrfilm_acteur = count($arrayfilm_acteur);

        $film_paysManager = new Film_paysManager($db);
        $arrayfilm_pays = $film_paysManager->getFilm_pays($arrayfilm[0]->idfilm);
        $nbrfilm_pays = count($arrayfilm_pays);

        $film_langueManager = new Film_langueManager($db);
        $arrayfilm_langue = $film_langueManager->getFilm_langues($arrayfilm[0]->idfilm);
        $nbrfilm_langue = count($arrayfilm_langue);

        $film_soustitreManager = new Film_soustitreManager($db);
        $arrayfilm_soustitre = $film_soustitreManager->getFilm_soustitres($arrayfilm[0]->idfilm);
        $nbrfilm_soustitre = count($arrayfilm_soustitre);
        ?>
        <form method = "POST">
            <table id = "table_fiche">
                <caption id = "caption_fiche"><?php echo $arrayfilm[0]->titrefilm
        ?><span id="caption_span_annee">&nbsp(<?php echo $arrayfilm[0]->annee ?>)</span></caption>
                <tr><td id="td_image"><img src="<?php echo '../admin/images/' . $arrayfilm[0]->image . '.jpg' ?>"></td><td id="td_droite_img"><?php echo $arrayfilm[0]->duree ?> minutes
                        <br/><br/><?php
                        if ($arrayfilm_genre != 0) {
                            for ($i = 0; $i < $nbrfilm_genre; $i++) {
                                if ($arrayfilm_genre[$i]->idfilm == $arrayfilm[0]->idfilm) {
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
                        } else {
                            echo 'genre(s) non précisé(s)';
                        }
                        ?>
                        <br/><br/>
                        <span class="span_bold">Réalisateur(s)</span>&nbsp&nbsp
                        <?php
                        if ($arrayfilm_realisateur != 0) {
                            for ($i = 0; $i < $nbrfilm_realisateur; $i++) {
                                if ($arrayfilm_realisateur[$i]->idfilm == $arrayfilm[0]->idfilm) {
                                    for ($j = 0; $j < $nbrpersonne; $j++) {
                                        if ($arraypersonne[$j]->idpersonne == $arrayfilm_realisateur[$i]->idpersonne) {
                                            if ($i < $nbrfilm_realisateur - 1) {
                                                echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->prenompersonne . ', ';
                                            } else {
                                                echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->nompersonne;
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo 'réalisateur(s) non précisé(s)';
                        }
                        ?>
                        <br/><br/>
                        <span class="span_bold">Acteur(s)</span>&nbsp&nbsp&nbsp
                        <?php
                        if ($arrayfilm_acteur != 0) {
                            for ($i = 0; $i < $nbrfilm_acteur; $i++) {
                                if ($arrayfilm_acteur[$i]->idfilm == $arrayfilm[0]->idfilm) {
                                    for ($j = 0; $j < $nbrpersonne; $j++) {
                                        if ($arraypersonne[$j]->idpersonne == $arrayfilm_acteur[$i]->idpersonne) {
                                            if ($i < $nbrfilm_acteur - 1) {
                                                echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->prenompersonne . ', ';
                                            } else {
                                                echo $arraypersonne[$j]->prenompersonne . ' ' . $arraypersonne[$j]->nompersonne;
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo 'acteur(s) non précisé(s)';
                        }
                        ?>
                        <br/><br/>
                        <span class="span_bold">Note personnelle</span>&nbsp&nbsp&nbsp<span id="span_note"><?php echo $arrayfilm[0]->note ?>/20</span><br/><br/></td></tr>
                <tr><td colspan="2" id="td_resume"><span class="span_bold">Résumé</span><br/><br/><?php echo $arrayfilm[0]->synopsis ?><br/><br/></td></tr>
                <tr><td><span class="span_bold">&nbspPays</td><td>
                        <?php
                        if ($arrayfilm_pays != 0) {
                            for ($i = 0; $i < $nbrfilm_pays; $i++) {
                                if ($arrayfilm_pays[$i]->idfilm == $arrayfilm[0]->idfilm) {
                                    for ($j = 0; $j < $nbrpays; $j++) {
                                        if ($arraypays[$j]->idpays == $arrayfilm_pays[$i]->idpays) {
                                            if ($i < $nbrfilm_pays - 1) {
                                                echo $arraypays[$j]->nompays . ' | ';
                                            } else {
                                                echo $arraypays[$j]->nompays;
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo 'pays non précisé(s)';
                        }
                        ?>
                    </td></tr>
                <tr><td><span class = "span_bold">&nbspLangue(s) disponible(s)</td><td>
                        <?php
                        if ($arrayfilm_langue != 0) {
                            for ($i = 0; $i < $nbrfilm_langue; $i++) {
                                if ($arrayfilm_langue[$i]->idfilm == $arrayfilm[0]->idfilm) {
                                    for ($j = 0; $j < $nbrlangue; $j++) {
                                        if ($arraylangue[$j]->idlangue == $arrayfilm_langue[$i]->idlangue) {
                                            if ($i < $nbrfilm_langue - 1) {
                                                echo $arraylangue[$j]->nomlangue . ' | ';
                                            } else {
                                                echo $arraylangue[$j]->nomlangue;
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo 'langue(s) non précisée(s)';
                        }
                        ?>
                    </td></tr>
                <tr><td><span class = "span_bold">&nbspSous-titre(s) disponible(s)</td><td>
                        <?php
                        if ($arrayfilm_soustitre != 0) {
                            for ($i = 0; $i < $nbrfilm_soustitre; $i++) {
                                if ($arrayfilm_soustitre[$i]->idfilm == $arrayfilm[0]->idfilm) {
                                    for ($j = 0; $j < $nbrlangue; $j++) {
                                        if ($arraylangue[$j]->idlangue == $arrayfilm_soustitre[$i]->idlangue) {
                                            if ($i < $nbrfilm_soustitre - 1) {
                                                echo $arraylangue[$j]->nomlangue . ' | ';
                                            } else {
                                                echo $arraylangue[$j]->nomlangue;
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo 'sous-titre(s) non précisé(s)';
                        }
                        ?>
                    </td></tr>
                <tr><td><span class = "span_bold">&nbspDéfinition</td><td><?php echo $arrayfilm[0]->definition
                        ?></td></tr>
                <tr><td><span class="span_bold">&nbspurl imdb</td><td><a href="<?php echo $arrayfilm[0]->urlimdb ?>" target="_blank"><?php echo $arrayfilm[0]->urlimdb ?></a></td></tr>
                <tr><td><br/></td></tr>
                <!--<tr><td id="td_bouton_modif"><button type="submit" id="button_modifier" name="bouton_modifier_film">modifier</button></td><td><a href="" id="fiche_sup_film">&nbspsupprimer</a></td></tr>-->
            </table>
        </form>
        <?php
    } else
        echo '<span id="orange">aucun film ne porte ce nom!</span>';
}
?>


