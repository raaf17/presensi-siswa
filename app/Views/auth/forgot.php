<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="container" style="margin-top: 110px">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Lupa Password</h4>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= route_to('send_password_reset_link'); ?>" method="POST">
                            <?= csrf_field(); ?>

                            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success'); ?>
                                    <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('fail'); ?>
                                    <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                                <?php if ($validation->getError('email')) : ?>
                                    <div class="invalid-email">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="font-16 weight-600 text-center" data-color="#707373">
                                        OR
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="<?= route_to('admin.login.form'); ?>">Login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>