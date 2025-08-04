<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['image', 'title', 'created_at'];

}

?>