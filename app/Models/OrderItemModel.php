<?php

namespace App\Models;
use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['order_id', 'service_id', 'other_service', 'other_brand', 'other_model', 'amount', 'created_at'];

}

?>