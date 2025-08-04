<?= view('web/partials/header.php') ?>

    <style>
        .order-details-section {
            background-color: #f8f9fa;
        }
        .order-card {
            border-radius: 12px;
            background: white;
        }
        .order-summary {
            border-radius: 10px;
        }
        .total-amount {
            font-size: 18px;
            font-weight: bold;
        }
    </style>

<style>
/* .vertical-status-tracker {
    font-family: 'Arial', sans-serif;
    padding: 15px 0;
} */

.status-step {
    display: flex;
    margin-bottom: 5px;
    position: relative;
}

.step-marker {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-right: 15px;
}

.step-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #e0e0e0;
    color: #999;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
    z-index: 2;
}

.step-connector {
    height: 25px;
    width: 2px;
    background: #e0e0e0;
    margin: 5px 0;
}

.step-content {
    padding-bottom: 20px;
}

.step-title {
    font-weight: 500;
    color: #666;
    margin-bottom: 3px;
}

.step-date {
    font-size: 12px;
    color: #999;
}

/* Active states */
.cancell_state .status-step.active .step-icon {
    background: #dc3545;
    color: white;
}
.status-step.active .step-icon {
    background: #00b3a0;
    color: white;
}

.status-step.active .step-title {
    color: #333;
    font-weight: 500;
}

.cancell_state .status-step.active .step-connector {
    background: #dc3545;
}
.status-step.active .step-connector {
    background: #00b3a0;
}

