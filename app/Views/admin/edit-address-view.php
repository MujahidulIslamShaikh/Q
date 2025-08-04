<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Edit Address</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Address') ?>">Manage Address</a></li>
                            <li class="breadcrumb-item active">Edit Address</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/edit-address/'.$address['id']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" rows="3" name="address"><?= $address['address'] ?></textarea>
                                            <small class="text-danger"><?= validation_show_error('address') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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