<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class TestimonialModel extends Model
    {
        protected $table = 'testimonial';
        protected $primaryKey = 'id'; 
        protected $allowedFields = ['user_name', 'description', 'created_at'];

    }

?>