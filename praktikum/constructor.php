<?php 
//constructor adalah method spesial didalam class yang dipanggil otomatis setiap kali objeck baru dibuat dari class dengan keyword "New"
//Method constructor diawali oleh tanda underscore __


Class Mahasiswa{

//properti mahasiswa
public $nim;
public $nama;

//method set nama
function __construct($nim, $nama){
	$this->nim = $nim;
	$this->nama = $nama;

}

function get_details(){

	echo "$this->nim "."$this->nama";
}
}

//parameter nim dan nama dapat langsung diisi pada saat object dibuat tanpa menggunakan method set_details()
$budi = New Mahasiswa('080826','Budi');
$budi->get_details();



 ?>