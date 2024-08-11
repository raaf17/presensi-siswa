<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="#">Kelas</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tambah Data Kelas</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('admin/kelas/store') ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Kelas</label>
                                            <input type="text" class="<?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : '' ?> form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?= old('nama_kelas') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_kelas') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Jurusan</label>
                                            <select name="id_jurusan" id="" class="form-control select2" required>
                                                <option value="">-- Pilih Jurusan --</option>
                                                <?php foreach ($jurusan_select as $jurusan) : ?>
                                                    <option value="<?= $jurusan->id; ?>"><?= $jurusan->nama_jurusan; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('id_jurusan') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Guru</label>
                                            <select name="id_guru" id="" class="form-control select2" required>
                                                <option value="">-- Pilih Wali Kelas --</option>
                                                <?php foreach ($guru_select as $guru) : ?>
                                                    <option value="<?= $guru->id; ?>"><?= $guru->nama_guru; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('id_guru') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Keterangan</label>
                                            <textarea cols="30" rows="1" class="<?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?> form-control" name="keterangan" id="keterangan" placeholder="Keterangan"><?= old('keterangan') ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data Kelas</h4>
                            <div class="card-header-action">
                                <a href="<?= site_url('admin/kelas/trash'); ?>" class="btn btn-info"><i class="fas fa-file-excel"></i> Import</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Wali Kelas</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($kelas_all as $kelas) : ?>
                                            <tr>
                                                <td width="5"><?= $no++ ?>.</td>
                                                <td><?= $kelas->nama_kelas ?></td>
                                                <td><?= $kelas->nama_jurusan ?></td>
                                                <td><?= $kelas->nama_guru ?></td>
                                                <td><?= $kelas->keterangan ?></td>
                                                <td width="100" class="text-center">
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?= $kelas->id ?>">Edit</button>
                                                    <a href="<?= site_url('admin/kelas/delete/' . $kelas->id) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
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