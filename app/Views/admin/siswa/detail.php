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
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data Siswa</h4>
                        </div>
                        <div class="card-body">
                            <img width="100px" style="border-radius: 10px; margin-bottom: 10px" src="<?= base_url('/images/uploads/' . $siswa_detail->foto) ?>" alt="">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <td width="30%">
                                            NISN
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->nisn ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Nama Siswa
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->nama_siswa ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Username
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->username ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Jenis Kelamin
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->jenis_kelamin ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Alamat
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->alamat ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            No. Handphone
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->no_handphone ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Kelas
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->nama_kelas ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Lokasi Presensi
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->nama_lokasi ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Status
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <span class="btn btn-sm btn-success"><?= $siswa_detail->status ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">
                                            Role
                                        </td>
                                        <td width="10">
                                            :
                                        </td>
                                        <td>
                                            <?= $siswa_detail->role ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="<?= site_url('admin/siswa') ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>