<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table = 'enquiry';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['name', 'email', 'mobile', 'subject', 'message', 'created_at'];

}

?>