<?php
class Mahasiswa {
  public $nama;

  public function get_details() {
    echo "Nama: " . $this->nama . ".";
  }
}

$apple = new Mahasiswa();
$apple->nama = "Budi"; // Bisa diakses langsung
$apple->get_details();
?>