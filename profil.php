<?php 
session_start();
require 'config.php';
$q = 'SELECT pseudo, email, image FROM user WHERE pseudo = "' . $_SESSION['user_name'] . '"';
$req = $bdd->query($q);
$results = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Profil">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <title>Pokédex | Profil</title>
</head>
<body>
<?php include 'header.php' ?>

<!--Contenu principal-->
<main class="flex">

    <section class="left">
        <h2>MES INFOS</h2>
    <?php foreach ($results as $key => $value) { ?>
        <?php echo'<section><img src="../user_images/'.$value['image'].'"  alt="Logo Profil" width="128"></section>' ?>
        <?php echo "<h3>Pseudo : " . $value['pseudo'] . "</h3>"; ?> 
        <?php echo "<h3>Mail : " . $value['email'] . "</h3>"; ?>       
    <?php } ?>
        </section>
    <section class="center">
        <h2>MES POKEMONS</h2>
        <?php
        $q = 'SELECT nom, pv, attaque, defense, vitesse, image FROM pokemon WHERE id_user = "' . $_SESSION['user_name'] . '"';
        $req = $bdd->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach ($results as $key => $value) { ?>
            <div>
                <?php echo "<h3>Nom : " . $value['nom']."</h3>"; ?>
                <?php echo "<h3>Point de vie : " . $value['pv']."</h3>"; ?>
                <?php echo "<h3>Attaque : " . $value['attaque']."</h3>"; ?>
                <?php echo "<h3>Défense : " . $value['defense']."</h3>"; ?>
                <?php echo "<h3>Vitesse : " . $value['vitesse']."</h3>"; ?>
                <?php echo '<img src="../pok_images/'.$value['image'].'"  alt="Logo Pokemon" width="256">' ?>
            </div>
            <?php } ?>
    </section>

</main>
<?php include 'footer.php' ?>
</body>
</html>
