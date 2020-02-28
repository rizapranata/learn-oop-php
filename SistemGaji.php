<?php

class SistemGaji {
    private $golongan;
    private $upahPerJam;
    private $banyakJam;
   
    public function __construct($gol,$banyakJam){
        $this->golongan = $gol;
        $this->banyakJam = $banyakJam;
    }
    public function setGolongan(){
        $gol = 0;
        $gol = $this->golongan;
        switch ($gol) {
            case 1:
                $this->upahPerJam = 3000;
                break;
            case 2:
                $this->upahPerJam = 3500;
                break;
            case 3:
                $this->upahPerJam = 4000;
                break;
            case 4:
                $this->upahPerJam = 5000;
                break;
            default:
                echo "Maaf!! Golongan yg anda input tidak tersedia.";
                break;
        }
        return $this->upahPerJam;
    }

    public function hitungGaji(){
        $hitungNonLembur = 0; $hitungLembur = 0; $totalGaji;
        $upahLemburPerJam = 0; $setengahUpah = 0; $jamLembur =0;

        if ($this->banyakJam <= 40) {
            $totalGaji = $this->banyakJam * $this->setGolongan(); 
        }elseif($this->banyakJam > 40){
            $setengahUpah = $this->setGolongan() / 2;
            $upahLemburPerJam = $setengahUpah + $this->setGolongan();
            $jamLembur = $this->banyakJam - 40;
            $hitungLembur = $upahLemburPerJam * $jamLembur;
            $totalGaji = (($this->banyakJam - $jamLembur ) * $this->setGolongan()) + $hitungLembur; 
            // $hitungLembur = $this->banyakJam * $upahLembur ;
        }
        return $totalGaji;
    }

    public function rincianGajiPegawai(){
        echo "Golongan : " . $this->golongan . "\n";
        echo "Upah/jam : Rp." . $this->setGolongan() . "\n";
        echo "Total Upah : Rp.". $this->hitungGaji();
    }
}