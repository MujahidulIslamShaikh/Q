<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ServiceModel;
use App\Models\BrandModel;
use App\Models\ModelsModel;

class Service extends BaseController
{

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
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
        $ServiceModel = new ServiceModel();
        // $data['services'] = $ServiceModel->orderBy('id', 'DESC')->findAll();
        $data['services'] = $ServiceModel->select('services.*, models.title as model_title, brands.title as brand_title')
                                         ->join('models', 'services.model_id = models.id', 'left')
                                         ->join('brands', 'services.brand_id = brands.id', 'left')
                                         ->groupBy('model_title')
                                         ->findAll();
        // echo'<pre>'; print_r($data); exit;
        return view('admin/service-view', $data);
    }

    public function addService() {
        $BrandModel = new BrandModel();
        $ModelsModel = new ModelsModel();
        $ServiceModel = new ServiceModel();

        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();
            if (!$this->validate('service')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $brand_id = $this->request->getPost('brand_id');
            $model_id = $this->request->getPost('model_id');
            $titles = $this->request->getPost('title');
            $main_price = $this->request->getPost('main_price');
            $discounted_price = $this->request->getPost('discounted_price');
            $percent_off = $this->request->getPost('percent_off');
            $descriptions = $this->request->getPost('description');
            $images = $this->request->getFiles();
            $imageFiles = $images['image'];

            // $image = $this->request->getFile('image');
            // if ($image->isValid() && !$image->hasMoved()) {
            //     $imageName = $image->getRandomName();
            //     $image->move('public/uploads/', $imageName);
            // }

            // $data = [
            //     'brand_id' => $this->request->getPost('brand_id'),
            //     'model_id' => $this->request->getPost('model_id'),
            //     'title' => $this->request->getPost('title'),
            //     'image' => $imageName,
            //     'main_price' => $this->request->getPost('main_price'),
            //     'discounted_price' => $this->request->getPost('discounted_price'),
            //     'percent_off' => $this->request->getPost('percent_off'),
            //     'description' => $this->request->getPost('description'),
            // ];
            // // echo'<pre>'; print_r($data); exit;
            // $inserted = $ServiceModel->insert($data);

            $data = [];
            foreach ($titles as $key => $title) {
                if ($imageFiles[$key]->isValid() && !$imageFiles[$key]->hasMoved()) {
                    $newName = $imageFiles[$key]->getRandomName();
                    $imageFiles[$key]->move('public/uploads/', $newName);
    
                    $data[] = [
                        'brand_id' => $brand_id,
                        'model_id' => $model_id,
                        'title' => $title,
                        'main_price' => $main_price[$key],
                        'discounted_price' => $discounted_price[$key],
                        'percent_off' => $percent_off[$key],
                        'description' => $descriptions[$key],
                        'image' => $newName,
                    ];
                }
            }
            // echo'<pre>'; print_r($data); exit;
            $inserted = $ServiceModel->insertBatch($data);
            if ($inserted) {
                return redirect()->to('/admin/Services')->with('success', 'Brand added successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to add brand. Please try again.');
            }
        }

        $data['brands'] = $BrandModel->findAll();
        $data['models'] = $ModelsModel->findAll();
        return view('admin/add-service-view', $data);
    }

    public function editService($model_id) {
        $ServiceModel = new ServiceModel();
        $BrandModel = new BrandModel();
        $ModelsModel = new ModelsModel();
        $ServiceModel = new ServiceModel();

        
        // $data['service'] = $ServiceModel->find($id);
        $services = $ServiceModel->select('services.*, models.title as model_title')
                        ->join('models', 'services.model_id = models.id', 'left')
                        ->where('services.model_id', $model_id)
                        ->findAll();

        // Then restructure the data
        $data = [];
        if (!empty($services)) {
            // Get common properties from the first service (assuming all have same model_id and brand_id)
            $data['model_id'] = $services[0]['model_id'];
            $data['brand_id'] = $services[0]['brand_id'];
            $data['model_title'] = $services[0]['model_title'];
            
            // Create services array without the common properties
            $data['services'] = array_map(function($service) {
                return [
                    'id' => $service['id'],
                    'title' => $service['title'],
                    'image' => $service['image'],
                    'main_price' => $service['main_price'],
                    'discounted_price' => $service['discounted_price'],
                    'percent_off' => $service['percent_off'],
                    'description' => $service['description'],
                    'created_at' => $service['created_at']
                ];
            }, $services);
        }
        $data['brands'] = $BrandModel->findAll();
        $data['models'] = $ModelsModel->findAll();
        // echo'<pre>'; print_r($data); exit;
        return view('admin/edit-service-view', $data);
    }

    // public function updateService($id) {
    //     $ServiceModel = new ServiceModel();
    //     $service = $ServiceModel->find($id);
    //     $prvImage = $service['image'];
        
    //     if ($this->request->getMethod() === 'post') {
    //         $validation = \Config\Services::validation();
    //         if (!$this->validate('update_service')) {
    //             return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    //         }

    //         $image = $this->request->getFile('image');
    //         if ($image && $image->isValid() && !$image->hasMoved()) {
    //             $imageName = $image->getRandomName();
    //             $image->move('public/uploads/', $imageName);

    //             // Delete the previous image if a new one is uploaded
    //             if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
    //                 unlink('public/uploads/'. $prvImage);
    //             }
    //         } else {
    //             $imageName = $prvImage;
    //         }

    //         $data = [
    //             'title' => $this->request->getPost('title'),
    //             'image' => $imageName,
    //             'main_price' => $this->request->getPost('main_price'),
    //             'discounted_price' => $this->request->getPost('discounted_price'),
    //             'percent_off' => $this->request->getPost('percent_off'),
    //             'description' => $this->request->getPost('description'),
    //         ];
    //         $updated = $ServiceModel->update($id, $data);

    //         if ($updated) {
    //             return redirect()->to('/admin/Services')->with('success', 'Brand updated successfully.');
    //         } else {
    //             return redirect()->back()->withInput()->with('error', 'Failed to update brand. Please try again.');
    //         }
    //     }
    //     return redirect()->back()->withInput()->with('error', 'Failed to update brand. Please try again.');
    //     // echo'<pre>'; print_r($prvImage); exit;
    // }

    public function updateService($id) {
        $ServiceModel = new ServiceModel();
        $services = $ServiceModel->where('model_id', $id)->findAll();
        
        if ($this->request->getMethod() === 'post') {
            // $validation = \Config\Services::validation();
            // if (!$this->validate('update_service')) {
            //     return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            // }
    
            $brand_id = $this->request->getPost('brand_id');
            $model_id = $this->request->getPost('model_id');
            $ids = $this->request->getPost('id');
            $titles = $this->request->getPost('title');
            $main_prices = $this->request->getPost('main_price');
            $discounted_prices = $this->request->getPost('discounted_price');
            $percent_offs = $this->request->getPost('percent_off');
            $descriptions = $this->request->getPost('description');
            $imageFiles = $this->request->getFiles()['image'];
    
            // Create a map of existing services for quick lookup
            $existingServices = [];
            foreach ($services as $service) {
                $existingServices[$service['id']] = $service;
            }
    
            $data = [];
            foreach ($ids as $key => $serviceId) {
                $imageName = null;
                
                // Check if a new image was uploaded
                if (isset($imageFiles[$key]) && $imageFiles[$key]->isValid() && !$imageFiles[$key]->hasMoved()) {
                    // Upload new image
                    $newName = $imageFiles[$key]->getRandomName();
                    $imageFiles[$key]->move('public/uploads/', $newName);
                    $imageName = $newName;
                    
                    // Delete old image if it exists
                    if (!empty($existingServices[$serviceId]['image'])) {
                        $oldImagePath = 'public/uploads/'.$existingServices[$serviceId]['image'];
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                } else {
                    // Keep the existing image
                    $imageName = $existingServices[$serviceId]['image'] ?? null;
                }
    
                $data[] = [
                    'id' => $serviceId,
                    'brand_id' => $brand_id,
                    'model_id' => $model_id,
                    'title' => $titles[$key],
                    'main_price' => $main_prices[$key],
                    'discounted_price' => $discounted_prices[$key],
                    'percent_off' => $percent_offs[$key],
                    'description' => $descriptions[$key],
                    'image' => $imageName, // This will be either the new image or the existing one
                ];
            }
            // echo'<pre>'; print_r($data); exit;
            $updated = $ServiceModel->updateBatch($data, 'id');
            if ($updated) {
                return redirect()->to('/admin/Services')->with('success', 'Services updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to update services. Please try again.');
            }
        }
        
        return redirect()->back()->withInput()->with('error', 'Failed to update services. Please try again.');
    }

    public function deleteService($id) {
        $ServiceModel = new ServiceModel();
        $service = $ServiceModel->find($id);
        $prvImage = $service['image'];
        if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
            unlink('public/uploads/'. $prvImage);
        }

        $delete = $ServiceModel->delete($id);
        if ($delete) {
            return redirect()->to('/admin/Services')->with('success', 'Service deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete Service. Please try again.');
        }

    }

}
