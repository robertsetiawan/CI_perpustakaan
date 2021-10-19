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
}
