<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <style>
        .table>tbody>tr>td {
            padding: 10px 5px;
        }
    </style>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Edit Service</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Services') ?>">Manage Repair Service</a></li>
                            <li class="breadcrumb-item active">Edit Service</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Services for <?= $model_title ?> </h4>
                            <form action="<?= base_url('admin/edit-service/'.$model_id) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="hidden" name="model_id" value="<?= $model_id ?>">
                                <input type="hidden" name="brand_id" value="<?= $brand_id ?>">
                               
                                <div class="row  align-items-center">
                                    <div class="table-responsive mt-4">
                                        <table class="table table-center table-hover" id="serviceTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;">Title</th>
                                                    <th style="width: 16%;">Icon</th>
                                                    <th style="width: 12%;">Main Price</th>
                                                    <th style="width: 12%;">Discounted Price</th>
                                                    <th style="width: 10%;">Percentage Off</th>
                                                    <th style="width: 20%;">Description</th>
                                                    <th style="width: 5%;">Image</th>
                                                    <th style="width: 5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($services) : ?>
                                                <?php foreach($services as $service) : ?>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="id[]" class="form-control" value="<?= $service['id'] ?>" >
                                                            <input type="text" name="title[]" class="form-control" value="<?= $service['title'] ?>" required>
                                                        </td>
                                                        <td>
                                                            <input type="file" name="image[]" class="form-control" value="">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="main_price[]" class="form-control" value="<?= $service['main_price'] ?>" oninput="calculatePercentageOff(event)" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="discounted_price[]" class="form-control" value="<?= $service['discounted_price'] ?>" oninput="calculatePercentageOff(event)" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="percent_off[]" class="form-control" value="<?= $service['percent_off'] ?>" readonly>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" rows="1" name="description[]"><?= $service['description'] ?></textarea>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url('public/uploads/'.$service['image']) ?>" alt="icon" style="width: 80px; height: 80px;">
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" onclick="confirmDelete(<?= $service['id'] ?>)" class="text-danger me-2" style="font-size: 18px;">
                                                            <i class="far fa-trash-alt me-1"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
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
    </script>

<script>

    function calculatePercentageOff() {
        let row = event.target.closest('tr'); // Get the current row
        let mainPrice = parseFloat(row.querySelector('[name="main_price[]"]').value);
        let discountPrice = parseFloat(row.querySelector('[name="discounted_price[]"]').value);
        let percentOffField = row.querySelector('[name="percent_off[]"]');

        if (!isNaN(mainPrice) && !isNaN(discountPrice) && mainPrice > 0) {
            let percentageOff = ((mainPrice - discountPrice) / mainPrice) * 100;
            percentOffField.value = percentageOff.toFixed(2);
        } else {
            percentOffField.value = ''; // Clear if invalid
        }
    }

</script>