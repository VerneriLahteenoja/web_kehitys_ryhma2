<?php include "settings.php"; ?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Admin Page</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <header class="navbar navbar-dark bg-dark p-3">
        <a href="index.php" class="navbar-brand">Admin Page</a>
    </header>

    <main class="container flex-grow-1">
        <h1 class="adminh1 text-center">Admin Hallintapaneeli</h1>

        <section class="row">
    <div class="col-md-4">
        <div class="card p-3">
            <h3>Tuotteet</h3>
            <p>Hallitse verkkosivun tuotteita.</p>
            <a href="#" class="btn btn-primary">Avaa</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h3>Käyttäjät</h3>
            <p>Hallitse käyttäjätilejä.</p>
            <a href="#" class="btn btn-primary">Avaa</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h3>Järjestelmä</h3>
            <p>Versio: 1.0.0</p>
            <p>Palvelin: Online</p>
        </div>
    </div>
</section>
    </main>

    <footer class="bg-dark text-light text-center p-3 mt-auto">
        &copy; 2025 Admin Hallintapaneeli
    </footer>

</body>
</html>
