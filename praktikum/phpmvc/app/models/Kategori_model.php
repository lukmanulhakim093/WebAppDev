<?php 

// Membuat class Kategori_model yang dipanggil oleh controller Home
Class Kategori_model{
	private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}

 ?>
