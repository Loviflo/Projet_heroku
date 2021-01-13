<?php
require 'config.php'; 

$q = 'SELECT id FROM `user` WHERE pseudo = ? AND password = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['user_name'],hash('sha256',$_POST['user_password'])]);
$results = $req->fetchAll();
if (count($results) == 0) {
	header('location: signin.php?msg=Identifiants incorrects');
}else{
    session_start();
    $_SESSION['user_name'] = $_POST['user_name'];
    header('location: index.php');
	exit();
}
?>
