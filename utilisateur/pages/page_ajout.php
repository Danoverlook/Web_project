<br/><br/><br/>
<?php
if (isset($_GET['b_ajouter'])) {
    
    if ($_GET['titrefilm'] == "" || $_GET['annee'] == "" || $_GET['duree'] == "") {
        echo '<span class="oblige">les champs titre, année et durée sont obligatoires.</span>';
    } elseif ($_GET['annee'] < 1895 || $_GET['annee'] > 2015) {
        echo '<span class="oblige">l\'année du film doit être comprise entre 1895 et 20150.</span>';
    } elseif ($_GET['duree'] < 10 || $_GET['duree'] > 300) {
        echo '<span class="oblige">la durée du film doit être comprise entre 10 et 300 minutes.</span>';
    } elseif ($_GET['note'] < 1 || $_GET['note'] > 20 and $_GET['note']!="") {
        echo '<span class="oblige">la note donnée au film doit être comprise entre 1 et 20.</span>';
    } else {
        $filmar = array();
        $filmar ['titrefilm'] = $_GET['titrefilm'];
        $filmar ['annee'] = $_GET['annee'];
        $filmar ['duree'] = $_GET['duree'];
        $filmar ['synopsis'] = $_GET['synopsis'];
        if ($_GET['note'] == "") {
            $filmar ['note'] = 10;
        } else {
            $_GET['note']=(int)$_GET['note'];
            $filmar ['note'] = $_GET['note'];
        }
        $filmar ['definition'] = $_GET['definition'];
        $filmar ['urlimdb'] = $_GET['urlimdb'];
        $filmar ['image'] = $_GET['image'];
        $filmManager = new FilmManager($db);

        $filmID = $filmManager->addFilm($filmar);
        if ($filmID == -1) {
            echo '<span class="oblige">ce film existe déjà!</span>';
        } else {
            for ($i = 1; $i <= 3; $i++) {
                if ($_GET['genre' . $i] != "") {
                    $ar = array();
                    $ar['nomgenre'] = $_GET['genre' . $i];
                    $Manager = new GenreManager($db);
                    $genreID = $Manager->addGenre($ar);

                    $arID = array();
                    $arID['idgenre'] = $genreID;
                    $arID['idfilm'] = $filmID;
                    $Manager = new Film_genreManager($db);
                    $Manager->addFilm_genre($arID);
                }
            }
            for ($i = 1; $i <= 6; $i++) {
                if ($_GET['langue' . $i] != "") {
                    $ar = array();
                    $ar['nomlangue'] = $_GET['langue' . $i];
                    $Manager = new LangueManager($db);
                    $langueID = $Manager->addLangue($ar);

                    if ($i < 4) {
                        $arID = array();
                        $arID['idfilm'] = $filmID;
                        $arID['idlangue'] = $langueID;
                        $Manager = new Film_langueManager($db);
                        $Manager->addFilm_langue($arID);
                    } else {
                        $arID = array();
                        $arID['idfilm'] = $filmID;
                        $arID['idlangue'] = $langueID;
                        $Manager = new Film_soustitreManager($db);
                        $Manager->addFilm_soustitre($arID);
                    }
                }
            }

            for ($i = 1; $i <= 6; $i++) {
                if ($_GET['npers' . $i] != "" && $_GET['ppers' . $i] != "" && $_GET['npers' . $i]!='nom' && $_GET['ppers' . $i]!='prenom') {
                    $ar = array();
                    $ar['nompersonne'] = $_GET['npers' . $i];
                    $ar['prenompersonne'] = $_GET['ppers' . $i];
                    $Manager = new PersonneManager($db);
                    $personneID = $Manager->addPersonne($ar);

                    if ($i > 2) {
                        $arID = array();
                        $arID['idfilm'] = $filmID;
                        $arID['idpersonne'] = $personneID;
                        $Manager = new Film_acteurManager($db);
                        $Manager->addFilm_acteur($arID);
                    } else {
                        $arID = array();
                        $arID['idfilm'] = $filmID;
                        $arID['idpersonne'] = $personneID;
                        $Manager = new Film_realisateurManager($db);
                        $Manager->addFilm_realisateur($arID);
                    }
                }
            }

            for ($i = 1; $i <= 3; $i++) {
                if ($_GET['pays' . $i] != "") {
                    $ar = array();
                    $ar['nompays'] = $_GET['pays' . $i];
                    $Manager = new PaysManager($db);
                    $paysID = $Manager->addPays($ar);

                    $arID = array();
                    $arID['idfilm'] = $filmID;
                    $arID['idpays'] = $paysID;
                    $Manager = new Film_paysManager($db);
                    $Manager->addFilm_pays($arID);
                }
            }
            echo '<span id="ajout_ok">film ajouté!</span>';
        }
    }
}

