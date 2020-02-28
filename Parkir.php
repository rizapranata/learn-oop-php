<?php

class Parkir {
    private $perjam_awal = 2000;
    private $perjam_berikut = 500;
    private $total_tarif;
    private $lama_parkir;
    private $jam_masuk;
    private $jam_keluar;

    public function __construct($jam_masuk, $jam_keluar){
        $this->jam_masuk = (integer) $jam_masuk;
        $this->jam_keluar = (integer) $jam_keluar;
    }

    public function getLamaParkir(){
        return $this->lama_parkir;
    }

    public function getTarif(){
        $masuk = 0; $kluar = 0; $bayar = 0; $lama =0;
        $masuk =  $this->jam_masuk;
        $keluar = $this->jam_keluar;

        // cari lama parkit=r
        if ($kluar > $masuk) {
            $lama = $kluar - $masuk;
        }else{
            $lama = (12 - $masuk) + $kluar;
        }
        // hitung biaya
        if ($lama > 2) {
            $bayar = $this->perjam_awal + ($lama - 2) * $this->perjam_berikut;
        }else{
            $bayar = $this->perjam_awal;
        }
        $this->lama_parkir = $lama;
        return $bayar;
    }
}
