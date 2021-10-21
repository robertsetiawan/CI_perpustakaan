<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'idtransaksi';
    protected $allowedFields = ['nim', 'tgl_pinjam', 'total_denda', 'idpetugas'];

    protected $validationRules = [
        'nim' => 'required',
        'tgl_pinjam' => 'required',
        'total_denda' => 'required',
        'idpetugas' => 'required',
    ];

    public function getAllTransaction()
    {
        $query = $this->db->query('SELECT p.idtransaksi, p.nim, b.judul, d.idbuku, p.tgl_pinjam, d.tgl_kembali
        FROM peminjaman p INNER JOIN detail_transaksi d
        ON p.idtransaksi = d.idtransaksi INNER JOIN buku b
        ON d.idbuku = b.idbuku');
        $rows = $query->getResultArray();

        return $rows;
    }
}
