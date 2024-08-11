<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="#">Jurusan</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data Jurusan</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('admin/jurusan/store') ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="form-group mb-4">
                                    <label for="example-text-input" class="form-control-label">Nama Jurusan</label>
                                    <input type="text" class="<?= ($validation->hasError('nama_jurusan')) ? 'is-invalid' : '' ?> form-control" name="nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan" value="<?= old('nama_jurusan') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_jurusan') ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data Jurusan</h4>
                            <div class="card-header-action">
                                <a href="<?= site_url('admin/jurusan/trash'); ?>" class="btn btn-info"><i class="fas fa-file-excel"></i> Import</a>
                                <a href="<?= site_url('admin/jurusan/trash'); ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Trash</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($jurusan_all as $jurusan) : ?>
                                            <tr>
                                                <td width="5"><?= $no++ ?>.</td>
                                                <td><?= $jurusan->nama_jurusan ?></td>
                                                <td width="100" class="text-center">
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?= $jurusan->id ?>">Edit</button>
                                                    <a href="<?= site_url('admin/jurusan/delete/' . $jurusan->id) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated at <?php $zone = 3600 * +7;
                                                                                $date = gmdate("l, d F Y H:i a", time() + $zone);
                                                                                echo "$date"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('modal.php') ?>
<?= $this->endSection(); ?>