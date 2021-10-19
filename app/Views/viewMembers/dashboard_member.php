<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($title) ? $title : "Dashboard Anggota") ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <!-- <link rel="stylesheet" href="/assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
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
        <?php $side = "dashboard"; ?>
        <?php include('dashboard_sidebar_member.php'); ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Peminjaman</h3>
                            <p class="text-subtitle text-muted">Buku yang anda pinjam</p>
                        </div>
                    </div>
                </div>
                
                <section class="section">
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <?php if (count($peminjaman) > 0) : ?>
                        <!-- Disini iterasi tiap card buku pinjaman -->
                        <?php foreach ($peminjaman as $bukuPinjaman) : ?>
                            <div class="row">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $bukuPinjaman['judul'] ?></h4>
                                        <p class="card-text">
                                            Anda meminjam buku ini dari tanggal <b><?= $bukuPinjaman['tgl_pinjam'] ?></b>
                                            hingga tanggal <b><?= $bukuPinjaman['tgl_pinjam'] ?></b>. <br>Denda yang harus anda bayar: 
                                            <b><?= $bukuPinjaman['total_denda'] ?></b>.
                                        </p>
                                    </div>
                                    <img class="img-fluid w-90" src="/assets/images/faces/2.jpg" alt="Card image cap">
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span>Pengarang: <?= $bukuPinjaman['pengarang'] ?></span>
                                </div>
                            </div>
                            </div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <!-- Disini bila belum pinjam -->
                        <h3>Belum meminjam buku</h3>
                    <?php endif ?>
                </div>
                </section>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Database Buku</h3>
                            <p class="text-subtitle text-muted">Database buku yang tersedia di Perpustakaan</p>
                        </div>
                    </div>
                </div>

                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="table1">
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
                                    <!-- <tr>
                                        <td>Graiden</td>
                                        <td>vehicula.aliquet@semconsequat.co.uk</td>
                                        <td>076 4820 8838</td>
                                        <td>Offenburg</td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                    </tr> -->
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
                            </table>
                        </div>
                    </div>

                </section>
                <!-- Basic Tables end -->
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

    <script src="/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>
    
    <script src="/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
    <script src="/assets/vendors/fontawesome/all.min.js"></script>
    <script>
        // Jquery Datatable
        let jquery_datatable = $("#table1").DataTable()
    </script>

    <script src="/assets/js/mazer.js"></script>


</body>

</html>