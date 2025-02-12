<?php include "settings.php"; ?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Käyttäjien hallinta</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <header class="navbar navbar-dark bg-dark p-3">
        <a href="index.php" class="navbar-brand">Admin Page</a>
    </header>

    <main class="container flex-grow-1">
        <h1 class="adminh1 text-center">Hallitse Käyttätilejä</h1>

        <form action="addUser.php" method="post" class="row g-3 mb-3 p-3 border rounded">
            <input type="hidden" name="action" value="add">
            <div class="col-md-3">
                <input type="text" class="form-control" name="nimi" placeholder="Käyttäjänimi" required>
            </div>
            <div class="col-md-3">
                <input type="password" class="form-control" name="salasana" placeholder="Salasana" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="rooli" placeholder="Rooli" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Lisää Käyttäjä</button>
            </div>
        </form>
    </main>

    <footer class="bg-dark text-light text-center p-3 mt-auto">
        &copy; 2025 Admin Hallintapaneeli
    </footer>

</body>
</html>