<?php
mysqli_report(MYSQLI_REPORT_STRICT);

// Buat format tanggal hari ini
$sekarang = new DateTime('now',new DateTimeZone('Asia/Jakarta'));
$timestamp = $sekarang->format("Y-md H:i:s");

try {
    $mysqli = new mysqli("localhost", "root","","ilkom");

    // Tampilkan isi table sebelum transaction
    echo "<h3>Sebelum Transaaction</h3>";
    $result = $mysqli->query("SELECT * FROM barang");
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo $row[0]." | ".$row[1]. " | ".$row[2]. " | ".$row[3]. " | ".$row[4];
        echo "<br>";
    }
    echo "<hr>";

    // Mulai Transaction
    $mysqli->begin_transaction();
    $mysqli->query("DELETE FROM barang WHERE id_barang = 2");
    $mysqli->query("DELETE FROM barang WHERE id_barang = 4");
    $mysqli->query("INSERT INTO barang VALUES (NULL, 'Sharp Microwave Oven R-728(K)',20,1250500,'$timestamp')");

    // Tampilkan isi table selama transaction 
    echo "<h3>Di dalam transaction</h3>";
    $result = $mysqli->query("SELECT * FROM barang");
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo $row[0]." | ".$row[1]. " | ".$row[2]. " | ".$row[3]. " | ".$row[4];
        echo "<br>";
    }
    echo "<hr>";


    // Batalkan Query Transaction
    $mysqli->rollback();

    // tampilkan isi tabel di setelah transaction
    echo "<h3>Setelah transaction</h3>";
    $result = $mysqli->query("SELECT * FROM barang");
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo $row[0]." | ".$row[1]. " | ".$row[2]. " | ".$row[3]. " | ".$row[4];
        echo "<br>";
    }
} catch (Execption $e) {
    echo "Koneksi / Query bermasalah: ".$e->getMessage(). " (". $e->getCode() .") ";
}
finally {
    if (isset($mysqli)) {
        $mysqli->close();
    }
}