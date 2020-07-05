<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="<?= base_url().'assets/images/icon/logo.png' ?>" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li>
                      <label id="label_name"><i class="fa fa-user"></i> <span><?= $user['nama'] ?></span></label>
                    </li>
                    <!-- ADMIN -->
                    <?php
                      if ($this->session->userdata('level') == "admin") {
                        echo '
                        <li>
                            <a href="'.base_url().'admin/" aria-expanded="true"><i class="ti-dashboard"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="'.base_url().'admin/keberangkatan" aria-expanded="true"><i class="ti-agenda"></i>
                                <span>Data Perjalanan</span></a>
                        </li>
                        <li>
                            <a href="'.base_url().'admin/VerifikasiTiket" aria-expanded="true"><i class="ti-ticket"></i>
                                <span>Verifikasi Tiket</span></a>
                        </li>
                        ';
                      } else {
                        echo '
                        <li>
                            <a href="'.base_url().'penumpang/DataKeberangkatan" aria-expanded="true"><i class="ti-agenda"></i>
                                <span>Data Perjalanan</span></a>
                        </li>
                        <li>
                            <a href="'.base_url().'penumpang/PerjalananDipilih" aria-expanded="true"><i class="ti-bag"></i>
                                <span>Perjalanan Dipilih</span></a>
                        </li>
                        ';
                      }
                    ?>

                    <li>
                        <a href="<?= base_url().'general/logout' ?>" aria-expanded="true"><i class="fa fa-sign-out"></i>
                            <span>log out</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
