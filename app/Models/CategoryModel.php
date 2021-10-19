<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idKategori';
    protected $allowedFields = ['nama'];
}?>