<!DOCTYPE html>
<html lang="en" class="bg-dark">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?= assets_admin_url() ?>css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url() ?>css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url() ?>css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url() ?>css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?= assets_admin_url() ?>css/app.css" type="text/css" />

</head>

<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xxl">
            <a class="navbar-brand block" href="index.html">QFace</a>
            <section class="panel panel-default bg-white m-t-lg">
                <header class="panel-heading text-center">
                    <strong>Sign in</strong>
                </header>
                <form action="<?= site_url('admin/auth') ?>" class="panel-body wrapper-lg" method="post">
                    <?php if ($this->session->flashdata('error') != '') { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ban-circle"></i><strong>Error!</strong> Username and password not found.
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error_active') != '') { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ban-circle"></i><strong>Error!</strong> User not active.
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="username" name="username" placeholder="Username" class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control input-lg">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </section>
        </div>
    </section>



</body>

    <script src="<?= assets_admin_url(); ?>js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= assets_admin_url(); ?>js/bootstrap.js"></script>
    <!-- App -->
    <script src="<?= assets_admin_url(); ?>js/app.js"></script>
    <script src="<?= assets_admin_url(); ?>js/app.plugin.js"></script>
    <script src="<?= assets_admin_url(); ?>js/slimscroll/jquery.slimscroll.min.js"></script>
</html>