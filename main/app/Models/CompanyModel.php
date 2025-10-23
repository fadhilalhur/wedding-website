<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'logo',
        'tagline',
        'address',
        'email',
        'phone',
        'sosmed_ig',
        'sosmed_youtube',
        'sosmed_tiktok',
        'sosmed_facebook',
        'maps_location',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
}
