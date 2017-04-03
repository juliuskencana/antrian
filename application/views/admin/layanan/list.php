
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="#">Layanan</a>
                </li>
                <li>Daftar Layanan</li>
            </ul>

            <?php if ($this->session->flashdata('success_layanan') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Sukses!</strong> Layanan telah dibuat.
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('edit_layanan') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Sukses!</strong> Layanan telah diubah.
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('delete_success') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Sukses!</strong> Layanan telah dihapus.
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('delete_failed') != '') { ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Error!</strong> Layanan tidak dapat dihapus. Minimal Layanan adalah 2.
                </div>
            <?php } ?>

            <section class="panel panel-default">
                <header class="panel-heading background-white">
                    List Layanan
                </header>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $this->uri->segment(3)+1; ?>
                            <?php foreach ($layanan as $row): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row->nama_layanan ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/layanan/edit/' . $row->layanan_id) ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Sunting"><span class="fa fa-pencil"></span></a>
                                        <a href="<?= site_url('admin/layanan/delete/' . $row->layanan_id) ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Are you sure you want to delete this service ?')"><span class="fa fa-trash-o"></span></a>
                                    </td>
                                </tr>
                            <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>