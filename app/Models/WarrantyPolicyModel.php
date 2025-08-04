<?php

namespace App\Models;

use CodeIgniter\Model;

class WarrantyPolicyModel extends Model
{
    protected $table = 'warranty_policy';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['warranty_policy', 'created_at'];

}

?>