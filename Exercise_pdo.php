<?php
try {

    $pdo = new PDO("mysql:host=localhost;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // create database ilkom
    $query = "CREATE DATABASE IF NOT EXISTS ilkom";
    $result = $pdo->exec($query);
    if ($result !== FALSE) {
        echo "Database berhasil di buat <br>";
    }

    $query = "USE ilkom";
    $result = $pdo->exec($query);
    if ($result !== FALSE) {
        echo "Database berhasil di Pilih<br>";
    }

    // Drop table jika sudah ada
    $query = "DROP TABLE IF EXISTS mahasiswa";
    $result = $pdo->exec($query);
    if ($result === FALSE) {
        echo "Table gagal di hapus<dr>";
    }

    // buat table mahasiswa jika belum ada
    $query = "CREATE TABLE IF NOT EXISTS mahasiswa (
            id_mhs INT PRIMARY KEY AUTO_INCREMENT,
            nim VARCHAR(20),
            tempat_lahir VARCHAR(50),
            tanggal_lahir DATE,
            fakultas VARCHAR(50),
            jurusan VARCHAR(50),
            ipk DEC,
            tanggal_update TIMESTAMP
    )";
    $result = $pdo->exec($query);
    if ($result !== FALSE) {
        echo "Table berhasil dibuat<br>";
    }

    // isi table mahasiswa 
    $sekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $timestamp = $sekarang->format('Y-m-d H:i:s');

    $query = "INSERT INTO mahasiswa
        (nim, tempat_lahir, tanggal_lahir, fakultas, jurusan, ipk, tanggal_update) VALUES 
        ('1710114000','Brebes','1994-03-12','Teknik','Teknik Informatika',3.35, '$timestamp'),
        ('1710114001','Jakarta','1998-11-20','Managent','Ekonomi',3.99, '$timestamp');
        ";
    $result = $pdo->exec($query);
    if ($result !== FALSE) {
        echo "Table berhasil di isi";
    }

} catch (PDOException $e) {
    echo "Koneksi bermasalah: ".$e->getMessage(). " (".$e->getCode().")";
}
finally{
    $pdo = NULL;
}