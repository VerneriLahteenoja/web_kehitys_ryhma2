<?php
include "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nimi = trim($_POST['nimi'] ?? '');
    $salasana = trim($_POST['salasana'] ?? '');
    $rooli = trim($_POST['rooli'] ?? '');

    if (empty($nimi) || empty($salasana) || empty($rooli)) {
        echo "Kaikki kentät ovat pakollisia.";
        exit;
    }

    try {
        $sql = "UPDATE kayttajat SET nimi = :nimi, salasana = :salasana, rooli = :rooli WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nimi', $nimi);
        $stmt->bindParam(':salasana', $salasana);
        $stmt->bindParam(':rooli', $rooli);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Käyttäjä päivitetty onnistuneesti.";
    } catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
    }
}
?>