<?php
include "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = trim($_POST['nimi'] ?? '');

    if (empty($nimi)) {
        echo "Käyttäjänimi on pakollinen.";
    }

    try {
        $sql = "DELETE FROM kayttajat WHERE nimi = :nimi";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nimi', $nimi);
        $stmt->execute();

        echo "Käyttäjä poistettu onnistuneesti.";
        
    } catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
        exit;
    }
}
?>