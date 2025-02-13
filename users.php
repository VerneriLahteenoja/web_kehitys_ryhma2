<?php
session_start();
include 'admin/settings.php'; 

try {
    $stmt = $pdo->prepare("SELECT id, nimi, salasana, rooli FROM kayttajat");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Virhe: " . $e->getMessage();
    exit;
}
?>


<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Käyttäjät</title>
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
    <div class="container py-5">
        <h2>Käyttäjät</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Käyttäjänimi</th>
                    <th>Rooli</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($user['nimi'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($user['rooli'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <?php if ($_SESSION['user_role'] == 'admin'): ?>
                            <td>
                                <form action='editUser.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id' value='<?php echo htmlspecialchars($user['id']); ?>'>
                                    <input type='text' name='nimi' value='<?php echo htmlspecialchars($user['nimi']); ?>' required>
                                    <input type='text' name='salasana' value='<?php echo htmlspecialchars($user['salasana']); ?>' required>
                                    <input type='text' name='rooli' value='<?php echo htmlspecialchars($user['rooli']); ?>' required>
                                    <button type='submit' class='btn btn-warning'>Muokkaa</button>
                                </form>
                                <form action='deleteUser.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='nimi' value='<?php echo htmlspecialchars($user['nimi']); ?>'>
                                    <button type='submit' class='btn btn-danger'>Poista</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </main>
    <footer>       
        <p>&copy; 2025 Kyykkyluola.</p>
    </footer>
</body>
</html>
