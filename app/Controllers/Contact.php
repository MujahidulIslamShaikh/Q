<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MobileModel;
use App\Models\EmailModel;
use App\Models\AddressModel;
use App\Models\TermsConditionModel;
use App\Models\WarrantyPolicyModel;
use App\Models\PrivacyPolicyModel;
use App\Models\E_wasteModel;
use App\Models\AboutModel;

    class Contact extends BaseController {

        public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
            // Call the parent constructor
            parent::initController($request, $response, $logger);
    
            // Check session and redirect if not logged in
            if (!session()->has('id')) {
                redirect()->to('/admin')->with('error', 'You must be logged in.')->send();
                exit();
            }
        }

        public function Mobile() {
            $MobileModel = new MobileModel();
            $data['mobile'] = $MobileModel->orderBy('id', 'DESC')->findAll();

            return view('admin/mobile-view', $data);
        }

        public function addMobile() {
            $MobileModel = new MobileModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('mobile')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'mobile' => $this->request->getPost('mobile'),
                ];
                $inserted = $MobileModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Mobile')->with('success', 'Mobile Number added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add mobile number. Please try again.');
                }
            }
            return view('admin/add-mobile-view');
        }

        public function editMobile($id) {
            $MobileModel = new MobileModel();
            $data['mobile']= $MobileModel->find($id);

            return view('admin/edit-mobile-view', $data);
        }

        public function updateMobile($id) {
            $MobileModel = new MobileModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('mobile')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'mobile' => $this->request->getPost('mobile'),
                ];
                $updated = $MobileModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/Mobile')->with('success', 'Mobile Number updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update mobile number. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update mobile number. Please try again.');
        }

        public function deleteMobile($id) {
            $MobileModel = new MobileModel();

            $delete = $MobileModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Mobile')->with('success', 'Mobile Number deleted successfully.');
            } else {
                return redirect()->to('/admin/Mobile')->with('error', 'Failed to delete mobile number. Please try again.');
            }
        }

        // ---------------- Email -----------------------
        public function Email() {
            $EmailModel = new EmailModel();
            $data['email'] = $EmailModel->orderBy('id', 'DESC')->findAll();

            return view('admin/email-view', $data);
        }

        public function addEmail() {
            $EmailModel = new EmailModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('email')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'email' => $this->request->getPost('email'),
                ];
                $inserted = $EmailModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Email')->with('success', 'Email added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add email. Please try again.');
                }
            }
            return view('admin/add-email-view');
        }

        public function editEmail($id) {
            $EmailModel = new EmailModel();
            $data['email']= $EmailModel->find($id);

            return view('admin/edit-email-view', $data);
        }

        public function updateEmail($id) {
            $EmailModel = new EmailModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('email')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'email' => $this->request->getPost('email'),
                ];
                $updated = $EmailModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/Email')->with('success', 'Email updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update email. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update email. Please try again.');
        }

        public function deleteEmail($id) {
            $EmailModel = new EmailModel();

            $delete = $EmailModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Email')->with('success', 'Email deleted successfully.');
            } else {
                return redirect()->to('/admin/Email')->with('error', 'Failed to delete email. Please try again.');
            }
        }

        // ------------------ Address -----------------------
        public function Address() {
            $AddressModel = new AddressModel();
            $data['address'] = $AddressModel->orderBy('id', 'DESC')->findAll();

            return view('admin/address-view', $data);
        }

        public function addAddress() {
            $AddressModel = new AddressModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('address')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'address' => $this->request->getPost('address'),
                ];
                $inserted = $AddressModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/Address')->with('success', 'Address added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add address. Please try again.');
                }
            }
            return view('admin/add-address-view');
        }

        public function editAddress($id) {
            $AddressModel = new AddressModel();
            $data['address']= $AddressModel->find($id);

            return view('admin/edit-address-view', $data);
        }

        public function updateAddress($id) {
            $AddressModel = new AddressModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('address')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'address' => $this->request->getPost('address'),
                ];
                $updated = $AddressModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/Address')->with('success', 'Address updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update address. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update address. Please try again.');
        }

        public function deleteAddress($id) {
            $AddressModel = new AddressModel();

            $delete = $AddressModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/Address')->with('success', 'Address deleted successfully.');
            } else {
                return redirect()->to('/admin/Address')->with('error', 'Failed to delete address. Please try again.');
            }
        }

        // ------------------ TermsCondition -----------------------
        public function TermsCondition() {
            $TermsConditionModel = new TermsConditionModel();
            $data['terms'] = $TermsConditionModel->findAll();

            return view('admin/terms-condition-view', $data);
        }

        public function addTermsCondition() {
            $TermsConditionModel = new TermsConditionModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('terms_condition')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'terms_condition' => $this->request->getPost('terms_condition'),
                ];
                $inserted = $TermsConditionModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/TermsCondition')->with('success', 'Terms & Condition added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add Terms & Condition. Please try again.');
                }
            }
            return view('admin/add-terms-condition-view');
        }

        public function editTermsCondition($id) {
            $TermsConditionModel = new TermsConditionModel();
            $data['term']= $TermsConditionModel->find($id);

            return view('admin/edit-terms-condition-view', $data);
        }

        public function updateTermsCondition($id) {
            $TermsConditionModel = new TermsConditionModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('terms_condition')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'terms_condition' => $this->request->getPost('terms_condition'),
                ];
                $updated = $TermsConditionModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/TermsCondition')->with('success', 'Terms & Condition updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update Terms & Condition. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update Terms & Condition. Please try again.');
        }

        public function deleteTermsCondition($id) {
            $TermsConditionModel = new TermsConditionModel();

            $delete = $TermsConditionModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/TermsCondition')->with('success', 'Terms & Condition deleted successfully.');
            } else {
                return redirect()->to('/admin/TermsCondition')->with('error', 'Failed to delete Terms & Condition. Please try again.');
            }
        }

        // ------------------ WarrantyPolicy -----------------------
        public function WarrantyPolicy() {
            $WarrantyPolicyModel = new WarrantyPolicyModel();
            $data['policies'] = $WarrantyPolicyModel->findAll();

            return view('admin/warranty-policy-view', $data);
        }

        public function addWarrantyPolicy() {
            $WarrantyPolicyModel = new WarrantyPolicyModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('warranty_policy')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'warranty_policy' => $this->request->getPost('warranty_policy'),
                ];
                $inserted = $WarrantyPolicyModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/WarrantyPolicy')->with('success', 'Warranty Policy added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add Warranty Policy. Please try again.');
                }
            }
            return view('admin/add-warranty-policy-view');
        }

        public function editWarrantyPolicy($id) {
            $WarrantyPolicyModel = new WarrantyPolicyModel();
            $data['policy']= $WarrantyPolicyModel->find($id);

            return view('admin/edit-warranty-policy-view', $data);
        }

        public function updateWarrantyPolicy($id) {
            $WarrantyPolicyModel = new WarrantyPolicyModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('warranty_policy')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'warranty_policy' => $this->request->getPost('warranty_policy'),
                ];
                $updated = $WarrantyPolicyModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/WarrantyPolicy')->with('success', 'Warranty Policy updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update Warranty Policy. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update Warranty Policy. Please try again.');
        }

        public function deleteWarrantyPolicy($id) {
            $WarrantyPolicyModel = new WarrantyPolicyModel();

            $delete = $WarrantyPolicyModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/WarrantyPolicy')->with('success', 'Warranty Policy deleted successfully.');
            } else {
                return redirect()->to('/admin/WarrantyPolicy')->with('error', 'Failed to delete Warranty Policy. Please try again.');
            }
        }

        // ------------------ About Us -----------------------
        public function AboutUs() {
            $AboutModel = new AboutModel();
            $data['about'] = $AboutModel->findAll();

            return view('admin/about-us-view', $data);
        }

        public function addAboutUs() {
            $AboutModel = new AboutModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('about')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'about_us' => $this->request->getPost('about_us'),
                ];
                $inserted = $AboutModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/About')->with('success', 'About Us added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add about us. Please try again.');
                }
            }
            return view('admin/add-about-view');
        }

        public function editAboutUs($id) {
            $AboutModel = new AboutModel();
            $data['about']= $AboutModel->find($id);

            return view('admin/edit-about-view', $data);
        }

        public function updateAboutUs($id) {
            $AboutModel = new AboutModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('about')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'about_us' => $this->request->getPost('about_us'),
                ];
                $updated = $AboutModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/About')->with('success', 'About Us updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update about us. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update about us. Please try again.');
        }

        public function deleteAboutUs($id) {
            $AboutModel = new AboutModel();

            $delete = $AboutModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/About')->with('success', 'About Us deleted successfully.');
            } else {
                return redirect()->to('/admin/About')->with('error', 'Failed to delete about us. Please try again.');
            }
        }

        // ------------------ E-waste -----------------------
        public function EwastePolicy() {
            $E_wasteModel = new E_wasteModel();
            $data['e_waste'] = $E_wasteModel->findAll();

            return view('admin/e_waste_policy-view', $data);
        }

        public function addEwastePolicy() {
            $E_wasteModel = new E_wasteModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('e_waste')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'policy' => $this->request->getPost('policy'),
                ];
                $inserted = $E_wasteModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/EwastePolicy')->with('success', 'E-waste Policy added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add E-waste Policy. Please try again.');
                }
            }
            return view('admin/add-e_waste_policy-view');
        }

        public function editEwastePolicy($id) {
            $E_wasteModel = new E_wasteModel();
            $data['e_waste']= $E_wasteModel->find($id);

            return view('admin/edit-e_waste_policy-view', $data);
        }

        public function updateEwastePolicy($id) {
            $E_wasteModel = new E_wasteModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('e_waste')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'policy' => $this->request->getPost('policy'),
                ];
                $updated = $E_wasteModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/EwastePolicy')->with('success', 'E-waste Policy updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update E-waste Policy. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update E-waste Policy. Please try again.');
        }

        public function deleteEwastePolicy($id) {
            $E_wasteModel = new E_wasteModel();

            $delete = $E_wasteModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/EwastePolicy')->with('success', 'E-waste Policy deleted successfully.');
            } else {
                return redirect()->to('/admin/EwastePolicy')->with('error', 'Failed to delete E-waste Policy. Please try again.');
            }
        }

        // ------------------ PrivacyPolicy -----------------------
        public function PrivacyPolicy() {
            $PrivacyPolicyModel = new PrivacyPolicyModel();
            $data['policy'] = $PrivacyPolicyModel->findAll();

            return view('admin/privacy-policy-view', $data);
        }

        public function addPrivacyPolicy() {
            $PrivacyPolicyModel = new PrivacyPolicyModel();

            if($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if(!$this->validate('privacy_policy')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }

                $data = [
                    'policy' => $this->request->getPost('policy'),
                ];
                $inserted = $PrivacyPolicyModel->insert($data);
                if ($inserted) {
                    return redirect()->to('/admin/PrivacyPolicy')->with('success', 'Privacy Policy added successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to add Privacy Policy. Please try again.');
                }
            }
            return view('admin/add-privacy-policy-view');
        }

        public function editPrivacyPolicy($id) {
            $PrivacyPolicyModel = new PrivacyPolicyModel();
            $data['policy']= $PrivacyPolicyModel->find($id);

            return view('admin/edit-privacy-policy-view', $data);
        }

        public function updatePrivacyPolicy($id) {
            $PrivacyPolicyModel = new PrivacyPolicyModel();

            if ($this->request->getMethod() === 'post') {
                $validation = \Config\Services::validation();
                if (!$this->validate('privacy_policy')) {
                    return redirect()->back()->withInput()->with('errors', $validation->getErrors());
                }
    
                $data = [
                    'policy' => $this->request->getPost('policy'),
                ];
                $updated = $PrivacyPolicyModel->update($id, $data);
                if ($updated) {
                    return redirect()->to('/admin/PrivacyPolicy')->with('success', 'Privacy Policy updated successfully.');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Failed to update Privacy Policy. Please try again.');
                }
            }
            return redirect()->back()->withInput()->with('error', 'Failed to update Privacy Policy. Please try again.');
        }

        public function deletePrivacyPolicy($id) {
            $PrivacyPolicyModel = new PrivacyPolicyModel();

            $delete = $PrivacyPolicyModel->delete($id);
            if ($delete) {
                return redirect()->to('/admin/PrivacyPolicy')->with('success', 'Privacy Policy deleted successfully.');
            } else {
                return redirect()->to('/admin/PrivacyPolicy')->with('error', 'Failed to delete Privacy Policy. Please try again.');
            }
        }
    }

?>