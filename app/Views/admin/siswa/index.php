<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header pb-0 d-flex justify-content-between">
        <h5 style="margin-top: 16px;">Data Pegawai</h5>
        <div>
            <a href="<?= site_url('admin/pegawai/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive p-0">
            <table class="table table-responsive table-striped align-items-center mb-0" id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Lokasi Presensi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pegawais as $pegawai) : ?>
                        <tr>
                            <td width="50" class="text-center"><?= $no++ ?>.</td>
                            <td><?= $pegawai->nip ?></td>
                            <td><?= $pegawai->nama ?></td>
                            <td><?= $pegawai->nama_jabatan ?></td>
                            <td><?= $pegawai->alamat_lokasi ?></td>
                            <td width="50" class="text-center align-items-center">
                                <a href="<?= site_url('admin/pegawai/detail/' . $pegawai->id) ?>" class="btn btn-sm btn-info">Detail</a>
                                <a href="<?= site_url('admin/pegawai/edit/' . $pegawai->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('admin/pegawai/delete/' . $pegawai->id) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
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
<?= $this->endSection(); ?>
<?php include('javascript.php') ?>