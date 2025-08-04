<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
           
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Manage About Us</h3>
                        <ul class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li> -->
                            <li class="breadcrumb-item active">Manage About Us</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('admin/add-about') ?>" class="btn btn-primary me-1">
                            <i class="fas fa-plus"></i>
                        </a>
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
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Sr no</th>
                                            <th>About Us</th>
                                            <th>Created Date</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a=1; foreach($about as $about): ?>
                                        <tr>
                                            <td><?= $a++; ?></td>
                                            <td> <?= substr($about['about_us'], 0, 30) . '...'; ?> </td>
                                            <td><?= date('d-m-Y', strtotime($about['created_at'])) ?></td>
                                            <td class="text-right">
                                                <a href="<?= base_url('admin/edit-about/'.$about['id']) ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> Edit</a>
                                                <a href="javascript:void(0);" onclick="confirmDelete(<?= $about['id'] ?>)" class="btn btn-sm btn-white text-danger me-2">
                                                    <i class="far fa-trash-alt me-1"></i>Delete</a>                                                
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
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
                    window.location.href = "<?= base_url('/admin/delete-about/') ?>" + id;
                }
            });
        }
    </script>

<?= view('admin/partials/footer.php') ?>
<?= view('admin/partials/script.php') ?>