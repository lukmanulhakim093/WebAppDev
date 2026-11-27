<?php

// Controller ini dipanggil ketika tombol "Lihat Semua Kursus" diklik
class Jelajahi_kursus extends Controller {

    // Method index dijalankan otomatis ketika Controller Jelajahi_kursus diakses dari URL atau pada tombol
    public function index()
    {

                        
        // Ambil data kursus dari model
        $data['kursus_list'] = $this->model('Jelajahi_model')->getJelajahiKursus();

        
        // Ambil session pengguna
        $data['user_id'] = $_SESSION['user_id'] ?? null;

        $data['role'] = $_SESSION['role'] ?? null;

        
        // Ambil keyword
        $data['keyword'] = trim($_GET['keyword'] ?? '');


        // Panggil View
        $this->view('jelajahi/kursus', $data);

    }

}
