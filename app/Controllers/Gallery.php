<?php

    namespace App\Controllers;
    use CodeIgniter\Controller;
    use App\Models\GalleryModel;

    class Gallery extends BaseController {

        public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
            // Call the parent constructor
            parent::initController($request, $response, $logger);

            // Check session and redirect if not logged in
            if (!session()->has('id')) {
                redirect()->to('/admin')->with('error', 'You must be logged in.')->send();
                exit();
            }
        }

        public function index() {
            $GalleryModel = new GalleryModel();
            $data['gallery'] = $GalleryModel->orderBy('id', 'DESC')->findAll();
            // echo'<pre>'; print_r($data); exit;
            return view('admin/gallery-view', $data);
        }

        public function addGallery() {
            $GalleryModel = new GalleryModel();

            if ($this->request->getMethod() === 'post') {

                $validation = \Config\Services::validation();
                if (!$this->validate('gallery')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $image = $this->request->getFile('image');
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move('public/uploads/', $imageName);
                }
    
                $data = [
                    'image' => $imageName,
                    'title' => $this->request->getPost('title'),
                ];
                // echo'<pre>'; print_r($data); exit;
                $inserted = $GalleryModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Gallery')->with('success', 'Gallery added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add gallery. Please try again.');
                }
            }
    
            return view('admin/add-galler-view');
        }

        public function deleteGallery($id) {
            $GalleryModel = new GalleryModel();
            $gallery = $GalleryModel->find($id);
            $prvImage = $gallery['image'];
            if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
                unlink('public/uploads/'. $prvImage);
            }

            $delete = $GalleryModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Gallery')->with('success', 'Brand deleted successfully.');
            } else {
                return redirect()->to('/admin/Gallery')->with('error', 'Failed to delete brand. Please try again.');
            }
        }

    }

?>