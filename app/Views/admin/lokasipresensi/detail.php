<?= $this->extend('layouts/main'); ?>

<?php include('css.php') ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Master Data</div>
                <div class="breadcrumb-item"><a href="<?= route_to('lokasipresensi') ?>">Data Siswa</a></div>
                <div class="breadcrumb-item active"><a href="<?= route_to('lokasipresensi.create') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit Data Lokasi Presensi</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td width="10%">
                                            Nama Lokasi
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->nama_lokasi ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Alamat Lokasi
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->alamat_lokasi ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Tipe Lokasi
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->tipe_lokasi ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Latitude
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->latitude ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Longitude
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->longitude ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Radius
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->radius ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Zona Waktu
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->zona_waktu ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Jam Masuk
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->jam_masuk ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%">
                                            Jam Pulang
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $lokasipresensi->jam_pulang ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="<?= site_url('admin/lokasipresensi') ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
<?php include('javascript.php') ?>