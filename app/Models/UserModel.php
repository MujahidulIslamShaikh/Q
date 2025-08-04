<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model
    {
        protected $table = 'user';
        protected $primaryKey = 'id'; 
        protected $allowedFields = ['user_id', 'name', 'mobile', 'other_mobile', 'email', 'address', 'city', 'landmark', 'otp', 'created_at'];

    }

?>