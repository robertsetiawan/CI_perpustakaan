<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = ['idtransaksi', 'idbuku'];
    protected $allowedFields = ['idtransaksi','idbuku','tgl_kembali', 'denda'];

    protected $validationRules = [
        'denda' => 'required',
    ];

    public function getAllTransaction()
    {
        $query = $this->db->query('SELECT p.idtransaksi, p.nim, b.judul, p.tgl_pinjam, d.tgl_kembali FROM peminjaman p INNER JOIN detail_transaksi d ON p.idtransaksi = d.idtransaksi INNER JOIN buku b ON d.idbuku = b.idbuku WHERE d.tgl_kembali IS NOT NULL');
        $rows = $query->getResultArray();

        return $rows;
    }

    public function updateTransaction($idtransaksi, $idbuku)
    {
        $this->db->transBegin();

        $this->db->query('UPDATE detail_transaksi SET tgl_kembali = NOW() WHERE idtransaksi = ' . $idtransaksi . ' AND idbuku = ' . $idbuku);

        $this->db->query('UPDATE buku SET stok_tersedia = stok_tersedia + 1 WHERE idbuku = ' . $idbuku);

        $this->db->query('UPDATE peminjaman SET total_denda = (SELECT SUM(denda) FROM detail_transaksi WHERE idtransaksi = ' . $idtransaksi . ' GROUP BY idtransaksi) WHERE idtransaksi = ' . $idtransaksi);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
        }
    }

    public function updateTransactionFine($idtransaksi, $idbuku)
    {
        $this->db->transBegin();

        $this->db->query('UPDATE detail_transaksi SET tgl_kembali = NOW() WHERE idtransaksi = ' . $idtransaksi . ' AND idbuku = ' . $idbuku);

        $this->db->query('UPDATE detail_transaksi SET denda = (SELECT (d.tgl_kembali - (p.tgl_pinjam + 14)) * 1000 FROM peminjaman p, detail_transaksi d  WHERE d.idtransaksi = 1 AND d.idbuku = 3) WHERE detail_transaksi.idtransaksi = ' . $idtransaksi . ' AND detail_transaksi.idbuku = ' . $idbuku);

        $this->db->query('UPDATE buku SET stok_tersedia = stok_tersedia + 1 WHERE idbuku = ' . $idbuku);

        $this->db->query('UPDATE peminjaman SET total_denda = (SELECT SUM(denda) FROM detail_transaksi WHERE idtransaksi = ' . $idtransaksi . ' GROUP BY idtransaksi) WHERE idtransaksi = ' . $idtransaksi);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
        }
        // test
    }

    public function insertBorrowedBook($idtransaksi, $nim, $idpetugas, $books)
    {
        $this->db->transBegin();

        $this->db->query('INSERT INTO peminjaman (idtransaksi, nim, tgl_pinjam, total_denda, idpetugas) VALUES ('.$idtransaksi.', '.$nim.', NOW(), 0, '.$idpetugas.') ');
        
        foreach ($books as $id){
            $this->db->query('INSERT INTO detail_transaksi (idtransaksi, idbuku, tgl_kembali, denda) VALUES ('.$idtransaksi.', '.$id.', NULL, 0) ');
            $this->db->query('UPDATE buku SET stok_tersedia = stok_tersedia - 1 WHERE idbuku = ' . $id);
        }

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
        }
        // test
    }
}
