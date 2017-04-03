
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="#">Layanan</a>
                </li>
                <li>Buat Layanan</li>
            </ul>
            <section class="panel panel-default col-lg-10 col-lg-offset-1">
                <div class="panel-body">
                    <?php if (isset($error)){ ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <p><strong>Error!</strong> Tolong periksa input anda</p>
                        </div>
                    <?php } ?>
                    <form class="bs-example form-horizontal" method="post" action="">
                        <div class="form-group <?php if(form_error('name')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Nama Layanan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Nama Layanan" name="name" value="<?= set_value('name'); ?>">
                                <?php echo form_error('name'); ?>
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