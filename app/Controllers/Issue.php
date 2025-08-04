<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\IssueModel;

    class Issue extends BaseController {

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
            $IssueModel = new IssueModel();
            $data['issues'] = $IssueModel->orderBy('id', 'DESC')->findAll();
            return view('admin/issue-view', $data);
        }

        public function addIssue() {
            $IssueModel = new IssueModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('issue')) {
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
                $inserted = $IssueModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Issues')->with('success', 'Issue added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add issue. Please try again.');
                }
            }
            return view('admin/add-issue-view');
        }

        public function editIssue($id) {
            $IssueModel = new IssueModel();
            $data['issue'] = $IssueModel->find($id);
            return view('admin/edit-issue-view', $data);
        }

        public function updateIssue($id) {
            $IssueModel = new IssueModel();
            $issue= $IssueModel->find($id);
            $prvImage = $issue['image'];

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('update_issue')) {
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
                $updated = $IssueModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/Issues')->with('success', 'Issue updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update issue. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update issue. Please try again.');
        }
        
        public function deleteIssue($id) {
            $IssueModel = new IssueModel();
            $issue = $IssueModel->find($id);
            $prvImage = $issue['image'];
            if ($prvImage && file_exists('public/uploads/'. $prvImage)) {
                unlink('public/uploads/'. $prvImage);
            }

            $delete = $IssueModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Issues')->with('success', 'Issue deleted successfully.');
            } else {
                return redirect()->to('/admin/Issues')->with('error', 'Failed to delete issue. Please try again.');
            }
        }
    }

?>