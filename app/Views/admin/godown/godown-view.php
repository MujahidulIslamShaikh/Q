<?= view('admin/partials/header.php') ?>
<!-- abhi mai views me admin me godown me godown-view.php file bana raha hoon to path sahi kar -->
<?= view('admin/partials/sidebar.php') ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Godown</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Godown</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('admin/add-godown') ?>" class="btn btn-primary me-1">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php if (session()->has('success')) : ?>
            <div class="row justify-content-center">
                <div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                    <div>
                        Success! <?= session('success') ?>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->has('error')) : ?>
            <div class="row justify-content-center">
                <div class="alert alert-danger d-flex align-items-center alert-dismissible" role="alert">
                    <div>
                        Error! <?= session('error') ?>
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
                                        <th>Banner Title</th>
                                        <th>Banner Image</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1;
                                    foreach ($banners as $banner): ?>
                                        <tr>
                                            <td><?= $a++; ?> </td>
                                            <td><img src="<?= base_url('public/uploads/' . $banner['image']) ?>" alt="Icon" style="width: 250px; height: 50px;"></td>
                                            <td><?= date('d-m-Y', strtotime($banner['created_at'])) ?></td>
                                            <td class="text-right">
                                                <!-- <a href="<?= base_url('admin/edit-banner/' . $banner['id']) ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> Edit</a> -->
                                                <a href="javascript:void(0);" onclick="confirmDelete(<?= $banner['id'] ?>)" class="btn btn-sm btn-white text-danger me-2">
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
</div>
<!-- /Page Wrapper -->

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure want to delete ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('/admin/delete-godown/') ?>" + id;
            }
        });
    }
</script>

<?= view('admin/partials/footer.php') ?>
<?= view('admin/partials/script.php') ?>