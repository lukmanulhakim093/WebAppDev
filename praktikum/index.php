<?php

Class Mahasiswa{

//properti mahasiswa
public $nim;
public $nama;

//method set nama
function set_details($nim, $nama){
	$this->nim = $nim;
	$this->nama = $nama;

}

function get_details(){

	echo "$this->nim "."$this->nama";
}
}

$budi = New Mahasiswa();
$budi->set_details('080826','Budi');
$budi->get_details();

//Mengecek apakah budi merupakan instance dari class Mahasiswa
var_dump($budi instanceof Mahasiswa);
