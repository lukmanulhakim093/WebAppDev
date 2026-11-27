<?php

// Membuat class Jelajahi_model yang dipanggil dari controller Jelajahi_kursus
class Jelajahi_model {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getJelajahiKursus()
    {

       
        // Ambil session pengguna
        $user_id = $_SESSION['user_id'] ?? null;


        
        // Ambil keyword pencarian
        $keyword = trim($_GET['keyword'] ?? '');

        
        
        // Query utama
        $sql = "SELECT

                    k.id,
                    k.kode,
                    k.judul,
                    k.deskripsi,
                    k.gambar,
                    k.status,

                    kat.nama_kategori,
                    kat.icon,

                    u.nama AS nama_dosen,

                    (
                        SELECT COUNT(DISTINCT p.user_id)

                        FROM pendaftaran p

                        WHERE p.kursus_id = k.id

                        AND p.status IN ('aktif', 'selesai')

                    ) AS jumlah_mahasiswa";


        
        // Mengecek status pendaftaran
        if ($user_id) {

            $sql .= ",

                    (
                        SELECT p.status

                        FROM pendaftaran p

                        WHERE p.kursus_id = k.id

                        AND p.user_id = :user_id

                        ORDER BY p.id DESC

                        LIMIT 1

                    ) AS status_pendaftaran";

        } else {

            $sql .= ",NULL AS status_pendaftaran";

        }


        
        // Join table
        $sql .= "

                FROM kursus k

                LEFT JOIN kategori kat
                    ON k.kategori_id = kat.id

                LEFT JOIN users u
                    ON k.dosen_id = u.id

                WHERE k.status = 'aktif'";


        
        // Pencarian kursus

        if ($keyword !== '') {

            $sql .= "

                AND (

                    k.judul LIKE :keyword1

                    OR kat.nama_kategori LIKE :keyword2

                    OR u.nama LIKE :keyword3

                )";

        }


        
        // Urutkan data
        $sql .= " ORDER BY k.created_at DESC";


        // Siapkan query
        $this->db->query($sql);


        //Bind user id
        if ($user_id) {

            $this->db->bind(
                ':user_id',
                (int) $user_id,
                PDO::PARAM_INT
            );

        }


        // Bind keywords
        if ($keyword !== '') {

            $search = '%' . $keyword . '%';

            $this->db->bind(':keyword1', $search);

            $this->db->bind(':keyword2', $search);

            $this->db->bind(':keyword3', $search);

        }

        
        // Kembalikan data ke controller
        return $this->db->resultSet();
        
    }

}
