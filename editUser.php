<?php
session_start();
include "settings.php";

if (!isset($_SESSION['logged_user']) || $_SESSION['user_role'] != 'admin') {
    echo "Sinulla ei ole oikeuksia.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';
    $nimi = trim($_POST['nimi'] ?? '');
    $salasana = trim($_POST['salasana'] ?? '');
    $rooli = trim($_POST['rooli'] ?? '');

    if (empty($id) || empty($nimi) || empty($salasana) || empty($rooli)) {
        echo "Kaikki kentät ovat pakollisia.";
        exit;
    }

    try {
        $sql = "UPDATE kayttajat SET nimi = :nimi, salasana = :salasana, rooli = :rooli WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nimi', $nimi, PDO::PARAM_STR);
        $stmt->bindParam(':salasana', $salasana, PDO::PARAM_STR);
        $stmt->bindParam(':rooli', $rooli, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: users.php");
    } catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
        exit;
    }
}
?>