if (!isset($_GET['b_ajouter'])) {
    ?>
    <h4>ajout d'un film</h4>
    <form method="GET" id="form_ajout">
        <table class="table_contenu">
            <br/>
            <tr><td id="titre_film_ajout">Titre&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="titrefilm"><span class="oblige"> *</span></td></tr>
            <tr><td colspan="2"><br/></td></tr>
            <tr><td class="td_ajout">Année&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" id="text_annee" name="annee"><span class="oblige"> (comprise entre 1895 et 2015) *</span></td></tr>
            <tr><td class="td_ajout">Durée&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" id="text_duree" name="duree">&nbspminutes <span class="oblige"> (comprise entre 10 et 300) *</span></td></tr>
            <tr><td class="td_ajout">Genre 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="genre1"></td></tr>
            <tr><td class="td_ajout">Genre 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="genre2"></td></tr>
            <tr><td class="td_ajout">Genre 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="genre3"></td></tr>
            <tr><td class="td_ajout">Réalisateur 1&nbsp&nbsp&nbsp</td><td><input type="text" value="prénom" name="ppers1" id="text_size" onfocus="if (this.value == 'prénom')
                        this.value = '';">&nbsp&nbsp&nbsp<input type="text" value="nom" name="npers1" id="text_size" onfocus="if (this.value == 'nom')
                                    this.value = '';"></td></tr>
            <tr><td class="td_ajout">Réalisateur 2&nbsp&nbsp&nbsp</td><td><input type="text" value="prénom" name="ppers2" id="text_size" onfocus="if (this.value == 'prénom')
                        this.value = '';">&nbsp&nbsp&nbsp<input type="text" value="nom" name="npers2" id="text_size" onfocus="if (this.value == 'nom')
                                    this.value = '';"></td></tr>
            <tr><td class="td_ajout">Acteur 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="prénom" name="ppers3" id="text_size" onfocus="if (this.value == 'prénom')
                        this.value = '';">&nbsp&nbsp&nbsp<input type="text" value="nom" name="npers3" id="text_size" onfocus="if (this.value == 'nom')
                                    this.value = '';"></td></tr>
            <tr><td class="td_ajout">Acteur 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="prénom" name="ppers4" id="text_size" onfocus="if (this.value == 'prénom')
                        this.value = '';">&nbsp&nbsp&nbsp<input type="text" value="nom" name="npers4" id="text_size" onfocus="if (this.value == 'nom')
                                    this.value = '';"></td></tr>
            <tr><td class="td_ajout">Acteur 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="prénom" name="ppers5" id="text_size" onfocus="if (this.value == 'prénom')
                        this.value = '';">&nbsp&nbsp&nbsp<input type="text" value="nom" name="npers5" id="text_size" onfocus="if (this.value == 'nom')
                                    this.value = '';"></td></tr>
            <tr><td class="td_ajout">Acteur 4&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="prénom" name="ppers6" id="text_size" onfocus="if (this.value == 'prénom')
                        this.value = '';">&nbsp&nbsp&nbsp<input type="text" value="nom" name="npers6" id="text_size" onfocus="if (this.value == 'nom')
                                    this.value = '';"></td></tr>
            <tr><td class="td_ajout">Affiche&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="image"></td></tr>
            <tr><td class="td_ajout">Note perso&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" id="text_note" name="note">&nbsp/20<span class="oblige"> (comprise entre 1 et 20)</span></td></tr>
            <tr><td id="label_textarea" class="td_ajout">Résumé&nbsp&nbsp&nbsp&nbsp</td><td><textarea name="synopsis" rows=4 cols=40></textarea></td></tr>
            <tr><td class="td_ajout">Pays 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="pays1"></td></tr>
            <tr><td class="td_ajout">Pays 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="pays2"></td></tr>
            <tr><td class="td_ajout">Pays 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="pays3"></td></tr>
            <tr><td class="td_ajout">Langue 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="langue1"></td></tr>
            <tr><td class="td_ajout">Langue 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="langue2"></td></tr>
            <tr><td class="td_ajout">Langue 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="langue3"></td></tr>
            <tr><td class="td_ajout">Sous-titre 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="langue4"></td></tr>
            <tr><td class="td_ajout">Sous-titre 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="langue5"></td></tr>
            <tr><td class="td_ajout">Sous-titre 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="langue6"></td></tr>
            <tr><td class="td_ajout">Définition&nbsp&nbsp&nbsp&nbsp</td><td><input list="definition" type="text" id="list_definition" name="definition"><datalist id="definition"><option value="480p"><option value="720p"><option value="1080p"></datalist></td></tr>
            <tr><td class="td_ajout">url IMDB&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" name="urlimdb"></td></tr>
            <tr><td class="td_ajout"><br/></td></tr>
            <tr><td class="td_ajout"></td><td><button type="submit" id="button_ajouter" name="b_ajouter">Ajouter</button></td></tr>
        </table>
    </form>
    <span class="oblige">* les champs titre, année et durée sont obligatoires</span>
    <?php
}
?>