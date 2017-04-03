<?php if ($this->session->userdata('role') != 'operator' && $this->session->userdata('role') != 'customer'): ?>
    <aside class="bg-dark lter aside-md hidden-print" id="nav">
        <section class="vbox">
            <section class="w-f scrollable">
                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

                    <!-- nav -->
                    <nav class="nav-primary hidden-xs">
                        <ul class="nav">
                            <?php if ($this->session->userdata('role') == 'operator'): ?>
                                <li <?php if($this->uri->segment(2) == 'dashboard'){echo "class='active'";} ?>>
                                    <a href="<?= site_url('admin/dashboard') ?>" class="active">
                                        <i class="fa fa-dashboard icon">
                                            <b class="bg-danger"></b>
                                        </i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            <?php endif ?>
                            <?php if ($this->session->userdata('role') == 'admin'): ?>
                                <li <?php if($this->uri->segment(2) == 'layanan'){echo "class='active'";} ?>>
                                    <a href="#layout">
                                        <i class="fa fa-picture-o icon">
                                            <b class="bg-warning"></b>
                                        </i>
                                        <span class="pull-right">
                                            <i class="fa fa-angle-down text"></i>
                                            <i class="fa fa-angle-up text-active"></i>
                                        </span>
                                        <span>Layanan</span>
                                    </a>
                                    <ul class="nav lt">
                                        <li>
                                            <a href="<?= site_url('admin/layanan') ?>">
                                                <i class="fa fa-list"></i>
                                                <span>Daftar Layanan</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= site_url('admin/layanan/create') ?>">
                                                <i class="fa fa-plus"></i>
                                                <span>Buat Layanan</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li <?php if($this->uri->segment(2) == 'pengguna'){echo "class='active'";} ?>>
                                    <a href="#layout">
                                        <i class="fa fa-barcode icon">
                                            <b class="bg-warning"></b>
                                        </i>
                                        <span class="pull-right">
                                            <i class="fa fa-angle-down text"></i>
                                            <i class="fa fa-angle-up text-active"></i>
                                        </span>
                                        <span>Pengguna</span>
                                    </a>
                                    <ul class="nav lt">
                                        <li>
                                            <a href="<?= site_url('admin/pengguna') ?>">
                                                <i class="fa fa-list"></i>
                                                <span>Daftar Pengguna</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= site_url('admin/pengguna/create') ?>">
                                                <i class="fa fa-plus"></i>
                                                <span>Buat Pengguna</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif ?>

                            <?php if ($this->session->userdata('role') == 'customer'): ?>
                                <li <?php if($this->uri->segment(2) == 'mengantri'){echo "class='active'";} ?>>
                                    <a href="<?php echo site_url('admin/antrian') ?>">
                                        <i class="fa fa-barcode icon">
                                            <b class="bg-warning"></b>
                                        </i>
                                        <span>Mengantri</span>
                                    </a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </nav>
                    <!-- / nav -->
                </div>
            </section>

            <footer class="footer lt hidden-xs b-t b-dark">
                <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                    <i class="fa fa-angle-left text"></i>
                    <i class="fa fa-angle-right text-active"></i>
                </a>
            </footer>
        </section>
    </aside>
<?php endif ?>