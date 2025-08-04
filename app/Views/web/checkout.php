<?= view('web/partials/header.php') ?>

<style>
    form span {
        color: red;
    }
</style>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?= base_url('/') ?>">home</a></li>
                            <li>checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
        <div class="container">
            <div class="checkout_form">
                <!-- <form action="<?= base_url('/order-confirm') ?>" method="post" enctype="multipart/form-data"> -->
                <form id="orderForm">
                    <?php if (!empty($cart)): ?>
                        <?php foreach ($cart as $index => $cartItem): ?>
                            <input type="hidden" name="cart[<?= $index ?>][id]" value="<?= $cartItem['id'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][user_id]" value="<?= $cartItem['user_id'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][service_id]" value="<?= $cartItem['service_id'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][title]" value="<?= $cartItem['title'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][description]" value="<?= $cartItem['description'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][main_price]" value="<?= $cartItem['main_price'] ?? 0 ?>">
                            <input type="hidden" name="cart[<?= $index ?>][discounted_price]" value="<?= $cartItem['discounted_price'] ?? 0 ?>">
                            <input type="hidden" name="cart[<?= $index ?>][brand_name]" value="<?= $cartItem['brand_name'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][model_name]" value="<?= $cartItem['model_name'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][image]" value="<?= $cartItem['image'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][other_service]" value="<?= $cartItem['other_service'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][other_brand]" value="<?= $cartItem['other_brand'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][other_model]" value="<?= $cartItem['other_model'] ?? '' ?>">
                            <input type="hidden" name="cart[<?= $index ?>][discounted_price]" value="<?= $cartItem['discounted_price'] ?? '' ?>">
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4">
                            <h3>PERSONAL INFORMATION</h3>
                            <div class="row">
                                <div class="col-lg-12 mb-20">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="name" value="<?= set_value('name', $user['name'] ?? '') ?>">
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <label>Mobile Number <span>*</span></label>
                                    <input type="text" oninput="validateMobileNumber(this)" name="mobile" value="<?= set_value('mobile', $user['mobile'] ?? '') ?>">
                                </div>
                                <!-- <div class="col-lg-6 mb-20">
                                    <label>Alternate Mobile Number </label>
                                    <input type="text" oninput="validateMobileNumber(this)" name="other_mobile" value="<?= set_value('other_mobile', $user['other_mobile'] ?? '') ?>">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address <span>*</span></label>
                                    <input type="email" name="email" value="<?= set_value('email', $user['email'] ?? '') ?>">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Address <span>*</span></label>
                                    <input type="text" name="address" value="<?= set_value('address', $user['address'] ?? '') ?>">
                                </div> -->
                                <div class="col-12 mb-20">
                                    <label>City <span>*</span></label>
                                    <input type="text" name="city" value="<?= set_value('city', $user['city'] ?? '') ?>">
                                </div>
                                <!-- <div class="col-6 mb-20">
                                    <label>Landmark <span>*</span></label>
                                    <input type="text" name="landmark" value="<?= set_value('landmark', $user['landmark'] ?? '') ?>">
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm w-80">Order Confirm</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6">
                            <h3>Price Details</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> Best Price </td>
                                            <td> ₹<?= $total ?></td>
                                        </tr>
                                        <tr>
                                            <td> Discount </td>
                                            <td> ₹0</td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td> ₹<?= $total ?>  <input type="hidden" name="total_amount" value="<?= $total ?>"></td>
                                        </tr>
                                        <tr>
                                            <td> Choose Repair Date <span>*</span></td>
                                            <td> 
                                                <input type="date" style="width: 60%;" name="repair_date">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Choose Repair Time <span>*</span></td>
                                            <td> 
                                                <input type="time" style="width: 60%;" name="repair_time">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Choose Repair Type <span>*</span></td>
                                            <td> 
                                                <div class="radio">
                                                    <input type="radio" id="doorstep_repair" name="repair_type" value="Doorstep Repair" class="repair_type mx-2">
                                                    <label for="doorstep_repair" class="radio-label">Doorstep Repair</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="pick_drop" name="repair_type" value="Pick and drop" class="repair_type mx-2">
                                                    <label for="pick_drop" class="radio-label">Pick and drop</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Please Note: We are proving service between 9am to 9pm daily. <br>
                                                If booking made 7.30pm will be scheduled next day <br>
                                                <button type="submit" class="btn btn-primary btn-sm w-80 my-3">Order Confirm</button>
                                                <button class="btn btn-primary btn-sm w-80 my-3 mx-2">Pick and drop</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->

<?= view('web/partials/footer.php') ?>

<script>
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
                Swal.fire({
                    title: "Order Confirmed!",
                    text: "Your order has been successfully placed.",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonText: "My Orders",
                    cancelButtonText: "Home"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url('/myOrders') ?>";
                    } else {
                        window.location.href = "<?= base_url('/') ?>";
                    }
                });
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