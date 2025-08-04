<?= view('web/partials/header.php') ?>

<style>
h4 {
    font-weight: 500;
}

.i_btn {
    color: #00b3a0;
    font-size: 11px;
    border: 1px solid #00b3a0;
    padding: 0px 5px;
    border-radius: 28px;
    margin-left: 2px;
}

.description h4 {
    font-size: 24px;
    margin-bottom: 16px;
}

.description p {
    font-size: 16px;
}
.modal-content button.close {
    top: 20px;
    width: 28px;
    height: 28px;
    left: 92%;
}
.modal-content button.close span {
    font-size: 24px;
    display: block;
    height: 28px;
}
.modal_body .section_title {
    padding-right: 32px;
    margin-bottom: 16px;
}
.section_title h2 {
    font-size: 22px;
    font-weight: 400;
    margin-bottom: 20px;
}
.modal_body {
    padding: 16px 8px;
}
.modal_body label {
    font-size: 16px;
}
.modal-content {
    border-radius: 16px;
}
@media (min-width: 768px) {
    .section_title h2 {
        font-size: 28px;
        font-weight: 500;
    }
}
@media (max-width: 767px) {
    .section_title h2 {
        text-align: left;
        font-size: 20px;
        font-weight: 500;
        line-height: 26px;
        margin-bottom: 0;
    }
    .modal-content button.close {
        left: 88%;
    }
}
</style>

<?php 
        $session = session();
        $isLoggedIn = $session->get('isLoggedIn');
    ?>

<!--breadcrumbs area start-->
<!-- <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?= base_url('/') ?>">home</a></li>
                            <li><a href="<?= base_url($brand['title'].'/models') ?>">select model</a></li>
                            <li>select Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!--breadcrumbs area end-->

<div class="container">
    <div class="row">
        <?php if (session()->has('success')) : ?>
        <div class="row justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
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
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-danger d-flex align-items-center alert-dismissible" role="alert">
                <!-- <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg> -->
                <div>
                    Error! <?= session('error') ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Select model area start-->
