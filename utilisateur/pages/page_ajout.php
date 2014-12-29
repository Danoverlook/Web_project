<h4>ajout d'un film</h4>
<form method="POST" id="form_ajout">
<table class="table_contenu">
    <tr><td>Titre&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Année&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Durée&nbsp&nbsp&nbsp&nbsp</td><td><input type="text">&nbspminutes</td></tr>
    <tr><td>Genre 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Genre 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Genre 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Réalisateur&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Acteur 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Acteur 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Acteur 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Acteur 4&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Affiche&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Note perso&nbsp&nbsp&nbsp&nbsp</td><td><input type="text">&nbsp/20</td></tr>
    <tr><td id="label_textarea">Description&nbsp&nbsp&nbsp&nbsp</td><td><textarea name="nom" rows=4 cols=40></textarea></td></tr>
    <tr><td>Pays 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Pays 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Pays 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Langue dispo 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Langue dispo 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Langue dispo 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Sous-titre dispo 1&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Sous-titre dispo 2&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Sous-titre dispo 3&nbsp&nbsp&nbsp&nbsp</td><td><input type="text"></td></tr>
    <tr><td>Définition&nbsp&nbsp&nbsp&nbsp</td><td><input list="definition" id="choix_definition" type="text"><datalist id="definition"><option value="480p"><option value="720p"><option value="1080p"></datalist></td></tr>
    <tr><td><br/></td></tr>
    <tr><td></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" id="button_ajouter" name="b_ajouter">> Ajouter</button></td></tr>
</table>
</form>