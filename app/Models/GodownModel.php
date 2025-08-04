<?php

namespace App\Models;

use CodeIgniter\Model;

class GodownModel extends Model
{
    protected $table = 'Godown_Products';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name', 'email', 'mobile', 'subject', 'message', 'created_at'];

}

?>