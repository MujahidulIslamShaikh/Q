<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id'; // Use the correct column name 'id012'
    protected $allowedFields = ['username', 'password', 'created_at'];

}
