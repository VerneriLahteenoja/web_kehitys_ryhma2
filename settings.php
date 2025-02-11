<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$palvelin = "localhost";
$kayttajatunnus = "trtkm24a_2";
$salasana = "KRigtEn4";
$tietokanta = "wp_trtkm24a_2";

try {
    $pdo = new PDO("mysql:host=$palvelin;dbname=$tietokanta", $kayttajatunnus, $salasana);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "<p>Yhteys epäonnistui</p><p>" . $e->getMessage() . "</p>";
    }


function preparedQuery($sql,$params) {
    for ($i=0; $i<count($params); $i++) {
      $sql = preg_replace('/\?/',$params[$i],$sql,1);
    }
    return $sql;
}
?>