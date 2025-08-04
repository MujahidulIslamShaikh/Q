<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <style>
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Edit About Us</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/About') ?>">Manage About Us</a></li>
                            <li class="breadcrumb-item active">Edit About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/edit-about/'.$about['id']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">About Us</label>
                                            <textarea class="form-control" rows="5" name="about_us" id="about_us"><?= $about['about_us'] ?></textarea>
                                            <small class="text-danger"><?= validation_show_error('about_us') ?></small>
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

<script>
    ClassicEditor
        .create(document.querySelector('#about_us'))
        .catch(error => {
            console.error(error);
    });
</script>