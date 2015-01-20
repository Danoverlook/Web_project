<?php

require '../lib/php/fpdf/fpdf.php';
require '../lib/php/db_pg.php';
require '../lib/php/classes/connexion.class.php';
require '../lib/php/classes/film.class.php';
require '../lib/php/classes/filmManager.class.php';
$db = Connexion::getInstance($dsn, $user, $pass);


$mg = new FilmManager($db);
$data = $mg->getListeFilm();

$pdf = new FPDF('L', 'cm', 'A4');
$pdf->SetFont('Arial', 'B', 15);
$pdf->AddPage();
$pdf->SetX(2);
$pdf->cell(3, 1, 'Jumbox', 0, 0, 'L');
//header premier
$pdf->SetFillColor(112, 146, 190);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(2, 3); // coordonnées bord supérieur gauche
$pdf->cell(20, .7, 'Liste des films', 0, 0, 'L', 1);

$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);

$x = 2;
$y = 4;
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial', 'B', 12);
$den = utf8_decode('Titre');
$pdf->cell(5, .7, $den, 0, 'C', 1, 1);
$pdf->SetXY($x + 5, $y);
$pdf->cell(5, .7, 'Annee', 0, 'C', 1, 1);
$pdf->cell(5, .7, 'Duree', 0, 'C', 1, 1);
$pdf->cell(5, .7, 'Note', 0, 'C', 1, 1);
$pdf->SetFont('Arial', '', 12);
$y++;
for ($i = 0; $i < count($data); $i++) {
    $pdf->SetXY($x, $y);
    $pdf->cell(5, .7, utf8_decode($data[$i]->titrefilm), 1, 'C', 1, 1);
    $pdf->SetXY($x + 5, $y);
    $pdf->Cell(5, .7, $data[$i]->annee, 1, 'C', 1, 1);
    $pdf->SetXY($x + 10, $y);
    $pdf->Cell(5, .7, $data[$i]->duree .' minutes', 1, 'C', 1, 1);
    $pdf->SetXY($x + 15, $y);
    $pdf->Cell(5, .7, $data[$i]->note. '/20', 1, 'C', 1, 1);
    $y+=0.7;
}

$pdf->output();
