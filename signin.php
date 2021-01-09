<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="signin">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="icon" type="image/png" href="../Images/favicon.png">
    <title>Pokédex | Connexion</title>
</head>
<body>
<?php include 'header.php' ?>
<!--Contenu principal-->
<main>
    <section class="center">
        <h2 class="connect">
            Connexion:
        </h2>
        <?php if (isset($_GET['msg'])) {
			echo "<h2>" . $_GET['msg'] . "</h2>";
		} ?>
        <form action="signin_process.php" method="post">
            <input type="text" name="user_name" placeholder="Pseudo"><br>
            <input type="password" name="user_password" placeholder="Mot de passe"><br>
            <button type="submit">Se connecter</button>
        </form>
        <button class="signup"><a href="signup.php">S'inscrire</a></button>

    </section>

</main>
<?php include 'footer.php' ?>
</body>
</html>
