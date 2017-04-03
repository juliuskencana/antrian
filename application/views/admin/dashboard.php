<section id="content">
    <section class="vbox">
        <section class="scrollable wrapper">
            <?php if ($this->session->flashdata('sukses_reset') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Sukses!</strong> Antrian telah direset.
                </div>
            <?php } ?>
            <!-- Start Reset Button -->
            <div class="col-lg-12 row" style="margin-bottom:20px">
                <a href="<?php echo site_url('admin/dashboard/resetAntrian'); ?>" class="btn btn-info">Reset antrian</a>
            </div>
            <!-- End Reset Button -->
            <div class="row">
                <?php foreach ($layanan as $row): ?>
                    <?php if ($row->layanan_id == $hak_akses->layanan_id): ?>
                        <div class="col-lg-4 col-lg-offset-4" id="layanan-<?php echo $row->layanan_id ?>" data-layanan-id="<?php echo $row->layanan_id ?>">
                            <section class="panel panel-default">
                                <div class="panel-body">
                                    <div class="clearfix text-center m-t">
                                        <div class="inline">
                                            <div class="h4 m-t m-b-xs"><?php echo strtoupper($row->nama_layanan); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer bg-info text-center">
                                        <div class="row pull-out">
                                            <div class="col-xs-6">
                                                <div class="padder-v">
                                                    <span class="m-b-xs h3 block text-white" id="nomor-sekarang-<?php echo $row->layanan_id ?>"></span>
                                                    <small class="text-muted" id="nama-sekarang-<?php echo $row->layanan_id ?>"></small>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 dk">
                                                <div class="padder-v">
                                                    <span class="m-b-xs h3 block text-white" id="nomor-next-<?php echo $row->layanan_id ?>"></span>
                                                    <small class="text-muted" id="nama-next-<?php echo $row->layanan_id ?>"></small>
                                                </div>
                                            </div>
                                            <!-- Start Next Button -->
                                            <div class="col-xs-12">
                                                <div class="padder-v">
                                                    <span class="m-b-xs h3 block text-white"><a href="#" id="next" data-layanan-id="<?php echo $row->layanan_id ?>">NEXT</a></span>
                                                </div>
                                            </div>
                                            <!-- End Next Button -->
                                        </div>
                                </footer>
                            </section>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>