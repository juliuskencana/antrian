
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="#">Pengguna</a>
                </li>
                <li>Buat Pengguna</li>
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
                        <div class="form-group <?php if(form_error('username')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                                <?php echo form_error('username'); ?>
                            </div>
                        </div>
                        <div class="form-group <?php if(form_error('hak_akses')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Hak Akses</label>
                            <div class="col-lg-10">
                                <select name="hak_akses" class="form-control">
                                    <option value="">-=Pilih Hak Akses=-</option>
                                    <?php foreach ($layanan as $row): ?>
                                        <option value="<?= $row->layanan_id ?>"><?= ucfirst($row->nama_layanan); ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('hak_akses'); ?>
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