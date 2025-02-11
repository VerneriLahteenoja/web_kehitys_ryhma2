<?php
    include "settings.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$username || !$password) {
        echo "Käyttäjänimi tai salasana puuttuu.";
        exit();
    }

    if (!is_string($username) || !is_string($password)) {
        echo "Käyttäjänimi tai salasana ei ole merkkijono.";
        exit();
    }

    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $username = trim($username);
    $password = trim($password);

    try {
        $sql = "SELECT * FROM kayttajat WHERE nimi = ? AND salasana = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        $logged_user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        session_start();
        $_SESSION['logged_user'] = $logged_user;
        
    } catch (PDOException $e) {
        echo "Virhe: " . $e->getMessage();
        exit();
    }


?>