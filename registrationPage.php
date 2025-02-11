<?php include "settings.php" ?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Etusivu</title>
</head>
<body>
<header>
    <a href="index.html"><img src="kuvat/kllogo.png" alt="Logo" width="250" height="250"></a>
</header>
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom" >
        <div class="container-fluid" role="navigation">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Etusivu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricelist.html">Hinnasto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Tuotteet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Yhteystiedot</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
    <form class="col-md-4" action="register.php" method="POST">
        <input type="hidden" name="action" value="register">
        <h2>Rekisteröidy</h2>
        <div class="form-group">
            <label for="register_username">Käyttäjänimi:</label>
            <input class="form-control" type="text" name="register_username" required>
        </div>
        <br>
        <div class="form-group">
            <label for="register_password">Salasana:</label>
            <input type="password" name="register_password" required>
        </div>
        <br>
        <div class="form-group">
            <label for="register_password_match">Salasana uudelleen:</label>
            <input type="password" name="register_password_match" required>
        </div>
        <br>
        <button type="submit">Rekisteröidy</button>
        <p>
            Onko sinulla jo tili? <a href="loginPage.html">Kirjaudu sisään</a>.
        </p>
    </form>
</div>
<footer>
    <p>&copy; 2025 Kyykkyluola.</p>
</footer>
</body>
</html>