<h4>modification d'un film</h4>
<form method="POST" id="form_ajout">
<table class="table_contenu">
    <br/>
    <tr><td id="titre_film_ajout">Titre&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="Inception"></td></tr>
    <tr><td colspan="2"><br/></td></tr>
    <tr><td class="td_ajout">Année&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" id="text_annee" value="1980"></td></tr>
    <tr><td class="td_ajout">Durée&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" id="text_duree" value="120">&nbspminutes</td></tr>
    <tr><td class="td_ajout">Genre 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="Thriller"></td></tr>
    <tr><td class="td_ajout">Genre 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="Action"></td></tr>
    <tr><td class="td_ajout">Genre 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="Drame"></td></tr>
    <tr><td class="td_ajout">Réalisateur&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="Christopher Nolan"></td></tr>
    <tr><td class="td_ajout">Acteur 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="Brad Pitt"></td></tr>
    <tr><td class="td_ajout">Acteur 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="Leonardo DiCaprio"></td></tr>
    <tr><td class="td_ajout">Acteur 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Acteur 4&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Affiche&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="fichier.png"></td></tr>
    <tr><td class="td_ajout">Note perso&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" id="text_note" value="17">&nbsp/20</td></tr>
    <tr><td id="label_textarea" class="td_ajout">Résumé&nbsp&nbsp&nbsp&nbsp</td><td><textarea name="nom" rows=4 cols=40 value="trrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrès bon film!"></textarea></td></tr>
    <tr><td class="td_ajout">Pays 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="USA"></td></tr>
    <tr><td class="td_ajout">Pays 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Pays 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Langue dispo 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="anglais"></td></tr>
    <tr><td class="td_ajout">Langue dispo 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Langue dispo 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Sous-titre dispo 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text" value="français"></td></tr>
    <tr><td class="td_ajout">Sous-titre dispo 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Sous-titre dispo 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout">Définition&nbsp&nbsp&nbsp&nbsp</td><td><input list="definition" type="text" id="list_definition" value="1080p"><datalist id="definition"><option value="480p"><option value="720p"><option value="1080p"></datalist></td></tr>
    <tr><td class="td_ajout">url IMDB&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td class="td_ajout"><br/></td></tr>
    <tr><td class="td_ajout"></td><td><button type="submit" id="button_ajouter" name="b_modifier">Modifier</button></td></tr>
</table>
</form>