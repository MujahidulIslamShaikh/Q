<?php

namespace App\Models;
use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['brand_id', 'model_id', 'title', 'image', 'main_price', 'discounted_price', 'percent_off', 'description', 'created_at'];

}

?>