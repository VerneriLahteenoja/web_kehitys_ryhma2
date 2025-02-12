<?php
include "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = trim($_POST['nimi'] ?? '');
    $salasana = trim($_POST['salasana'] ?? '');
    $rooli = trim($_POST['rooli'] ?? '');

    if (empty($nimi) || empty($salasana) || empty($rooli)) {
        echo "Kaikki kentät pitää täyttää.";
    }

    $checkUserSql = "SELECT COUNT(*) FROM kayttajat WHERE nimi = :nimi";
    $checkStmt = $pdo->prepare($checkUserSql);
    $checkStmt->bindParam(':nimi', $nimi);
    $checkStmt->execute();
    $userExists = $checkStmt->fetchColumn();

    if ($userExists) {
        echo "Käyttäjänimi on jo käytössä.";
    }

    try {
        $sql = "INSERT INTO kayttajat (nimi, salasana, rooli) VALUES (:nimi, :salasana, :rooli)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nimi', $nimi);
        $stmt->bindParam(':salasana', $salasana);
        $stmt->bindParam(':rooli', $rooli);
        $stmt->execute();

        echo "Käyttäjä lisätty onnistuneesti.";
    } catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
    }
}
?>