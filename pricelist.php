<?php
session_start();
include 'admin/settings.php';
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Hinnasto</title>
</head>
<body>
    <header>
        <a href="index.php"><img src="kuvat/kllogo.png" alt="Logo" width="250" height="250"></a>
    </header>
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom" >
        <div class="container-fluid" role="navigation">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Etusivu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pricelist.php">Hinnasto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Tuotteet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Yhteystiedot</a>
                </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php include "loginLogoutNav.php" ?>
                </ul>
            </div>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
<main>
    <section class="container">
        <h2 class="text-uppercase my-4 hinnasto">Hinnasto</h2>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="table-responsive">
                        <table class="table-bordered pricelist w-100">        
            <tbody>
                <tr>
                    <td>Kuntosali 1KK</td>
                    <td>40€</td>
                </tr>
                <tr>
                    <td>Kuntosali 3KK</td>
                    <td>110€</td>
                </tr>
                <tr>
                    <td>Kuntosali 6KK</td>
                    <td>200€</td>
                </tr>
                <tr>
                    <td>Kuntosali 12KK</td>
                    <td>350€</td>
                </tr>
                <tr>
                    <td>Kertakäynti</td>
                    <td>8€</td>
                </tr>
                <tr>
                    <td>10 x kortti</td>
                    <td>50€</td>
                </tr>
                <tr>
                    <td>Kulkuavain</td>
                    <td>10€</td>
                </tr>
        </tbody>
        </table>
        </div>
        </div>

            <div class="col-md-6 col-sm-12">
                <!-- Kuva: https://unsplash.com/photos/a-man-is-doing-a-pull-up-in-a-gym-qo1pyCD02t4 -->
                <img src="./Kuvat/pricelist.jpg" class="img-fluid pricelist-img" alt="Levytanko ja levypainot">
        </div>
        </div>
    </section>
</main>
<footer>
        <p>&copy; 2025 Kyykkyluola.</p>
</footer>

</body>
</html>