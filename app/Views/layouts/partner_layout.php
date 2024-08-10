<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="Site keywords here" />
    <meta name="description" content="#" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Site Title -->
    <title><?= isset($pageTitle) ? esc($pageTitle) : 'DrsOnCalls' ?></title>

    <!-- Fav Icon -->
    <link rel="icon" href="img/favicon.png" />

    <!--  Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('public/inner/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/slick.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/font-awesome-all.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/charts.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/datatables.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/fancy-box.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/nice-select.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/pikaday.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/reset.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/inner/css/style.css') ?>" />
</head>

<body id="crancy-dark-light">
    <div class="crancy-body-area">
        <div class="crancy-smenu" id="CrancyMenu">
        <?= $this->include('partner/include/sidebar') ?>
        </div>
        <?= $this->include('partner/include/header') ?>
        <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
          <div class="row">
             <?= $this->renderSection("body") ?>
            </div>
        </div>
        </section>


    </div>
    <?= $this->include('partner/include/footer') ?>
</body>