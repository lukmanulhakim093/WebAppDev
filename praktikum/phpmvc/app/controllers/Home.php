<?php 

// Membuat class Home sebagai halaman home
// Home adalah controller default yang dipanggil ketika root folder diakses dari URL
class Home extends Controller {

    // Method index digunakan sebagai method default
    public function index()
    {
        $data['kategori'] = $this->model('Kategori_model')->getKategori();
        $data['kursus'] = $this->model('Kursus_model')->getKursus();
        $this->view('home/index', $data);
    }
}
