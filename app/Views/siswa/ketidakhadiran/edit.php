<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= route_to('siswa.ketidakhadiran') ?>">Ketidakhadiran</a></div>
                <div class="breadcrumb-item active"><a href="<?= route_to('ketidakhadiran.edit') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Edit Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('siswa/ketidakhadiran/update/' . $ketidakhadiran->id) ?>" enctype="multipart/form-data" method="POST">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Keterangan</label>
                                    <select name="keterangan" id="keterangan" class="<?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?> form-control select2">
                                        <option value="<?= $ketidakhadiran->keterangan ?>"><?= $ketidakhadiran->keterangan ?></option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Tanggal ketidakhadiran</label>
                                    <input type="date" class="<?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?> form-control" name="tanggal" id="tanggal" placeholder="Tanggal Ketidakhadiran" value="<?= $ketidakhadiran->tanggal ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Deskripsi</label>
                                    <textarea cols="30" rows="1" name="deskripsi" id="deskripsi" class="<?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '' ?> form-control" placeholder="Deskripsi"><?= $ketidakhadiran->deskripsi ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('deskripsi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">File Bukti</label>
                                    <div class="custom-file">
                                        <input type="hidden" name="file_lama" value="<?= $ketidakhadiran->file ?>">
                                        <input type="file" name="file" id="file" class="<?= ($validation->hasError('file')) ? 'is-invalid' : '' ?> custom-file-input">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('file') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('siswa/ketidakhadiran') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>