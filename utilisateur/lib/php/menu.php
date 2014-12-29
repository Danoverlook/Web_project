<form method="POST">
    <table id="table_genres">
        <tr><td><button type="submit" class="button_genre" name="Action"><a href=""></a>Action</button></td></tr>
        <tr><td><button type="submit" class="button_genre" name="Aventure"><a href=""></a>Aventure</button></td></tr>
        <tr><td><button type="submit" class="button_genre" name="Drame"><a href=""></a>Drame</button></td></tr>
    </table>
</form>

<?php
if (isset($_POST['Action'])) {
    $_SESSION['page'] = "page_accueil";
}
if (isset($_POST['Aventure'])) {
    $_SESSION['page'] = "page_accueil";
}
if (isset($_POST['Drame'])) {
    $_SESSION['page'] = "page_accueil";
}
?>