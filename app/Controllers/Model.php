<?php

// app/Controllers/AuthController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BrandModel;
use App\Models\ModelsModel;
use App\Models\ServiceModel;

class Model extends BaseController
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

    public function index() {
        $ModelsModel = new ModelsModel();
        $data['models'] = $ModelsModel->orderBy('order_number', 'ASC')->findAll();
        return view('admin/model-view', $data);
    }

    public function addModel() {

        $BrandModel = new BrandModel();
        $ModelsModel = new ModelsModel();
        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();
            if (!$this->validate('model')) {
                // If validation fails, redirect back with errors and old input
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $brand_id = $this->request->getPost('brand_id');
            $titles = $this->request->getPost('title');
            $order_numbers = $this->request->getPost('order_number');
            $descriptions = $this->request->getPost('description');
            $type = $this->request->getPost('type');
            $images = $this->request->getFiles();
            $imageFiles = $images['image'];
            // if ($image->isValid() && !$image->hasMoved()) {
            //     $imageName = $image->getRandomName();
            //     $image->move('public/uploads/', $imageName);
            // }

            // $data = [
            //     'brand_id' => $this->request->getPost('brand_id'),
            //     'title' => $this->request->getPost('title'),
            //     'image' => $imageName,
            //     'order_number' => $this->request->getPost('order_number'),
            //     'description' => $this->request->getPost('description'),
            // ];
            // // echo'<pre>'; print_r($data); exit;
            // $inserted = $ModelsModel->insert($data);

            $data = [];
            foreach ($titles as $key => $title) {
                if ($imageFiles[$key]->isValid() && !$imageFiles[$key]->hasMoved()) {
                    $newName = $imageFiles[$key]->getRandomName();
                    $imageFiles[$key]->move('public/uploads/', $newName);
    
                    $data[] = [
                        'brand_id'     => $brand_id,
                        'title'        => $title,
                        'order_number' => $order_numbers[$key],
                        'description'  => $descriptions[$key],
                        'image'        => $newName,
                        'type'        => $type,
                    ];
                }
            }
            // echo'<pre>'; print_r($data); exit;
            $inserted = $ModelsModel->insertBatch($data);
            if ($inserted) {
                return redirect()->to('/admin/Models')->with('success', 'Brand added successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to add brand. Please try again.');
            }
        }
        $data['brands'] = $BrandModel->findAll();
        return view('admin/add-model-view', $data);
    }

    public function editModel($id) {
        $ModelsModel = new ModelsModel();
        $BrandModel = new BrandModel();
        $data['brands'] = $BrandModel->findAll();
        $data['model'] = $ModelsModel->find($id);
        // echo'<pre>'; print_r($data); exit;
        return view('admin/edit-model-view', $data);
    }

    public function updateModel($id) {

        $ModelsModel = new ModelsModel();
        $model = $ModelsModel->find($id);
        $prvImage = $model['image'];

        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();
            if (!$this->validate('update_model')) {
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
                'brand_id' => $this->request->getPost('brand_id'),
                'title' => $this->request->getPost('title'),
                'image' => $imageName,
                'order_number' => $this->request->getPost('order_number'),
                'description' => $this->request->getPost('description'),
                'type' => $this->request->getPost('type'),
            ];
            $updated = $ModelsModel->update($id, $data);
            if ($updated) {
                return redirect()->to('/admin/Models')->with('success', 'Brand updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to update brand. Please try again.');
            }
        }
        return redirect()->back()->withInput()->with('error', 'Failed to update brand. Please try again.');
        // echo'<pre>'; print_r($prvImage); exit;
    }

    public function deleteModel($id) {
        $ModelsModel = new ModelsModel();
        $ServiceModel = new ServiceModel();
        $model = $ModelsModel->find($id);

        $modalImage = $model['image'];
        if ($modalImage && file_exists('public/uploads/'. $modalImage)) {
            unlink('public/uploads/'. $modalImage);
        }

        $delete = $ModelsModel->delete($id);
        $S_delete = $ServiceModel->where('model_id', $id)->delete();
        if ($delete && $S_delete) {
            return redirect()->to('/admin/Models')->with('success', 'Brand deleted successfully.');
        } else {
            return redirect()->to('/admin/Models')->with('error', 'Failed to delete brand. Please try again.');
        }
    }

    public function getModelsByBrand($id) {
        $ModelsModel = new ModelsModel();
        $models = $ModelsModel->where('brand_id', $id)->findAll();
        return $this->response->setJSON($models);
    }

}
