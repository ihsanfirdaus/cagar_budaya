<?= $this->extend('layouts/backend/main') ?>

<?= $this->section('title') ?>
Kategori Cagar Budaya
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-3">

    <?php if (!empty(session()->getFlashdata('success'))) { ?>

        <div class="alert alert-success">
            <i class="fa fa-check"></i> &nbsp;<?php echo session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>

    <?php } ?>

    <div class="card">
        <div class="card-header bg-primary">
            Daftar Kategori
        </div>
        <div class="card-body">
            <a href="/admin/kategori/create" class="btn btn-success mb-3"><i class="fa fa-plus-circle"></i> Buat Kategori</a>
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $kategori) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $kategori['nama'] ?></td>
                            <td style="text-align: center;">
                                <a href="/admin/kategori/edit/<?= $kategori['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ubah</a>
                                <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="/admin/kategori/delete/<?= $kategori['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>