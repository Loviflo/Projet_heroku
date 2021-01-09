<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="signup">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="icon" type="image/png" href="Images/favicon.png">
    <title>Pokédex | Inscription</title>
</head>
<body>
<?php include 'header.php' ?>

<!--Contenu principal-->
<main>
    <section class="center">
        <h2 class="connect">
            Inscription:
        </h2>
		<?php if (isset($_GET['msg'])) {
			echo "<h2>" . $_GET['msg'] . "</h2>";
		} ?>
        <form enctype="multipart/form-data" action="signup_process.php" method="post">
            <input type="text" name="user_name" placeholder="Pseudo"><br>
            <input type="text" name="user_mail" placeholder="Mail"><br>
            <input type="password" name="user_password" placeholder="Mot de passe"><br>
            <label for="image">Image : </label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input type="file" name="user_img"><br>
            <button type="submit">S'inscrire</button>
        </form>
    </section>

</main>
<?php include 'footer.php' ?>
</body>
</html>
