<?php

mysqli_report(MYSQLI_REPORT_STRICT);

try {
    $mysqli = new mysqli("localhost","root","","ilkom");

    // Proses prepare
    $stmt = $mysqli->prepare("SELECT * FROM barang WHERE id_barang = ? ");

    // Proses bind
    $id_barang = 5;
    $stmt->bind_param("i", $id_barang);

    // Proses execute
    $stmt->execute();

    // Proses menampilkan hasil query
    $result = $stmt->get_result();
    if ($mysqli->error) {
        throw new Exception($mysqli->error, $mysqli->errno);
    }else {
        while ($row = $result->fetch_assoc()) {
            echo $row['id_barang'];     echo " | ";
            echo $row['nama_barang'];   echo " | ";
            echo $row['jumlah_barang']; echo " | ";
            echo $row['harga_barang'];  echo " | ";
            echo $row['tanggal_update'];
            echo "<br>"; 
        }
    }

    // Hapus memory dan tutup prepares statement
    $stmt->free_result();
    $stmt->close();

} catch (Exception $e) {
    echo "Koneksi / Query bermasalah: ".$e->getMessage(). " (" .$e->getCode().")";
}
finally {
    if (isset($mysqli)) {
        $mysqli->close();
    }
}