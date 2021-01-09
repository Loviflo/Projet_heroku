<?php 
session_start();
require 'config.php';
$q = 'SELECT nom, pv, attaque, defense, vitesse, image FROM pokemon';
$req = $bdd->query($q);
$results = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Page d'index du site">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <title>Pokédex | Collection</title>
</head>
<body>
<main class="main">
<!--Contenu principal-->
<?php include 'header.php'; ?>
    <h1 class="titreAdd">TOUS LES POKEMONS</h1>
    <section class="flex-container">
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