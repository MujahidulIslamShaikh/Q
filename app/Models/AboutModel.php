<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class AboutModel extends Model
    {
        protected $table = 'about_us';
        protected $primaryKey = 'id'; 
        protected $allowedFields = ['about_us', 'created_at'];

    }

?>