<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Ketidakhadiran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($ketidakhadiran_all as $ketidakhadiran) : ?>
                                    <tr>
                                        <td width="5"><?= $no++ ?>.</td>
                                        <td width="100"><?= $ketidakhadiran->tanggal ?></td>
                                        <td width="100"><?= $ketidakhadiran->keterangan ?></td>
                                        <td><?= $ketidakhadiran->deskripsi ?></td>
                                        <td width="90" class="text-center">
                                            <a class="badge badge-info" href="<?= site_url('images/file_ketidakhadiran/' . $ketidakhadiran->file) ?>">Download</a>
                                        </td>
                                        <td width="90" class="text-center">
                                            <?php if ($ketidakhadiran->status == 'Pending') : ?>
                                                <span class="badge badge-warning"><?= $ketidakhadiran->status ?></span>
                                            <?php elseif ($ketidakhadiran->status == 'Approved') : ?>
                                                <span class="badge badge-success"><?= $ketidakhadiran->status ?></span>
                                            <?php endif ?>
                                        </td>
                                        <td width="90" class="text-center">
                                            <?php if ($ketidakhadiran->status == 'Pending') : ?>
                                                <a href="<?= site_url('admin/ketidakhadiran/approved/' . $ketidakhadiran->id) ?>" class="btn btn-sm btn-success">Approved</a>
                                            <?php elseif ($ketidakhadiran->status == 'Approved') : ?>
                                                <a href="<?= site_url('admin/ketidakhadiran/detail/' . $ketidakhadiran->id) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <?php endif ?>
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