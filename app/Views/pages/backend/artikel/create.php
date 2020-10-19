<?= $this->extend('partials/backend/main') ?>

<?= $this->section('title') ?>
    Buat Artikel 
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Include Form -->
<?= $this->render('pages/backend/artikel/_form')?>
<!-- -->

<?= $this->endSection() ?>
