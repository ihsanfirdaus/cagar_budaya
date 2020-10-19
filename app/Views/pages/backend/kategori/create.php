<?= $this->extend('partials/backend/main') ?>

<?= $this->section('title') ?>
Buat Kategori Cagar Budaya
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Buat Kategori
        </div>
        <div class="card-body">
            <form action="/admin/kategori/create" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="process" value="1">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama" class="control-label">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>