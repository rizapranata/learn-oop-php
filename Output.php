<?php

require_once 'Database.php';
require_once 'Produk.php';
require_once 'Parkir.php';
require_once 'SistemGaji.php';

// sistem parkir -------------------
$gaji = new SistemGaji(7, 45);// 1. gol, 2 bnyak jam
$gaji->rincianGajiPegawai();

// $obj = new Database();
// $obj->select('name ')
//     ->from('siswa ')
//     ->where('nim="123456"');

// echo $obj->getQuery();
// echo "\n\n";

// $motor = new Produk('Yamaha',12000000,'150cc');
// echo $motor->tampilHargaMotor($motor);

// sistem parkir--------------------
// $parkir = new Parkir(10 , 3);
// $hasil = $parkir->getTarif();
// $lama = $parkir->getLamaParkir();
// echo "Lama Parkir  : $lama jam";
// echo "\n";
// echo "Biaya Parkir : Rp.$hasil.00";
