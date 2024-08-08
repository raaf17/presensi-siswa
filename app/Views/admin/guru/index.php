<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="#">Guru</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data Guru</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('admin/guru/store') ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Guru</label>
                                    <input type="text" class="<?= ($validation->hasError('nama_guru')) ? 'is-invalid' : '' ?> form-control" name="nama_guru" id="nama_guru" placeholder="Nama Guru" value="<?= old('nama_guru') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_guru') ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-text-input" class="form-control-label">NIP</label>
                                    <input type="text" class="<?= ($validation->hasError('nip')) ? 'is-invalid' : '' ?> form-control" name="nip" id="nip" placeholder="NIP" value="<?= old('nip') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nip') ?>
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
                            <h4>Data Guru</h4>
                            <div class="card-header-action">
                                <a href="<?= site_url('admin/guru/trash'); ?>" class="btn btn-info"><i class="fas fa-file-excel"></i> Import</a>
                                <a href="<?= site_url('admin/guru/trash'); ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Trash</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Guru</th>
                                            <th>NIP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($guru_all as $guru) : ?>
                                            <tr>
                                                <td width="5"><?= $no++ ?>.</td>
                                                <td><?= $guru->nama_guru ?></td>
                                                <td><?= $guru->nip ?></td>
                                                <td width="100" class="text-center">
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?= $guru->id ?>">Edit</button>
                                                    <a href="<?= site_url('admin/guru/delete/' . $guru->id) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
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
<?php include('javascript.php') ?>