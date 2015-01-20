<?php
$genreManager = new GenreManager($db);
$arraygenre = $genreManager->getListeGenre();
$nbrgenre = count($arraygenre);

$film_genreManager = new Film_genreManager($db);
$arrayfilm_genre = $film_genreManager->getListeFilm_genre();
$nbrfilm_genre = count($arrayfilm_genre);
?>

<form method="GET">
    <table id="table_genres">
        <?php
        for ($i = 0; $i < $nbrgenre; $i++) {
            $count = 0;
            for ($j = 0; $j < $nbrfilm_genre; $j++) {
                if ($arrayfilm_genre[$j]->idgenre == $arraygenre[$i]->idgenre) {
                    $count++;
                }
            }
            ?>
            <tr><td><a href="<?php echo 'index.php?page=page_accueil&idgenre=' . $arraygenre[$i]->idgenre.'&nomgenre='.$arraygenre[$i]->nomgenre ?>"><?php echo $arraygenre[$i]->nomgenre . ' (' . $count . ')' ?></a></td></tr>
            <?php } ?>
    </table>
</form>