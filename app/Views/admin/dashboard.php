<?= $this->extend("layouts/admin_layout") ?>

<?= $this->section("body") ?>
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-xxl-8 col-12 crancy-main__column">
                Admin Dashboard
                <h1>Hello, <?= session()->get('name') ?></h1>
                <h3><a href="<?= site_url('logout') ?>">Logout</a></h3>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>