<?= $this->extend('layouts/main'); ?>

<?php include('css.php') ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Master Data</div>
                <div class="breadcrumb-item"><a href="<?= route_to('lokasipresensi') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Kelas</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('admin/lokasipresensi/trash'); ?>" class="btn btn-info"><i class="fas fa-file-excel"></i> Import</a>
                        <a href="<?= site_url('admin/lokasipresensi/create'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                        <a href="<?= site_url('admin/lokasipresensi/trash'); ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Trash</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lokasi</th>
                                    <th>Alamat Lokasi</th>
                                    <th>Tipe Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($lokasipresensis as $lokasipresensi) : ?>
                                    <tr>
                                        <td width="5"><?= $no++ ?>.</td>
                                        <td><?= $lokasipresensi->nama_lokasi ?></td>
                                        <td><?= $lokasipresensi->alamat_lokasi ?></td>
                                        <td><?= $lokasipresensi->tipe_lokasi ?></td>
                                        <td width="150" class="text-center">
                                            <a href="<?= site_url('admin/lokasipresensi/detail/' . $lokasipresensi->id) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="<?= site_url('admin/lokasipresensi/edit/' . $lokasipresensi->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= site_url('admin/lokasipresensi/delete/' . $lokasipresensi->id) ?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
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
    </section>
</div>
<?= $this->endSection(); ?>
<?php include('javascript.php') ?>