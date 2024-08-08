<?= $this->extend('layouts/main'); ?>

<?php include('css.php') ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-0"></div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Presensi Masuk
                    </div>
                    <?php if ($cek_presensi < 1) : ?>
                        <div class="card-body text-center">
                            <div class="fw-bold mb-2"><?= date('d F Y') ?></div>
                            <div class="parent-clock">
                                <div id="jam-masuk"></div>
                                <div>:</div>
                                <div id="menit-masuk"></div>
                                <div>:</div>
                                <div id="detik-masuk"></div>
                            </div>
                            <form action="<?= site_url('pegawai/presensimasuk') ?>" method="POST">
                                <?php
                                if ($lokasipresensi->zona_waktu == 'WIB') {
                                    date_default_timezone_set('Asia/Jakarta');
                                } elseif ($lokasipresensi->zona_waktu == 'WITA') {
                                    date_default_timezone_set('Asia/Makassar');
                                } elseif ($lokasipresensi->zona_waktu == 'WIT') {
                                    date_default_timezone_set('Asia/Jayapura');
                                }
                                ?>

                                <input type="hidden" name="latitude_kantor" value="<?= $lokasipresensi->latitude ?>">
                                <input type="hidden" name="longitude_kantor" value="<?= $lokasipresensi->longitude ?>">
                                <input type="hidden" name="radius" value="<?= $lokasipresensi->radius ?>">

                                <input type="hidden" name="latitude_pegawai" id="latitude_pegawai">
                                <input type="hidden" name="longitude_pegawai" id="longitude_pegawai">

                                <input type="hidden" name="tanggal_masuk" value="<?= date('Y-m-d') ?>">
                                <input type="hidden" name="jam_masuk" value="<?= date('H:i:s') ?>">
                                <input type="hidden" name="id_pegawai" value="<?= session()->get('id_pegawai') ?>">
                                <button class="btn btn-info mt-4">Masuk</button>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center mb-4">
                                <img width="90px" src="<?= base_url() ?>/assets/img/icons/check-mark.png" alt="">
                            </div>
                            <h5>Anda telah melakukan presensi masuk.</h5>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Presensi Keluar
                    </div>
                    <?php if ($cek_presensi < 1) : ?>
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center mb-4">
                                <img width="90px" src="<?= base_url() ?>/assets/img/icons/hourglass.png" alt="">
                            </div>
                            <h5>Anda belum melakukan presensi masuk.</h5>
                        </div>
                    <?php elseif ($cek_presensi_keluar > 0) : ?>
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center mb-4">
                                <img width="90px" src="<?= base_url() ?>/assets/img/icons/close.png" alt="">
                            </div>
                            <h5>Anda telah melakukan presensi keluar.</h5>
                        </div>
                    <?php else : ?>
                        <div class="card-body text-center">
                            <div class="fw-bold mb-2"><?= date('d F Y') ?></div>
                            <div class="parent-clock">
                                <div id="jam-keluar"></div>
                                <div>:</div>
                                <div id="menit-keluar"></div>
                                <div>:</div>
                                <div id="detik-keluar"></div>
                            </div>
                            <form action="<?= site_url('pegawai/presensikeluar/' . $ambil_presensi_masuk->id) ?>" method="POST">
                                <?php
                                if ($lokasipresensi->zona_waktu == 'WIB') {
                                    date_default_timezone_set('Asia/Jakarta');
                                } elseif ($lokasipresensi->zona_waktu == 'WITA') {
                                    date_default_timezone_set('Asia/Makassar');
                                } elseif ($lokasipresensi->zona_waktu == 'WIT') {
                                    date_default_timezone_set('Asia/Jayapura');
                                }
                                ?>

                                <input type="hidden" name="latitude_kantor" value="<?= $lokasipresensi->latitude ?>">
                                <input type="hidden" name="longitude_kantor" value="<?= $lokasipresensi->longitude ?>">
                                <input type="hidden" name="radius" value="<?= $lokasipresensi->radius ?>">

                                <input type="hidden" name="latitude_pegawai" id="latitude_pegawai">
                                <input type="hidden" name="longitude_pegawai" id="longitude_pegawai">

                                <input type="hidden" name="tanggal_keluar" value="<?= date('Y-m-d') ?>">
                                <input type="hidden" name="jam_keluar" value="<?= date('H:i:s') ?>">
                                <button class="btn btn-danger mt-4">Keluar</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-0"></div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
<?php include('javascript.php') ?>