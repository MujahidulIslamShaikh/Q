<?php
echo view('web/partials/header.php');
echo "mujahid";
?>

<style>
    .video-wrapper iframe {
        width: 100%;
        height: 220px;
    }

    /* ✅ Select Your Device Text Style */
    .device_heading2 {
        font-size: 22px;
        /* Desktop bigger */
        font-weight: 400;
        margin: 0;
        padding: 0;
        line-height: 28px;
    }

    @media (max-width: 767px) {
        .device_heading2 {
            font-size: 16px;
            /* Mobile smaller */
            line-height: 22px;
        }

        .search_container {
            display: none !important;
        }
    }

    /* ✅ COMMON ISSUES BOX - Optimized */
    .category_column5 .single_category {
        flex: 0 0 auto;
        width: 100%;
        max-width: 130px;
        min-height: 160px;
        margin: 0 8px;
        padding: 20px 10px;
        border-radius: 8px;
        background: #ffffff;
        border: 0.5px solid #00b2a2;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    /* ✅ IMAGE WRAPPER */
    .common_issue_img_sec {
        width: 60px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    /* ✅ IMAGE */
    .common_issue_img_sec img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* ✅ TEXT */
    .category_name h3 {
        font-size: 13px;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 16px;
        height: 18px;
        margin: 0;
    }

    /* ✅ MOBILE RESPONSIVE */
    @media (max-width: 767px) {
        .category_column5 .owl-stage {
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

        .category_column5 .single_category {
            width: 110px !important;
            height: 135px !important;
            margin: 0 6px !important;
            padding: 18px 8px 12px 8px !important;
        }

        .common_issue_img_sec {
            height: 60px;
            margin-bottom: 8px;
        }

        .category_name h3 {
            font-size: 12px;
            height: 16px;
        }
    }

    /* ✅ BRANDS WE REPAIR */
    .brand-section .single_category {
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    @media (hover: hover) and (min-width: 768px) {
        .brand-section .single_category:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }
    }

    @media (max-width: 767px) {
        .brand-section .single_category {
            aspect-ratio: 1 / 1;
            height: auto;
            padding: 12px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .brand-section .category_thumb {
            width: 70%;
            height: 70%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-section .category_thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-section .col-4 {
            padding: 6px !important;
            margin-bottom: 6px !important;
        }

        .brand-section .row {
            margin-left: -6px;
            margin-right: -6px;
        }
    }

    /* ✅ DEVICE SECTION */
    .device-section .single_category {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    @media (hover: hover) and (min-width: 768px) {
        .device-section .single_category:hover {
            transform: scale(1.12);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.15);
        }
    }

    #device .device_heading h1 {
        font-weight: 500;
        font-size: 46px;
        margin-bottom: 10px;
    }

    @media (min-width: 992px) {
        #device .device_heading h1 {
            font-size: 60px;
        }
    }

    @media (max-width: 767px) {
        #device .device_heading h1 {
            font-size: 40px;
            line-height: 38px;
        }

        #device .device_heading p {
            font-size: 16px;
            line-height: 22px;
        }

        #device .row.justify-content-center.mt-3 {
            margin: 0 -5px;
        }

        #device .col-6 {
            padding: 5px !important;
            margin-bottom: 0 !important;
        }

        #device .single_category {
            margin: 0 !important;
        }
    }
</style>
<?php

echo '<pre>';
// print_r($banners);
echo '</pre>';


?>
<!--slider area start-->
<section class="slider_section slider_section_two">
    <div class="slider_area owl-carousel">
        <?php foreach ($banners as $banner): ?>
            <div class="single_slider d-flex align-items-center" style="background: url('<?= base_url('public/uploads/' . $banner['image']) ?>') center center / cover no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- ✅ Invisible Image for SEO -->
                            <img src="<?= base_url('public/uploads/' . $banner['image']) ?>" alt="QASWA TELECOM - Doorstep Onsite Mobile Repair in Mumbai" style="width: 100%; height: auto; opacity: 0;" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!--slider area end-->

