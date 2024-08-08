<?= $this->extend('layouts/main'); ?>

<?php include('css.php') ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="#">Lokasi Presensi</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Data Lokasi Presensi</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('admin/lokasipresensi/store') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nama Lokasi</label>
                                    <input type="text" class="<?= ($validation->hasError('nama_lokasi')) ? 'is-invalid' : '' ?> form-control" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi" value="<?= old('nama_lokasi') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_lokasi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Alamat Lokasi</label>
                                    <textarea cols="30" rows="1" name="alamat_lokasi" id="alamat_lokasi" class="<?= ($validation->hasError('tipe_lokasi')) ? 'is-invalid' : '' ?> form-control" placeholder="Alamat Lokasi"><?= old('alamat_lokasi') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_lokasi') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Tipe Lokasi</label>
                                    <select name="tipe_lokasi" id="tipe_lokasi" class="<?= ($validation->hasError('tipe_lokasi')) ? 'is-invalid' : '' ?> form-control" value="<?= old('tipe_lokasi') ?>">
                                        <option value="">-- Pilih Tipe Lokasi --</option>
                                        <option value="WIB">Kantor</option>
                                        <option value="WITA">Rumah</option>
                                        <option value="WIT">Kost</option>
                                        <option value="WIT">Gudang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe_lokasi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Radius</label>
                                    <input type="number" class="<?= ($validation->hasError('radius')) ? 'is-invalid' : '' ?> form-control" name="radius" id="radius" placeholder="Radius" value="<?= old('radius') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('radius') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Latitude</label>
                                    <input type="text" class="<?= ($validation->hasError('latitude')) ? 'is-invalid' : '' ?> form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?= old('latitude') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('latitude') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Longitude</label>
                                    <input type="text" class="<?= ($validation->hasError('longitude')) ? 'is-invalid' : '' ?> form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?= old('longitude') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('longitude') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jam Masuk</label>
                                    <input type="time" class="<?= ($validation->hasError('jam_masuk')) ? 'is-invalid' : '' ?> form-control" name="jam_masuk" id="jam_masuk" placeholder="Jam Masuk" value="<?= old('jam_masuk') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jam_masuk') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jam Pulang</label>
                                    <input type="time" class="<?= ($validation->hasError('jam_pulang')) ? 'is-invalid' : '' ?> form-control" name="jam_pulang" id="jam_pulang" placeholder="Jam Pulang" value="<?= old('jam_pulang') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jam_pulang') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Zona Waktu</label>
                                    <select name="zona_waktu" id="zona_waktu" class="<?= ($validation->hasError('zona_waktu')) ? 'is-invalid' : '' ?> form-control" value="<?= old('zona_waktu') ?>">
                                        <option value="">-- Pilih Zona Waktu --</option>
                                        <option value="WIB">WIB</option>
                                        <option value="WITA">WITA</option>
                                        <option value="WIT">WIT</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lokasipresensi') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('admin/lokasipresensi') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>