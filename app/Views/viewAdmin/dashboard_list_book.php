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

                                                        <a onclick=<?= "\"ajaxGetDeletedBooksByCategory(" . $category['idKategori'] . ",'delete-category-modal-" . str_replace(' ', '-', $category['nama']) . "')\"" ?> href="#"><i id="delete-category-button" class="bi bi-trash" data-bs-toggle="modal" data-bs-target="<?= '#delete_' . str_replace(' ', '_', $category['nama']) ?>"></i></a>

                                                        <!--Basic Modal -->
                                                        <div class="modal fade text-left" id="<?= 'delete_' . str_replace(' ', '_', $category['nama']) ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myModalLabel1">Konfirmasi Hapus "<?= $category['nama'] ?>"?</h5>
                                                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Apa anda yakin untuk menghapus kategori ini?<br>
                                                                            Daftar buku berikut akan dihapus dan <u>tidak bisa dipulihkan kembali.</u>
                                                                        </p>
                                                                        <div id="<?= "delete-category-modal-" . str_replace(' ', '-', $category['nama']) ?>"></div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Close</span>
                                                                        </button>
                                                                        <a href="#" class="btn btn-danger ml-1" onclick="<?= 'ajaxDeleteCategory(' . $category['idKategori'] . ')' ?>">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Confirm</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

            $('#add-category-form').submit(function(){
                event.preventDefault();
            })
        });

        $("#pilih-kategori").change(function() {
            if ($("#pilih-kategori").val() == "all") {
                ajaxGetAllBookFromDatabaseByIdKategori();
            } else {
                ajaxGetAvailableBookFromDatabase();
            }
        });

        function ajaxGetDeletedBooksByCategory(idKategori, target) {
            $.ajax({
                url: "<?= base_url('/dashboard/list_deleted_books_by_category') ?>/" + idKategori,
                success: function(data) {
                    $('#' + target).html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error fecthing data');
                }
            });
        }


        function ajaxGetAvailableBookFromDatabase() {
            $.ajax({
                url: "<?= base_url('/dashboard/list_available_book') ?>",
                success: function(data) {
                    $('#table-ajax').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error fecthing data');
                }
            })
        }

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

                $("#dropdown-filter option[value=all]").prop("selected", true)

            } else {
                url = "<?= base_url('/dashboard/list_book_by_category') ?>/" + idKategori;

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
                $('#' + id).remove();
                $('#add-category-button').text('Edit');
                document.getElementById('add-category-button').onclick = function() {
                    if ($('#kategori').val() != "") {
                        ajaxEditCategory(id);
                    }
                }
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

        function ajaxDeleteCategory(idKategori) {
            $.ajax({
                url: "<?= base_url('/dashboard/delete_category') ?>/" + idKategori,
                type: "POST",
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