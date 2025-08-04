<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?? 'QASWA TELECOM : Smartphone, iPad, Tab & Apple Watch Repair Service In Mumbai' ?></title>
    <meta name="description" content="Book iPhone, iPad, or smartwatch repairs with Qaswa Telecom in Mumbai." />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="QASWA TELECOM : Smartphone, iPad, Tab & Apple Watch Repair Service In Mumbai" />
    <meta property="og:description" content="Get expert repair service for smartphones, iPads, and smartwatches in Mumbai." />
    <meta property="og:image" content="https://www.qaswatelecom.com/assets/img/logo.png" />
    <meta property="og:url" content="https://www.qaswatelecom.com/" />
    <meta property="og:type" content="website" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/img/f-icon.png">

    <!-- CSS 
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/web/css/plugins.css') ?>">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/web/css/style.css') ?>">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Lightbox Script -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">


</head>

<body>

    <?php $uri = service('uri');
        $segment = $uri->getSegment(1); 
    ?>

    <?php 
        $session = session();
        $isLoggedIn = $session->get('isLoggedIn');
    ?>

    <!--header area start-->

    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
   
    <!--Offcanvas menu area end-->

    <header>
        <div class="main_header">
            <div class="Offcanvas_menu">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="canvas_open">
                                <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                            </div>
                            <div class="Offcanvas_menu_wrapper">
                                <div class="canvas_close">
                                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                </div>
                                <div id="menu" class="text-left ">
                                    <ul class="offcanvas_main_menu">
                                        <li class="menu-item-has-children <?= ($segment == '') ? 'active' : '' ?>"><a href="<?= base_url('/') ?>">Home</a></li>
                                        <li class="menu-item-has-children <?= ($segment == 'About') ? 'active' : '' ?>"><a href="<?= base_url('/About') ?>">About Us</a></li>
                                        <li class="menu-item-has-children <?= ($segment == 'Blogs') ? 'active' : '' ?>"><a href="<?= base_url('/Blogs') ?>">Blog</a></li>
                                        <li class="menu-item-has-children <?= ($segment == 'Gallery') ? 'active' : '' ?>"><a href="<?= base_url('/Gallery') ?>">Gallery</a></li>
                                        <li class="menu-item-has-children <?= ($segment == 'Contact') ? 'active' : '' ?>"><a href="<?= base_url('/Contact') ?>"> Contact Us</a></li>
                                        <li class="menu-item-has-children <?= ($segment == 'FAQ') ? 'active' : '' ?>"><a href="<?= base_url('/FAQ') ?>"> FAQ</a></li>
                                        <li class="menu-item-has-children <?= ($segment == 'myOrders') ? 'active' : '' ?>"><a href="<?= base_url('/myOrders') ?>"> My Orders</a></li>
                                        <!-- <?php if (!empty($isLoggedIn) && $isLoggedIn): ?>
                                            <li class="menu-item-has-children <?= ($segment == 'myOrders') ? 'active' : '' ?>">
                                                <a href="#"><img src="<?= base_url('assets/web/img/icon/user1.png') ?>" alt="Icon" style="width: 20px;"></a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?= base_url('/myOrders') ?>">My Orders</a></li>
                                                    <li><a href="<?= base_url('/Logout') ?>">Logout</a></li>
                                                </ul>
                                            </li>
                                        <?php else: ?>
                                            <li class="menu-item-has-children <?= ($segment == 'Login') ? 'active' : '' ?>"><a href="<?= base_url('/Login') ?>"> <img src="<?= base_url('assets/web/img/icon/login.png') ?>" alt="Icon" style="width: 20px;"> </a></li>
                                        <?php endif; ?> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->
            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle middle_two">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="<?= base_url('/') ?>"><img src="<?= base_url('assets/img/logo.png') ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="main_menu menu_two menu_position text-right">
                                <nav>
                                    <ul>
                                        <li><a class="<?= ($segment == '') ? 'active' : '' ?>" href="<?= base_url('/') ?>">home</a></li>
                                        <li><a class="<?= ($segment == 'About') ? 'active' : '' ?>" href="<?= base_url('/About') ?>">About Us</a></li>
                                        <li><a class="<?= ($segment == 'Blogs') ? 'active' : '' ?>" href="<?= base_url('/Blogs') ?>">Blog</a></li>
                                        <li><a class="<?= ($segment == 'Gallery') ? 'active' : '' ?>" href="<?= base_url('/Gallery') ?>">Gallery</a></li>
                                        <li><a class="<?= ($segment == 'Contact') ? 'active' : '' ?>" href="<?= base_url('/Contact') ?>"> Contact Us</a></li>
                                        <li><a class="<?= ($segment == 'FAQ') ? 'active' : '' ?>" href="<?= base_url('/FAQ') ?>"> FAQ</a></li>
                                        <li><a class="<?= ($segment == 'myOrders') ? 'active' : '' ?>" href="<?= base_url('/myOrders') ?>"> My Orders</a></li>
                                        <!-- <?php if (!empty($isLoggedIn) && $isLoggedIn): ?>
                                            <li><a class="<?= ($segment == 'myOrders') ? 'active' : '' ?>" ><img src="<?= base_url('assets/web/img/icon/user1.png') ?>" alt="Icon" style="width: 24px;"><i class="fa fa-angle-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="<?= base_url('/myOrders') ?>">My Orders</a></li>
                                                    <li><a href="<?= base_url('/Logout') ?>">Logout</a></li>
                                                </ul>
                                            </li>
                                        <?php else: ?>
                                            <li><a class="<?= ($segment == 'Login') ? 'active' : '' ?>" href="<?= base_url('/Login') ?>"> <img src="<?= base_url('assets/web/img/icon/login.png') ?>" alt="Icon" style="width: 24px;"> </a></li>
                                        <?php endif; ?> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->

    <!--sticky header area start-->
    <div class="sticky_header_area sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="<?= base_url('/') ?>"><img src="<?= base_url('assets/img/logo.png') ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sticky_header_right menu_position">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li><a class="<?= ($segment == '') ? 'active' : '' ?>" href="<?= base_url('/') ?>">home</a></li>
                                    <li><a class="<?= ($segment == 'About') ? 'active' : '' ?>" href="<?= base_url('/About') ?>">About Us</a></li>
                                    <li><a class="<?= ($segment == 'Blogs') ? 'active' : '' ?>" href="<?= base_url('/Blogs') ?>">Blog</a></li>
                                    <li><a class="<?= ($segment == 'Gallery') ? 'active' : '' ?>" href="<?= base_url('/Gallery') ?>">Gallery</a></li>
                                    <li><a class="<?= ($segment == 'Contact') ? 'active' : '' ?>" href="<?= base_url('/Contact') ?>"> Contact Us</a></li>
                                    <li><a class="<?= ($segment == 'FAQ') ? 'active' : '' ?>" href="<?= base_url('/FAQ') ?>"> FAQ</a></li>
                                    <li><a class="<?= ($segment == 'myOrders') ? 'active' : '' ?>" href="<?= base_url('/myOrders') ?>"> My Orders</a></li>
                                    <!-- <?php if (!empty($isLoggedIn) && $isLoggedIn): ?>
                                        <li>
                                            <a class="<?= ($segment == 'myOrders') ? 'active' : '' ?>" href="#"> <img src="<?= base_url('assets/web/img/icon/user1.png') ?>" alt="Icon" style="width: 24px;"> <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="<?= base_url('/myOrders') ?>">My Orders</a></li>
                                                <li><a href="<?= base_url('/Logout') ?>">Logout</a></li>
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li><a class="<?= ($segment == 'Login') ? 'active' : '' ?>" href="<?= base_url('/Login') ?>" title="Login"> <img src="<?= base_url('assets/web/img/icon/login.png') ?>" alt="Icon" style="width: 24px;"> </a></li>
                                    <?php endif; ?> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sticky header area end-->