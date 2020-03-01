<?php

// class Produk {
//     private $merek;
//     private $harga;
//     private $cc;

//     public function __construct($merek, $harga, $cc){
//         $this->merek = $merek; 
//         $this->harga = $harga;
//         $this->cc = $cc;
//     }

//     public function tampilHargaMotor($motor){
//         return "Motor " . $motor->merek . ", harga " . number_format($motor->harga). ", Besar cc $motor->cc";
//     }
// }

function createtable($tableName, $field)
{
    $query = "CREATE TABLE {$tableName} (";
    foreach ($field as $key => $value) {
        $query .= "$value, ";
    }
    $query = substr($query, 0, -2).")";
    echo $query;
}

createTable(
    'user',
    [
        'id_user INT PRIMARY KEY AUTO_INCREMENT',
        'username VARCHAR(50)',
        'email VARCHAR(50)',
        'password VARCHAR(225)'
    ]
);