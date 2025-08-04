<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\VideoModel;

    class Videos extends BaseController {
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
            $VideoModel = new VideoModel();
            $data['videos'] = $VideoModel->orderBy('id', 'DESC')->findAll();
            return view('admin/video-view', $data);
        }

        public function addVideo() {
            $VideoModel = new VideoModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('videos')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $image = $this->request->getFile('image');
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move('public/uploads/', $imageName);
                }

                $data = [
                    'title' => $this->request->getPost('title'),
                    'url' => $this->request->getPost('url'),
                    'image' => $imageName,
                    'description' => $this->request->getPost('description'),
                ];
                $inserted = $VideoModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Videos')->with('success', 'Video added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add Video. Please try again.');
                }
            }
            return view('admin/add-video-view');
        }

        public function deleteBlog($id) {
            $VideoModel = new VideoModel();
            $video = $VideoModel->find($id);
            $prvImage = $video['image'];
            if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
                unlink('public/uploads/'. $prvImage);
            }
            
            $delete = $VideoModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Videos')->with('success', 'Video deleted successfully.');
            } else {
                return redirect()->to('/admin/Videos')->with('error', 'Failed to delete Video. Please try again.');
            }
        }
    }

?>