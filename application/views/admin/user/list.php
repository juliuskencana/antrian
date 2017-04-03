
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="#">Pengguna</a>
                </li>
                <li>Daftar Pengguna</li>
            </ul>

            <?php if ($this->session->flashdata('success_pengguna') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Sukses!</strong> Pengguna telah dibuat.
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success_delete') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Sukses!</strong> Pengguna telah dihapus.
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('edit_pengguna') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Sukses!</strong> Pengguna telah diubah.
                </div>
            <?php } ?>

            <section class="panel panel-default">
                <header class="panel-heading background-white">
                    List Pengguna
                </header>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Hak Akses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $this->uri->segment(3)+1; ?>
                            <?php foreach ($pengguna as $row): ?>
                            <?php $user_detail = $this->user_model->get_user_join_by_user_id($row->user_id); ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row->username ?></td>
                                    <td><?= ucfirst($row->role); ?></td>
                                    <td>
                                        <?php if ($user_detail){ ?>
                                            <?= ucfirst($user_detail->nama_layanan); ?>
                                        <?php }else{ ?>
                                            belum ditentukan
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('admin/pengguna/edit/' . $row->user_id) ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Sunting"><span class="fa fa-pencil"></span></a>
                                        <a href="<?= site_url('admin/pengguna/delete/' . $row->user_id) ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Are you sure you want to delete this user ?')"><span class="fa fa-trash-o"></span></a>
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