<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['title', 'image', 'description', 'created_at'];

    // Enable Pagination
    // protected $useTimestamps = true;

}

?>