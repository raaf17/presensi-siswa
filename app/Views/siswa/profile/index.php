<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= route_to('profile') ?>"><?= $title ?></a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mt-sm-2">
                <div class="col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?= base_url('template') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> Web Developer
                                </div>
                            </div>
                            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" style="margin-top: 35px;">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">
                                            <i class="fas fa-home"></i> Detail Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">
                                            <i class="fas fa-id-card"></i> Ubah Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent4">
                                    <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab4">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" value="Ujang" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the first name
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" value="Maman" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the last name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-7 col-12">
                                                <label>Email</label>
                                                <input type="email" class="form-control" value="ujang@maman.com" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the email
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5 col-12">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Bio</label>
                                                <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Password Sekarang</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Password Baru</label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Konfirmasi Password</label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>