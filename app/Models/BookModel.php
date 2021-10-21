<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'idbuku';
    protected $allowedFields = ['isbn', 'judul', 'idkategori', 'pengarang', 'penerbit', 'kota_terbit', 'editor', 'file_gambar', 'tgl_insert', 'tgl_update', 'stok', 'stok_tersedia'];

    public $validationRules = [
        'isbn' => 'required',
        'judul' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'kota_terbit' => 'required',
        'editor' => 'required',
        'stok' => 'required|greater_than[-1]',
    ];

    public $errorMessage = [
        'isbn' => [
            'required' => 'ISBN harus diisi',
        ],
        'judul' => [
            'required' => 'Judul buku harus diisi'
        ],
        'pengarang' => [
            'required' => 'Nama Pengarang harus diisi'
        ],
        'penerbit' => [
            'required' => 'Nama Penerbit harus diisi'
        ],
        'kota_terbit' => [
            'required' => 'Kota terbit harus diisi'
        ],
        'editor' => [
            'required' => 'Nama Editor harus diisi'
        ],
        'stok' => [
            'required' => 'Stok harus diisi',
            'greater_than' => 'Jumlah stok tidak boleh negatif'
        ]
    ];

    public function getAvailableBookAndCategory()
    {
        $query = $this->db->query("SELECT * FROM buku b INNER JOIN kategori k ON b.idkategori = k.idKategori WHERE b.stok_tersedia > 0;");

        return $query->getResultArray();
    }

    public function getAllBookAndCategory()
    {
        $query = $this->db->query("SELECT * FROM buku b INNER JOIN kategori k ON b.idkategori = k.idKategori;");

        return $query->getResultArray();
    }

    public function getAllBookAndCategoryById($id)
    {
        $query = $this->db->query("SELECT * FROM buku b INNER JOIN kategori k ON b.idkategori = k.idKategori WHERE k.idKategori=" . $id . ";");

        return $query->getResultArray();
    }

    public function getDeletedBookByCategory($id)
    {
        $query = $this->db->query("SELECT b.judul, k.nama FROM buku b INNER JOIN kategori k ON b.idkategori = k.idKategori WHERE k.idKategori=" . $id . ";");

        return $query->getResultArray();
    }
}