<section class="featured_product_area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Available services for : &nbsp; <span style="color: #03b5a5;"><?= $model['title'] ?></span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="border-right: 1px solid #ebebeb;">
                <div class="row">
                    <?php if($services): ?>
                    <?php foreach($services as $service): ?>
                    <?php
                                    // Check if the service is in the cart
                                    $inCart = false;
                                    foreach ($cart as $cartItem) {
                                        if ($cartItem['service_id'] == $service['id']) {
                                            $inCart = true;
                                            break;
                                        }
                                    }
                                ?>
                    <div class="col-lg-6 mb-2 mb-md-3">
                        <div class="top_category_container">
                            <article class="single_category p-2">
                                <figure class="d-flex align-items-center justify-content-start">
                                    <!-- <?php if($service['percent_off'] > 0) : ?>
                                                    <span class="percent_off"><?= $service['percent_off'] ?>% Off</span>
                                                <?php endif; ?> -->
                                    <div class="" style="width: 120px;height: 80px;">
                                        <img src="<?= base_url('public/uploads/'.$service['image']) ?>" alt="Brands"
                                            style="width: 100%; height: 100%;">
                                    </div>
                                    <figcaption class="category_name text-start p-3 w-100">

                                        <!-- <h3 style="color: #03b5a5;">
                                                        <?php if($service['main_price'] > $service['discounted_price']) : ?>
                                                            <span style="text-decoration: line-through;color: #000;">₹<?= $service['main_price'] ?></span> &nbsp; 
                                                        <?php endif; ?>
                                                        ₹<?= $service['discounted_price'] ?>
                                                    </h3> -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4><?= $service['title'] ?></h4>
                                            <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" 
                                                            data-service-id="<?= $service['id'] ?>" 
                                                            title="view details" class="warranty-details mt-2" style="color: #03b5a5; font-weight: 500;">Warranty Details <span class="i_btn">i</span></a> -->
                                            <?php if ($inCart): ?>
                                            <a href="<?= base_url('cart-remove/' . $service['id']) ?>"
                                                class="btn btn-danger btn-sm">Remove</a>
                                            <?php else: ?>
                                            <button class="btn btn-primary btn-sm"
                                                onclick="addToCart(<?= $service['id'] ?>)">Add</button>
                                            <?php endif; ?>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else:  ?>
                    <div class="col-md-12">
                        <h4 class="text-center">No Service available for <?= $model['title'] ?>.</h4>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button class="btn btn-primary other_service_btn mb-4">Other Issues</button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="other_service_sec">
                            <input type="hidden" name="other_brand" id="other_brand" value="<?= $brand['title'] ?>">
                            <input type="hidden" name="other_model" id="other_model" value="<?= $model['title'] ?>">
                            <div class="form-group">
                                <label class="form-label">Describe your issue</label>
                                <textarea class="form-control" rows="3" name="title" required></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm mt-3" onclick="addToCart(0)">Add</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(!empty($others)): ?>
                    <?php foreach($others as $other): ?>
                    <?php
                                    // Check if the service is in the cart
                                    $itemCart = false;
                                    foreach ($cart as $cartItem) {
                                        if ($cartItem['service_id'] == 0) {
                                            $itemCart = true;
                                            break;
                                        }
                                    }
                                ?>
                    <div class="col-md-6 mb-3">
                        <div class="top_category_container">
                            <article class="single_category p-0">
                                <figure class="">
                                    <figcaption
                                        class="category_name text-start p-3 w-100 m-0 d-flex align-items-center justify-content-between">
                                        <h4 class="m-0"><?= $other['other_service'] ?></h4>
                                        <div class="text-end">
                                            <?php if ($itemCart): ?>
                                            <a href="<?= base_url('cart-remove-other/0/'.$other['other_service']) ?>"
                                                class="btn btn-danger btn-sm">Remove</a>
                                            <?php endif; ?>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4" id="cart_section">
                <div class="top_category_container">
                    <article class="single_category">
                        <figure class="">
                            <figcaption class="category_name text-start w-100">
                                <div class="cart_heading mb-3">Cart</div>
                                <?php 
                                        $totalAmount = 0;
                                        $serviceIds = [];
                                        $other_service = [];
                                        if ($cart): $a=1;
                                            foreach ($cart as $cartItem): 
                                                $totalAmount += $cartItem['discounted_price'];
                                                $serviceIds[] = $cartItem['service_id'];
                                                $other_service[] = $cartItem['other_service'];
                                    ?>
                                
                                    <?php if(!$cartItem['service_id'] > 0): ?>
                                    <div class="d-flex justify-content-between my-2">
                                        <div class="cart_text"><?= $a ?> - <?= $model['title'] ?> - <?= $cartItem['other_service'] ?></div>
                                        <!-- <div class="cart_text"> &#10004; </div> -->
                                    </div>
                                    <hr class="m-0">
                                    <?php else: ?>
                                    <div class="d-flex justify-content-between my-2">
                                        <div class="cart_text"><?= $a ?> - <?= $model['title'] ?> - <?= $cartItem['title'] ?></div>
                                        <!-- <div class="cart_text"> &#10004; </div> -->
                                        <!-- <div class="cart_text">₹<?= $cartItem['discounted_price'] ?></div> -->
                                    </div>
                                    <hr class="m-0">
                                    <?php endif; ?>
                               
                                <?php $a++;
                                        endforeach; 
                                        endif;
                                        $session = \Config\Services::session();
                                        $session->set('total_amount', number_format($totalAmount, 2));
                                        $session->set('service_ids', $serviceIds);
                                        $session->set('other_service', $other_service);
                                    ?>
                                <?php if(!$cart): ?>
                                    <div class="d-flex justify-content-between">
                                        <div class="cart_text">No items in cart</div>
                                        <div class="cart_text"> &#10008; </div>
                                    </div>
                                <?php endif; ?>
                                <!-- <div class="d-flex justify-content-between mt-3">
                                        <div class="cart_text" style="font-size: 18px; font-weight: 500;">Total : </div>
                                        <div class="cart_text" style="font-size: 18px; font-weight: 500;">₹<?= number_format($totalAmount, 2) ?></div>
                                    </div> -->
                                <!-- <a href="<?= base_url('/Checkout') ?>" class="btn btn-primary w-100 mt-3">Proceed</a> -->
                                <?php if ($cart): ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#proceedModal"
                                    class="btn btn-primary w-100 mt-3">Proceed</a>
                                <?php endif; ?>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Select model area end-->

<!-- Why choose us area start-->
<section class="top_category_product mb-70" id="why_choose_us">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>WHY CHOOSE US</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-4 text-center">
                <img class="why_image" src="<?= base_url('assets/web/img/service/Data Security.jpg')?>" alt="Icon"
                    style="">
                <h4 class="mt-1" style="font-size: 18px; font-weight: 600;">Data Security</h4>
            </div>
            <div class="col-md-4 col-4 text-center">
                <img class="why_image" src="<?= base_url('assets/web/img/service/Pay After Service.jpg')?>" alt="Icon"
                    style="">
                <h4 class="mt-1" style="font-size: 18px; font-weight: 600;">Pay After Service</h4>
            </div>
            <div class="col-md-4 col-4 text-center ">
                <img class="why_image" src="<?= base_url('assets/web/img/service/Quick Repair Service.jpg')?>"
                    alt="Icon" style="">
                <h4 class="mt-1" style="font-size: 18px; font-weight: 600;">Quick Repair Service</h4>
            </div>
        </div>
    </div>
</section>
<!-- Why choose us area end-->

