<?php
session_start();
include "settings.php";

try {
    $sql = "SELECT id, nimi, hinta, arvostelu, kuva, kuvaus FROM tuotteet";
    $stmt = $pdo->query($sql);
    $tuotteet = $stmt->fetchAll();
}   catch (PDOException $e) {
    echo "Virhe: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Tuotteiden hallinta</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="navbar navbar-dark bg-dark p-3">
        <a href="index.php" class="navbar-brand">Admin Page</a>
    <div class="ms-auto">
        <a href="manageProducts.php" class="btn btn-outline-light me-2">Tuotteet</a>
        <a href="manageUsers.php" class="btn btn-outline-light">Käyttäjät</a>
    </header>

    <main class="container flex-grow-1">
        <h1 class="adminh1 text-center">Hallitse Tuotteita</h1>

        <form action="addProduct.php" method="POST" class="row g-3 mb-3 p-3 border rounded">
            <input type="hidden" name="action" value="add">
            <div class="col-md-3">
                <input type="text" class="form-control" name="nimi" placeholder="Tuotteen nimi" required>
            </div>
            <div class="col-md-3">
                <input type="int" class="form-control" name="hinta" placeholder="Hinta" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="kuva" placeholder="Tuotekuva" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="kuvaus" placeholder="Tuotteen kuvaus" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Lisää tuote</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nimi</th>
                    <th>Hinta</th>
                    <th>Kuva</th>
                    <th>Kuvaus</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tuotteet as $tuote): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($tuote['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($tuote['nimi'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($tuote['hinta'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($tuote['kuva'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($tuote['kuvaus'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <form action="editProduct.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($tuote['id']); ?>">
                                <input type="text" name="nimi" value="<?php echo htmlspecialchars($tuote['nimi']); ?>"required>
                                <input type="int" name="hinta" value="<?php echo htmlspecialchars($tuote['hinta']); ?>"required>
                                <input type="text" name="kuva" value="<?php echo htmlspecialchars($tuote['kuva']); ?>"required>
                                <input type="text" name="kuvaus" value="<?php echo htmlspecialchars($tuote['kuvaus']); ?>"required>
                                <button type="submit" class="btn btn-warning">Tallenna</button>
                            </form>
                            <form action="deleteProduct.php" method="POST" style="display:inline;">
                                <input type="hidden" name="nimi" value="<?php echo htmlspecialchars($tuote['nimi']); ?>">
                                <button type="submit" class="btn btn-danger">Poista</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    
        <footer class="bg-dark text-light text-center p-3 mt-auto">
            &copy; 2025 Admin Hallintapaneeli
        </footer>

</body>
</html>