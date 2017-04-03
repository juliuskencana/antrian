
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
                            <p><strong>Error!</strong> Please check your input</p>
                        </div>
                    <?php } ?>
                    <form class="bs-example form-horizontal" method="post" action="">
                        <div class="form-group <?php if(form_error('username')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $user->username ?>">
                                <?php echo form_error('username'); ?>
                            </div>
                        </div>
                        <div class="form-group <?php if(form_error('hak_akses')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Hak Akses</label>
                            <div class="col-lg-10">
                                <select name="hak_akses" class="form-control">
                                    <option value="">-=Pilih Hak Akses=-</option>
                                    <?php foreach ($layanan as $row): ?>
                                    <?php $user_detail = $this->user_model->get_user_join_by_user_id($row->user_id); ?>
                                        <option value="<?= $row->layanan_id ?>" <?php if($user_detail != NULL){ if($row->layanan_id == $user_detail->layanan_id){echo "selected";} } ?>><?= ucfirst($row->nama_layanan); ?></option>
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