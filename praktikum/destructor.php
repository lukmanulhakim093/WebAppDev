<?php

Class Mahasiswa{

//properti mahasiswa
public $nim;
public $nama;

//method set nama
function __construct($nim, $nama){
	$this->nim = $nim;
	$this->nama = $nama;

}

function __destruct(){

	echo "$this->nim "."$this->nama";
}
}

$budi = new Mahasiswa('080826','Budi');