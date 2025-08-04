<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PrivacyPolicyModel extends Model
    {
        protected $table = 'privacy_policy';
        protected $primaryKey = 'id'; 
        protected $allowedFields = ['policy', 'created_at'];

    }

?>