<?php

$dsn = 'myspl:host=localhost;dbname=db;charset=utf8';
$user = 'root';
$pass = 'hgs>xIdCK5i.#';

try {
    $dbh = new PDO($dns,$uer,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo '接続成功';
    $dbh = null;
} catch(PDOException $e) {
    echo '接続失敗'. $e->getMessage();
    exit();
};

?>
