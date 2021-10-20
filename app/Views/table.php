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
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?= $book['isbn'] ?></td>
                <td><?= $book['judul'] ?></td>
                <td><?= $book['stok'] ?></td>
                <td><?= $book['stok_tersedia'] ?></td>
                <td class="d-flex justify-content-evenly">
                    <a href="#"><i class="bi bi-info-circle" data-bs-toggle="modal" data-bs-target="<?= '#' . str_replace(' ', '-', $book['judul']) ?>"></i></a>
                    <div class=" modal fade text-left" id="<?= str_replace(' ', '-', $book['judul']) ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel1">Judul Buku: <?= $book['judul'] ?></h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Gambar</td>
                                            <td><a href="<?= base_url('/uploads/' . $book['file_gambar']) ?>" target="_blank" rel="noopener noreferrer">Click to preview</a></td>
                                        </tr>
                                        <tr>
                                            <td>ISBN</td>
                                            <td><?= $book['isbn'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td><?= $book['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pengarang</td>
                                            <td><?= $book['pengarang'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Penerbit</td>
                                            <td><?= $book['penerbit'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kota Terbit</td>
                                            <td><?= $book['kota_terbit'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Insert</td>
                                            <td><?= $book['tgl_insert'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Update</td>
                                            <td><?= $book['tgl_update'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('/dashboard/edit_book/' . $book['idbuku']) ?>"><i class="bi bi-pencil"></i></a>

                    <a href="#"><i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="<?= '#delete_' . str_replace(' ', '-', $book['judul']) ?>"></i></a>

                    <!--Basic Modal -->
                    <div class="modal fade text-left" id="<?= 'delete_' . str_replace(' ', '-', $book['judul']) ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel1">Konfirmasi Hapus "<?= $book['judul'] ?>"?</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Apa anda yakin untuk menghapus buku ini?<br>
                                        Buku yang sudah dihapus <u>tidak bisa dipulihkan kembali.</u>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <a href="<?= base_url('/dashboard/delete_book/' . $book['idbuku'] . '/confirm') ?>" class="btn btn-danger ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Confirm</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script>
    var jquery_datatable = $("#table1").DataTable()
</script>