
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
                </li>
                <li>Setting</li>
            </ul>
            <section class="panel panel-default col-lg-10 col-lg-offset-1">
                <div class="panel-body">
                    <?php if ($this->session->flashdata('success') != '') { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ban-circle"></i><strong>Success!</strong> Password has been changed.
                        </div>
                    <?php } ?>
                    <?php if ($error == true){ ?>
                        <div class="alert alert-danger">
                            <p><strong>Error!</strong> Tolong periksa input anda</p>
                        </div>
                    <?php } ?>
                    <?php if ($error_old == true){ ?>
                        <div class="alert alert-danger">
                            <p><strong>Error!</strong> Password Lama salah</p>
                        </div>
                    <?php } ?>
                    <form class="bs-example form-horizontal" enctype="multipart/form-data" method="post" action="">
                        <div class="form-group <?php if(form_error('opass')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Password Lama</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" placeholder="Old Password" name="opass">
                                <?php echo form_error('opass'); ?>
                            </div>
                        </div>
                        <div class="form-group <?php if(form_error('npass')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Password Baru</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" placeholder="New Password" name="npass">
                                <?php echo form_error('npass'); ?>
                            </div>
                        </div>
                        <div class="form-group <?php if(form_error('cpass')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Konfirmasi Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
                                <?php echo form_error('cpass'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                      </form>
                </div>
            </section>
        </section>
    </section>
</section>