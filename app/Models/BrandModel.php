<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['title', 'image', 'description', 'order_number', 'created_at'];

}

?>