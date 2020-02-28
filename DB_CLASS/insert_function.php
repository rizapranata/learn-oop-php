<?php

function insert($tableName, $data){
    $dataKeys = array_keys($data);
    $dataValues = array_values($data);
    $placeholder = '('.str_repeat('?,', count($data)-1) . '?)';

    $result = "INSERT INTO {$tableName} (".implode(', ',$dataKeys).") VALUES {$placeholder}";

    echo $result;
    echo "\n";
    print_r($dataValues);
}


echo "\n";
echo insert('barang',[
    'username' => 'Andi',
    'email' => 'andi@gmail.com',
    'umur' => 15,
    'sekolah' => 'SMA N 7 lumut ijo',
    'alamat' => 'Jl. Perintis no 9'
]);


