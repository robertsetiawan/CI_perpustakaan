<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = ['idtransaksi', 'idbuku'];
    protected $allowedFields = ['tgl_kembali', 'denda'];

    protected $validationRules = [
        'denda' => 'required',
        'tgl_kembali' => 'required',
    ];
}
