<?php
class Kampus {
    private string $nama_kampus;

    function __construct($nama_kampus) {
        $this->nama_kampus = $nama_kampus;
    }

    function getNamaKampus() {
        return $this->nama_kampus;
    }
}

class DosenWali extends Kampus {
    private string $nama_dosen;
    
    function __construct($nama_kampus, $nama_dosen) {
        parent::__construct($nama_kampus);
        $this->nama_dosen = $nama_dosen;
    }

    function getNamaDosen() {
        return $this->nama_dosen;
    }

}

class Mahasiswa {
    private string $nama_mahasiswa;

    function __construct($nama_mahasiswa) {
        $this->nama_mahasiswa = $nama_mahasiswa;
    }

    function getNamaMahasiswa() {
        return $this->nama_mahasiswa;
    }
}
$dosen = new DosenWali ("Politeknik Bhakti Semesta", "Rivort");
$mahasiswa = new Mahasiswa ("Firdaus Anesta Surya");

echo $mahasiswa->getNamaMahasiswa(). " sedang berkonsultasi dengan ".$dosen->getNamaDosen(). " mengurus KRS di lingkungan ".$dosen->getNamaKampus();
?>