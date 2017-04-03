<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>js/calendar/bootstrap_calendar.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>css/app.css" type="text/css" />

    <!-- Form -->
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>js/select2/select2.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>js/select2/theme.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>js/fuelux/fuelux.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>js/datepicker/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url(); ?>js/slider/slider.css" type="text/css" />
    <!-- Form -->
</head>
<style>
    .margin-left{
        margin-left: 10px;
    }
</style>
<body>
    <section class="vbox">
        <header class="bg-dark dk header navbar navbar-fixed-top-xs">
            <div class="navbar-header aside-md">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?= assets_admin_url() ?>images/logo.png" class="m-r-sm">QFace</a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                    <i class="fa fa-cog"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= ucfirst($this->session->userdata('username')); ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <span class="arrow top"></span>
                        <li>
                            <a href="<?= site_url('admin/auth/setting') ?>">Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= site_url('admin/auth/logout') ?>">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .side menu -->
                    <?= $this->load->view('_components/side_bar_admin'); ?>
                <!-- /.side menu -->