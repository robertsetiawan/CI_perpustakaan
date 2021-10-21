<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li <?php if ($side=="dashboard"){ echo "class="."\"sidebar-item active\""; }else{echo "class="."\"sidebar-item\"";}?>>
                    <a href="<?= base_url('/dashboard') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li <?php if ($side=="transaksi"){ echo "class="."\"sidebar-item active has-sub\""; }else{echo "class="."\"sidebar-item has-sub\"";}?>>
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="submenu ">
                        <li <?php if ($sub=="peminjaman"){ echo "class="."\"submenu-item active\""; }else{echo "class="."\"submenu-item \"";}?>>
                            <a href="<?= base_url('/dashboard/borrowed_book'); ?>">Peminjaman</a>
                        </li>
                        <li <?php if ($sub=="pengembalian"){ echo "class="."\"submenu-item active\""; }else{echo "class="."\"submenu-item \"";}?>>
                            <a href="<?= base_url('/dashboard/returned_book'); ?>">Pengembalian</a>
                        </li>
                    </ul>
                </li>

                <li <?php if ($side=="database"){ echo "class="."\"sidebar-item active has-sub\""; }else{echo "class="."\"sidebar-item has-sub\"";}?> >
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Database</span>
                    </a>
                    <ul class="submenu ">
                        <li <?php if ($sub=="buku"){ echo "class="."\"submenu-item active\""; }else{echo "class="."\"submenu-item \"";}?> >
                            <a href="<?= base_url('/dashboard/list_book') ?>">Buku</a>
                        </li>
                        <li <?php if ($sub=="anggota"){ echo "class="."\"submenu-item active\""; }else{echo "class="."\"submenu-item \"";}?> >
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