<?php
require 'Input.php';

$error = [];

if (!empty($_POST)) {
    function check_required($item, $itemLabel) {
        $formValue = Input::get($item);

        global $error;
        if (empty($formValue)) {
            $error[] = "$itemLabel tidak boleh kosong";
        }
    }

    function check_min_char($item, $itemLabel, $ruleValue){
        $formValue = Input::get($item);

        global $error;
        if (strlen($formValue) < $ruleValue) {
            $error[] = "$itemLabel minimal $ruleValue karakter";
        }
    }

    check_required('nama barang','Nama Barang');
    check_required('jumlah_barang', 'Jumlah Barang');
    check_required('harga_barang', 'Harga Barang');

    // check_min_char('nama_barang','Nama_Barang',5);
}
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
                    value="<?= Input::get('nama_barang'); ?>">
                </div>
                <div>
                    <label for="jumlah_barang">Jumlah</label>
                    <input type="text" name="jumlah_barang"
                    value="<?= Input::get('jumlah_barang'); ?>">
                </div>
                <div>
                    <label for="harga_barang">Harga</label>
                    <input type="text" name="harga_barang"
                    value="<?= Input::get('harga_barang'); ?>">
                </div>
                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>
    </div>
</body>
</html>