/* Remove connector from last step */
.status-step:last-child .step-connector {
    display: none;
}
.status_sec {
    border-right: 1px solid #dee2e6;
}
@media only screen and (max-width: 767px) {
    .status_sec {
        border-bottom: 1px solid #dee2e6;
        border-right: 0;
        margin-bottom: 15px;
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
                            <li>order details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--breadcrumbs area end-->

    <?php $dateTime = new DateTime($order['repair_date'] . ' ' . $order['repair_time']); 
        if($order['status'] === 'Order Placed') {
            $className = 'info';
        } else if($order['status'] === 'Order Confirmed') {
            $className = 'primary';
        } else if($order['status'] === 'Order Completed') {
            $className = 'success';
        } else if($order['status'] === 'Order Cancelled') {
            $className = 'danger';
        } else {
            $className = '';
        }
    ?>
    <!-- Order Details Section Start -->
    <section class="order-details-section py-5">
        <div class="container">
            <!-- Section Title -->
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="section-title">Order Details</h2>
                </div>
            </div>

            <!-- Order Details Card -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="order-card p-4 shadow-lg rounded bg-white">
                        <div class="row">
                            <!-- Left Side (Order Items) -->
                             <div class="col-md-2 status_sec" style="">
                                <p><strong>Status:</strong> <span class="<?= $className?>"><?= $order['status'] ?></span></p>
                                <?php if($order['status'] ===  'Order Cancelled') : ?>
                                    <div class="vertical-status-tracker cancell_state">
                                        <div class="status-step <?= $order['status'] === 'Order Cancelled' ? 'active' : '' ?>">
                                            <div class="step-marker">
                                                <div class="step-icon">X</div>
                                                <div class="step-connector"></div>
                                            </div>
                                            <div class="step-content">
                                                <div class="step-title">Order Cancelled</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="vertical-status-tracker">
                                    <div class="status-step <?= in_array($order['status'], ['Order Placed', 'Order Confirmed', 'Order Completed']) ? 'active' : '' ?>">
                                            <div class="step-marker">
                                                <div class="step-icon">1</div>
                                                <div class="step-connector"></div>
                                            </div>
                                            <div class="step-content">
                                                <div class="step-title">Order Placed</div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="status-step <?= in_array($order['status'], ['Order Confirmed', 'Order Completed']) ? 'active' : '' ?>">
                                            <div class="step-marker">
                                                <div class="step-icon">2</div>
                                                <div class="step-connector"></div>
                                            </div>
                                            <div class="step-content">
                                                <div class="step-title">Order Confirmed</div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="status-step <?= $order['status'] === 'Order Completed' ? 'active' : '' ?>">
                                            <div class="step-marker">
                                                <div class="step-icon">3    </div>
                                                <div class="step-connector"></div>
                                            </div>
                                            <div class="step-content">
                                                <div class="step-title">Order Complete</div>
                                                <?php if($order['status'] === 'Order Complete'): ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-3">Services Ordered</h4>
                                <?php foreach ($OrderItems as $item): ?>
                                    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                                        <?php if($item['image']): ?>
                                            <div class="me-3">
                                                <img src="<?= base_url('public/uploads/'.$item['image']) ?>" alt="Image"
                                                    class="img-thumbnail" style="width: 80px; height: 75px;">
                                            </div>
                                        <?php else : ?>
                                            <div class="me-3">
                                                <img src="<?= base_url('assets/web/img/icon/QuickrepairService1.png') ?>" alt="Default Image"
                                                    class="img-thumbnail" style="width: 80px; height: 85px;">
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <p class="mb-1"><strong>Service:</strong> <?= !empty($item['service_title']) ? $item['service_title'] : $item['other_service']; ?></p>
                                            <p class="mb-1"><strong>Device:</strong> <?= $item['other_model'];  ?> (<?= $item['other_brand']; ?>)</p>
                                            <!-- <p class="mb-1 text-success"><strong>Amount:</strong> ₹<?= number_format($item['amount'], 2) ?></p> -->
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Right Side (Order Summary) -->
                            <div class="col-md-4">
                                <div class="order-summary p-3 rounded shadow-sm bg-light">
                                    <h4 class="mb-3">Order Summary</h4>
                                    <p class="m-0"><strong>Order Id:</strong> QAS<?= $order['id'] ?></p>
                                    <p class="m-0"><strong>Order Date:</strong> <?= date('d M Y', strtotime($order['created_at'])) ?></p>
                                    <?php if($order['cancel_reason']): ?>
                                        <p class="m-0"><strong>Reason for Cancellation :</strong> <?= $order['cancel_reason'] ?></p>
                                    <?php endif; ?>
                                    <!-- <p><strong>Time & Date:</strong> <?= $dateTime->format('h:i A, d M Y'); ?></p> -->
                                    <?php if($order['reason_for_reschedule']): ?>
                                        <p><strong>Reason for Reschedule :</strong> <?= $order['reason_for_reschedule'] ?></p>
                                    <?php endif; ?>
                                    <!-- <p><strong>Repair Type:</strong> <?= $order['repair_type'] ?></p> -->
                                    <!-- <p class="total-amount text-danger">
                                        <strong>Total Amount:</strong> ₹<?= number_format($order['total_amount'], 2) ?>
                                    </p> -->
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-end mt-4">
                            <?php if($order['status'] === 'Order Placed' || $order['status'] === 'Order Confirmed'): ?>
                                <button class="btn btn-outline-danger cancel-order me-2" data-id="<?= $order['id'] ?>">Order Cancel</button>
                                <!-- <button class="btn btn-outline-primary reschedule-order" data-id="<?= $order['id'] ?>">Reschedule</button> -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Section End -->

    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rescheduleForm">
                        <input type="hidden" id="orderId" name="order_id">
                        <div class="mb-3">
                            <label for="rescheduleDate" class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="rescheduleDate" name="repair_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="rescheduleTime" class="form-label">Select Time</label>
                            <input type="time" class="form-control" id="rescheduleTime" name="repair_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="reason_for_reschedule" class="form-label">Reason for Reschedule Order</label>
                            <input type="text" class="form-control" id="reason_for_reschedule" name="reason" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Reschedule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Order Modal -->
    <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelOrderModalLabel">Cancel Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="cancelReason" class="form-label">Reason for Cancellation</label>
                    <textarea class="form-control" id="cancelReason" rows="3" placeholder="Enter your reason"></textarea>
                    <input type="hidden" id="orderId" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmCancelOrder">Confirm Cancel</button>
                </div>
            </div>
        </div>
    </div>


<?= view('web/partials/footer.php') ?>

<script>
    $(document).ready(function () {

        let selectedOrderId = null;

        // Show modal when cancel button is clicked
        $('.cancel-order').click(function () {
            selectedOrderId = $(this).data('id');
            $('#orderId').val(selectedOrderId);
            $('#cancelOrderModal').modal('show');
        });

        // Handle cancel confirmation
        $('#confirmCancelOrder').click(function () {
            let orderId = $('#orderId').val();
            let cancelReason = $('#cancelReason').val().trim();

            if (cancelReason === "") {
                Swal.fire("Warning!", "Please provide a reason for cancellation.", "warning");
                return;
            }

            $.ajax({
                url: "<?= base_url('cancel-order') ?>/" + orderId,
                type: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                },
                data: JSON.stringify({ reason: cancelReason }),
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        Swal.fire("Cancelled!", response.message, "success").then(() => {
                            location.reload(); // Reload the page after success
                        });
                    } else {
                        Swal.fire("Error!", response.message, "error");
                    }
                },
                error: function () {
                    Swal.fire("Oops!", "Something went wrong. Please try again.", "error");
                }
            });

            $('#cancelOrderModal').modal('hide'); // Hide modal after submitting
        });


        // Open modal on button click
        $('.reschedule-order').click(function () {
            let orderId = $(this).data('id');
            $('#orderId').val(orderId); // Set order ID in hidden input
            $('#rescheduleModal').modal('show'); // Show modal
        });

        // Handle form submission with AJAX
        $('#rescheduleForm').submit(function (e) {
            e.preventDefault();

            let formData = {
                order_id: $('#orderId').val(),
                reschedule_date: $('#rescheduleDate').val(),
                reschedule_time: $('#rescheduleTime').val(),
                reason: $('#reason_for_reschedule').val(),
                "<?= csrf_token() ?>": "<?= csrf_hash() ?>" // CSRF token
            };

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to reschedule this order?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Reschedule!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('reschedule-order') ?>",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                Swal.fire("Success!", response.message, "success").then(() => {
                                    location.reload(); // Reload page
                                });
                            } else {
                                Swal.fire("Error!", response.message, "error");
                            }
                        },
                        error: function () {
                            Swal.fire("Oops!", "Something went wrong. Please try again.", "error");
                        }
                    });
                }
            });
        });
    });
</script>