<!-- Select category area start-->
<section class="top_category_product mb-70" id="device" style="">
    <div class="container device-section">
        <div class="row">
            <div class="col-12">
                <div class="device_heading text-center text-white">
                    <h1>Doorstep Repair Services</h1>
                    <p>For Smartphone, iPad, Apple Watch & MacBook</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-md-3 col-3 pr-5">
                <div style="border: 1px solid #fff; width: 100%;"></div>
            </div>
            <div class="col-md-2 col-6 text-center text-white p-0">
                <p class="device_heading2">Select Your Device</p>
            </div>
            <div class="col-md-3 col-3 pl-5">
                <div style="border: 1px solid #fff; width: 100%;"></div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-3 col-6 mb-3">
                <div class="top_category_container">
                    <a href="<?= base_url('/brands') ?>">
                        <article class="single_category" style="padding: 8px 8px;">
                            <figure class="device_box">
                                <div class="category_thumb device_sec">
                                    <img src="<?= base_url('assets/web/img/icon/MobileRepair.jpg') ?>" alt="Mobile Repair - Doorstep & Onsite Repair Service in Mumbai - QASWA TELECOM" style="width: 100%; height: 100%;">
                                </div>
                                <figcaption class="category_name m-0">
                                    <h3 class="device_name">Mobile Repair</h3>
                                </figcaption>
                            </figure>
                        </article>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="top_category_container">
                    <a href="<?= base_url('apple/iPad/models') ?>">
                        <article class="single_category" style="padding: 8px 8px;">
                            <figure class="device_box">
                                <div class="category_thumb device_sec">
                                    <img src="<?= base_url('assets/web/img/icon/iPadRepair.jpg') ?>" alt="iPad Repair - Doorstep & Onsite Service Repair in Mumbai - QASWA TELECOM" style="width: 100%; height: 100%;">
                                </div>
                                <figcaption class="category_name m-0">
                                    <h3 class="device_name">iPad Repair</h3>
                                </figcaption>
                            </figure>
                        </article>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="top_category_container">
                    <a href="<?= base_url('apple/apple-watch/models') ?>">
                        <article class="single_category" style="padding: 8px 8px;">
                            <figure class="device_box">
                                <div class="category_thumb device_sec">
                                    <img src="<?= base_url('assets/web/img/icon/AppleWatchRepair.jpg') ?>" alt="Apple Watch Repair - Doorstep & Onsite Service Repair in Mumbai - QASWA TELECOM" style="width: 100%; height: 100%;">
                                </div>
                                <figcaption class="category_name m-0">
                                    <h3 class="device_name">Apple Watch Repair</h3>
                                </figcaption>
                            </figure>
                        </article>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="top_category_container">
                    <a href="<?= base_url('apple/macbook/models') ?>">
                        <article class="single_category" style="padding: 8px 8px;">
                            <figure class="device_box">
                                <div class="category_thumb device_sec">
                                    <img src="<?= base_url('assets/web/img/icon/MacBookRepair.jpg') ?>" alt="MacBook Repair - Doorstep & Onsite Service Repair in Mumbai - QASWA TELECOM" style="width: 100%; height: 100%;">
                                </div>
                                <figcaption class="category_name m-0">
                                    <h3 class="device_name">MacBook Repair</h3>
                                </figcaption>
                            </figure>
                        </article>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Select category area end-->

<!-- Select brand area start-->
<section class="top_category_product mb-70" id="brand">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title d-md-flex d-block justify-content-between align-items-center" style="border-bottom: 1px solid #00b3a0; padding-bottom: 10px; margin-bottom: 30px;">
                    <h2 style="text-align: center; width: 100%;">BRANDS WE REPAIR</h2>
                    <div class="search_container mb-0">
                        <form action="" method="post">
                            <?= csrf_field() ?>
                            <div class="search_box mb-0">
                                <input placeholder="Search brand..." type="text" name="query" value="<?= esc($query ?? '') ?>">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ✅ Start wrapping for targeted styling -->
        <div class="brand-section">
            <div id="brandResults">
                <div class="row">
                    <?php foreach ($brands as $brand):
                        $uri_brand_title = str_replace(' ', '-', $brand['title']);
                        $uri_brand_title = strtolower($uri_brand_title); ?>
                        <div class="col-lg-2 col-md-3 col-4 mb-3">
                            <div class="top_category_container">
                                <a href="<?= base_url($uri_brand_title . '/models') ?>">
                                    <article class="single_category">
                                        <figure>
                                            <div class="category_thumb brand_img_sec">
                                                <img src="<?= base_url('public/uploads/' . $brand['image']) ?>" alt="<?= $brand['title'] ?> Doorstep, onsite repair in Mumbai - QASWA TELECOM" style="width: 100%; height: 100%;">
                                            </div>
                                        </figure>
                                    </article>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- ✅ End wrapping -->

    </div>
