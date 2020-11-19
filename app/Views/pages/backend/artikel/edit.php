<?= $this->extend('layouts/backend/main') ?>

<?= $this->section('title') ?>
Ubah Artikel <?= $getKategori['nama'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Form Ubah Artikel <?= $getKategori['nama'] ?>
        </div>
        <div class="card-body">
            <form action="/admin/artikel/create" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="judul" class="control-label">Judul</label>
                        <input type="text" name="judul" id="judul" value="<?= $data['judul'] ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="no_regnas" class="control-label">NO REGNAS</label>
                        <input type="text" name="no_regnas" id="no_regnas" value="<?= $data['no_regnas']?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="sk_penetapan" class="control-label">SK Penetepan</label>
                        <input type="text" name="sk_penetapan" value="<?= $data['sk_penetapan'] ?>" id="sk_penetapan" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="provinsi" class="control-label">Provinsi</label>
                        <select class="form-control" id="selectProvinsi"></select>
                        <input type="hidden" name="provinsi">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="kabupaten_kota" class="control-label">Kabupaten / Kota</label>
                        <select class="form-control" name="kabupaten_kota" id="selectKabupaten_Kota"></select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_pemilik" class="control-label">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" value="<?= $data['nama_pemilik'] ?>" id="nama_pemilik" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nama_pengelola" class="control-label">Nama Pengelola</label>
                        <input type="text" name="nama_pengelola" value="<?= $data['nama_pengelola'] ?>" id="nama_pengelola" class="form-control">
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="old_foto" class="control-label">Foto Artikel</label>
                            <div class="row">
                            <?php foreach($getArtikelFoto as $artikelFoto) { ?>
                                <div class="col-md-4">
                                    <img src="/images/artikel/<?= $artikelFoto['foto']?>" alt="" width="250px">
                                </div>
                            <?php } ?>
                            </div>
                        <label for="foto" class="control-label">Upload Foto</label>
                        <input type="file" name="foto[]" id="foto" class="form-control" multiple>
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