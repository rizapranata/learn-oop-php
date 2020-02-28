<?php
try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=ilkom;charset=utf8mb4", "root","");
} catch (\PDOException $e) {
    echo "Koneksi / Query bermasalah: ".$e->getMessage(). " (".$e->getCode().")";
}
finally {
    $pdo = NULL;
}