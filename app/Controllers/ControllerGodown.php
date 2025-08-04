<?php

// app/Controllers/AuthController.php

namespace App\Controllers;

use App\Models\BannerModel;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class ControllerGodown extends BaseController
{

    
    public function add_product()
    {
        $banners = new BannerModel();
        $data['banners'] = $banners->findAll();
        return view('/admin/godown/godown-view', $data);
    }


}