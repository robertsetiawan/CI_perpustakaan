<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="<?= base_url('/dashboard') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="component-alert.html">Peminjaman</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-badge.html">Pengembalian</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item active has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Database</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item active">
                            <a href="<?= base_url('/dashboard/list_book') ?>">Buku</a>
                        </li>
                        <li class="submenu-item active">
                            <a href="<?= base_url('/dashboard/list_member') ?>">Anggota</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-title">Account</li>

                <li class="sidebar-item  ">
                    <a href="<?= base_url('/admin/logout') ?>" class='sidebar-link'>
                        <i class="bi bi-x-circle"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
    </div>