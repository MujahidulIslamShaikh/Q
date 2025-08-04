<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelsModel extends Model
{
    protected $table = 'models';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'slug', 'brand_id', 'image', 'description', 'order_number', 'type', 'created_at'];

    protected $beforeInsert = ['generateSlug'];
    protected $beforeUpdate = ['generateSlug'];

    protected function generateSlug(array $data)
    {
        if (!empty($data['data']['title'])) {
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['data']['title'])));
            $slug = preg_replace('/-+/', '-', $slug); // remove multiple dashes
            $data['data']['slug'] = $slug;
        }
        return $data;
    }
}
?>
