<?php
require 'Input.php';
require 'Validate.php';

$error = [];

if (!empty($_POST)) {

    $validate = new Validate($_POST);

    $nama_barang = $validate->setRules('nama_barang','Nama Barang',[
        'sanitize' => 'string',
        'required' => true,
        'min_char' => 5,
    ]);

    $jumlah_barang = $validate->setRules('jumlah_barang','Jumlah Barang',[
        'required' => true,
        'numeric' => true,
        'min_value' => 0,
        'max_value' => 110,
    ]);

    $harga_barang = $validate->setRules('harga_barang','Harga Barang',[
        'required' => true,
        'numeric' => true,
        'min_value' => 0,
    ]);

    if ($validate->passed()) {
        echo "Lolos Validasi!";
    }else {
        $error = $validate->getError();
    }
}

// if (!empty($_POST)) {
//     if (empty(Input::get('nama_barang'))) {
//         $error[] = "Nama barang tidak boleh kosong";
//     }
//     if (empty(Input::get('jumlah_barang'))) {
//         $error[] = "Jumlah barang tidak boleh kosong";
//     }
//     if (empty(Input::get('harga_barang'))) {
//         $error[] = "Harga barang tidak boleh kosong";
//     }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation Class</title>
    <style>
        .container{
            margin: 40 auto;
            width: 500px;
        }
        form > div{
            margin: 15px 0;
        }
        label {
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Barang</h2>
        <div class="pesan-error">
            <ul>
                <?php
                    foreach ($error as $value) {
                        echo "<li>$value</li>";
                    }
                ?>
            </ul>
        </div>
            <form action="" method="POST">
                <div>
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" 
                    value="<?= Input::get('nama_barang') ?>">
                </div>
                <div>
                    <label for="jumlah_barang">Jumlah</label>
                    <input type="text" name="jumlah_barang"
                    value="<?= Input::get('jumlah_barang') ?>">
                </div>
                <div>
                    <label for="harga_barang">Harga</label>
                    <input type="text" name="harga_barang"
                    value="<?= Input::get('harga_barang') ?>">
                </div>
                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>
    </div>
</body>
</html>