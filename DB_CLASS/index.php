<?php
require 'DB.php';

$DB = DB::getInstance();

// $result = $DB->runQuery('SELECT * FROM barang');
// $tabelBarang = $result->fetchAll(PDO::FETCH_OBJ);

// $query = "INSERT INTO barang (nama_barang, jumlah_barang, harga_barang) VALUES
//         (?,?,?);
// ";
// $arr = ['Cosmos CRJ-8229 - Rice Cooker',4,299000];

// // jalankan proses insert
// $DB->runQuery($query, $arr);\

// =======================================================================
// // tampil semua data barang
// $result = $DB->runQuery("SELECT * FROM barang");
// $tabelBarang = $result->fetchAll(PDO::FETCH_OBJ);

// =======================================================================
// tampilkan semua data di table barang
// $tabelBarang = $DB->getQuery('SELECT * FROM barang WHERE id_barang = ?',[2]);

// =======================================================================
// tampilkan sesuai kolom
//$tabelBarang = $DB->select('nama_barang,harga_barang')->get('barang');

// =======================================================================
// Method OrderBy dengan cara method chining
// $tabelBarang = $DB->select('id_barang, nama_barang')
//                   ->orderBy('id_barang','DESC')
//                   ->get('barang');

// =======================================================================
// Method OrderBy dengan condition
// $tabelBarang = $DB->select('harga_barang, nama_barang')
//                   ->orderBy('harga_barang','DESC')
//                   ->get('barang','WHERE harga_barang > ?', [5000000]);

// =======================================================================
// method getWhere
// $tabelBarang = $DB->select('nama_barang,jumlah_barang')
//                   ->getWhere('barang',['id_barang','=',5]);

// =======================================================================
// method getWhereOnce untuk menampilkan hanya satu data
// $tabelBarang = $DB->getWhereOnce('barang',['id_barang','=',5]);
// echo $tabelBarang->nama_barang;

// =======================================================================
// method getLike untuk pencarian
// $tabelBarang = $DB->select('nama_barang,id_barang')
//                   ->getLike('barang','nama_barang','%t%');

// =======================================================================
// method ceck untuk memerikasa apakah ada data di table tertentu
// $result = $DB->check('barang','id_barang','4');

// =======================================================================
// method insert untuk menginput data
// $DB->insert('barang',[
//     'nama_barang' => 'Philips Blender HR 2157',
//     'jumlah_barang' => 11,
//     'harga_barang' => 629000
// ]);

// // tampilkan semua table barang
// $tabelBarang = $DB->get('barang');

// =======================================================================
// method update() 
$DB->update('barang',
            ['nama_barang' => 'Smartphone iPhone XR',
            'harga_barang' => 17999000],
            ['id_barang' , '=', 5]);
// tampilkan semua data di table barang
$tabelBarang = $DB->getWhere('barang',['id_barang', '=', 5]);

echo "<pre>";
print_r($tabelBarang);
echo "</pre>";
