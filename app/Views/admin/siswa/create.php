<?= $this->extend('layouts/main'); ?>

<?php include('css.php') ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header" style="padding: 20px 24px !important;margin-bottom: -30px;">
        <h5 style="margin-top: 16px;">Tambah Data Pegawai</h5>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/pegawai/store') ?>" enctype="multipart/form-data" method="POST">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Nama</label>
                        <input type="text" class="<?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?> form-control" name="nama" id="nama" placeholder="Nama" value="<?= old('nama') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="<?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : '' ?> form-control" value="<?= old('jenis_kelamin') ?>">
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Alamat</label>
                        <textarea cols="30" rows="1" name="alamat" id="alamat" class="<?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?> form-control" placeholder="Alamat"><?= old('alamat') ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">No. Handphone</label>
                        <input type="number" class="<?= ($validation->hasError('no_handphone')) ? 'is-invalid' : '' ?> form-control" name="no_handphone" id="no_handphone" placeholder="No. Handphone" value="<?= old('no_handphone') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_handphone') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Jabatan</label>
                        <select name="id_jabatan" id="id_jabatan" class="<?= ($validation->hasError('id_jabatan')) ? 'is-invalid' : '' ?> form-control" value="<?= old('id_jabatan') ?>">
                            <option value="">-- Pilih Jabatan --</option>
                            <?php foreach ($jabatans as $jabatan) : ?>
                                <option value="<?= $jabatan->id ?>"><?= $jabatan->nama_jabatan ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_jabatan') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Lokasi Presensi</label>
                        <select name="id_lokasi_presensi" id="id_lokasi_presensi" class="<?= ($validation->hasError('lokasi_presensi')) ? 'is-invalid' : '' ?> form-control" value="<?= old('lokasi_presensi') ?>">
                            <option value="">-- Lokasi Presensi --</option>
                            <?php foreach ($lokasipresensis as $lokasipresensi) : ?>
                                <option value="<?= $lokasipresensi->id ?>"><?= $lokasipresensi->nama_lokasi ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('lokasi_presensi') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Foto</label>
                        <input type="file" class="<?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?> form-control" name="foto" id="foto" placeholder="Foto" value="<?= old('foto') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Username</label>
                        <input type="text" class="<?= ($validation->hasError('username')) ? 'is-invalid' : '' ?> form-control" name="username" id="username" placeholder="Username" value="<?= old('username') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Password</label>
                        <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> form-control" name="password" id="password" placeholder="Password" value="<?= old('password') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Konfirmasi Password</label>
                        <input type="password" class="<?= ($validation->hasError('konfirmasi_password')) ? 'is-invalid' : '' ?> form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" value="<?= old('konfirmasi_password') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('konfirmasi_password') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Role</label>
                        <select name="role" id="role" class="<?= ($validation->hasError('role')) ? 'is-invalid' : '' ?> form-control" value="<?= old('role') ?>">
                            <option value="">-- Pilih Role --</option>
                            <option value="Admin">Admin</option>
                            <option value="Pegawai">Pegawai</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('role') ?>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('admin/pegawai') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
<?php include('javascript.php') ?>