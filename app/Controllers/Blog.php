<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BlogModel;

    class Blog extends BaseController {

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
            $BlogModel = new BlogModel();
            $data['blogs'] = $BlogModel->orderBy('id', 'DESC')->findAll();
            return view('admin/blog-view', $data);
        }

        public function addBlog() {
            $BlogModel = new BlogModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('blog')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $image = $this->request->getFile('image');
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move('public/uploads/', $imageName);
                }

                $data = [
                    'title' => $this->request->getPost('title'),
                    'image' => $imageName,
                    'description' => $this->request->getPost('description'),
                ];
                $inserted = $BlogModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Blog')->with('success', 'Blog added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add blog. Please try again.');
                }
            }
            return view('admin/add-blog-view');
        }

        public function editBlog($id) {
            $BlogModel = new BlogModel();
            $data['blog']= $BlogModel->find($id);

            return view('admin/edit-blog-view', $data);
        }

        public function updateBlog($id) {
            $BlogModel = new BlogModel();
            $blog= $BlogModel->find($id);
            $prvImage = $blog['image'];

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('update_blog')) {
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
                ];
                $updated = $BlogModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/Blog')->with('success', 'Blog updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update blog. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update blog. Please try again.');
        }

        public function deleteBlog($id) {
            $BlogModel = new BlogModel();
            $blog = $BlogModel->find($id);
            $prvImage = $blog['image'];
            if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
                unlink('public/uploads/'. $prvImage);
            }

            $delete = $BlogModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Blog')->with('success', 'Blog deleted successfully.');
            } else {
                return redirect()->to('/admin/Blog')->with('error', 'Failed to delete blog. Please try again.');
            }
        }
    }

?>