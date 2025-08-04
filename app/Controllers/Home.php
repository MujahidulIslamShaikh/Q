<?php

// app/Controllers/AuthController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\BannerModel;
use App\Models\BrandModel;
use App\Models\IssueModel;
use App\Models\GalleryModel;
use App\Models\BlogModel;
use App\Models\MobileModel;
use App\Models\EmailModel;
use App\Models\AddressModel;
use App\Models\AboutModel;
use App\Models\ModelsModel;
use App\Models\ServiceModel;
use App\Models\UserModel;
use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\EnquiryModel;
use App\Models\E_wasteModel;
use App\Models\PrivacyPolicyModel;
use App\Models\TermsConditionModel;
use App\Models\WarrantyPolicyModel;
use App\Models\FaqModel;
use App\Models\TestimonialModel;
use App\Models\VideoModel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class Home extends BaseController {
    
    public function function_abc() {
        $data['title'] = 'Function ABC | QASWA TELECOM';
        // You can add more data to the view if needed
        return view('web/function_abc', $data);
    }
    
    public function index() {
        $BannerModel = new BannerModel();
        $BrandModel = new BrandModel();
        $IssueModel = new IssueModel();
        $GalleryModel = new GalleryModel();
        $BlogModel = new BlogModel();
        $FaqModel = new FaqModel();
        $TestimonialModel = new TestimonialModel();
        $TestimonialModel = new TestimonialModel();
        $VideoModel = new VideoModel();

        $data['title'] = 'QASWA TELECOM : Smartphone, iPad, Tab & Apple Watch Repair Service In Mumbai';

        $data['banners'] = $BannerModel->findAll();
        // $data['brands'] = $BrandModel->orderBy('order_number', 'ASC')->findAll();
        $data['issues'] = $IssueModel->findAll();
        $data['images'] = $GalleryModel->findAll();
        $data['blogs'] = $BlogModel->findAll();
        // $data['faqs'] = $FaqModel->where('type', 'Home')->findAll();
        $data['faqs'] = $FaqModel->findAll();
        $data['testimonials'] = $TestimonialModel->findAll();
        // $data['videos'] = $VideoModel->findAll();

        $query = $this->request->getPost('query') ?? '';
        if (!empty($query)) {
            $data['brands'] = $BrandModel->like('title', $query)->orderBy('order_number', 'ASC')->findAll();
        } else {
            $data['brands'] = $BrandModel->orderBy('order_number', 'ASC')->findAll();
        }
        $data['query'] = $query;
        // echo"<pre>"; print_r($data); exit;
        return view('web/home', $data);
    }

    public function userLogin() {
        $UserModel = new UserModel();
        $session = session();
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            if (!$this->validate('user_login')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
    
            $emailAddress = $this->request->getPost('email');
            $otp = random_int(1000, 9999);
    
            $existingUser = $UserModel->where('email', $emailAddress)->first();
    
            if ($existingUser) {
                $inserted = $UserModel->update($existingUser['id'], ['otp' => $otp]);
            } else {
                $inserted = $UserModel->insert([
                    'email' => $emailAddress,
                    'otp' => $otp
                ]);
            }

            if ($inserted) {

                $session->set('otp_email', $emailAddress);
                $msg = '
                    <div>
                        <p style="font-size: 14px;">Dear customer, your OTP is '. $otp .' Use this OTP to Login. QASWA TELECOM</b></p>
                    </div>
                ';

                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = getenv('SMTP_HOST');
                    $mail->SMTPAuth = true;
                    $mail->Username = getenv('SMTP_USER');
                    $mail->Password = getenv('SMTP_PASS');
                    $mail->Port = getenv('SMTP_PORT');
                    $mail->SMTPSecure = getenv('SMTP_SECURE');

                    $mail->setFrom('support@qaswatelecom.com', 'Qaswa Telecom');
                    $mail->addAddress($emailAddress); 
                    $mail->isHTML(true);
                    $mail->Subject = 'Qaswa Telecom - Your OTP Code';
                    $mail->Body    = $msg;

                    $mail->send();
                    return redirect()->to('/verifyotp');
                } catch (Exception $e) {
                    return redirect()->back()->withInput()->with('error', 'Failed to send OTP. Please try again.');
                }
        
                // $emailService = \Config\Services::email();
                // $emailService->setTo($emailAddress);
                // $emailService->setSubject('Qaswa Telecom - Your OTP Code');
                // $emailService->setMailType('html'); 
                // $emailService->setMessage($msg);
        
                // if ($emailService->send()) {
                //     return redirect()->to('/verifyotp');
                // } else {
                //     return redirect()->back()->withInput()->with('error', 'Failed to send OTP. Please try again.');
                // }
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to send otp. Please try again.');
            }
    
            
        }
        $data['title'] = 'Login to QASWA TELECOM';
        return view('web/login', $data);
    }

    public function verifyOTP() {
        $session = session();
        $UserModel = new UserModel();

        if ($this->request->getMethod() === 'post') {
            // $otpArray = $this->request->getPost('otp'); 
            $otp = $this->request->getPost('otp'); 
            // echo"<pre>"; print_r($otpArray); exit;
            // $otp = implode('', $otpArray);
            
    
            $email = $session->get('otp_email');
            if (!$email) {
                return redirect()->to('/login')->with('error', 'Session expired. Please try again.');
            }
    
            $user = $UserModel->where('email', $email)
                              ->where('otp', $otp)
                              ->first();
    
            if ($user) {
                $sessionData = [
                    'user_id' => $user['id'],
                    'user_email' => $user['email'],
                    'isLoggedIn' => true
                ];
                $session->set($sessionData);
                // Debugging: Print session data (Only for testing, remove in production)
                // echo "<pre>"; print_r($session->get()); exit;
    
                // Clear OTP after verification
                $UserModel->update($user['id'], ['otp' => null]);
    
                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
            }
        }
        $data['title'] = 'Login to QASWA TELECOM';
        return view('web/otp', $data);
    }

    public function userLogout() {
        $session = session();
        $session->remove(['isLoggedIn', 'user_id', 'user_name']);
        $session->destroy();
        return redirect()->to('/Login');
    }

    public function AboutUs() {
        $data['title'] = 'About Us | QASWA TELECOM : Smartphone, iPad, Tab & Apple Watch Repair Service In Mumbai';
        $AboutModel = new AboutModel();
        $data['about'] = $AboutModel->findAll();

        return view('web/about-us', $data);
    }

    public function ContactUs() {
        $EmailModel = new EmailModel();
        $MobileModel = new MobileModel();
        $AddressModel = new AddressModel();
        $data['email'] = $EmailModel->findAll();
        $data['mobile'] = $MobileModel->findAll();
        $data['address'] = $AddressModel->findAll();

        $data['title'] = 'Contact Us | QASWA TELECOM : Smartphone, iPad, Tab & Apple Watch Repair Service In Mumbai';

        return view('web/contact-us', $data);
    }

    public function enquiryMail() {
        $EnquiryModel = new EnquiryModel();
        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();
            if (!$this->validate('contact_us')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $first_name = $this->request->getPost('name');
            $last_name = $this->request->getPost('last_name');
            $email = $this->request->getPost('email');
            $mobile = $this->request->getPost('mobile');
            $city = $this->request->getPost('city');
            $subject = $this->request->getPost('subject');
            $message = $this->request->getPost('message');

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'mobile' => $mobile,
                'city' => $city,
                'subject' => $subject,
                'message' => $message,
            ];

            $inserted = $EnquiryModel->insert($data);

            $msg = '
                <div>
                    <h3>New Enquiry Received</h3>
                    <p><strong>Name:</strong> '. $first_name .' '. $last_name .'</p>
                    <p><strong>Mobile:</strong> '. $mobile .'</p>
                    <p><strong>Email:</strong> '. $email .'</p>
                    <p><strong>City:</strong> '. $city .'</p>
                    <p><strong>Message:</strong> '. $message .'</p>
                </div>
            ';

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = getenv('SMTP_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = getenv('SMTP_USER');
                $mail->Password = getenv('SMTP_PASS');
                $mail->Port = getenv('SMTP_PORT');
                $mail->SMTPSecure = getenv('SMTP_SECURE');

                $mail->setFrom('support@qaswatelecom.com', 'Qaswa Telecom');
                // $mail->addAddress('altamash@peaceinfotech.com'); 
                $mail->addAddress('support@qaswatelecom.com');
                $mail->isHTML(true);
                $mail->Subject = 'New Enquiry: ' . $subject;
                $mail->Body    = $msg;

                $mail->send();
                return redirect()->back()->with('success', 'Form is submitted successfully.');
            } catch (Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Failed to submit the form. Please try again.');
            }
        
            // $emailService = \Config\Services::email();
            // $emailService->setTo('altamash@peaceinfotech.com');
            // $emailService->setSubject('New Enquiry: ' . $subject);
            // $emailService->setMailType('html'); 
            // $emailService->setMessage($msg);

            // if ($emailService->send()) {
            //     return redirect()->back()->with('success', 'Form is submitted successfully.');
            // } else {
            //     return redirect()->back()->withInput()->with('error', 'Failed to submit the form. Please try again.');
            // }
        }
    }

    public function Models($brandTitle) {
        $brandTitle = str_replace('-', ' ', $brandTitle);

        $ModelsModel = new ModelsModel();
        $BrandModel = new BrandModel();

        $data['title'] = ucwords($brandTitle).' Phone Repair Service - Screen, Battery, Charging Port | QASWA TELECOM';

        $data['brand'] = $BrandModel->where('title', $brandTitle)->first();
        $brand_id = $data['brand']['id'];
        // $data['models'] = $ModelsModel->where('brand_id', $brand_id)->orderBy('order_number', 'ASC')->findAll();

        $query = $this->request->getPost('query') ?? '';
        if (!empty($query)) {
            $data['models'] = $ModelsModel->where('brand_id', $brand_id)->where('type', 'Mobile')->like('title', $query)->orderBy('order_number', 'ASC')->findAll();
            // $data['models'] = $ModelsModel->where('brand_id', $brand_id)->where('type', 'Mobile')->like('title', $query)->findAll();
        } else {
            $data['models'] = $ModelsModel->where('brand_id', $brand_id)->where('type', 'Mobile')->orderBy('order_number', 'ASC')->findAll();
        }
        $data['query'] = $query;
        
        // echo"<pre>"; print_r($data); exit;
        return view('web/models', $data);
    }

    public function appleModels($brandTitle, $type) {
        $brandTitle = str_replace('-', ' ', $brandTitle);
        $type = str_replace('-', ' ', $type);
        $ModelsModel = new ModelsModel();
        $BrandModel = new BrandModel();
        $data['title'] = ucwords($brandTitle).' iPhone Repair Service - Screen, Battery, Charging Port | QASWA TELECOM';
        $data['brand'] = $BrandModel->where('title', $brandTitle)->first();
        $brand_id = $data['brand']['id'];
        $query = $this->request->getPost('query') ?? '';
        if (!empty($query)) {
            $data['models'] = $ModelsModel->where('brand_id', $brand_id)->where('type', $type)->like('title', $query)->orderBy('order_number', 'ASC')->findAll();
        } else {
            $data['models'] = $ModelsModel->where('brand_id', $brand_id)->where('type', $type)->orderBy('order_number', 'ASC')->findAll();
        }
        $data['query'] = $query;
        
        // echo"<pre>"; print_r($data); exit;
        return view('web/models', $data);
    }

    public function getWarrantyDetails($serviceId) {
        $ServiceModel = new ServiceModel();
        $service = $ServiceModel->find($serviceId);
        
        if (!$service) {
            return $this->response->setJSON(['error' => 'Service not found']);
        }
        
        return $this->response->setJSON([
            'description' => $service['description']
        ]);
    }

    public function modelServices($brandName, $modelName) {
        $brandName = str_replace('-', ' ', $brandName);
        $modelName = str_replace('-', ' ', $modelName);
        $ModelsModel = new ModelsModel();
        $BrandModel = new BrandModel();
        $ServiceModel = new ServiceModel();
        $CartModel = new CartModel();
        $FaqModel = new FaqModel();
        // $session = session();
        // $user_id = $session->get('user_id');
        $user_id = get_cookie('guest_id');
        $modelN = str_replace('  ', '+ ', $modelName);
        $modelN = preg_replace('/\s+$/', '+', $modelN);
        $modelName = ucwords($modelName);
        $modelName = preg_replace('/\bIphone\b/', 'iPhone', $modelName); // Fix iPhone casing
        $data['title'] = $modelName.' Mobile Repair Service | QASWA TELECOM';

        $data['cart'] = $CartModel->select('cart.*, services.title, services.main_price, services.discounted_price, services.image, models.title as model_name, brands.title as brand_name, services.description')
                                    ->join('services', 'cart.service_id = services.id', 'left')
                                    ->join('models', 'services.model_id = models.id', 'left')
                                    ->join('brands', 'services.brand_id = brands.id', 'left')
                                    ->where('cart.user_id', $user_id)
                                    ->findAll();

        // if($user_id) {
        //     $data['cart'] = $CartModel->select('cart.*, services.title, services.main_price, services.discounted_price, services.image')
        //                               ->join('services', 'cart.service_id = services.id', 'left')
        //                               ->where('cart.user_id', $user_id)
        //                               ->findAll();
        // }
        $data['others'] = $CartModel->where('service_id', 0)->where('user_id', $user_id)->findAll();
        $data['brand'] = $BrandModel->where('title', $brandName)->first();
        $brand_id = $data['brand']['id'];
        
        $data['model'] = $ModelsModel->where('title', $modelN)->first();
        // echo"<pre>"; print_r($modelN); exit;
        $model_id = $data['model']['id'];
        $data['faqs'] = $FaqModel->where('type', 'Service')->findAll();

        // $data['services'] = $ServiceModel->where('brand_id', $brand_id)->where('model_id', $model_id)->findAll();
        $data['services'] = $ServiceModel->select('*')->groupBy('title')->orderBy('id', 'ASC')->findAll();
        // echo"<pre>"; print_r($data); exit;
        return view('web/services', $data);
    }


    public function addToCart() {
        helper('cookie'); // Load cookie helper if not already autoloaded
        $CartModel = new CartModel();
        $UserModel = new UserModel();

        // Check if guest_id exists in cookie
        $guestId = get_cookie('guest_id');

        if (!$guestId) {
            // Generate a new guest ID and set it in a cookie (valid for 90 days)
            $guestId = mt_rand(100000, 999999);
            set_cookie('guest_id', $guestId, 60 * 60 * 24 * 90); // 90 days
        }

        $user = $UserModel->where('user_id', $guestId)->find();
        if (!$user) {
            $UserModel->insert(['user_id' => $guestId]);
        }

        // Get JSON input
        $json = $this->request->getJSON();
        $serviceId = $json->service_id ?? 0;
        $title = $json->title ?? null;
        $otherBrand = $json->otherBrand ?? null;
        $otherModel = $json->otherModel ?? null;

        // Prepare data based on service ID
        if ($serviceId > 0) {
            $data = [
                'user_id' => $guestId,
                'service_id' => $serviceId,
            ];
        } else {
            $data = [
                'user_id' => $guestId,
                'service_id' => 0,
                'other_service' => $title,
                'other_brand' => $otherBrand,
                'other_model' => $otherModel,
            ];
        }

        // Insert data into cart
        if ($CartModel->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Item added to cart']);
        } else {
            return $this->response->setJSON(['error' => false, 'message' => 'Failed to add item to cart']);
        }
    }

    public function removeToCart($serviceId) {
        // $session = session();
        $CartModel = new CartModel();
        // $userId = $session->get('user_id');
        $userId = get_cookie('guest_id');
        // if (!$userId) {
        //     return redirect()->back()->with('error', 'You must be logged in to remove items from the cart.');
        // }
        $cartItem = $CartModel->where('user_id', $userId)->where('service_id', $serviceId)->first();

        if ($cartItem) {
            $CartModel->where('user_id', $userId)->where('service_id', $serviceId)->delete();
            return redirect()->back()->with('success', 'Service removed from cart.');
        } else {
            return redirect()->back()->with('error', 'Service not found in cart.');
        }
    }

    public function removeOtherToCart($id, $title) {
        // $session = session();
        $CartModel = new CartModel();
        // $userId = $session->get('user_id');
        $userId = get_cookie('guest_id');
        // if (!$userId) {
        //     return redirect()->back()->with('error', 'You must be logged in to remove items from the cart.');
        // }
        $cartItem = $CartModel->where('user_id', $userId)->where('service_id', 0)->where('other_service', $title)->first();

        if ($cartItem) {
            $CartModel->where('user_id', $userId)->where('service_id', 0)->where('other_service', $title)->delete();
            return redirect()->back()->with('success', 'Service removed from cart.');
        } else {
            return redirect()->back()->with('error', 'Service not found in cart.');
        }
    }


    public function Checkout() {
        $session = session();
        $ServiceModel = new ServiceModel();
        $CartModel = new CartModel();
        $UserModel = new UserModel();
    
        // $user_id = $session->get('user_id');
        $user_id = get_cookie('guest_id');
        $totalAmount = $session->get('total_amount');
        $serviceIds = $session->get('service_ids');
        $other_service = $session->get('other_service');
    
        if (!$totalAmount || (empty($serviceIds) && empty($other_service))) {
            return redirect()->back()->with('error', 'Cart is empty or invalid request!');
        }
    
        // Initialize cart array
        $data['cart'] = [];
    
        // Case 1: Both service IDs & other_service exist
        if (!empty($serviceIds) && !empty($other_service)) {
            $data['cart'] = array_merge(
                $CartModel->select('cart.*, services.title, services.main_price, services.discounted_price, services.image, models.title as model_name, brands.title as brand_name, services.description')
                          ->join('services', 'cart.service_id = services.id', 'left')
                          ->join('brands', 'services.brand_id = brands.id')
                          ->join('models', 'services.model_id = models.id')
                          ->where('cart.user_id', $user_id)
                          ->whereIn('cart.service_id', $serviceIds)
                          ->findAll(),
                $CartModel->where('user_id', $user_id)->where('service_id', 0)->whereIn('other_service', $other_service)->findAll()
            );
        }
        // Case 2: Only other_service exists
        elseif (!empty($other_service)) {
            $data['cart'] = $CartModel->where('user_id', $user_id)->where('service_id', 0)->whereIn('other_service', $other_service)->findAll();
        }
        // Case 3: Only service IDs exist
        elseif (!empty($serviceIds)) {
            $data['cart'] = $CartModel->select('cart.*, services.title, services.main_price, services.discounted_price, services.image, models.title as model_name, brands.title as brand_name')
                                      ->join('services', 'cart.service_id = services.id', 'left')
                                      ->join('brands', 'services.brand_id = brands.id')
                                      ->join('models', 'services.model_id = models.id')
                                      ->where('cart.user_id', $user_id)
                                      ->whereIn('cart.service_id', $serviceIds)
                                      ->findAll();
        }
        // If services exist, fetch them
        if (!empty($serviceIds)) {
            $data['services'] = $ServiceModel->whereIn('id', $serviceIds)->findAll();
        } else {
            $data['services'] = [];
        }
    
        // Assign remaining data
        $data['user'] = $UserModel->where('user_id', $user_id)->first();
        $data['total'] = $totalAmount;
    
        // echo "<pre>"; print_r($data); exit;
        return view('web/checkout', $data);
    }
    

    public function orderConfirm() {
        // $session = session();
        $OrderItemModel = new OrderItemModel();
        $OrderModel = new OrderModel();
        $UserModel = new UserModel();
        $CartModel = new CartModel();
        $ServiceModel = new ServiceModel();

        // $user_id = $session->get('user_id');
        $user_id = get_cookie('guest_id');
        $validation = \Config\Services::validation();
        if (!$this->validate('order')) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $validation->getErrors()
            ]);
        }

        $cartItems = $this->request->getPost('cart'); 
        $totalAmount = str_replace(',', '', $this->request->getPost('total_amount'));
        $name = $this->request->getPost('name');
        $mobile = $this->request->getPost('mobile');
        $other_mobile = $this->request->getPost('other_mobile');
        $email = $this->request->getPost('email');
        $address = $this->request->getPost('address');
        $city = $this->request->getPost('city');
        $landmark = $this->request->getPost('landmark');
        $repairDate = $this->request->getPost('repair_date');
        $repairTime = $this->request->getPost('repair_time');
        $repairType = $this->request->getPost('repair_type');

        $userData = [
            'name' => $name,
            'mobile' => $mobile,
            // 'other_mobile' => $other_mobile,
            // 'email' => $email,
            // 'address' => $address,
            'city' => $city,
            // 'landmark' => $landmark,
        ];

        if (!$UserModel->where('user_id', $user_id)->set($userData)->update()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to update user details.'
            ]);
        }

        $orderData = [
            'user_id' => $user_id,
            // 'repair_date' => $repairDate,
            // 'repair_time' => $repairTime,
            // 'repair_type' => $repairType,
            'total_amount' => $totalAmount,
            'status' => 'Order Placed',
        ];
        $order_id = $OrderModel->insert($orderData, true);
        if (!$order_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to create order.'
            ]);
        }

        $orderItemsInserted = false;
        $orderItemsHtml = '';
        $a = 1;
        foreach ($cartItems as $cart) {
            $orderItemInserted = $OrderItemModel->insert([
                'order_id' => $order_id,
                'service_id' => $cart['service_id'],
                'other_service' => $cart['other_service']. null,
                'other_brand' => $cart['brand_name'] ?? $cart['other_brand'],
                'other_model' => $cart['model_name'] ?? $cart['other_model'],
                'amount' => $cart['discounted_price'],
            ]);
    
            if ($orderItemInserted) {
                $orderItemsInserted = true;
                $orderItemsHtml .= "
                    <tr>
                        <td>{$a}</td>
                        <td>{$cart['title']}</td>
                        <td>{$cart['other_service']}</td>
                        <td>" . (!empty($cart['brand_name']) ? $cart['brand_name'] : $cart['other_brand']) . "</td>
                        <td>" . (!empty($cart['model_name']) ? $cart['model_name'] : $cart['other_model']) . "</td>
                    </tr>
                ";
                $a++;
            }
        }
        if (!$orderItemsInserted) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to insert order items.'
            ]);
        }
        $CartModel->where('user_id', $user_id)->delete();
        $rDate = date('d-m-Y', strtotime($this->request->getPost('repair_date')));
        $rTime = date('h:i A', strtotime($this->request->getPost('repair_time')));

        $adminEmail = 'support@qaswatelecom.com';
        // $adminEmail = 'altamash@peaceinfotech.com';
        $mailSubject = "New Order #QAS$order_id Placed";
        $mailBody = "
            <h3>New Order Placed</h3>
            <p><strong>Order ID:</strong> QAS$order_id</p>
            <p><strong>User Name:</strong> $name</p>
            <p><strong>Mobile:</strong> $mobile</p>
            <p><strong>City:</strong> $city</p>
            <h4>Order Items</h4>
            <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Service Name</th>
                        <th>Other Service Name</th>
                        <th>Brand Name</th>
                        <th>Model Name</th>
                    </tr>
                </thead>
                <tbody>
                    $orderItemsHtml
                </tbody>
            </table>
        ";

        // Send Email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = getenv('SMTP_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USER');
            $mail->Password = getenv('SMTP_PASS');
            $mail->Port = getenv('SMTP_PORT');
            $mail->SMTPSecure = getenv('SMTP_SECURE');
    
            $mail->setFrom('support@qaswatelecom.com', 'Qaswa Telecom');
            $mail->addAddress($adminEmail); 
            $mail->isHTML(true);
            $mail->Subject = $mailSubject;
            $mail->Body = $mailBody;
    
            $mail->send();
        } catch (Exception $e) {
            log_message('error', 'Admin email failed: ' . $mail->ErrorInfo);
        }
        
        // ✅ WhatsApp Redirect to Admin with Order Info
        $adminNumber = '919324316048';
        $whatsMsg = "*New Order Placed on Qaswa Telecom!*\n\n";
        $whatsMsg .= "*Order ID:* QAS$order_id\n";
        $whatsMsg .= "*Brand:* {$cartItems[0]['brand_name']}\n";
        $whatsMsg .= "*Model:* {$cartItems[0]['model_name']}\n";
        $whatsMsg .= "Issue : ";
        $issues = [];
        foreach ($cartItems as $cart) {
            $issues[] = (!empty($cart['title']) ? $cart['title'] : $cart['other_service']);
        }
        $whatsMsg .= implode(', ', $issues) . "\n";
        $whatsMsg .= "*Name:* $name\n";
        $whatsMsg .= "*Phone:* $mobile\n";
        $whatsMsg .= "*City:* $city\n";
        $whatsMsg .= "https://www.qaswatelecom.com";

        $encodedMsg = urlencode($whatsMsg);
        $whatsappUrl = "https://wa.me/{$adminNumber}?text={$encodedMsg}";

        // return redirect()->to($whatsappUrl);
        
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Order placed successfully!',
            'whatsapp_url' => $whatsappUrl
        ]);
        
    }

    public function myOrders() {
        $session = session();
        $OrderItemModel = new OrderItemModel();
        $OrderModel = new OrderModel();

        $data['title'] = 'My Orders | QASWA TELECOM';

        // $user_id = $session->get('user_id');
        $user_id = get_cookie('guest_id');
        $data['orders'] = $OrderModel->where('user_id', $user_id)->orderBy('id', 'DESC')->findAll();

        // echo"<pre>"; print_r($data); exit;
        return view('web/my-order', $data);
    }

    public function orderDetails($id) {
        $OrderItemModel = new OrderItemModel();
        $OrderModel = new OrderModel();

        $data['title'] = 'My Orders Details | QASWA TELECOM';

        $data['order'] = $OrderModel->find($id);
        $data['OrderItems'] = $OrderItemModel->select('order_items.*, 
                                                    services.title AS service_title, 
                                                    services.discounted_price, 
                                                    services.main_price, 
                                                    services.image, 
                                                    brands.title AS brand_title, 
                                                    models.title AS model_title')
                                            ->join('services', 'order_items.service_id = services.id', 'left')
                                            ->join('brands', 'services.brand_id = brands.id', 'left')
                                            ->join('models', 'services.model_id = models.id', 'left')
                                            ->where('order_items.order_id', $data['order']['id'])
                                            ->findAll();
        // echo"<pre>"; print_r($data); exit;
        return view('web/order-details', $data);
    }

    public function cancelOrder($id) {
        $OrderModel = new OrderModel();
        $request = $this->request->getJSON();
        $reason = $request->reason ?? null;
        if (!$reason) {
            return $this->response->setJSON(['success' => false, 'message' => 'Cancellation reason is required.']);
        }
        
        $order = $OrderModel->find($id);
        if (!$order) {
            return $this->response->setJSON(['success' => false, 'message' => 'Order not found.']);
        }
        // $OrderModel->update($id, ['status' => 'Order Cancelled']);
        $OrderModel->update($id, [
            'status' => 'Order Cancelled',
            'cancel_reason' => $reason
        ]);
        return $this->response->setJSON(['success' => true, 'message' => 'Order has been cancelled.']);
    }

    public function rescheduleOrder() {
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Forbidden']);
        }
    
        $OrderModel = new OrderModel();
    
        $orderId = $this->request->getPost('order_id');
        $newDate = $this->request->getPost('reschedule_date');
        $newTime = $this->request->getPost('reschedule_time');
        $reason = $this->request->getPost('reason');
    
        // Check if order exists
        $order = $OrderModel->find($orderId);
        if (!$order) {
            return $this->response->setJSON(['success' => false, 'message' => 'Order not found.']);
        }
    
        // Update the order with new date and time
        $OrderModel->update($orderId, [
            'repair_date' => $newDate,
            'repair_time' => $newTime,
            'reason_for_reschedule' => $reason,
            // 'status' => 'Rescheduled'
        ]);
    
        return $this->response->setJSON(['success' => true, 'message' => 'Order has been rescheduled successfully.']);
    }
    
    public function Blogs() {
        $BlogModel = new BlogModel();

        $data['title'] = 'Blogs - Mobile repair tips, industry trends, and tech news | QASWA TELECOM';

       // Get page number from URL
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 5; // Number of blogs per page

        // Get paginated blogs
        $data['blogs'] = $BlogModel->paginate($perPage);
        
        // Pass pagination links
        $data['pager'] = $BlogModel->pager;
        return view('web/blogs', $data);
    }

    public function blogDetails($id) {
        $BlogModel = new BlogModel();
        $data['blog'] = $BlogModel->find($id);
        // echo"<pre>"; print_r($data); exit;
        $data['title'] = $data['blog']['title'];
        return view('web/blog-details', $data);
    }

    public function Gallery() {
        $GalleryModel = new GalleryModel();
        $data['title'] = 'Gallery | QASWA TELECOM';
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 15;
        $data['images'] = $GalleryModel->paginate($perPage);
        $data['pager'] = $GalleryModel->pager;
        return view('web/gallery', $data);
    }

    public function EwastePolicy() {
        $E_wasteModel = new E_wasteModel();
        $data['title'] = 'e-Waste Policy | QASWA TELECOM';
        $data['policies'] = $E_wasteModel->findAll();
        return view('web/e-waste-policy', $data);
    }

    public function PrivacyPolicy() {
        $PrivacyPolicyModel = new PrivacyPolicyModel();
        $data['title'] = 'Privacy Policy | QASWA TELECOM';
        $data['policies'] = $PrivacyPolicyModel->findAll();
        return view('web/privacy-policy', $data);
    }

    public function TermsCondition() {
        $TermsConditionModel = new TermsConditionModel();
        $data['title'] = 'Terms Condition | QASWA TELECOM';
        $data['policies'] = $TermsConditionModel->findAll();
        return view('web/terms-condition', $data);
    }

    public function WarrantyPolicy() {
        $WarrantyPolicyModel = new WarrantyPolicyModel();
        $data['title'] = 'Warranty Policy | QASWA TELECOM';
        $data['policies'] = $WarrantyPolicyModel->findAll();
        return view('web/warranty-policy', $data);
    }

    public function FAQ() {
        $FaqModel = new FaqModel();
        $data['title'] = 'FAQs | QASWA TELECOM';
        $data['faqs'] = $FaqModel->findAll();
        return view('web/faq', $data);
    }

    public function Brands() {
        $BrandModel = new BrandModel();
        $data['brands'] = $BrandModel->orderBy('order_number', 'ASC')->findAll();
        return view('web/brands', $data);
    }

}
