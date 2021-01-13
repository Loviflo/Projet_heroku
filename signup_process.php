<?php
require 'config.php';

if (!isset($_POST['user_name']) || strlen($_POST['user_name']) < 5 || strlen($_POST['user_name']) > 25) {
    header('location: signup.php?msg=Nom d\'utilisateur invalide');
    exit;
}

$q = "SELECT Id FROM users WHERE pseudo = ?";
$req = $bdd->prepare($q);
$req->execute([$_POST['user_name']]);
$results = $req->fetchAll();
if (count($results)!=0) {
    header('location: signup.php?msg=Pseudo déjà utilisé');
    exit;
}

if (!isset($_POST['user_mail']) || !filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL)) {
	header('location: signup.php?msg=Email invalide');
	exit();
}

if (!isset($_POST['user_password']) || strlen($_POST['user_password']) < 8 || strlen($_POST['user_password']) > 15) {
	header('location: signup.php?msg=Mot de passe invalide. Il faut au moins 8 caractères et au plus 15 caractères.');	
	exit();
}
// $taille_maxi = 100000;
// $taille = filesize($_POST['user_img']);
// if ($taille > $taille_maxi || $taille < 1) {
//     header('location: signup.php?msg=Image invalide');
//     exit;
// }
$dossier = '../user_images/';
$extension = strrchr($_FILES['user_img']['name'],'.');
$extensions = array('.png','.gif','.jpeg','.jpg','.svg');
$fichier = basename($_FILES['user_img']['tmp_name'],'.tmp').$extension;
if (strlen($fichier) < 1) {
	header('location: signup.php?msg=Fichier obligatoire !');
	exit;
}
if (!in_array($extension,$extensions)) {
	header('location: signup.php?msg=Les extensions autorisées sont les .gif, .jpeg, .jpg, .png et .svg.');
	exit;
}
if (!move_uploaded_file($_FILES['user_img']['tmp_name'],$dossier.$fichier)){
	header('location: signup.php?msg=Le fichier choisi est trop gros !');
	exit;
}


$user = htmlspecialchars($_POST['user_name']);
$email = $_POST['user_mail'];
$password = hash('sha256',$_POST['user_password']);

$q = 'INSERT INTO user (pseudo,email,password,image) VALUES (:val1, :val2, :val3, :val4)';
$req = $bdd->prepare($q);
$req->execute(
	[
	"val1" => $user,
	"val2" => $email,
    "val3" => $password,
    "val4" => $fichier
	]
);
header('location: index.php');

?>
