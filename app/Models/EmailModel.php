<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table = 'email';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['email', 'created_at'];

}

?>