<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé
$taille = isset($_GET['taille']) ? $_GET['taille'] : '100_100' ;
$taille_dispo = array(
'96_96',
'100_100',
'120_120',
'125_150',
'140_200',
'150_250',
'160_280'
);
if(in_array($taille,$taille_dispo)):
	$cette_taille = $taille;
else:
	$cette_taille = '100_100';
endif;

$avatar_liste = glob('avatars' . DIRECTORY_SEPARATOR .  $cette_taille . DIRECTORY_SEPARATOR . '*.png');
$avatar_nombre = count($avatar_liste);
if($avatar_nombre > 0):
	mt_srand();
	$avatar_numero = mt_rand(0,($avatar_nombre-1));

/**
	header('Location: ' . str_replace(DIRECTORY_SEPARATOR,'/',$avatar_liste[$avatar_numero]));
/*
*/
	header('Content-type: image/png');
	echo file_get_contents($avatar_liste[$avatar_numero]);
/**/
endif;
?>