</section>
<!-- Select brand area end-->

<!-- Happy Users area start -->
<section class="happy_users_section mb-50" style="padding: 50px 0 40px 0; background: #f8f9fa; font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="text-center mb-4">
            <h2 style="font-size: 32px; font-weight: 700; color: #222; margin-bottom: 10px;">
                50,000+ Devices Repaired With Trust.
            </h2>
            <p style="font-size: 15px; color: #666; max-width: 600px; margin: 0 auto;">
                India’s Most Reliable Doorstep Mobile Repair Service By QASWA TELECOM – Quality Parts, Certified Technicians & Same Day Repairs.
            </p>
        </div>

        <div class="row justify-content-center align-items-stretch gx-3">
            <!-- Box 1 -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-4 px-2">
                <div class="user-stat-card">
                    <img
                        src="<?= base_url('assets/web/img/icon/Devicerepair.png') ?>"
                        alt="On-site mobile repair service in Mumbai with expert technicians - QASWA TELECOM"
                        title="Mobile Repair at Doorstep in Mumbai - QASWA TELECOM"
                        loading="lazy"
                        class="icon-img">
                    <h3>50,000+</h3>
                    <p>Devices Repaired</p>
                </div>
            </div>
            <!-- Box 2 -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-4 px-2">
                <div class="user-stat-card">
                    <img
                        src="<?= base_url('assets/web/img/icon/screenRepair.png') ?>"
                        alt="Cracked screen repair and glass replacement in Mumbai with genuine parts - QASWA TELECOM"
                        title="Screen Repair & Replacement at Doorstep in Mumbai - QASWA TELECOM"
                        loading="lazy"
                        class="icon-img">
                    <h3>30,000+</h3>
                    <p>Screens Repaired</p>
                </div>
            </div>
            <!-- Box 3 -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-4 px-2">
                <div class="user-stat-card">
                    <img
                        src="<?= base_url('assets/web/img/icon/betteryRepair.png') ?>"
                        alt="Mobile battery replacement service in Mumbai with same-day doorstep service - QASWA TELECOM"
                        title="Battery Replacement at Doorstep in Mumbai - QASWA TELECOM"
                        loading="lazy"
                        class="icon-img">
                    <h3>5,000+</h3>
                    <p>Batteries Replaced</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Happy Users area end -->

