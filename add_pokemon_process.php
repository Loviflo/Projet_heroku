<?php
session_start();
require 'config.php';


$q = "SELECT nom FROM pokemon WHERE nom = ?";
$req = $bdd->prepare($q);
$req->execute([$_POST['nom']]);
$results = $req->fetchAll();
if (count($results)!=0) {
    header('location: add_pokemon.php?msg=Nom déjà utilisé');
    exit;
}
if (!isset($_POST['pv']) || strlen($_POST['pv']) < 1 || !is_numeric($_POST['pv']) || $_POST['pv'] < 0) {
    header('location: add_pokemon.php?msg=Nom invalide');
    exit;
}

if (!isset($_POST['nom']) || strlen($_POST['nom']) < 1 || strlen($_POST['nom']) > 128) {
    header('location: add_pokemon.php?msg=Nom jg');
    exit;
}
if (!isset($_POST['attaque']) || strlen($_POST['attaque']) < 1 || !is_numeric($_POST['attaque']) || $_POST['attaque'] < 0) {
    header('location: add_pokemon.php?msg=Nom invalide');
    exit;
}
if (!isset($_POST['defense']) || strlen($_POST['defense']) < 1 || !is_numeric($_POST['defense']) || $_POST['defense'] < 0) {
    header('location: add_pokemon.php?msg=Nom invalide');
    exit;
}
if (!isset($_POST['vitesse']) || strlen($_POST['vitesse']) < 1 || !is_numeric($_POST['vitesse']) || $_POST['vitesse'] < 0) {
    header('location: add_pokemon.php?msg=Nom invalide');
    exit;
}
$dossier = '../pok_images/';
$extension = strrchr($_FILES['pok_img']['name'],'.');
$extensions = array('.png','.gif','.jpeg','.jpg','.svg');
$fichier = basename($_FILES['pok_img']['tmp_name'],'.tmp').$extension;
if (strlen($fichier) < 1) {
	header('location: add_pokemon.php?msg=Fichier obligatoire !');
	exit;
}
if (!in_array($extension,$extensions)) {
	header('location: add_pokemon.php?msg=Les extensions autorisées sont les .gif, .jpeg, .jpg, .png et .svg.');
	exit;
}
if (!move_uploaded_file($_FILES['pok_img']['tmp_name'],$dossier.$fichier)){
	header('location: add_pokemon.php?msg=Erreur système');
	exit;
}

$nom = htmlspecialchars($_POST['nom']);
$pv = $_POST['pv'];
$attaque = $_POST['attaque'];
$defense = $_POST['defense'];
$vitesse = $_POST['vitesse'];
$id_user = $_SESSION['user_name'];

$q = 'INSERT INTO pokemon (nom,pv,attaque,defense,vitesse,image,id_user) VALUES (:val1, :val2, :val3, :val4, :val5, :val6, :val7)';
$req = $bdd->prepare($q);
$req->execute(
    [
        "val1" => $nom,
        "val2" => $pv,
        "val3" => $attaque,
        "val4" => $defense,
        "val5" => $vitesse,
        "val6" => $fichier,
        "val7" => $id_user
    ]
);
header('location: collection.php');
?>