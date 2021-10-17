<?= $this->extend('layout/base_layout.php') ?>
<?= $this->section('content') ?>
<div class="container">
    <?php if (!empty(session()->getFlashdata('error_login'))) : ?>
        <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('error_login') ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">Login Admin</div>
        <div class="card-body">
            <form action="<?= base_url('/admin/login') ?>" method="post">
                <div class="form-group">
                    <label for="nama">Username:</label>
                    <input class="form-control" type="text" name="nama" id="nama" value="<?= old('nama') ?>">
                    <?php if (!empty(session()->getFlashdata('error_nama'))) : ?>
                        <div class="text-danger"><?= session()->getFlashdata('error_nama') ?></div>
                    <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input class="form-control" type="password" name="password" id="password">
                    <?php if (!empty(session()->getFlashdata('error_password'))) : ?>
                        <div class="text-danger"><?= session()->getFlashdata('error_password') ?></div>
                    <?php endif; ?>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>