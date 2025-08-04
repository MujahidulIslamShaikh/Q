<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
           
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="page-title">Manage All Users Order</h3>
                        <ul class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li> -->
                            <li class="breadcrumb-item active">Manage All Users Order</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                       
                    </div>
                </div>
            </div>

            <?php if (session()->has('success')) : ?>
                <div class="row justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>
                    <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                        <!-- <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg> -->
                        <div>
                            Success! <?= session('success') ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
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
                <div class="col-sm-12">

                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable" id="order_table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Order Id</th>
                                            <th>User Name</th>
                                            <th>Mobile Number</th>
                                            <th>Other Number</th>
                                            <th>Email</th>
                                            <th>Model Image</th>
                                            <th>Brand Name</th>
                                            <th>Model Name</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($orders)) : ?>
                                            <?php foreach ($orders as $order) :

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
                                                <?php 
                                                    // Collect all images, brands, and models for each order
                                                    $images = [];
                                                    $brands = [];
                                                    $models = [];

                                                    foreach ($order['items'] as $item) {
                                                        $images[] = !empty($item['image']) 
                                                                    ? '<img src="' . base_url('public/uploads/' . $item['image']) . '" alt="Image" style="width: 50px; height: 50px;">' 
                                                                    : '--';
                                                        // $brands[] = esc($item['brand_title'] ?? $item['other_brand']);
                                                        // $models[] = esc($item['model_title'] ?? $item['other_model']);
                                                        $brands[] = $item['other_brand'];
                                                        $models[] = $item['other_model'];
                                                    }
                                                ?>
                                                <tr>
                                                    <td>QAS<?= $order['id'] ?></td>
                                                    <td><?= esc($order['user_name']) ?></td>
                                                    <td><?= esc($order['user_mobile']) ?></td>
                                                    <td><?= esc($order['other_mobile']) ?? "--" ?></td>
                                                    <td><?= esc($order['email']) ?></td>
                                                    <td><?= implode(' ', $images) ?? '--'; ?></td>
                                                    <td><?= implode('<br>', $brands); ?></td>
                                                    <td><?= implode('<br>', $models); ?></td>
                                                    <td> <div class="<?= $className ?>"><?= $order['status'] ?></div></td>
                                                    <td><?= date('d-m-Y', strtotime($order['created_at'])) ?></td>
                                                    <td class="text-right">
                                                        <a href="<?= base_url('admin/view-order/' . $order['id']); ?>" 
                                                        class="btn btn-sm btn-primary">View</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="10" class="text-center">No Orders Found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

<?= view('admin/partials/footer.php') ?>
<?= view('admin/partials/script.php') ?>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure want to delete ?',  // Custom heading/title
            // text: 'This action canno!', // Custom message
            icon: 'warning',
            showCancelButton: true,   // Show cancel button
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete URL if confirmed
                window.location.href = "<?= base_url('/admin/delete-service/') ?>" + id;
            }
        });
    }
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable("#order_table")) {
            $("#order_table").DataTable().destroy();
        }

        $("#order_table").DataTable({
            "order": [[0, "desc"]],
            "destroy": true,
        });
    });
</script>