<style>
    .user-stat-card {
        padding: 24px 15px;
        background: #ffffff;
        border-radius: 10px;
        text-align: center;
        border: 1px solid #00b2a2;
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    }

    .user-stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .icon-img {
        height: 120px;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .user-stat-card:hover .icon-img {
        transform: scale(1.1);
    }

    .user-stat-card h3 {
        font-size: 22px;
        font-weight: 700;
        color: #00b2a2;
        margin-bottom: 6px;
    }

    .user-stat-card p {
        font-size: 14px;
        color: #444;
        margin: 0;
    }

    @media (max-width: 768px) {
        .col-4 {
            flex: 0 0 33.3333%;
            max-width: 33.3333%;
        }

        .icon-img {
            height: 70px;
            margin-bottom: 10px;
        }

        .user-stat-card {
            padding: 12px 6px;
            border-radius: 8px;
        }

        .user-stat-card h3 {
            font-size: 15px;
            margin-bottom: 4px;
        }

        .user-stat-card p {
            font-size: 12px;
        }

        .happy_users_section h2 {
            font-size: 22px;
            margin-bottom: 8px;
        }

        .happy_users_section p {
            font-size: 13px;
            margin-bottom: 12px;
        }
    }
</style>

<!-- PROCESS area start -->
<section class="top_category_product mb-70" style="padding: 20px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-heading-responsive">
                    Get Your Phone Fixed in 3 Easy Steps – Right at Home
                </h2>
            </div>
        </div>

        <div class="row text-center">
            <!-- Step 1 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/CheckPrice.png') ?>"
                    alt="Check Mobile Repair Price - QASWA TELECOM"
                    title="Check Price for Mobile Repair - Doorstep in Mumbai"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">1</span> Check Price
                </h4>
                <p class="step-description">
                    Select your device and instantly view the best doorstep repair prices in your area.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/BookAppointment.png') ?>"
                    alt="Book Technician Visit - QASWA TELECOM"
                    title="Schedule Mobile Repair Appointment at Home"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">2</span> Book Appointment
                </h4>
                <p class="step-description">
                    Choose a convenient time and our expert will come to your location for free.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/SitBack&Relax.png') ?>"
                    alt="Doorstep Mobile Repair in Mumbai - QASWA TELECOM"
                    title="Mobile Repaired at Your Home - Same Day"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">3</span> Sit Back & Relax
                </h4>
                <p class="step-description">
                    Our certified technician will fix your device using genuine parts—right at your home.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- PROCESS area end -->

<!-- Add this CSS -->
<style>
    .section-heading-responsive {
        font-size: 22px;
        font-weight: 700;
        text-align: center;
        line-height: 1.4;
        margin: 0 auto;
        max-width: 100%;
        padding-bottom: 16px;
        margin-bottom: 30px;
        position: relative;
    }

    .section-heading-responsive::after {
        content: "";
        display: block;
        margin: 8px auto 0;
        height: 1px;
        width: 100%;
        max-width: 1000px;
        background-color: #00b3a0;
    }

    .step-description {
        font-size: 15px;
        color: #444;
        max-width: 90%;
        margin: 0 auto;
        line-height: 1.5;
    }

    @media (min-width: 768px) {
        .section-heading-responsive {
            font-size: 32px;
        }
    }

    @media (min-width: 992px) {
        .section-heading-responsive::after {
            max-width: 1300px;
        }

        .step-description {
            font-size: 18.5px;
            line-height: 1.7;
        }
    }
</style>

<!-- ✅ Common Issues Section Start -->
<section class="featured_product_area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title section-heading-common-issues">
                    <h2>Most Common<br class="d-md-none"> Mobile Problems We Fix Daily</h2>
                    <p class="common-issue-subheading">From broken screens to battery issues — we’ve seen and solved it all!</p>
                </div>
            </div>
        </div>

        <div class="row gx-3 gy-2 justify-content-start"> <!-- ✅ gy-2 for mobile vertical gap -->
            <?php foreach ($issues as $issue): ?>
                <div class="col-lg-2 col-md-4 col-sm-4 col-4 issue-col">
                    <article class="single_category issue_box">
                        <figure>
                            <div class="category_thumb common_issue_img_sec">
                                <img
                                    src="<?= base_url('public/uploads/' . $issue['image']) ?>"
                                    alt="<?= $issue['title'] ?> issue - QASWA TELECOM"
                                    title="<?= $issue['title'] ?> repair in Mumbai"
                                    loading="lazy">
                            </div>
                            <figcaption class="category_name">
                                <h3><?= $issue['title'] ?></h3>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    .section-heading-common-issues {
        text-align: center;
        padding-bottom: 10px;
        border-bottom: 1px solid #00b3a0;
        margin-bottom: 30px;
    }

    .section-heading-common-issues h2 {
        font-size: 24px;
        font-weight: 700;
        color: #000;
        line-height: 1.4;
    }

    .section-heading-common-issues .common-issue-subheading {
        font-size: 15.5px;
        color: #666;
        margin-top: 8px;
        font-weight: 400;
    }

    .issue_box {
        background: #ffffff;
        border-radius: 8px;
        border: 0.5px solid #00b2a2;
        padding: 20px 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    .issue_box img {
        max-width: 120px;
        margin-bottom: 12px;
    }

    .issue_box h3 {
        font-size: 14px;
        color: #333;
        font-weight: 400;
        margin: 0;
        text-align: center;
        line-height: 1.4;
    }

    /* ✅ DESKTOP */
    @media (min-width: 992px) {
        .issue-col {
            width: 20%;
            flex: 0 0 20%;
            padding: 8px;
        }

        .issue_box {
            min-height: 260px;
            border-radius: 10px;
        }

        .common_issue_img_sec {
            width: 120px;
            height: 120px;
        }

        .issue_box img {
            width: 95%;
            height: 95%;
            object-fit: contain;
        }

        .issue_box h3 {
            font-size: 16px;
        }
    }

    /* ✅ MOBILE */
    @media (max-width: 767px) {
        .issue-col {
            width: 33.3333%;
            flex: 0 0 33.3333%;
            padding: 6px;
            /* ✅ Equal gap: horizontal = vertical */
        }

        .issue_box {
            min-height: 130px;
        }

        .issue_box img {
            max-width: 55px;
            margin-bottom: 10px;
        }

        .issue_box h3 {
            font-size: 13px;
            font-weight: 400;
        }
    }
</style>
<!-- ✅ Common Issues Section End -->

<!-- ✅ WHY CHOOSE US Section Start -->
<section class="top_category_product mb-70" style="padding: 20px 0;" id="why_choose_us">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-heading-responsive">Why Choose Us?</h2>
            </div>
        </div>

        <div class="row text-center">
            <!-- Point 1 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/CertifiedWarranty.png') ?>"
                    alt="Certified Mobile Repair Warranty - QASWA TELECOM"
                    title="Certified Warranty for All Mobile Repairs"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">1</span> Certified Warranty
                </h4>
                <p class="step-description">
                    All our repairs come with certified warranty – giving you long-term assurance and peace of mind.
                </p>
            </div>

            <!-- Point 2 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/satisfaction1.png') ?>"
                    alt="100% Satisfaction Guarantee - QASWA TELECOM"
                    title="Free Re-Service Within 90 Days"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">2</span> 100% Satisfaction
                </h4>
                <p class="step-description">
                    Not satisfied? We’ll re-service your phone within 90 days – no extra cost, no questions asked.
                </p>
            </div>

            <!-- Point 3 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/GuaranteedSafety.png') ?>"
                    alt="Data Privacy & Safe Repairs - QASWA TELECOM"
                    title="Your Phone & Data are 100% Safe"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">3</span> Guaranteed Safety
                </h4>
                <p class="step-description">
                    We treat your data with utmost care – your phone is repaired with full privacy and security.
                </p>
            </div>

            <!-- Point 4 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/QuickrepairService.png') ?>"
                    alt="Quick Mobile Repair at Home - QASWA TELECOM"
                    title="90-Minute Doorstep Mobile Repair Service"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">4</span> Quick Repair Service
                </h4>
                <p class="step-description">
                    We fix your device at your doorstep in just 90 minutes – at home or office, 7 days a week.
                </p>
            </div>

            <!-- Point 5 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/SkilledTechnicians.png') ?>"
                    alt="Skilled Technicians for Mobile Repair - QASWA TELECOM"
                    title="Certified & Trained Mobile Technicians"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">5</span> Skilled Technicians
                </h4>
                <p class="step-description">
                    Our repair engineers are fully trained and certified – delivering professional and reliable service.
                </p>
            </div>

            <!-- Point 6 -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <img
                    src="<?= base_url('assets/web/img/icon/TopQualityPartst.png') ?>"
                    alt="Genuine Spare Parts - Mobile Repair | QASWA TELECOM"
                    title="Top Quality OEM Spare Parts Only"
                    style="width: 80px;"
                    loading="lazy">
                <h4 style="font-size: 18px; font-weight: 600; margin-top: 15px;">
                    <span class="step_indicator">6</span> Top Quality Parts
                </h4>
                <p class="step-description">
                    We use only premium, tested OEM-grade spare parts – no compromises on quality or performance.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- ✅ WHY CHOOSE US Section End -->

<!-- ✅ Reuse Same Process Area CSS -->
<style>
    .section-heading-responsive {
        font-size: 26px;
        font-weight: 700;
        text-align: center;
        line-height: 1.4;
        margin: 0 auto;
        max-width: 100%;
        padding-bottom: 16px;
        margin-bottom: 30px;
        position: relative;
    }

    .section-heading-responsive::after {
        content: "";
        display: block;
        margin: 8px auto 0;
        height: 1px;
        width: 100%;
        max-width: 1000px;
        background-color: #00b3a0;
    }

    .step-description {
        font-size: 15px;
        color: #444;
        max-width: 90%;
        margin: 0 auto;
        line-height: 1.5;
    }

    .step_indicator {
        display: inline-block;
        background-color: #00b3a0;
        color: #fff;
        font-weight: 600;
        font-size: 14px;
        width: 24px;
        height: 24px;
        line-height: 24px;
        text-align: center;
        border-radius: 50%;
        margin-right: 6px;
    }

    @media (max-width: 767px) {
        section#why_choose_us .step-description {
            font-size: 16px !important;
            line-height: 1.7;
            padding: 0 10px;
        }
    }

    @media (min-width: 992px) {
        .section-heading-responsive::after {
            max-width: 1300px;
        }

        .step-description {
            font-size: 18.5px;
            line-height: 1.7;
        }
    }
</style>

<!-- ✅ GALLERY Section Start -->
<style>
    .gallery-heading {
        font-size: 32px;
        font-weight: 800;
        color: #000;
        text-align: center;
        margin-bottom: 10px;
        font-family: 'Poppins', sans-serif;
    }

    /* ✅ Full-width thin line like WHY CHOOSE US */
    .gallery-underline {
        height: 1px;
        width: 100%;
        max-width: 1000px;
        background-color: #00b3a0;
        margin: 0 auto 30px auto;
        border-radius: 1px;
    }

    /* ✅ Gallery item layout */
    .gallery-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
    }

    /* ✅ Square Image Box */
    .gallery-thumb-box {
        width: 100%;
        aspect-ratio: 1 / 1;
        background: #f4f4f4;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.08);
        position: relative;
    }

    .gallery-thumb-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .gallery-thumb-box:hover img {
        transform: scale(1.05);
    }

    /* ✅ Title below image */
    .image-title-bottom {
        font-size: 16px;
        font-weight: 600;
        margin-top: 12px;
        color: #222;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        min-height: 40px;
    }

    /* ✅ Lightbox styling */
    .lb-image {
        max-width: 100% !important;
        max-height: 90vh !important;
        object-fit: contain !important;
        border-radius: 6px;
    }

    /* ✅ Responsive */
    @media (max-width: 767px) {
        .gallery-heading {
            font-size: 28px;
        }

        .gallery-underline {
            width: 100%;
        }

        .image-title-bottom {
            font-size: 14px;
            min-height: auto;
        }
    }
