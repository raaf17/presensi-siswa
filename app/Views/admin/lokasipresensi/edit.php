<?= $this->extend('layouts/main'); ?>

<?php include('css.php') ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Master Data</div>
                <div class="breadcrumb-item"><a href="<?= route_to('lokasipresensi') ?>">Data Lokasi Presensi</a></div>
                <div class="breadcrumb-item active"><a href="<?= route_to('lokasipresensi.edit') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Edit Data Lokasi Presensi</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('admin/lokasipresensi/update/' . $lokasipresensi->id) ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nama Lokasi</label>
                                    <input type="text" class="<?= ($validation->hasError('nama_lokasi')) ? 'is-invalid' : '' ?> form-control" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi" value="<?= $lokasipresensi->nama_lokasi ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_lokasi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Alamat Lokasi</label>
                                    <textarea cols="30" rows="1" name="alamat_lokasi" id="alamat_lokasi" class="<?= ($validation->hasError('tipe_lokasi')) ? 'is-invalid' : '' ?> form-control" placeholder="Alamat Lokasi"><?= $lokasipresensi->nama_lokasi ?></textarea>
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
                                    <select name="tipe_lokasi" id="tipe_lokasi" class="<?= ($validation->hasError('tipe_lokasi')) ? 'is-invalid' : '' ?> form-control select2" value="<?= old('tipe_lokasi') ?>">
                                        <option value="<?= $lokasipresensi->tipe_lokasi ?>"><?= $lokasipresensi->tipe_lokasi ?></option>
                                        <option value="Kantor">Kantor</option>
                                        <option value="Rumah">Rumah</option>
                                        <option value="Kost">Kost</option>
                                        <option value="Gudang">Gudang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe_lokasi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Radius</label>
                                    <input type="number" class="<?= ($validation->hasError('radius')) ? 'is-invalid' : '' ?> form-control" name="radius" id="radius" placeholder="Radius" value="<?= $lokasipresensi->radius ?>">
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
                                    <input type="text" class="<?= ($validation->hasError('latitude')) ? 'is-invalid' : '' ?> form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?= $lokasipresensi->latitude ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('latitude') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Longitude</label>
                                    <input type="text" class="<?= ($validation->hasError('longitude')) ? 'is-invalid' : '' ?> form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?= $lokasipresensi->longitude ?>">
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
                                    <input type="time" class="<?= ($validation->hasError('jam_masuk')) ? 'is-invalid' : '' ?> form-control" name="jam_masuk" id="jam_masuk" placeholder="Jam Masuk" value="<?= $lokasipresensi->jam_masuk ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jam_masuk') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jam Pulang</label>
                                    <input type="time" class="<?= ($validation->hasError('jam_pulang')) ? 'is-invalid' : '' ?> form-control" name="jam_pulang" id="jam_pulang" placeholder="Jam Pulang" value="<?= $lokasipresensi->jam_pulang ?>">
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
                                    <select name="zona_waktu" id="zona_waktu" class="<?= ($validation->hasError('zona_waktu')) ? 'is-invalid' : '' ?> form-control select2">
                                        <option value="<?= $lokasipresensi->zona_waktu ?>"><?= $lokasipresensi->zona_waktu ?></option>
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
<?php include('javascript.php') ?>