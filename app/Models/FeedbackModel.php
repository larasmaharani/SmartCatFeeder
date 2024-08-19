<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    // protected $table = 'feedback';
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['tanggal', 'nama', 'komentar', 'label'];

    protected $table      = 'feedback';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = ['tanggal', 'nama', 'komentar', 'label'];

    // protected $useTimestamps = false;
   
}


