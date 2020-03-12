<?php
require '../validation/Input.php';
require '../validation/Validate.php';

$errors = [];

if (!empty($_POST)) {
    $validate = new Validate($_POST);

    $cb_code_igniter = $validate->setRules('cb_code_igniter', 'Code Igniter', [
        'sanitize' => 'string',
        'required' => true,
        'regexp' => '/^Code Igniter$/',
    ]);

    print_r($_POST);

    if ($validate->passed()) {
        echo "<p>Lolos Validasi</p>";
    } else {
        $errors = $validate->getError();
        // var_dump($errors);
    }
}

$check_code_igniter = Input::get('cb_code_igniter') === 'Code Igniter' ? 'checked' : '';
$check_laravel = Input::get('cb_laravel') === 'Laravel' ? 'checked' : '';
$check_symfony = Input::get('cb_symfony') === 'Symfony' ? 'checked' : '';
$check_zend = Input::get('cb_zend') === 'Zend' ? 'checked' : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Latihan</title>
    <style>
        .container {
            margin: 40px auto;
            width: 500px;
        }

        form>div {
            margin: 15px 0;
        }

        label {
            display: inline-block;
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" class="post" method="POST">
            <div>
                <label>Pilihan Anda : </label>
                <div>
                    <label for="">
                        <input type="checkbox" name="cb_code_igniter" value="Code igniter" <?= $check_code_igniter; ?>>Code Igniter
                    </label>
                </div>
                <div>
                    <label for="">
                        <input type="checkbox" name="cb_laravel" value="Laravel" <?= $check_laravel; ?>>Laravel
                    </label>
                </div>
                <div>
                    <label for="">
                        <input type="checkbox" name="cb_symfony" value="Symfony" <?= $check_symfony; ?>>Symfony
                    </label>
                </div>
                <div>
                    <label for="">
                        <input type="checkbox" name="cb_zend" value="Zend" <?= $check_zend; ?>>Zend
                    </label>
                </div>
            </div>
            <div>
                <input type="submit" value="Submite" name="submit">
            </div>
        </form>
    </div>
</body>

</html>