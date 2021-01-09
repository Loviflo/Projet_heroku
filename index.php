<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Page d'index du site">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="icon" type="image/png" href="Images/favicon.png">
    <title>Pokédex | Accueil</title>
</head>
<body>
<?php include 'header.php' ?>

<!--Contenu principal-->
<main class="flex">
    <section class="left">
        <h2>Nouveautés</h2>
        <br>
        <h3>18/03/2020</h3>
        <p>Publication du Pokédex!</p>
        <br>
        <h3>12/03/2020</h3>
        <p>Derniers préparatifs en vue du déploiement du Pokédex.</p>
        <br>
        <h3>9/03/2020</h3>
        <p>Conception de l'aspect visuel du Pokédex.</p>
        <br>
        <h3>04/03/2020</h3>
        <p>Lancement du projet.</p>
    </section>
    <section class="center">
        <h1>Bienvenue sur le Pokédex!</h1>
        <figure class="img">
            <img src="Images/pikachu.png"  alt="Pikachu" width="244"></a>
            <!--<figcaption>Cliquez pour voir l'image en taille réelle</figcaption>-->
        </figure>
        <h3 class="textcenter">Attrapez-les tous!</h3>
        <p class="text">Le Pokédex, signifiant « Encyclopédie Pokémon» est un objet technologique fictif de l'univers Pokémon : il s'agit d'une encyclopédie recensant les créatures fictives connues éponymes. Il permet d'enregistrer les informations sur les Pokémon.
            <br>
            <br>
            Ce Pokédex en ligne fonctionne grâce à la communauté, n'hésitez pas à vous inscrire afin de pouvoir ajouter vos propres Pokémons!</p>

    </section>

</main>
<?php include 'footer.php' ?>
</body>
</html>