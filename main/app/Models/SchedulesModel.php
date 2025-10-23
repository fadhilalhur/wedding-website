<?php

namespace App\Models;

use CodeIgniter\Model;

class SchedulesModel extends Model
{
    protected $table = 'jadwal_dokter';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
    ];
}
