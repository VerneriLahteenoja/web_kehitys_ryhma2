<?php

include "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = trim($_POST['nimi'] ?? '');

    if (empty($nimi)) {
        echo "Tuotenimi on pakollinen.";
        exit;
    }

    try {
        $sql = "DELETE FROM tuotteet where nimi = :nimi";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam('nimi', $nimi, PDO::PARAM_STR);
        $stmt->execute();


        echo "Tuote poistettu onnistuneesti.";
        
        header("Refresh: 5; URL=manageProducts.php");
        exit();
        
    } catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
        exit;
    }
}
?>