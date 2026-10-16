<?php

/*
class Mahasiswa1 {
  protected $nama;

  public function get_details() {
    echo "Nama: " . $this->nama . ".";
  }
}

$apple = new Mahasiswa1();
$apple->nama = "Budi"; // Error: tidak bisa mengakses akses modifier protected $nama
$apple->get_details();

*/
//=============================CLASS Mahasiswa2==============================

class Mahasiswa2  {
  protected $nama;

  public function setIdentitas($nama) {
    $this->nama = $nama;
  }
}

class Budi extends Mahasiswa2 {
  public function getIdentitas() {
    echo "Nama: " . $this->nama . ".";
  }
}

$budi = new Budi();
$budi->setIdentitas("Budi");
//echo $apple->name; // Error: Cannot access protected property
echo $budi->getIdentitas(); // Output: Name: Apple.
?>