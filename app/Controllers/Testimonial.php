<?php

    namespace App\Controllers;
    use CodeIgniter\Controller;
    use App\Models\TestimonialModel;

    class Testimonial extends BaseController {
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
            $TestimonialModel = new TestimonialModel();
            $data['testimonials'] = $TestimonialModel->orderBy('id', 'DESC')->findAll();
            // echo'<pre>'; print_r($data); exit;
            return view('admin/testimonial-view', $data);
        }

        public function addTestimonials() {
            $TestimonialModel = new TestimonialModel();
            if ($this->request->getMethod() === 'post') {

                $validation = \Config\Services::validation();
                if (!$this->validate('testimonial')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'user_name' => $this->request->getPost('user_name'),
                    'description' => $this->request->getPost('description'),
                ];
                $inserted = $TestimonialModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Testimonials')->with('success', 'Testimonial added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add testimonial. Please try again.');
                }
            }
            return view('admin/add-testimonial-view');
        }

        public function deleteTestimonials($id) {
            $TestimonialModel = new TestimonialModel();
            $delete = $TestimonialModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Testimonials')->with('success', 'Testimonial deleted successfully.');
            } else {
                return redirect()->to('/admin/Testimonials')->with('error', 'Failed to delete testimonial. Please try again.');
            }
        }
    }