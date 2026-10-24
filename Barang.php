<?php
class Barang {
    // Property
    public $kode;
    public $nama;
    public $jumlah;

    // Constructor: jalan otomatis saat objek dibuat
    public function __construct($kode, $nama, $jumlah) {
        $this->kode   = $kode;
        $this->nama   = $nama;
        $this->jumlah = $jumlah;
    }

    // Method: menampilkan format informasi barang
    public function tampilkanInfo() {
        return "[" . $this->kode . "] " . $this->nama . " - " . $this->jumlah . " unit";
    }
}