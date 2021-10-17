<?= $this->extend('layout/base_layout.php') ?>
<?= $this->section('content') ?>
<div class="container">
    <h1>Dashboard</h1>
    <h2>Welcome <?= $username ?></h2>
    <a href="<?= base_url('/admin/logout') ?>" class="btn btn-danger">Logout</a>
</div>
<?= $this->endSection('content') ?>