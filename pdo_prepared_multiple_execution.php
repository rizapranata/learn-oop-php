<?php

// Buat format tanggal hari ini
$sekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$timestamp = $sekarang->format("Y-m-d H:i:s");

$pdo = new PDO("mysql:host=localhost;dbname=ilkom", "root", "");

$query = "INSERT INTO barang (nama_barang, jumlah_barang, harga_barang, tanggal_update) VALUES (:nama,:jumlah,:harga,:tanggal)";

$stmt = $pdo->prepare($query);

// Input data 1
$nama = "Cosmos CRJ-8229 - Rice Cooker";
$jumla = 4;
$harga = 299000;
$tanggal = $timestamp;

$stmt->execute(['nama'=>$nama, 'jumlah'=>4, 'harga'=>$harga,'tanggal'=>$tanggal]);

echo "Query ok, ".$stmt->rowCount()." baris berhasil di tambah <br>";

// Input data 2
$arr_input = [
    'nama'=> "Philips Blender HR 2157",
    'jumlah'=> 11,
    'harga'=> 629000,
    'tanggal'=> $timestamp
];

$stmt->execute($arr_input);
echo "Query ok, ".$stmt->rowCount()." baris berhasil di tambah <br>";

echo "<hr>";

// Tampilkan data barang
$query = "SELECT * FROM barang";
$stmt = $pdo->query($query);

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    echo $row[0]." | ".$row[1]. " | ".$row[2]. " | ".$row[3]. " | ".$row[4];
    echo "<br>";
}