<!--FAQ area start-->
<!-- <div class="accordion_area featured_product_area">
        <div class="container">
        <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>FAQs</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="accordion" class="card__accordion">
                        <?php if ($faqs): ?>
                            <?php foreach ($faqs as $index => $faq): ?>
                                <div class="card card_dipult">
                                    <div class="card-header card_accor" id="heading<?= $index ?>">
                                        <button class="btn btn-link <?= $index === 0 ? '' : 'collapsed' ?>" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#collapse<?= $index ?>" 
                                            aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" 
                                            aria-controls="collapse<?= $index ?>">
                                            <?= esc($faq['question']) ?> 
                                            <i class="fa fa-plus"></i>
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <div id="collapse<?= $index ?>" 
                                        class="collapse <?= $index === 0 ? 'show' : '' ?>" 
                                        aria-labelledby="heading<?= $index ?>" 
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p><?= esc($faq['answer']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3 class="text-center">No FAQs available</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!--FAQ area end-->

<!-- Description area start-->
<!-- <section class="featured_product_area pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 description">
                    <?= $model['description'] ?>
                </div>
            </div>
        </div>
    </section> -->
<!-- Description area end-->

<!-- ✅ Model-Wise Blog Article Load -->
<?php
    $brandSlug = strtolower(trim(str_replace([' ', '+'], ['-', ''], $brand['title'])));
    $modelSlug = strtolower(trim(str_replace([' ', '+'], ['-', ''], $model['title'])));
    // print_r($brandSlug . $modelSlug); echo "<br>";
    // Replace 'appleiphone' with 'apple-iphone' for the article path
    if ($brandSlug === 'appleiphone') {
        $brandSlug = 'apple';
    }
    if ($brandSlug == 'apple-iphone') {
        $brandSlug = 'apple';
    }
    $articleViewPath = 'web/service-articles/' . $modelSlug;
    $articleFullPath = APPPATH . 'Views/' . $articleViewPath . '.php';
    // print_r($articleFullPath);
    ?>

<!-- âœ… BLOG CSS -->
<style>
.model-article-section {
    padding-top: 20px;
    padding-bottom: 40px;
}

.model-article-box {
    border: 1px solid #00b2a2;
    border-radius: 14px;
    padding: 24px;
    background-color: #f9f9f9;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    font-family: 'Poppins', sans-serif;
    color: #222;
    max-width: 1240px;
    margin: auto;
}

.model-article-box h2,
.model-article-box h3 {
    font-weight: 600;
    font-size: 24px;
    margin-bottom: 20px;
}

.model-article-box p,
.model-article-box li {
    font-size: 17px;
    line-height: 1.9;
    margin-bottom: 16px;
}

@media (max-width: 767px) {
    .model-article-box {
        padding: 16px !important;
        border-radius: 10px !important;
        margin-left: 10px !important;
        margin-right: 10px !important;
    }

    .model-article-box h2 {
        font-size: 21px;
    }

    .model-article-box h3 {
        font-size: 18px;
    }

    .model-article-box p,
    .model-article-box li {
        font-size: 15.5px;
        line-height: 1.7;
    }
}
</style>

<!-- âœ… BLOG SECTION -->
<section class="model-article-section">
    <?php if (file_exists($articleFullPath)): ?>
    <div class="model-article-box">
        <?= view($articleViewPath) ?>
    </div>
    <?php endif; ?>
</section>

<!-- âœ… Clearfix before footer to fix cut issue -->
<div style="clear: both; padding-top: 20px;"></div>

<?= view('web/partials/footer.php') ?>

<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section_title">
                                <h2>Warranty Details</h2>
                            </div>
                            <div id="warranty-description"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="proceedModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section_title">
                                <h4 style="font-weight: 500; font-size: 18px; line-height: 26px; margin: 0;"> You’re just 1-step away to view <?= $model['title'] ?? '' ?> Repair Cost!</h4>
                            </div>
                            <form id="orderForm">
                                <?php if (!empty($cart)): ?>
                                <?php foreach ($cart as $index => $cartItem): ?>
                                <input type="hidden" name="cart[<?= $index ?>][id]"
                                    value="<?= $cartItem['id'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][user_id]"
                                    value="<?= $cartItem['user_id'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][service_id]"
                                    value="<?= $cartItem['service_id'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][title]"
                                    value="<?= $cartItem['title'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][description]"
                                    value="<?= $cartItem['description'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][main_price]"
                                    value="<?= $cartItem['main_price'] ?? 0 ?>">
                                <input type="hidden" name="cart[<?= $index ?>][discounted_price]"
                                    value="<?= $cartItem['discounted_price'] ?? 0 ?>">
                                <input type="hidden" name="cart[<?= $index ?>][brand_name]"
                                    value="<?= $brand['title'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][model_name]"
                                    value="<?= $model['title'] ?? '' ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][image]"
                                    value="<?= $cartItem['image'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][other_service]"
                                    value="<?= $cartItem['other_service'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][other_brand]"
                                    value="<?= $brand['title'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][other_model]"
                                    value="<?= $model['title'] ?? '' ?>">
                                <input type="hidden" name="cart[<?= $index ?>][discounted_price]"
                                    value="<?= $cartItem['discounted_price'] ?? '' ?>">
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 mb-20">
                                                <label>Full Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="<?= set_value('name', $user['name'] ?? '') ?>">
                                            </div>
                                            <div class="col-lg-12 mb-20">
                                                <label>Mobile Number <span class="text-danger">*</span></label>
                                                <input type="text" oninput="validateMobileNumber(this)" name="mobile"
                                                    class="form-control" value="<?= set_value('mobile', $user['mobile'] ?? '') ?>">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>City <span class="text-danger">*</span></label>
                                                <input type="text" name="city" class="form-control"
                                                    value="<?= set_value('city', $user['city'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn w-80 text-white" style="background-color: #29a71a;">Get Free Quote <img src="<?= base_url('assets/web/img/whatsapp.png') ?>" alt="whatsapp" style="width: 30px; height: 30px;"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->

<script>
document.querySelectorAll('.warranty-details').forEach(link => {
    link.addEventListener('click', function(e) {
        const serviceId = this.getAttribute('data-service-id');

        fetch(`<?= base_url() ?>getWarrantyDetails/${serviceId}`)
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.json();
            })
            .then(data => {
                document.getElementById('warranty-description').innerHTML =
                    data.description ? data.description : 'Data not Available.';
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('warranty-description').innerHTML =
                    'Failed to load warranty details.';
            });
    });
});

