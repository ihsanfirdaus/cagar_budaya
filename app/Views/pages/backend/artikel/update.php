<?= $this->extend('partials/backend/main') ?>

<?= $this->section('title') ?>
    Ubah Artikel 
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Include Form -->
<?= $this->render('pages/backend/artikel/_form')?>

<?= $this->endSection() ?>
