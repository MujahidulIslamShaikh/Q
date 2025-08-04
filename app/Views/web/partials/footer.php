    <?php
        use App\Models\MobileModel;
        use App\Models\EmailModel;
        use App\Models\AddressModel;

        $MobileModel = new MobileModel();
        $EmailModel = new EmailModel();
        $AddressModel = new AddressModel();

        $mobile = $MobileModel->findAll();
        $email = $EmailModel->findAll();
        $address = $AddressModel->findAll();
    ?>

    <a href="https://wa.me/9324316048" class="whatsapp_icon" style="">
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
    </a>
    
    <!--footer area start-->
    <footer class="footer_widgets" style="background: linear-gradient(to right, #F1F2FA, #80D9CC);">
        <div class="footer_top" style="background: linear-gradient(to right, #F1F2FA, #80D9CC);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container widget_menu">
                            <h3>CONTACT US</h3>
                            <div class="footer_contact">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 20px; margin-right: 15px;"></i>
                                    </p>
                                    <p> 
                                        <?php foreach($address as $address): ?>
                                            <?= $address['address'] ?> <br> 
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class="m-0">
                                        <i class="fa fa-envelope" aria-hidden="true" style="font-size: 18px; margin-right: 15px;"></i>
                                    </p>
                                    <p>
                                        <?php foreach($email as $email): ?>
                                            <?= $email['email'] ?> <br>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class="m-0">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 20px; margin-right: 15px;"></i>
                                    </p>
                                    <p>
                                        <?php foreach($mobile as $mobile): ?>
                                            <?= $mobile['mobile'] ?> <br>
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                                <div class="footer_social_link mt-4">
                                    <ul>
                                        <li><a class="facebook" href="https://facebook.com/@qaswatelecom1" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <!-- <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a> -->
                                        </li>
                                        <li><a class="instagram" href="http://www.instagram.com/qaswatelecom" title="instagram"><i
                                                    class="fa fa-instagram"></i></a></li>
                                        <li><a class="linkedin" href="https://youtube.com/@qaswatelecom" title="youtube"><i class="fa fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>SERVICES</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="">Mobile</a></li>
                                    <li><a href="">Tablets</a></li>
                                    <li><a href="">MacBook</a></li>
                                    <li><a href="">Apple Watch</a></li>
                                    <li><a href="">iPhone</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Pages</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="<?= base_url('/About') ?>">About Us</a></li>
                                    <li><a href="<?= base_url('/Blogs') ?>">Blogs</a></li>
                                    <li><a href="<?= base_url('/Gallery') ?>">Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>HELP & SUPPORT</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="<?= base_url('/TermsCondition') ?>">Term & Conditions</a></li>
                                    <li><a href="<?= base_url('/EwastePolicy') ?>">E-waste Policy</a></li>
                                    <li><a href="<?= base_url('/PrivacyPolicy') ?>">Privacy Policy</a></li>
                                    <li><a href="<?= base_url('/WarrantyPolicy') ?>">Warranty policy</a></li>
                                    <li><a href="<?= base_url('/Contact') ?>">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="copyright_area text-center">
                            <p style="font-size: 12px;">"All product names, logos, and brands are the property of their respective owners. All company, product and service names used in this website are for identification purposes only. Use of these names, logos, and brands does not imply endorsement. <a href="<?= base_url('/') ?>">'QASWA TELECOM'</a> is a third-party repair company and is not affiliated with any brand listed on our website"</p>
                            <p class="copyright-text">Copyright &copy; 2025 <a href="<?= base_url('/') ?>">Qaswa Telecom</a>. All right reserved.</p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->

    <!-- JS
============================================ -->

   <!-- Plugins JS -->
<script src="<?= base_url('assets/web/js/plugins.js') ?>"></script>

<!-- Main JS -->
<script src="<?= base_url('assets/web/js/main.js') ?>"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/feather-icons"></script>

<!-- ✅ Lightbox2 JS & Config -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script>
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'fadeDuration': 200,
    'imageFadeDuration': 200,
    'fitImagesInViewport': true,
    'disableScrolling': true
  });
</script>

<!-- Optional: GLightbox (Only if you're using it) -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

</body>
</html>