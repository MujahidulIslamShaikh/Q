<?= view('web/partials/header.php') ?>

<style>
    .order-cards-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .order-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 6px;
        /* width: 350px; */
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 10px;
        border-bottom: 1px solid #f0f0f0;
    }

    .status-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .status {
        padding: 4px 8px;
        border-radius: 50px;
        color: #fff;
        background: #00d757;
        font-size: 20px;
    }

    .cancell_status {
        padding: 2px 10px 5px 10px;
        border-radius: 50px;
        color: #fff;
        background: #dc3545;
        font-size: 22px;
    }

    .date {
        font-size: 14px;
        color: #777;
    }

    .repair-btn {
        background-color: #00C47E;
        color: #fff;
        border: none;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
        cursor: pointer;
    }

    .order-info {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 10px 0;
    }

    .device-image {
        width: 75px;
        height: 75px;
    }

    .details h3 {
        margin: 0;
        font-size: 18px;
    }

    .device-color {
        color: #777;
        font-size: 14px;
    }

    .services-list p,
    .total-amount p {
        display: flex;
        justify-content: space-between;
        font-size: 16px;
    }

    .price {
        font-weight: bold;
    }

    .no-orders {
        text-align: center;
        font-size: 16px;
        color: #777;
    }

    .order-id {
        color: #989292;
    }

    .total-amount {
        border-top: 1px solid #f0f0f0;
        padding-top: 8px;
    }

    .shopping_cart_area {
        padding-top: 36px;
        background: #f8f8f8;
    }

    .section_title h2 {
        font-size: 22px;
        font-weight: 400;
        margin-bottom: 20px;
    }

    @media (min-width: 768px) {
        .section_title h2 {
            font-size: 28px;
            font-weight: 500;
        }

        .single_category figure {
            margin-top: 20px;
        }
    }

    @media (max-width: 767px) {
        .section_title h2 {
            text-align: left;
            font-size: 20px;
            font-weight: 500;
            line-height: 26px;
            /* margin-top: 30px; */
            /* margin-bottom: 70px !important; */
        }
    }
</style>

<!--breadcrumbs area start-->
<!-- <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?= base_url('/') ?>">home</a></li>
                            <li>my orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2 class="mb-3">My Orders</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- <div class="order-cards-container"> -->
                <div class="row">
                    <?php

                    use App\Models\OrderItemModel;
                    use App\Models\ModelsModel;

                    $OrderItemModel = new OrderItemModel();
                    $ModelsModel = new ModelsModel();
                    if ($orders): ?>
                        <?php foreach ($orders as $order): ?>
                            <?php
                            $orderItems = $OrderItemModel->select('order_items.*, services.title, services.brand_id, services.model_id, services.discounted_price, services.main_price, services.image')
                                ->join('services', 'order_items.service_id = services.id', 'left')
                                ->where('order_id', $order['id'])->findAll();
                            $model = [];
                            $deviceImage = base_url('assets/web/img/icon/QuickrepairService1.png');
                            // print_r("<pre>"); print_r($orderItems); exit;
                            if (!empty($orderItems[0]['model_id'])) {
                                // $model = $ModelsModel->find($orderItems[0]['model_id']);
                                $model = $ModelsModel->where('title', $orderItems[0]['other_model'])->first();
                                if (!empty($model['image'])) {
                                    $deviceImage = base_url('public/uploads/' . $model['image']);
                                }
                            }
                            // echo"<pre>"; print_r($model); exit;
                            if ($order['status'] === 'Order Placed') {
                                $className = 'info';
                            } else if ($order['status'] === 'Order Confirmed') {
                                $className = 'primary';
                            } else if ($order['status'] === 'Order Completed') {
                                $className = 'success';
                            } else if ($order['status'] === 'Order Cancelled') {
                                $className = 'danger';
                            } else {
                                $className = '';
                            }
                            // echo"<pre>"; print_r($orderItems); exit;
                            ?>
                            <div class="col-md-3 mb-3">
                                <div class="top_category_container">
                                    <a href="<?= base_url('orderDetails/' . $order['id']) ?>" class="">
                                        <article class="single_category">
                                            <div class="order-header">
                                                <div class="status-container <?= $className ?>">
                                                    <?php if ($order['status'] === 'Order Cancelled') : ?>
                                                        <span class="cancell_status">x</span>
                                                        <span style="font-weight: 500"><?= $order['status'] ?></span>
                                                    <?php else : ?>
                                                        <span class="status">✔</span>
                                                        <span style="font-weight: 500"><?= $order['status'] ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="date"> <?= date('d M Y', strtotime($order['created_at'])) ?></span>
                                                <!-- <button class="repair-btn">REPAIR</button> -->
                                            </div>
                                            <div class="order-body">
                                                <div class="order-info">
                                                    <img src="<?= $deviceImage ?>" alt="Device" class="device-image">
                                                    <div class="details">
                                                        <p class="order-id m-0">Order ID: QAS<?= $order['id'] ?></p>
                                                        <!-- <h3><?= $order['repair_type'] ?></h3> -->
                                                        <!-- <p class="device-color">Yellow</p> -->
                                                    </div>
                                                </div>
                                                <div class="services-list mb-2">
                                                    <p class="m-0" style="color: #989292; font-size: 13px;">Booked Repair
                                                        Services</p>
                                                    <?php foreach ($orderItems as $item): ?>
                                                        <p class="m-0">
                                                            <?= !empty($item['title']) ? $item['title'] : $item['other_service']; ?>
                                                            <!-- <span class="price">₹<?= $item['amount'] ?? 00 ?></span> -->
                                                        </p>
                                                    <?php endforeach; ?>
                                                </div>
                                                <!-- <div class="total-amount">
                                    <p><strong>Total Amount</strong> <span class="price">₹<?= $order['total_amount'] ?></span></p>
                                </div> -->
                                            </div>
                                        </article>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="no-orders">No Data Available</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shopping cart area end -->

<?= view('web/partials/footer.php') ?>