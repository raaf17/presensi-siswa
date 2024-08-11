<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="#">Siswa</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('admin/siswa/store') ?>" enctype="multipart/form-data" method="POST">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">NISN</label>
                                    <input type="number" class="<?= ($validation->hasError('nisn')) ? 'is-invalid' : '' ?> form-control" name="nisn" id="nisn" placeholder="NISN" value="<?= old('nisn') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nisn') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nama Siswa</label>
                                    <input type="text" class="<?= ($validation->hasError('nama_siswa')) ? 'is-invalid' : '' ?> form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?= old('nama_siswa') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_siswa') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="<?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : '' ?> form-control select2" value="<?= old('jenis_kelamin') ?>">
                                        <option value="">-- Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_kelamin') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Alamat</label>
                                    <textarea cols="30" rows="1" name="alamat" id="alamat" class="<?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?> form-control" placeholder="Alamat"><?= old('alamat') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">No. Handphone</label>
                                    <input type="number" class="<?= ($validation->hasError('no_handphone')) ? 'is-invalid' : '' ?> form-control" name="no_handphone" id="no_handphone" placeholder="No. Handphone" value="<?= old('no_handphone') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_handphone') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Kelas</label>
                                    <select name="id_kelas" id="id_kelas" class="<?= ($validation->hasError('id_kelas')) ? 'is-invalid' : '' ?> form-control select2" value="<?= old('id_kelas') ?>">
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php foreach ($kelas_select as $kelas) : ?>
                                            <option value="<?= $kelas->id ?>"><?= $kelas->nama_kelas ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_kelas') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Lokasi Presensi</label>
                                    <select name="id_lokasi_presensi" id="id_lokasi_presensi" class="<?= ($validation->hasError('lokasi_presensi')) ? 'is-invalid' : '' ?> form-control select2" value="<?= old('lokasi_presensi') ?>">
                                        <option value="">-- Lokasi Presensi --</option>
                                        <?php foreach ($lokasi_select as $lokasipresensi) : ?>
                                            <option value="<?= $lokasipresensi->id ?>"><?= $lokasipresensi->nama_lokasi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lokasi_presensi') ?>
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
                                    <label for="" class="form-control-label">Email</label>
                                    <input type="text" class="<?= ($validation->hasError('email')) ? 'is-invalid' : '' ?> form-control" name="email" id="email" placeholder="Username" value="<?= old('email') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Password</label>
                                    <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> form-control" name="password" id="password" placeholder="Password" value="<?= old('password') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Konfirmasi Password</label>
                                    <input type="password" class="<?= ($validation->hasError('konfirmasi_password')) ? 'is-invalid' : '' ?> form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" value="<?= old('konfirmasi_password') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('konfirmasi_password') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Role</label>
                                    <select name="role" id="role" class="<?= ($validation->hasError('role')) ? 'is-invalid' : '' ?> form-control select2" value="<?= old('role') ?>">
                                        <option value="">-- Pilih Role --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Pegawai">Siswa</option>
                                        <option value="Pegawai">Guru</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('role') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="<?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?> custom-file-input" value="<?= old('foto') ?>">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('foto') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('admin/siswa') ?>" class="btn btn-secondary">Batal</a>
                    </form>
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