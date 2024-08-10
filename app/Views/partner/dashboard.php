<?= $this->extend("layouts/partner_layout") ?>

<?= $this->section("body") ?>

<section class="crancy-adashboard1 crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-xxl-8 col-12 crancy-main__column">
                Partner Dashboard
                <h1>Hello, <?= session()->get('first_name') ?></h1>
                
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>