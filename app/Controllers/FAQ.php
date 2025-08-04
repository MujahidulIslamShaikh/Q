<?php

    namespace App\Controllers;

    use CodeIgniter\Controller;
    use App\Models\FaqModel;

    class FAQ extends BaseController {

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
            $FaqModel = new FaqModel();
            $data['faqs'] = $FaqModel->orderBy('id', 'DESC')->findAll();
            return view('admin/faq-view', $data);
        }

        public function addFAQ() {
            $FaqModel = new FaqModel();
            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('faq')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'question' => $this->request->getPost('question'),
                    'answer' => $this->request->getPost('answer'),
                    'type' => $this->request->getPost('type'),
                ];
                // echo'<pre>'; print_r($data); exit;
                $inserted = $FaqModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/FAQ')->with('success', 'FAQ added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add FAQ. Please try again.');
                }
            }
            return view('admin/add-faq-view');
        }

        public function editFAQ($id) {
            $FaqModel = new FaqModel();
            $data['faq'] = $FaqModel->find($id);

            return view('admin/edit-faq-view', $data);
        }

        public function updateFAQ($id) {
            $FaqModel = new FaqModel();
            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('faq')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'question' => $this->request->getPost('question'),
                    'answer' => $this->request->getPost('answer'),
                    'type' => $this->request->getPost('type'),
                ];
                // echo'<pre>'; print_r($data); exit;
                $updated = $FaqModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/FAQ')->with('success', 'FAQ updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to updated FAQ. Please try again.');
                }
            }
        }

        public function deleteFAQ($id) {
            $FaqModel = new FaqModel();
            $deleted = $FaqModel->delete($id);
            if ($deleted) {
                return redirect()->to('/admin/FAQ')->with('success', 'FAQ deleted successfully.');
            } else {
                return redirect()->to('/admin/FAQ')->with('error', 'Failed to delete FAQ. Please try again.');
            }
        }
    }

?>