<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class E_wasteModel extends Model
    {
        protected $table = 'e_waste_policy';
        protected $primaryKey = 'id'; 
        protected $allowedFields = ['policy', 'created_at'];

    }

?>