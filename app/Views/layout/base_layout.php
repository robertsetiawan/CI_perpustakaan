<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <title><?= (isset($title) ? $title : "PERPUS") ?></title>
</head>

<body>
    <?= $this->renderSection('content') ?>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>