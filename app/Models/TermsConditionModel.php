<?php

namespace App\Models;

use CodeIgniter\Model;

class TermsConditionModel extends Model
{
    protected $table = 'terms_condition';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['terms_condition', 'created_at'];

}

?>