</style>

<!-- ✅ Lightbox Config -->
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

<!-- ✅ Owl Carousel Initialization -->
<script>
    $(document).ready(function() {
        $(".category_gallery").owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            dots: true,
            autoplay: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>
<section class="featured_product_area mb-70" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <!-- ✅ Heading -->
                <h2 class="gallery-heading">Our Repair Gallery</h2>

                <!-- ✅ Updated Subtitle -->
                <p class="gallery-subtitle">
                    We don’t talk. We show. Every fix, every photo, real.
                </p>

                <!-- ✅ Full-width Underline -->
                <div class="gallery-underline"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="top_category_container category_gallery owl-carousel">
                    <?php foreach ($images as $image): ?>
                        <article class="gallery-card">
                            <div class="gallery-thumb-box">
                                <a href="<?= base_url('/public/uploads/' . $image['image']) ?>"
                                    data-lightbox="gallery"
                                    data-title=" - QASWA TELECOM Gallery">
                                    <img
                                        src="<?= base_url('public/uploads/' . $image['image']) ?>"
                                        alt="- Doorstep Mobile Repair in Mumbai | QASWA TELECOM"
                                        title=" - Qaswa Gallery"
                                        loading="lazy">
                                </a>
                            </div>
                            <h3 class="image-title-bottom"></h3>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ✅ GALLERY Section End -->

<!-- ✅ BLOGS & ARTICLES Section Start -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<style>
    .blog-section {
        padding: 40px 0;
        background: #fff;
    }

    .blog-heading {
        font-size: 28px;
        font-weight: 600;
        padding-bottom: 10px;
        margin-bottom: 30px;
        text-align: center;
        border-bottom: 1px solid #00b3a0;
    }

    .blog-carousel .blog-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    }

    .blog-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .blog-card h3 {
        font-size: 18px;
        margin: 15px 10px 5px;
        text-align: center;
        color: #333;
    }

    .blog-card .read_more {
        text-align: center;
        margin-bottom: 15px;
        font-weight: 500;
        color: #00b3a0;
        text-decoration: underline;
    }
</style>

<section class="blog-section">
    <div class="container">
        <h2 class="blog-heading">BLOGS & ARTICLES</h2>
        <div class="owl-carousel blog-carousel">
            <?php foreach ($blogs as $blog): ?>
                <a href="<?= base_url('blogDetails/' . $blog['id']) ?>">
                    <div class="blog-card">
                        <img src="<?= base_url('public/uploads/' . $blog['image']) ?>"
                            alt="<?= $blog['title'] ?> - QASWA TELECOM Blog in Mumbai"
                            title="<?= $blog['title'] ?>">
                        <h3><?= $blog['title'] ?></h3>
                        <div class="read_more">Read more</div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $('.blog-carousel').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    });
