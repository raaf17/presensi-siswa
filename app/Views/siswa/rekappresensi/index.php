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
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Rekap Harian</h4>
                    <div class="card-header-action">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#filter-tanggal"><i class="fa-regular fa-calendar"></i> Tanggal</button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#filter-bulan"><i class="fa-regular fa-calendar"></i> Bulan</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Presensi</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Total Jam Kerja</th>
                                    <th>Total Keterlambatan Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($rekap_presensis) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($rekap_presensis as $rekap_presensi) : ?>
                                        <?php
                                        $timestamp_jam_masuk = strtotime($rekap_presensi->tanggal_masuk . $rekap_presensi->jam_masuk);
                                        $timestamp_jam_keluar = strtotime($rekap_presensi->tanggal_keluar . $rekap_presensi->jam_keluar);
                                        $selisih = $timestamp_jam_masuk - $timestamp_jam_keluar;
                                        $jam = floor($selisih / 3600);
                                        $selisih -= $jam * 3600;
                                        $menit = floor($selisih / 60);

                                        $jam_masuk_real = strtotime($rekap_presensi->jam_masuk);
                                        $jam_masuk_kantor = strtotime($rekap_presensi->jam_masuk_kantor);
                                        $selisih_terlambat = $jam_masuk_real - $jam_masuk_kantor;
                                        $jam_terlambat = floor($selisih_terlambat / 3600);
                                        $selisih_terlambat -= $jam_terlambat * 3600;
                                        $menit_terlambat = floor($selisih_terlambat / 60);
                                        ?>
                                        <tr>
                                            <td width="50" class="text-center"><?= $no++ ?>.</td>
                                            <td><?= $rekap_presensi->nama ?></td>
                                            <td><?= date('d F Y', strtotime($rekap_presensi->tanggal_masuk)) ?></td>
                                            <td><?= $rekap_presensi->jam_masuk ?></td>
                                            <td><?= $rekap_presensi->jam_keluar ?></td>
                                            <td>
                                                <?php if ($rekap_presensi->jam_keluar == '0000:00:00') : ?>
                                                    0 Jam 0 Menit
                                                <?php else : ?>
                                                    <?= $jam . ' Jam ' . $menit . ' Menit ' ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($jam_terlambat < 0 || $menit_terlambat < 0) : ?>
                                                    <span class="btn btn-success">On Time</span>
                                                <?php else : ?>
                                                    <?= $jam_terlambat . ' Jam ' . $menit_terlambat . ' Menit ' ?>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
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
<?php include('modal.php') ?>
<?= $this->endSection(); ?>