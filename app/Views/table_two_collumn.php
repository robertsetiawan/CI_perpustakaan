<table class="table table-striped">
    <thead>
    <tr>
        <td>
            Judul Buku
        </td>
        <td>
            Kategori
        </td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td>
                <?= $book['judul'] ?>
            </td>
            <td>
                <?= $book['nama'] ?>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<p>Total buku: <?= $total ?></p>