</script>
<!-- ✅ BLOGS & ARTICLES Section End -->

<!-- ✅ YouTube Video Carousel Start -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<style>
    .youtube-section {
        padding: 40px 0;
        background: #f9f9f9;
        text-align: center;
    }

    .youtube-heading {
        font-size: 18px;
        font-weight: 600;
        padding-bottom: 10px;
        margin-bottom: 30px;
        border-bottom: 1px solid #00b3a0;
    }

    @media (min-width: 768px) {
        .youtube-heading {
            font-size: 20px;
        }
    }

    .youtube-carousel .youtube-card {
        background: #fff;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        margin: 5px;
    }

    .youtube-card iframe {
        width: 100%;
        height: 200px;
        border: none;
        border-radius: 6px;
    }
</style>

<section class="youtube-section">
    <div class="container">
        <h2 class="youtube-heading">OUR YOUTUBE VIDEOS</h2>
        <div class="owl-carousel youtube-carousel">
            <div class="youtube-card">
                <iframe src="https://www.youtube.com/embed/1lovF6kLPiY?enablejsapi=1" allowfullscreen></iframe>
            </div>
            <div class="youtube-card">
                <iframe src="https://www.youtube.com/embed/MoWfC-7KHYw?enablejsapi=1" allowfullscreen></iframe>
            </div>
            <div class="youtube-card">
                <iframe src="https://www.youtube.com/embed/1lovF6kLPiY?enablejsapi=1" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<!-- ✅ YouTube Video Carousel End -->

