<?php

    namespace App\Controllers;
    use CodeIgniter\Controller;
    use App\Models\OrderModel;
    use App\Models\OrderItemModel;
    use App\Models\UserModel;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Order extends BaseController {

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
            $OrderModel = new OrderModel();
            $OrderItemModel = new OrderItemModel();


            // $orders = $OrderModel->orderBy('id', 'DESC')->findAll();
            $query = $OrderModel->select('orders.*, user.name AS user_name, user.mobile AS user_mobile, user.other_mobile AS other_mobile, user.email')
                                 ->join('user', 'orders.user_id = user.user_id', 'left')
                                 ->orderBy('orders.id', 'DESC');

                
            $orders = $query->findAll();
            // $orders = $query->asArray()->get()->getResultArray();

            foreach ($orders as &$order) {
                $order['items'] = $OrderItemModel->table('order_items')
                                    ->select('order_items.*, services.title AS service_title, 
                                            services.discounted_price, services.main_price, services.image, 
                                            brands.title AS brand_title, models.title AS model_title')
                                    ->join('services', 'order_items.service_id = services.id', 'left')
                                    ->join('brands', 'services.brand_id = brands.id', 'left')
                                    ->join('models', 'services.model_id = models.id', 'left')
                                    ->where('order_items.order_id', $order['id'])
                                    ->orderBy('order_items.id', 'DESC')
                                    ->get()
                                    ->getResultArray();
            }
            $data['orders'] = $orders;
            // echo '<pre>'; print_r($data); exit;
            return view('admin/order-view', $data);
        }

        public function viewOrder($id) {
            $OrderItemModel = new OrderItemModel();
            $OrderModel = new OrderModel();
            // $data['order'] = $OrderModel->find($id);
            $data['order'] = $OrderModel->select('orders.*, user.name AS user_name, user.mobile AS user_mobile, user.address, user.email, user.other_mobile')
                                        ->join('user', 'orders.user_id = user.user_id', 'left')
                                        ->where('orders.id', $id)->first();
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
            // echo '<pre>'; print_r($data); exit;
            return view('admin/view-order-view', $data);
        }

        public function updateOrderStatus($id) {
            $OrderModel = new OrderModel();
            $UserModel = new UserModel();
            $OrderItemModel = new OrderItemModel();
            
            // $order = $OrderModel->find($id);
            $order = $OrderModel->select('orders.*, user.name AS user_name, user.mobile AS user_mobile, user.address, user.email, user.other_mobile, user.city, user.landmark')
                                ->join('user', 'orders.user_id = user.user_id', 'left')
                                ->where('orders.id', $id)->first();
            $OrderItems = $OrderItemModel->select('order_items.*, 
                                                        services.title AS service_title, 
                                                        services.discounted_price, 
                                                        services.main_price, 
                                                        services.image, 
                                                        brands.title AS brand_title, 
                                                        models.title AS model_title, services.description')
                                                ->join('services', 'order_items.service_id = services.id', 'left')
                                                ->join('brands', 'services.brand_id = brands.id', 'left')
                                                ->join('models', 'services.model_id = models.id', 'left')
                                                ->where('order_items.order_id', $order['id'])
                                                ->findAll();

            $orderItemsHtml = '';
            $a = 1;
            foreach ($OrderItems as $item) {
                $orderItemsHtml .= "
                    <tr>
                        <td>{$a}</td>
                        <td>" . (!empty($item['service_title']) ? $item['service_title'] : $item['other_service']) . "</td>
                        <td>" . (!empty($item['brand_title']) ? $item['brand_title'] : $item['other_brand']) . "</td>
                        <td>" . (!empty($item['model_title']) ? $item['model_title'] : $item['other_model']) . "</td>
                        <td>{$item['main_price']}</td>
                        <td>{$item['discounted_price']}</td>
                        <td>{$item['description']}</td>
                    </tr>
                ";
                $a++;
            }
            // echo '<pre>'; print_r($order); print_r($OrderItems); exit;
            if (!$order) {
                return redirect()->back()->with('error', 'Order not found.');
            }
            $data = [
                'status' => $this->request->getPost('status')
            ];
            $updated = $OrderModel->update($id, $data);
            
            if ($updated) {
                $user = $UserModel->find($order['user_id']);
                if ($user) {
                    $orderId = $order['id'];
                    $status = $data['status'];
        
                    $msg = "
                        <div>
                            <p>Dear Customer,</p>
                            <p>Your order QAS{$orderId} status has been updated to: <strong>{$status}</strong>.</p>

                            <h3 style='margin-top: 20px;'>Order Details</h3>
                            <p><strong>Order ID: </strong> QAS$orderId</p>
                            <p><strong>User Name: </strong>" . $order['user_name'] . "</p>
                            <p><strong>Mobile: </strong>" . $order['user_mobile'] . "</p>
                            <p><strong>Email: </strong>" . $order['email'] . "</p>
                            <p><strong>Address: </strong>" . $order['address'] . ", " . $order['city'] . "</p>
                            <p><strong>Landmark: </strong>" . $order['landmark'] . "</p>
                            <p><strong>Repair Date: </strong>" . $order['repair_date'] . "</p>
                            <p><strong>Repair Time: </strong>" . $order['repair_time'] . "</p>
                            <p><strong>Repair Type: </strong>" . $order['repair_type'] . "</p>
                            <p><strong>Total Amount: </strong>" . $order['total_amount'] . "</p>
                            
                            <h4>Order Items</h4>
                            <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Service Name</th>
                                        <th>Brand Name</th>
                                        <th>Model Name</th>
                                        <th>Main Price</th>
                                        <th>Discounted Price</th>
                                        <th>Warranty Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    $orderItemsHtml
                                </tbody>
                            </table>

                            <p style='margin-top: 20px;'>Thank you for shopping with us!</p>
                        </div>
                    ";
        
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
                        $mail->addAddress($user['email']); 
                        $mail->isHTML(true);
                        $mail->Subject = 'Order Status Updated';
                        $mail->Body    = $msg;
        
                        $mail->send();
                    } catch (Exception $e) {
                        log_message('error', 'Email sending failed: ' . $mail->ErrorInfo);
                        return redirect()->to('/admin/Orders')->with('error', 'Order status updated, but email failed to send.');
                    }
                }
                return redirect()->to('/admin/Orders')->with('success', 'Order status updated successfully.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to update order status. Please try again.');
            }
        }
    }

?>