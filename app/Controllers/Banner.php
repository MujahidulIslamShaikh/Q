<?php

// app/Controllers/AuthController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BannerModel;

class Banner extends BaseController
{

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Call the parent constructor
        parent::initController($request, $response, $logger);

        // Check session and redirect if not logged in
        if (!session()->has('id')) {
            redirect()->to('/admin')->with('error', 'You must be logged in.')->send();
            exit();
        }
    }

    public function index()
    {
        $BannerModel = new BannerModel();
        $data['banners'] = $BannerModel->orderBy('id', 'DESC')->findAll();
        return view('admin/banner-view', $data);
    }

    public function addBanner() {

        $BannerModel = new BannerModel();
        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();

            if (!$this->validate('banner')) {
                // If validation fails, redirect back with errors and old input
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $image = $this->request->getFile('image');

            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move('public/uploads/', $imageName);
            }

            $data = [
                'image' => $imageName,
            ];
            // echo"<pre>"; print_r($data); exit;
            $inserted = $BannerModel->insert($data);
            if ($inserted) {
                return redirect()->to('/admin/Banners')->with('success', 'Banner added successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to add banner. Please try again.');
            }
        }
        return view('admin/add-banner-view');
    }

    public function deleteBanner($id) {

        $BannerModel = new BannerModel();
        $banner = $BannerModel->find($id);
        $prvImage = $banner['image'];
        if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
            unlink('public/uploads/'. $prvImage);
        }
        $delete = $BannerModel->delete($id);
        if ($delete) {
            return redirect()->to('/admin/Banners')->with('success', 'Banner deleted successfully.');
        } else {
            return redirect()->to('/admin/Banners')->with('error', 'Failed to delete banner. Please try again.');
        }
    }

}
