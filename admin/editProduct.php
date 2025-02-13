<?php

include "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nimi = $_POST['nimi'];
    $hinta = $_POST['hinta'];
    $kuva = $_POST['kuva'];
    $kuvaus = $_POST['kuvaus'];
    
    if (empty($nimi) || empty($hinta) || empty($kuva) || empty($kuvaus)) {
        echo "Kaikki kentät ovat pakollisia.";
        exit;
    }

    try{
        $sql= "UPDATE tuotteet SET nimi = :nimi, hinta = :hinta, kuva = :kuva, kuvaus = :kuvaus WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nimi', $nimi, PDO::PARAM_STR);
        $stmt->bindParam(':hinta', $hinta, PDO::PARAM_INT);
        $stmt->bindParam(':kuva', $kuva, PDO::PARAM_STR);
        $stmt->bindParam(':kuvaus', $kuvaus, PDO::PARAM_STR);
        $stmt->execute();

        echo "Tuote päivitetty onnistuneesti.";
    
        header("Refresh: 5; URL=manageProducts.php");
        exit();
        
        
        
    }catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
    }
}
?>