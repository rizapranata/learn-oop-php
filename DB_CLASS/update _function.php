<?php

function update($tableName, $data, $condition){
    $query = "UPDATE {$tableName} SET ";
    foreach ($data as $key ) {
        $query .= "$key = ?, " ;
    }
    echo $query;
}

update('barang',
    ['nama_barang' => 'Smartphone iPhone XR',
    'harga_barang' => 17999000],
    ['id_barang','=',5]);
