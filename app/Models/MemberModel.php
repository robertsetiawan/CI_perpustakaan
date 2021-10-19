<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'anggota';
    protected $allowedFields = ['nim', 'nama',	'password', 'alamat', 'kota', 'email', 'no_telp'];
    
    protected $validationRules = [
        'nim' => 'required',
        'nama' => 'required',
        'password' => 'required',
        'alamat' => 'required',
        'kota' => 'required',
        'email' => 'required',
        'no_telp' => 'required',
    ];

    function getDueBook($nim){
        $query = $this->db->query(" SELECT b.judul, b.pengarang, p.tgl_pinjam, d.tgl_kembali, p.total_denda
        FROM peminjaman p INNER JOIN detail_transaksi d
        ON p.idtransaksi = d.idtransaksi INNER JOIN buku b
        ON d.idbuku = b.idbuku 
        WHERE p.nim = \"".$nim."\" ");

        $rows = $query->getResultArray();
                
        return $rows;
    }
}
