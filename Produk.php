<?php

class Produk {
    private $merek;
    private $harga;
    private $cc;

    public function __construct($merek, $harga, $cc){
        $this->merek = $merek; 
        $this->harga = $harga;
        $this->cc = $cc;
    }

    public function tampilHargaMotor($motor){
        return "Motor " . $motor->merek . ", harga " . number_format($motor->harga). ", Besar cc $motor->cc";
    }
}