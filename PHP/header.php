<header>
    <section class="navbar">
        <section class="navbar-left">
            <a href="index.php"><img class="logo" src="..\Images\logo.png" alt="logo_pikachu"></a>
        </section>
        <section class="navbar-right">
                <a href="index.php">Accueil</a>
                <a href="collection.php">Collection</a>
            <?php if (isset($_SESSION['user_name'])) { ?>
                <a href="add_pokemon.php">Ajouter un pokemon</a>
                <a href="profil.php">Mon compte</a>
                <a href="disconnect.php">Déconnexion</a>
            <?php } else {?>
                <a href="signin.php">Connecte-toi</a>
            <?php } ?>
        </section>
    </section>
</header>