<!-- Owl Carousel Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    var autoplayActive = true;

    function onYouTubeIframeAPIReady() {
        const players = document.querySelectorAll('iframe');
        players.forEach((frame) => {
            const player = new YT.Player(frame, {
                events: {
                    'onStateChange': function(event) {
                        if (event.data == YT.PlayerState.PLAYING) {
                            $('.youtube-carousel').trigger('stop.owl.autoplay');
                            autoplayActive = false;
                        } else if (event.data == YT.PlayerState.ENDED || event.data == YT.PlayerState.PAUSED) {
                            if (!autoplayActive) {
                                $('.youtube-carousel').trigger('play.owl.autoplay');
                                autoplayActive = true;
                            }
                        }
                    }
                }
            });
        });
    }

    $(document).ready(function() {
        $('.youtube-carousel').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });

        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        document.body.appendChild(tag);
    });
</script>

<!-- Owl Carousel Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $('.youtube-carousel').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $('.youtube-carousel').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>

<!-- FAQ area start -->
<style>
    .card-header .btn-link {
        font-weight: 400 !important;
        font-size: 20px !important;
        color: #222 !important;
        text-align: left;
        width: 100%;
        white-space: normal;
        text-decoration: none !important;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: #f9f9f9 !important;
        border-radius: 8px;
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        transition: all 0.3s ease;
    }

    .card-header {
        background: transparent !important;
        border: none !important;
    }

    .card-header .btn-link span i {
        font-size: 18px;
        transition: transform 0.4s ease;
    }

    .card-header .btn-link[aria-expanded="true"] {
        background-color: #03b5a5 !important;
        color: #fff !important;
    }

    .card-header .btn-link[aria-expanded="true"] span i.fa-plus {
        transform: rotate(45deg);
    }

    .card.card_dipult {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
    }

    .card-body {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        color: #333;
        font-size: 16px;
        line-height: 28px;
    }

    .card-body p {
        font-weight: 300;
        margin: 0;
    }

    @media (max-width: 767px) {
        .card-header .btn-link {
            font-size: 16px !important;
            padding: 12px 15px;
        }

        .card-body {
            font-size: 15px;
            padding: 15px;
        }
    }
