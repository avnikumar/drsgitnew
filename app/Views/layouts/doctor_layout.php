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
    <link rel="icon" href="<?= base_url('public/front/images/favicon.png') ?>" />
    <?php $current = get_current_controller_method(); ?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <meta name="csrf-token-name" content="<?= csrf_token() ?>">
    <meta name="csrf-token-value" content="<?= csrf_hash() ?>">
</head>

<body id="crancy-dark-light">
    <div class="crancy-body-area">
        <div class="crancy-smenu" id="CrancyMenu">
            <?= $this->include('doctor/include/sidebar') ?>
        </div>
        <?= $this->include('doctor/include/header') ?>
        <section class="crancy-adashboard crancy-show">
            <div class="container container__bscreen">
                <div class="row">
                    <?= $this->renderSection("body") ?>
                </div>
            </div>
        </section>
    </div>
    <?= $this->include('doctor/include/footer') ?>
</body>