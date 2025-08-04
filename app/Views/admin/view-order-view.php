<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">View Order - order id</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Orders') ?>">Manage All Users Order</a></li>
                            <li class="breadcrumb-item active">View Order</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <?php if (session()->has('error')) : ?>
                <div class="row justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible" role="alert">
                        <!-- <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg> -->
                        <div>
                            Success! <?= session('error') ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary">
                            <h5 class="text-white mb-0">Order Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/view-order/' . $order['id']) ?>" method="post">
                                <?= csrf_field() ?>

                                <div class="row">
                                    <!-- Left Section -->
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" value="<?= $order['user_name'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control" value="<?= $order['user_mobile'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Other Number</label>
                                                <input type="text" class="form-control" value="<?= $order['other_mobile'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" value="<?= $order['email'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Total Amount</label>
                                                <input type="text" class="form-control" value="₹<?= $order['total_amount'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Repair Type</label>
                                                <input type="text" class="form-control" value="<?= $order['repair_type'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Repair Date</label>
                                                <input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($order['repair_date'])) ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Repair Time</label>
                                                <input type="text" class="form-control" value="<?= $order['repair_time'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Status</label>
                                                <input type="text" class="form-control" value="<?= $order['status'] ?>" readonly>
                                            </div>
                                            <?php if($order['status'] === 'Order Placed' || $order['status'] === 'Order Confirmed'): ?>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Change Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="">Select Status</option>
                                                        <option value="Order Placed" <?= ($order['status'] == "Order Placed") ? 'selected' : '' ?>>Order Placed</option>
                                                        <option value="Order Confirmed" <?= ($order['status'] == "Order Confirmed") ? 'selected' : '' ?>>Order Confirmed</option>
                                                        <option value="Order Completed" <?= ($order['status'] == "Order Completed") ? 'selected' : '' ?>>Order Completed</option>
                                                        <option value="Order Cancelled" <?= ($order['status'] == "Order Cancelled") ? 'selected' : '' ?>>Order Cancelled</option>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($order['cancel_reason']): ?>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Reason for Cancellation</label>
                                                    <textarea class="form-control" rows="1" readonly><?= $order['cancel_reason'] ?></textarea>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($order['reason_for_reschedule']): ?>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Reason for Reschedule</label>
                                                    <textarea class="form-control" rows="1" readonly><?= $order['reason_for_reschedule'] ?></textarea>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" rows="2" readonly><?= $order['address'] ?? 'N/A' ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Section (Image Preview) -->
                                    <div class="col-md-4 text-center">
                                        <h6>Model Image</h6>
                                        <?php if (!empty($OrderItems)) : ?>
                                            <?php foreach ($OrderItems as $item) : ?>
                                                <?php if(!empty($item['image'])) : ?>
                                                    <img src="<?= base_url('public/uploads/' . $item['image']) ?>" 
                                                        class="img-thumbnail mb-2" 
                                                        style="width: 150px; height: 150px;">
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <p>No Image Available</p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Order Items -->
                                <div class="mt-4">
                                    <h5 class="text-primary">Ordered Services</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Service</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($OrderItems)) : ?>
                                                    <?php foreach ($OrderItems as $item) : ?>
                                                        <tr>
                                                            <td><?= $item['service_title'] ?? $item['other_service'] ?></td>
                                                            <td><?= $item['other_brand'] ?></td>
                                                            <td><?= $item['other_model'] ?></td>
                                                            <td>
                                                                <?php if($item['discounted_price']) : ?>
                                                                    ₹<?= $item['discounted_price'] ?> <small class="text-muted" style="text-decoration: line-through;">(₹<?= $item['main_price'] ?>)</small>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Services Found</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <!-- /Page Wrapper -->

<?= view('admin/partials/footer.php') ?>
<?= view('admin/partials/script.php') ?>

<script>

    function calculatePercentageOff() {
        var mainPrice = parseFloat(document.getElementById('main_price').value);
        var discountPrice = parseFloat(document.getElementById('discounted_price').value);

        if (!isNaN(mainPrice) && !isNaN(discountPrice) && mainPrice > 0) {
            var percentageOff = ((mainPrice - discountPrice) / mainPrice) * 100;
            document.getElementById('percent_off').value = percentageOff.toFixed(2);
        }
    }

</script>