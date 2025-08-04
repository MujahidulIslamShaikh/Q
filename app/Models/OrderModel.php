<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class OrderModel extends Model
    {
        protected $table = 'orders';
        protected $primaryKey = 'id'; 
        protected $allowedFields = ['user_id', 'repair_date', 'repair_time', 'repair_type', 'total_amount', 'status', 'reason_for_reschedule', 'cancel_reason', 'created_at'];

    }

?>