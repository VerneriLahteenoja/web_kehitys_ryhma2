<?php
include "settings.php";

try {
    $sql = "SELECT id, nimi, salasana, rooli FROM kayttajat";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Virhe: " . $e->getMessage();
    exit;
}
?>
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
        <h1 class="adminh1 text-center">Hallitse Käyttäjätilejä</h1>

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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Käyttäjänimi</th>
                    <th>Salasana</th>
                    <th>Rooli</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['nimi'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['salasana'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['rooli'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <form action='editUser.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='<?php echo htmlspecialchars($row['id']); ?>'>
                                <input type='text' name='nimi' value='<?php echo htmlspecialchars($row['nimi']); ?>' required>
                                <input type='text' name='salasana' value='<?php echo htmlspecialchars($row['salasana']); ?>' required>
                                <input type='text' name='rooli' value='<?php echo htmlspecialchars($row['rooli']); ?>' required>
                                <button type='submit' class='btn btn-warning'>Muokkaa</button>
                            </form>
                            <form action='deleteUser.php' method='post' style='display:inline;'>
                                <input type='hidden' name='nimi' value='<?php echo htmlspecialchars($row['nimi']); ?>'>
                                <button type='submit' class='btn btn-danger'>Poista</button>
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