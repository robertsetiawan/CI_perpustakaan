<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUS</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/vendors/fontawesome/all.min.css">
    <style>
        table.dataTable td {
            padding: 15px 8px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="#"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="header-top-right">

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            
                            
                            
                            <li
                                class="menu-item has-sub ">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-life-preserver"></i>
                                    <span>Login</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        <ul class="submenu-group">
                                            
                                            <li class="submenu-item  ">
                                                <a href="<?= base_url('/member') ?>" class='submenu-link'>Anggota</a>
                                            </li>

                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('/admin') ?>"
                                                    class='submenu-link'>Admin</a>

                                                
                                            </li>

                                    </div>
                                </div>
                            </li>

                            <li
                                class="menu-item">
                                <a href="<?= base_url('/database') ?>" class='menu-link'>
                                    <i class="bi bi-life-preserver"></i>
                                    <span>Database Buku</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">
                
            <div class="page-heading">
                <!--<h3>Popular Books</h3>-->
            </div>
            <div class="page-content">
                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Popular Books</h4>
                        </div>
                        <div class="card-body">
                                <div class = "row">
                                    <?php if (count($books) > 0) :?>
                                        <!-- Disini iterasi tiap card buku pinjaman -->
                                        <?php
                                        if (count($books)<$count){
                                            $count = count($books);
                                        } 
                                        for ($x = 0; $x < $count; $x++) : 
                                            $book = $books[$x];?>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?= $book['judul'] ?></h4>
                                                        <p class="card-text">
                                                            Pengarang:  <?= $book['pengarang'] ?>
                                                        </p>
                                                    </div>
                                                    <img class="img-fluid w-90" src="/assets/images/faces/2.jpg" alt="Card image cap">
                                                </div>
                                                <div class="card-footer d-flex justify-content-between">
                                                    <span>Stok: <?= $book['stok_tersedia'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endfor ?>
                                    <?php else : ?>
                                        <!-- Disini bila belum pinjam -->
                                        <h4>Belum ada buku</h4>
                                    <?php endif ?>
                                    </div>
                                </div>
                                <!--<table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ISBN</th>
                                            <th>Judul</th>
                                            <th>Stok</th>
                                            <th>Tersedia</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($books as $book) : ?>
                                            <tr>
                                                <td><?= $book['isbn'] ?></td>
                                                <td><?= $book['judul'] ?></td>
                                                <td><?= $book['stok'] ?></td>
                                                <td><?= $book['stok_tersedia'] ?></td>
                                                <td>
                                                    <a href="#"><i class="bi bi-info-circle"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>-->
                        </div>
                    </div>

                </section>
                <!-- Basic Tables end -->
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Jumlah Judul Buku</h6>
                                                <h6 class="font-extrabold mb-0"><?= count($books)?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Jumlah Buku Tersedia</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        $BookCount = 0;
                                                        foreach ($books as $book){
                                                            $BookCount = $BookCount + $book['stok_tersedia'];
                                                        }
                                                        echo "$BookCount";
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>

            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="http://ahmadsaugi.com">A. Saugi</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>

    <script src="/assets/js/pages/horizontal-layout.js"></script>
    <script src="/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
    <script src="/assets/vendors/fontawesome/all.min.js"></script>
    <script>
        // Jquery Datatable
        let jquery_datatable = $("#table1").DataTable()
    </script>
</body>

</html>
