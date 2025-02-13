<?php

include "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = trim($_POST['nimi'] ?? '');
    $hinta = trim($_POST['hinta'] ??'');
    $kuva = trim($_POST['kuva'] ??'');
    $kuvaus = trim($_POST['kuvaus'] ??'');

    if (empty($nimi) || empty($hinta) || empty($kuva) || empty($kuvaus)) {
        echo "Kaikki kentät pitää täyttää.";
    }

    $checkProductsql = "SELECT COUNT(*) FROM tuotteet where nimi = :nimi";
    $checkStmt = $pdo->prepare($checkProductsql);
    $checkStmt->bindParam(':nimi', $nimi);
    $checkStmt->execute();
    $productExists = $checkStmt->fetchColumn();

    if ($productExists) {
        echo "Tuote tällä nimellä on olemassa jo.";
    }

    try {
        $sql= "INSERT INTO tuotteet (nimi, hinta, kuva, kuvaus) VALUES (:nimi, :hinta, :kuva, :kuvaus)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nimi', $nimi);
        $stmt->bindParam(':hinta', $hinta);
        $stmt->bindParam(':kuva', $kuva);
        $stmt->bindParam(':kuvaus', $kuvaus);
        $stmt->execute();

        echo "Tuote lisätty onnistuneesti.";
        
        header("Refresh: 5; URL=manageProducts.php");
        exit();
        
    }catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
    }
}
?>

