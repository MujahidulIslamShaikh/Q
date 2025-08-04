<?php

namespace App\Models;

use CodeIgniter\Model;

class IssueModel extends Model
{
    protected $table = 'issue';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['title', 'image', 'created_at'];

}

?>