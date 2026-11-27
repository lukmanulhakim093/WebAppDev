<?php 

// Membuat class Kursus_model yang dipanggil oleh controller Home
Class Kursus_model{
	
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKursus()
    {
        $sql = "SELECT
        k.id,
        k.judul,
        k.deskripsi,
        k.gambar,
        kat.nama_kategori,

        COUNT(DISTINCT
            CASE
            WHEN p.status = 'aktif' THEN p.id
        END
        ) AS jumlah_peserta,

        COALESCE(AVG(u.rating), 0) AS rating

        FROM kursus k

        JOIN kategori kat
        ON k.kategori_id = kat.id

        LEFT JOIN pendaftaran p
        ON k.id = p.kursus_id

        LEFT JOIN ulasan u
        ON k.id = u.kursus_id

        WHERE k.status = 'aktif'
        AND kat.status = 'aktif'

        GROUP BY
        k.id,
        k.judul,
        k.deskripsi,
        k.gambar,
        kat.nama_kategori

        ORDER BY jumlah_peserta DESC

        LIMIT 3";

        $this->db->query($sql);
        return $this->db->resultSet();

    }
}

