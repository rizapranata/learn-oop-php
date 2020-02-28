<?php

function foo($a){
    if ($a === 0) {
        throw new Exception("argumen tidak bisa di isi dengan angka nol");
    } elseif ($a < 0) {
        throw new Exception("argument \$a tidak bisa diisi angka negative");
    }else {
        return 1/$a;
    }
}

function bar($b){
    return foo($b);
}

function baz($b){
    return bar($b);
}

try {
    echo baz(-10);
} catch (Exception $e) {
    echo "\nError: <b>".$e->getMessage()."</b>\n";

    echo "\nTrace error: \n";

    foreach ($e->getTrace() as $value) {
        echo "Baris ke-" .$value ["line"];
        echo ", error di funtion ".$value ["function"];
        echo ", dengan argument ".$value ["args"][0]."\n";
    }
}