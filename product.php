<?php

include 'admin/settings.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $tuote_id = intval($_GET['id']);
}else {
    die("Tuote id puuttuu tai on väärä.");
}

$sql="SELECT id, nimi, hinta, kuvaus, arvostelu, kuva FROM tuotteet WHERE id = :id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id', $tuote_id, PDO::PARAM_INT);
$stmt->execute();
$tuote = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tuote) {
    die ("Tuotetta ei löytynyt.");
}

$sql="SELECT arvosana, kommentti, luotu FROM arvostelut WHERE tuote_id = :id ORDER BY luotu DESC";
$stmt=$pdo->prepare($sql);
$stmt->execute(['id'=> $tuote_id]);
$arvostelut = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tuote['nimi']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
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
    <div class="product-detail">
    <h1><?php echo htmlspecialchars($tuote['nimi']); ?></h1>

    <img src="kuvat/<?php echo htmlspecialchars($tuote['kuva']); ?>" alt="<?php echo htmlspecialchars($tuote['nimi']); ?>">
    
    <p>Hinta: €<?php echo $tuote['hinta']; ?></p>

    <p><?php echo $tuote['kuvaus']; ?></p>

    <div class="product-review">
    <h2>Mitä mieltä muut ovat tästä tuotteesta?</h2>
    <?php if ($arvostelut): ?>
        <ul>
            <?php foreach ($arvostelut as $arvostelu): ?>
                <li><strong><?php echo $arvostelu ['arvosana']; ?>/5 ⭐</strong> - <?php echo htmlspecialchars($arvostelu['kommentti']); ?> 
                    <em>(<?php echo $arvostelu['luotu']; ?>)</em>
                </li>
                <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Tällä tuotteella ei ole vielä arvosteluja</p>
    <?php endif; ?>

    <h3>Arvostele tämä tuote<br> ↓</h3>
    <?php if (isset($tuote['id'])): ?>
    <form action="addReview.php" method="POST">
        <input type="hidden" name="tuote_id" value="<?php echo htmlspecialchars($tuote['id']); ?>">
        <label for="arvosana">Arvosana (1-5):</label>
        <select name="arvosana" id="arvosana" required>
            <option value="1">1⭐</option>
            <option value="2">2⭐</option>
            <option value="3">3⭐</option>
            <option value="4">4⭐</option>
            <option value="5">5⭐</option>
        </select><br>
        <label for="kommentti" max="100">Lisä kommentti? (vapaaehtoinen)</label><br>
        <textarea name="kommentti" id="kommentti"></textarea><br>
        <button type="submit"> Lähetä arvostelu</button>
    </form>
    <?php else: ?>
        <p>Virhe: Tuote id puuttuu.</p>
    <?php endif; ?>
    <a href="products.php"> <-Takaisin Kaikkiin Tuotteisiin.</a>
    
</body>
</html>
