<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- ✅ Dynamic Page Title -->
    <title><?= esc($page_title ?? 'QASWA TELECOM') ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/f-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/datatables.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker.css">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="<?= base_url('/admin/dashboard') ?>" class="logo">
                <img id="logo" src="<?= base_url() ?>assets/img/logo.png" alt="Logo">
            </a>
        </div>
        <!-- /Logo -->

        <!-- Sidebar Toggle -->
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>

        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <!-- Header Menu -->
        <ul class="nav nav-tabs user-menu">

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <span class="status online"></span>
                    </span>
                    <span>Admin</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('admin/change-password') ?>"><i data-feather="settings" class="me-1"></i> Change Password</a>
                    <a class="dropdown-item" href="<?= base_url('admin/logout') ?>"><i data-feather="log-out" class="me-1"></i> Logout</a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Menu -->

    </div>
    <!-- /Header -->
