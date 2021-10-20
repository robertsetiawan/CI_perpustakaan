<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'idbuku';
    protected $allowedFields = ['isbn', 'judul', 'idkategori', 'pengarang', 'penerbit', 'kota_terbit', 'editor', 'file_gambar', 'tgl_insert', 'tgl_update', 'stok', 'stok_tersedia'];

    protected $validationRules = [
        'isbn' => 'required',
        'judul' => 'required',
        'idkategori' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'kota_terbit' => 'required',
        'editor' => 'required',
        'file_gambar' => 'required',
        'tgl_insert' => 'required',
        'tgl_update' => 'required',
        'stok' => 'required',
        'stok_tersedia' => 'required',
    ];
}
