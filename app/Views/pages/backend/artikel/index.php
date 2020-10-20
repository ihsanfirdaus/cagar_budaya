<?= $this->extend('layouts/backend/main') ?>

<?= $this->section('title') ?>
Artikel Cagar Budaya
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary">
            Daftar Artikel <?= $getKategori['nama'] ?>
        </div>
        <div class="card-body">

            <a href="/admin/artikel/create/<?= $getKategori['slug'] ?>" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i>
                Buat Artikel <?= $getKategori['nama'] ?>
            </a>

            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Judul</th>
                        <th>NO REGNAS</th>
                        <th>Nama Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   <?php $no = 1; foreach($data as $artikel) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $artikel['judul'] ?></td>
                            <td style="text-align: center;">
                                <?= $artikel['no_regnas'] ?>
                            </td>
                            <td style="text-align: center;">
                                <?= $artikel['nama_pemilik'] ?>
                            </td>
                            <td style="text-align: center;">
                                <a href="" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</a>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                   <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>