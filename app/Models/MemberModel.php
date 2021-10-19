<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'anggota';
    protected $allowedFields = ['nama', 'password'];
}
