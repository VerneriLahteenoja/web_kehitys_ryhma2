<?php
session_start();
include "settings.php";

if (!isset($_SESSION['logged_user']) || $_SESSION['user_role'] != 'admin') {
    echo "Sinulla ei ole oikeuksia.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = trim($_POST['nimi'] ?? '');

    if (empty($nimi)) {
        echo "Käyttäjänimi on pakollinen.";
        exit;
    }

    try {
        $sql = "DELETE FROM kayttajat WHERE nimi = :nimi";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nimi', $nimi, PDO::PARAM_STR);
        $stmt->execute();

        echo "Käyttäjä poistettu onnistuneesti.";

    } catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
        exit;
    }
}
?>