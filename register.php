<?php
include 'admin/settings.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = trim($_POST['register_username'] ?? '');
    $salasana = trim($_POST['register_password'] ?? '');
    $salasanaMatch = trim($_POST['register_password_match'] ?? '');

    if (empty($nimi) || empty($salasana) || empty($salasanaMatch)) {
        echo("Kaikki kentät pitää täyttää.");
        exit;
    }

    if ($salasana !== $salasanaMatch) {
        echo("Salasanat eivät täsmää.");
        exit;
    }

    $checkUserSql = "SELECT COUNT(*) FROM kayttajat WHERE nimi = :nimi";
    $checkStmt = $pdo->prepare($checkUserSql);
    $checkStmt->bindParam(':nimi', $nimi);
    $checkStmt->execute();
    $userExists = $checkStmt->fetchColumn();

    if ($userExists) {
        echo("Käyttäjänimi on jo käytössä.");
        exit;
    }

    try {
        $sql = "INSERT INTO kayttajat (nimi, salasana, rooli) VALUES (:nimi, :salasana, 'user')";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nimi', $nimi);
        $stmt->bindParam(':salasana', $salasana);
        $stmt->execute();

        echo "Rekisteröinti onnistui. <a href='loginPage.php'>Kirjaudu sisään</a>";
    } catch (PDOException $e) {
        echo("Virhe: " . $e->getMessage());
        exit;
    }
}
?>
