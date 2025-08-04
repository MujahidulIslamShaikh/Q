<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <style>
        .ck-editor__editable {
            min-height: 100px; /* Set desired height */
            max-height: 300px; /* Optional max height */
            width: 100%; /* Adjust width as needed */
        }
    </style>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Edit Brand</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Brands') ?>">Brands</a></li>
                            <li class="breadcrumb-item active">Edit Brand</li>
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
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/edit-brand/'.$brand['id']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title" class="form-control" value="<?= $brand['title'] ?>">
                                                    <small class="text-danger"><?= validation_show_error('title') ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon (120x120)</label>
                                                    <input type="file" name="image" class="form-control" value="">
                                                    <small class="text-danger"><?= validation_show_error('image') ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" rows="1" name="description" id="description"><?= $brand['description'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Order Number</label>
                                                    <input type="number" name="order_number" class="form-control" value="<?= $brand['order_number'] ?>">
                                                    <small class="text-danger"><?= validation_show_error('order_number') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="<?= base_url('public/uploads/'.$brand['image']) ?>" alt="icon" style="width: 100px; height: 100px;">
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
            console.error(error);
    });
</script>