</style>

<div class="accordion_area top_category_product mb-70" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title" style="border-bottom: 1px solid #00b3a0; padding-bottom: 10px; margin-bottom: 30px;">
                    <h2 style="text-align: center; width: 100%;">FAQs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="accordion" class="card__accordion">
                    <?php if ($faqs): ?>
                        <?php foreach ($faqs as $index => $faq): ?>
                            <div class="card card_dipult" style="margin-bottom: 10px;">
                                <div class="card-header card_accor" id="heading<?= $index ?>">
                                    <button class="btn btn-link <?= $index === 0 ? '' : 'collapsed' ?>"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?= $index ?>"
                                        aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>"
                                        aria-controls="collapse<?= $index ?>">
                                        <?= esc($faq['question']) ?>
                                        <span>
                                            <i class="fa fa-plus"></i>
                                        </span>
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
</div>
<!-- FAQ area end -->

<!--Testimonials area start-->
<section class="featured_product_area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!--testimonials section start-->
                <div class="testimonial_are">
                    <div class="section_title" style="border-bottom: 1px solid #00b3a0; padding-bottom: 10px; margin-bottom: 30px;">
                        <h2 style="text-align: center; width: 100%;">CUSTOMER TESTIMONIALS</h2>
                    </div>
                    <div class="testimonial_active owl-carousel">
                        <?php if ($testimonials): ?>
                            <?php foreach ($testimonials as $testimonial): ?>
                                <article class="single_testimonial">
                                    <figure>
                                        <div class="testimonial_thumb">
                                            <a><img src="<?= base_url('assets/web/img/icon/user.png') ?>" alt=""></a>
                                        </div>
                                        <figcaption class="testimonial_content">
                                            <p><?= $testimonial['description'] ?></p>
                                            <h3><a><?= $testimonial['user_name'] ?></a></h3>
                                        </figcaption>

                                    </figure>
                                </article>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!--testimonials section end-->
            </div>
        </div>
    </div>
</section>
<!--Testimonials area end-->

<!--shipping area start-->
<section class="shipping_area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title" style="border-bottom: 1px solid #00b3a0; padding-bottom: 10px; margin-bottom: 30px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-4">
                <div class="single_shipping d-md-flex d-block text-center text-md-start align-items-center">
                    <div class="mx-md-3 shipping_icons">
                        <img src="<?= base_url('assets/web/img/icon/Free shipping.png') ?>" alt="" style="">
                    </div>
                    <div class="shipping_content">
                        <h2>Free Shipping</h2>
                        <p>Free shipping on all services</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-4">
                <div class="single_shipping d-md-flex d-block text-center text-md-start align-items-center">
                    <div class="mx-md-3 shipping_icons">
                        <img src="<?= base_url('assets/web/img/icon/Support 247.png') ?>" alt="" style="">
                    </div>
                    <div class="shipping_content">
                        <h2>Support 24/7</h2>
                        <p>Contact us 24 hours a day</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-4">
                <div class="single_shipping d-md-flex d-block text-center text-md-start align-items-center">
                    <div class="mx-md-3 shipping_icons">
                        <img src="<?= base_url('assets/web/img/icon/Payment Secure.png') ?>" alt="" style="">
                    </div>
                    <div class="shipping_content">
                        <h2>Payment Secure</h2>
                        <p>We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--shipping area end-->


<?= view('web/partials/footer.php') ?>

<script>
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        autoplayVideos: true
    });
</script>