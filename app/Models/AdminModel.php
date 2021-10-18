<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'petugas';

    public $validationRules = [
        'nama' => 'required',
        'password' => 'required'
    ];

    public $error_message = [
        'nama' => [
            'required' => 'username harus diisi'
        ],
        'password' => [
            'required' => 'password harus diisi'
        ]
    ];

    public function getUserIdFromDatabase($name, $password)
    {
        $query = $this->db->query('SELECT idpetugas FROM petugas WHERE nama=' . $this->db->escape($name) . 'AND password=' . $this->db->escape(md5($password)));
        $row = $query->getRow();

        if (empty($row->idpetugas)) {
            return false;
        } else {
            return $row->idpetugas;
        }
    }
}
