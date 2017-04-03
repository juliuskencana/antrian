
<section id="content">
    <section class="vbox">
        <section class="scrollable padder" style="margin-top: 3%;">
            <section class="panel panel-default col-lg-10 col-lg-offset-1">
                <div class="panel-body">
                    <?php if ($error == true){ ?>
                        <div class="alert alert-danger">
                            <p><strong>Error!</strong> Please check your input</p>
                        </div>
                    <?php } ?>
                    <form class="bs-example form-horizontal" method="post" action="">
                        <div class="form-group <?php if(form_error('nama')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Nama</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Nama" name="nama">
                                <?php echo form_error('nama'); ?>
                            </div>
                        </div>
                        <div class="form-group <?php if(form_error('layanan_id')){echo "has-error";} ?>">
                            <label class="col-lg-2 control-label">Layanan</label>
                            <div class="col-lg-10">
                                <select name="layanan_id" class="form-control" >
                                    <?php foreach ($layanan as $row): ?>
                                        <option value="<?php echo $row->layanan_id ?>"><?php echo ucfirst($row->nama_layanan) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('layanan_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                      </form>

                        
                    <?php if ($this->session->flashdata('success_antrian') != '') { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ban-circle"></i><strong>TOLONG DIINGAT!</strong> ID anda adalah <strong><?php echo $this->session->flashdata('success_antrian') ?></strong>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </section>
    </section>
</section>