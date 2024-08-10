<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drs On Call</title>
    <link rel="stylesheet" href="<?= base_url('public/front/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('public/front/css/slick-theme.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/front/css/slick.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/front/css/aos.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/front/css/header.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/front/css/style.css') ?>" />
</head>

<body>
    <div class="main-wrapper">
        <?= $this->include('front/include/header') ?>
        <?= $this->renderSection("body") ?>
        <?= $this->include('front/include/footer') ?>
    </div>
</body>

</html>