function checkLogin() {
    var isLoggedIn = <?= json_encode($isLoggedIn) ?>;
    if (!isLoggedIn) {
        Swal.fire({
            title: 'Not Logged In',
            text: 'Please log in to add this item.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('/Login') ?>";
            }
        });
        return false;
    }
    return true;
}

function addToCart(serviceId) {
    let titleValue = document.querySelector("textarea[name='title']")?.value || '';
    let other_brand = document.getElementById("other_brand")?.value || '';
    let other_model = document.getElementById("other_model")?.value || '';
    fetch("<?= base_url('/add-to-cart') ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                service_id: serviceId,
                title: titleValue,
                otherBrand: other_brand,
                otherModel: other_model
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Swal.fire({
                //     title: 'Added to Cart!',
                //     text: 'Item added to cart successfully!',
                //     icon: 'success',
                //     timer: 1500,
                //     showConfirmButton: false
                // }).then(() => {
                //     location.reload();
                // });
                location.reload();
            } else {
                console.log('Error:', data.message);
                Swal.fire({
                    title: 'Failed!',
                    text: 'Failed to add item to cart. Please try again.',
                    icon: 'error'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred. Please try again.',
                icon: 'error'
            });
        });
}

function handleAddToCart(serviceId) {
    // if (checkLogin()) { 
    //     addToCart(serviceId);
    // }
}

$(document).ready(function() {
    $(".other_service_sec").hide(); // Initially hide the section

    $(".other_service_btn").click(function() {
        $(".other_service_sec").toggle(); // Toggle visibility
    });
});

    document.getElementById("orderForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);
        let form = this;
        let submitButton = form.querySelector("button[type='submit']");

        submitButton.disabled = true;
        submitButton.innerText = "Processing...";

        fetch("<?= base_url('/order-confirm') ?>", {
            method: "POST",
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server Response:", data); // Log the response

            if (data.success) {
                window.open(data.whatsapp_url, '_blank');
                window.location.reload();
                // Swal.fire({
                //     title: "Order Confirmed!",
                //     text: "Your order has been successfully placed.",
                //     icon: "success",
                //     showCancelButton: true,
                //     confirmButtonText: "My Orders",
                //     cancelButtonText: "Home"
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         window.location.href = "<?= base_url('/myOrders') ?>";
                //     } else {
                //         window.location.href = "<?= base_url('/') ?>";
                //     }
                // });
            } else {
                // Ensure `data.errors` exists before using it
                if (data.errors) {
                    let errorMessages = Object.values(data.errors).join("\n");
                    Swal.fire("Validation Error!", errorMessages, "error");
                } else {
                    Swal.fire("Error!", data.message || "Something went wrong.", "error");
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire("Error!", "Server error. Please try again later.", "error");
        })
        .finally(() => {
            // Re-enable the button after the request is completed
            submitButton.disabled = false;
            submitButton.innerText = "Order Confirm";
        });
    });


    function validateMobileNumber(input) {
        input.value = input.value.replace(/[^0-9]/g, '').slice(0, 10);
    }
</script>