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
                        <h3 class="page-title">Add Testimonial</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Testimonials') ?>">Manage Testimonial</a></li>
                            <li class="breadcrumb-item active">Add Testimonial</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/add-testimonial') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="user_name" class="form-control" value="<?= set_value('user_name') ?>">
                                            <small class="text-danger"><?= validation_show_error('user_name') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                            <small class="text-danger"><?= validation_show_error('description') ?></small>
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
        .create(document.querySelector('#terms_condition'))
        .catch(error => {
            console.error(error);
    });
</script>