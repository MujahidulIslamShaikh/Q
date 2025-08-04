<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['user_id', 'service_id', 'other_service', 'other_brand', 'other_model', 'created_at'];

}

?>