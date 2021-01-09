<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Pokemon</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
    <section class="main">
    <?php include 'header.php'; ?>
    <main>
    <?php if (isset($_GET['msg'])) {echo "<h3 style='text-align : center;'>" . $_GET['msg'] . "</h3>";} ?>
        <h1 class="titreAdd">AJOUTER UN POKEMON</h1>
        <form enctype="multipart/form-data" action="add_pokemon_process.php" method="post">
            <input type="text" name="nom" placeholder="Nom"><br>
            <input type="text" name="pv" placeholder="Point de vie"><br>
            <input type="text" name="attaque" placeholder="Attaque"><br>
            <input type="text" name="defense" placeholder="Défense"><br>
            <input type="text" name="vitesse" placeholder="Vitesse"><br>
            <label for="image">Image : </label>
            <input type="file" name="pok_img"><br>
            <button type="submit">Ajouter un Pokemon</button>
        </form>
    </main>
    <?php include 'footer.php'; ?>
    </section>
</body>
</html>