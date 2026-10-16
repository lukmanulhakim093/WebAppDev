<?php

/*
class Mahasiswa {
  private $nama;

  public function get_details() {
    echo "Nama: " . $this->nama . ".";
  }
}

$budi = new Mahasiswa();
$budi->nama = "Budi"; // Error: Cannot access private property
$budi->get_details();

*/


class Mahasiswa {
    private $nama;

    // Mengisi nilai property
    public function set_nama($nama) {
        $this->nama = $nama;
    }

    // Mengambil dan menampilkan nilai property
    public function get_details() {
        echo "Nama: " . $this->nama . ".";
    }
}

$budi = new Mahasiswa();

// Mengisi property melalui method public
$budi->set_nama("Budi");

// Menampilkan nilai property
$budi->get_details();


?>