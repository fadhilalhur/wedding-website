<?php

namespace App\Models;
use CodeIgniter\Model;

class ImageSliderModel extends Model
{
    protected $table = 'image_slider';
    protected $primaryKey = 'id';
    protected $allowedFields = ['image', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
