<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= route_to('settings') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Settings</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5" role="tab" aria-controls="home" aria-selected="true">
                                        <i class="fas fa-home"></i> Pengaturan Umum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">
                                        <i class="fas fa-id-card"></i> Logo & Favicon</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade show active" id="home5" role="tabpanel" aria-labelledby="home-tab5">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Nama Website</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Email Website</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">No. Telp Website</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Meta Keyword Website</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">Deskripsi Wesbite</label>
                                                <textarea name="" id="" cols="30" rows="30" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Logo Wesbite</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Favicon Wesbite</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>