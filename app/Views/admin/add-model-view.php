<?= view('admin/partials/header.php') ?>
<?= view('admin/partials/sidebar.php') ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Add Model</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Models') ?>">Models</a></li>
                            <li class="breadcrumb-item active">Add Model</li>
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
                            <form action="<?= base_url('admin/add-model') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Brand</label>
                                            <select name="brand_id" id="brand_id" class="form-control">
                                                <option value="">Select Brand</option>
                                                <?php foreach($brands as $brand): ?>
                                                    <option value="<?=$brand['id']?>" <?=set_select('brands',$brand['id'])?> ><?=$brand['title']?></option>
                                                <?php endforeach; ?>    
                                            </select>
                                            <small class="text-danger"><?= validation_show_error('brand_id') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive mt-4">
                                        <table class="table table-center table-hover" id="serviceTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 25%;">Title</th>
                                                    <th style="width: 20%;">Icon</th>
                                                    <th style="width: 15%;">Order Number</th>
                                                    <th style="width: 15%;">Type</th>
                                                    <th style="width: 20%;">Description</th>
                                                    <th style="width: 5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="title[]" class="form-control" value="" required>
                                                    </td>
                                                    <td>
                                                        <input type="file" name="image[]" class="form-control" value="" required>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="order_number[]" class="form-control" value="" required>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="type">
                                                            <option>Select Type</option>
                                                            <option value="Mobile">Mobile</option>
                                                            <option value="iPad">iPad & Tablet</option>
                                                            <option value="Apple Watch">Apple Watch</option>
                                                            <option value="MacBook">MacBook</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" rows="1" name="description[]"></textarea>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm plus" style="padding: 6px 8px 3px 8px;"><i class="fas fa-plus"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm minus" style="padding: 6px 8px 3px 8px; display:none;"><i class="fas fa-minus"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
    $(document).ready(function(){
        $(document).on("click", ".plus", function(){
            var $tr = $(this).closest("tr");
            var $clone = $tr.clone();

            $clone.find("input").val(""); 

            // Show the minus button and keep plus button only in the last row
            $tr.find(".plus").hide();
            $tr.find(".minus").show();
            
            $("#serviceTable tbody").append($clone);
        });

        $(document).on("click", ".minus", function(){
            $(this).closest("tr").remove(); 

            // Ensure the last row always has a plus button
            $("#serviceTable tbody tr:last").find(".plus").show();
            $("#serviceTable tbody tr:last").find(".minus").hide();
        });
    });
</script>