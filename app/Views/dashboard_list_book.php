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
        <?php $sub = "buku";
        $side = "database"; ?>
        <?php include('dashboard_sidebar.php'); ?>
        <!--<div id="sidebar" class="active">
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
                                    <a href="<?= base_url('/dashboard/list_book') ?>">Semua Buku</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="<?= base_url('/dashboard/avail_book'); ?>">Buku Tersedia</a>
                                </li>
                                <li class="submenu-item ">
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
        </div>-->
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
                            <h3>List Book</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Book</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Tables start -->
                <section class="section">
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="btn-group mb-1">
                                        <div class="dropdown" id="dropdown-filter">
                                            <select class="form-select" aria-label="Default select example" id="pilih-kategori" name="idkategori">
                                                <option id="all-filter" value="all">Semua</option>
                                                <option id="available-filter" value="available">Tersedia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('/dashboard/add_book') ?>" class="btn btn-primary">Add Book</a>
                                </div>
                                <div id="table-ajax" class="card-body">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Kategori Buku</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mb-1">
                                                <form action="#" method="POST" id="add-category-form">
                                                    <div class="input-group mb-3">
                                                        <input id="kategori" class="form-control" placeholder="Tambah Kategori" name="kategori">
                                                        <button class="btn btn-primary" onclick="ajaxAddCategory()" type="button" id="add-category-button">Tambah</button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                        <ul class="list-group" id="list-kategori" style="cursor: pointer;">
                                            <li id="default-category" class="active list-group-item d-flex justify-content-between align-items-center" onclick="ajaxGetAllBookFromDatabaseByIdKategori()">
                                                <span>Semua Kategori</span>
                                            </li>
                                            <?php foreach ($categories as $category) : ?>
                                                <li id="<?= $category['idKategori'] ?>" class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div onclick=<?= "\"ajaxGetAllBookFromDatabaseByIdKategori(" . $category['idKategori'] . ")\"" ?>>
                                                        <span><?= $category['nama'] ?></span>
                                                    </div>
                                                    <div id="<?= "action_kategori_" . $category['nama'] ?>">
                                                        <a onclick=<?= "\"setupEdit(" . $category['idKategori'] . ",'" . $category['nama'] . "')\"" ?> href="#"><i class="bi bi-pencil"></i></a>


                                                        <a href="#"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>

                                    </div>
                                </div>
                            </div>
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
        $(function() {
            ajaxGetAllBookFromDatabaseByIdKategori()
        });

        function resetActiveCategory() {
            var category_list = document.querySelectorAll(".list-group-item")
            category_list.forEach(function(element) {
                element.classList.remove('active')
            })
        }

        function ajaxGetAllBookFromDatabaseByIdKategori(idKategori = null) {

            resetActiveCategory();

            if (idKategori == null) {
                url = "<?= base_url('/dashboard/list_book_by_category') ?>/";

                $("#default-category").addClass("active");

                $("#dropdown-filter").show()

                $("#all-filter").attr('selected', true);

            } else {
                url = "<?= base_url('/dashboard/list_book_by_category') ?>/" + idKategori;

                // document.getElementById(idKategori).classList.add("active");
                $("#" + idKategori).addClass("active");

                $("#dropdown-filter").hide()
            }
            $.ajax({
                url: url,
                success: function(data) {
                    $('#table-ajax').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error fecthing data');
                }
            })
        }

        function ajaxAddCategory() {
            if ($('#kategori').val() != "") {
                $.ajax({
                    url: "<?= base_url('/dashboard/add_category') ?>",
                    type: "POST",
                    data: $('#add-category-form').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        location.reload()
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error updating data');
                    }
                })
            }
        }

        function setupEdit(id, name) {
            if ($('#kategori').val() == "") {
                $('#kategori').val(name);
                $('#kategori').attr("placeholder", "Edit " + name)
                $(id).remove();
                $('#add-category-button').text('Edit');
                $('#add-category-button').click(function() {
                    if ($('#kategori').val() != "") {
                        ajaxEditCategory(id);
                    }
                });
            }
        }

        function ajaxEditCategory(idKategori) {
            $.ajax({
                url: "<?= base_url('/dashboard/edit_category') ?>/" + idKategori,
                type: "POST",
                data: $('#add-category-form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    location.reload()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error updating data');
                }
            })
        }
    </script>

    <script src="/assets/js/mazer.js"></script>
</body>

</html>