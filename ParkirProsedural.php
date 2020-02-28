<?php


function parkir($in, $out){
    $perjam_awal = 2000;
    $perjam_lanjut = 500;
    $hasil = 0;
    $hasil = ($out - $in) * $perjam_lanjut + $perjam_awal - $perjam_lanjut;
    // if($in > $out){
    //     $hasil = ($out - $in) * $perjam_lanjut;
    // }elseif($in === 1 && $in > 0){
    //     $hasil = $perjam_awal;
    // }
    return $hasil;
}

echo parkir(7,10);