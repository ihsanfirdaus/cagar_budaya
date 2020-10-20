<?= $this->extend('layouts/backend/main') ?>

<?= $this->section('title') ?>
Ubah Kategori Cagar Budaya
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Ubah Kategori
        </div>
        <div class="card-body">
            <form action="/admin/kategori/update/<?= $data['id'] ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="process" value="1">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="nama" class="control-label">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>">
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