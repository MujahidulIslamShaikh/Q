<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['address', 'created_at'];

}

?>