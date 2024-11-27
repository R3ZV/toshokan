<?php

// $ENV vars
require_once("config/config.php");

$DB_HOST = $ENV["DB_HOST"];
$DB_NAME = $ENV["DB_NAME"];
$DB_PASSWORD = $ENV["DB_PASSWORD"];
$DB_USER = $ENV["DB_USER"];

$pdo = null;
try {
    $pdo = new PDO(
       'mysql:host=' . $DB_HOST . ';port=3306;dbname=' . $DB_NAME,
       $DB_USER,
       $DB_PASSWORD
    );
}
catch(PDOException $err) {
    echo $err->getMessage() . "<br>";

    echo 'mysql:host=' . $DB_HOST . ';port=3306;dbname=' . $DB_NAME . "<br>";
    echo $DB_USER . "<br>";
    echo $DB_PASSWORD . "<br>";
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
