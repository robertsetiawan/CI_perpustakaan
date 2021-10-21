<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Datatable Jquery - Mazer Admin Dashboard</title>

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
        <?php $sub = "anggota"; $side = "database"; ?>
        <?php include('dashboard_sidebar.php'); ?>
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
                            <h3>List Anggota</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Anggota</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                    <div class="card-header d-flex justify-content-between">
                            Jquery Datatable
                            <!-- Button trigger for basic modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#register">
                                Add Member
                            </button>
                        </div>
                        
                        <!--Modal Register -->
                        <div class="modal fade text-left" id="register" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                <div class="modal-content">
                                    <form method="post" class="form form-vertical" action="<?= base_url("dashboard/member/register/process"); ?>">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Register Member</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                        <!-- Basic Vertical form layout section start -->
                                        <section id="multiple-column-form">
                                            <div class="row match-height">
                                                <div class="col-md-6 col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-l" id="nim" name="nim" placeholder="NIM">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                        <input type="text" class="form-control form-control-l" id="nama" name="nama" placeholder="Nama">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                        <input type="text" class="form-control form-control-l" id="email" name="email" placeholder= "Email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                        <input type="text" class="form-control form-control-l" id="alamat" name="alamat" placeholder="Alamat">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                        <input type="text" class="form-control form-control-l" id="kota" name="kota" placeholder="Kota">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                        <input type="text" class="form-control form-control-l" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                        <input type="password" class="form-control form-control-l" id="password" name="password" placeholder="Password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                        <input type="password" class="form-control form-control-l" id="password_conf" name="password_conf" placeholder="Confirm Password">
                                                                        </div>
                                                                    </div>
                                                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                        <?php echo session()->getFlashdata('error'); ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- // Basic Vertical form layout section end -->
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1" >
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($members as $member) : ?>
                                        <tr>
                                            <td><?= $member['nim'] ?></td>
                                            <td><?= $member['nama'] ?></td>
                                            <td><?= $member['alamat'] ?></td>
                                            <td><?= $member['kota'] ?></td>
                                            <td><?= $member['email'] ?></td>
                                            <td><?= $member['no_telp'] ?></td>
                                            <td>
                                                <!--<a href="#"><i class="bi bi-pencil"></i></a>
                                                <a href="#"><i class="bi bi-trash"></i></a>-->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target=<?= "#delete".$member['nim']?>>
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!--Modal Delete -->
                                        <div class="modal fade text-left" id=<?= "delete".$member['nim']?> tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                <form method="post" class="form form-vertical" action="<?= base_url("dashboard/member/delete/".$member['nim']); ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Delete Member</h5>
                                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                        <p>
                                                            Apakah anda yakin menghapus data anggota: <?= $member['nama'] ?> ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-danger ml-1" >
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Remove</span>
                                                        </button>
                                                    </div>
                                                
                                                </form>
                                                </div>

                                            </div>
                                        </div>
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