<?php

// app/Controllers/AuthController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BrandModel;
use App\Models\ModelsModel;
use App\Models\ServiceModel;

class Brand extends BaseController
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
        $BrandModel = new BrandModel();

        $data['brands'] = $BrandModel->orderBy('order_number', 'ASC')->findAll();
        // echo'<pre>'; print_r($data); exit;
        return view('admin/brand-view', $data);
    }

    public function addBrand() {

        if ($this->request->getMethod() === 'post') {

            $BrandModel = new BrandModel();

            $validation = \Config\Services::validation();
            if (!$this->validate('brand')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $title = $this->request->getPost('title');
            $image = $this->request->getFile('image');
            $description = $this->request->getPost('description');
            $order_number = $this->request->getPost('order_number');

            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move('public/uploads/', $imageName);
            }

            $data = [
                'title' => $title,
                'image' => $imageName,
                'description' => $description,
                'order_number' => $order_number,
            ];
            // echo'<pre>'; print_r($data); exit;
            $inserted = $BrandModel->insert($data);
            if ($inserted) {
                return redirect()->to('/admin/Brands')->with('success', 'Brand added successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to add brand. Please try again.');
            }
        }
        return view('admin/add-brand-view');
    }

    public function editBrand($id) {
        $BrandModel = new BrandModel();
        $data['brand'] = $BrandModel->find($id);
        // echo'<pre>'; print_r($data); exit;
        return view('admin/edit-brand-view', $data);
    }

    public function updateBrand($id) {

        $BrandModel = new BrandModel();
        $brand = $BrandModel->find($id);
        $prvImage = $brand['image'];
        
        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();
            if (!$this->validate('update_brand')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move('public/uploads/', $imageName);

                // Delete the previous image if a new one is uploaded
                if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
                    unlink('public/uploads/'. $prvImage);
                }
            } else {
                $imageName = $prvImage;
            }

            $data = [
                'title' => $this->request->getPost('title'),
                'image' => $imageName,
                'description' => $this->request->getPost('description'),
                'order_number' => $this->request->getPost('order_number'),
            ];
            //  echo'<pre>'; print_r($data); exit;
            $updated = $BrandModel->update($id, $data);
            if ($updated) {
                return redirect()->to('/admin/Brands')->with('success', 'Brand updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to update brand. Please try again.');
            }
        }
        return redirect()->back()->withInput()->with('error', 'Failed to update brand. Please try again.');
    }

    public function deleteBrand($id) {
        $BrandModel = new BrandModel();
        $ModelsModel = new ModelsModel();
        $ServiceModel = new ServiceModel();
        $brand = $BrandModel->find($id);

        //  echo'<pre>'; print_r($brand); exit;
        $brandImage = $brand['image'];
        if ($brandImage && file_exists('public/uploads/'. $brandImage)) {
            unlink('public/uploads/'. $brandImage);
        }
    
        
        $B_delete = $BrandModel->delete($id);
        $M_delete = $ModelsModel->where('brand_id', $id)->delete();
        $S_delete = $ServiceModel->where('brand_id', $id)->delete();
        if ($B_delete && $M_delete && $S_delete) {
            return redirect()->to('/admin/Brands')->with('success', 'Brand deleted successfully.');
        } else {
            return redirect()->to('/admin/Brands')->with('error', 'Failed to delete brand. Please try again.');
        }
    }

}
