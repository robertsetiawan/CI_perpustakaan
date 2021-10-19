<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Layout - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
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
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add Book</h3>
                            <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard/list_book') ?>">List Book</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Book</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Buku</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" method="POST" action="<?= base_url('/dashboard/add_book/new') ?>" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="isbn">ISBN</label>
                                                        <input type="text" id="isbn" class="form-control" placeholder="ISBN" name="isbn">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="judul">Judul Buku</label>
                                                        <input type="text" id="judul" class="form-control" placeholder="Judul Buku" name="judul">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="pengarang">Pengarang</label>
                                                        <input type="text" id="pengarang" class="form-control" placeholder="Nama Pengarang" name="pengarang">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="penerbit">Penerbit</label>
                                                        <input type="text" id="penerbit" class="form-control" name="penerbit" placeholder="Penerbit">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kota-terbit">Kota Terbit</label>
                                                        <input type="text" id="kota-terbit" class="form-control" name="kota-terbit" placeholder="Kota Terbit">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="editor">Editor</label>
                                                        <input type="text" id="editor" class="form-control" name="editor" placeholder="Nama Editor">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="pilih-kategori">Pilih Kategori</label>
                                                        <select class="form-select" aria-label="Default select example" id="pilih-kategori" name="pilih-kategori">
                                                            <option value="pilih kategori" selected>Pilih Kategori</option>
                                                            <?php if (!empty($categories)) : ?>
                                                                <?php foreach ($categories as $category) : ?>
                                                                    <option value="<?= $category['idKategori'] ?>"><?= $category['nama'] ?></option>
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="input-kategori">Input Kategori (jika pilihan belum tersedia)</label>
                                                        <input type="text" id="input-kategori" class="form-control" name="input-kategori" placeholder="Kategori Buku">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="stok">Stok Buku</label>
                                                        <input type="number" id="stok" class="form-control" name="stok" placeholder="Stok Buku">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="gambar-buku">Gambar Buku</label>
                                                        <p>Jenis File Image: png, jpg, atau jpeg. Maksimal ukuran file 2 mb
                                                        </p>
                                                        <input type="file" id="gambarbuku" name="gambarbuku" class="form-control" accept="image/*">
                                                        <?php if (!empty(session()->getFlashdata('error_image'))) : ?>
                                                            <br><br>
                                                            <div class="text-danger"><?= session()->getFlashdata('error_image') ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/mazer.js"></script>
</body>

</html>