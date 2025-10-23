<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyVisiMisiModel extends Model
{
    protected $table      = 'company_visi_misi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['misi', 'visi', 'tagline', 'nilai_inti', 'deleted'];
}