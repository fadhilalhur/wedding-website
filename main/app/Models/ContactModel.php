<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact'; // nama tabel kamu
    protected $allowedFields = ['name', 'email', 'subject', 'message'];
    protected $useTimestamps = true; // jika tabel memiliki kolom created_at dan updated_at
}
