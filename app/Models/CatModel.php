<?php

namespace App\Models;

use CodeIgniter\Model;

class CatModel extends Model
{
    protected $table = 'cat';
    protected $primaryKey = 'id';

    // Tentukan kolom-kolom yang diizinkan untuk diinsert atau update
    protected $allowedFields = ['nama', 'berat', 'gambar', 'user_id'];

}
