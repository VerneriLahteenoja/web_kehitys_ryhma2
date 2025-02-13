<?php

require 'settings.php';

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        if (isset($_POST['tuote_id'], $_POST['arvosana'], $_POST['kommentti']) && is_numeric($_POST['tuote_id']) && is_numeric($_POST['arvosana'])) {
        $tuote_id = intval($_POST['tuote_id']);
        $arvosana = intval($_POST['arvosana']);
        $kommentti = trim($_POST['kommentti']);

        if ($arvosana >= 1 && $arvosana <= 5 && !empty($kommentti) || empty($kommentti)) {
            $sql = "INSERT INTO arvostelut (tuote_id, arvosana, kommentti) VALUES (:tuote_id, :arvosana, :kommentti)";
            $stmt = $pdo->prepare($sql);
            $stmt -> execute (['tuote_id'=> $tuote_id, 'arvosana' => $arvosana, 'kommentti' => $kommentti]);
        echo ("Kiitos arvostelun jättämisestä! 😊");
        echo ("Palaat automaattisesti 5 sekunnin kuluttua takaisin katselemaasi tuotteeseen.");
        }
        header("Refresh: 5; URL= product.php?id=" . $tuote_id);
        exit();
    } else{
        die ("Virhe: väärä syöte.");
    }
}
?>

