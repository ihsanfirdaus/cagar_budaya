<?= $this->extend('partials/main'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-10 mt-2">
            <div class="card">
                <div class="card-header text-white bg-dark">
                    <font face="Courier New">Cagar Budaya</font>
                    <!-- Button trigger modal -->
                    <font face="Courier New">
                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                        </button>
                        <!-- Modal -->
                    </font>
                </div>
                <font face="Courier New">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="example1">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">SK Penetapan</th>
                                        <th scope="col">Kategori Cagar Budaya</th>
                                        <th scope="col">Kabupaten/Kota</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Nama Pemilik</th>
                                        <th scope="col">Nama Pengelola</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($bangunancb as $b) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $b['sk_penetapan']; ?></td>
                                            <td><?= $b['kategori_cb']; ?></td>
                                            <td><?= $b['kabupaten_kota']; ?></td>
                                            <td><?= $b['provinsi']; ?></td>
                                            <td><?= $b['nama_pemilik']; ?></td>
                                            <td><?= $b['nama_pengelola']; ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <!-- Buutton Tambah&edit-->
                                                <button type="submit" class="btn btn-outline-warning edit" id="edit" data-id="<?= $b['id'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- Buutton Delete-->
                                                <form action="/bangunancb/<?= $b['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash"></i></button>
                                                </form>
                                                <!-- Modal -->
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </font>
            </div>
        </div>
    </div>
</div>